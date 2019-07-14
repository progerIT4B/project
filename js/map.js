// ymaps.ready(function () {  
//     var myMap = new ymaps.Map('map', {
//         center: [55.751574, 37.573856],
//         zoom: 9,
//         controls: []
//     });

//     var form = document.forms.refPoints;
//     var pointA = form.elements.one;
//     var pointB = form.elements.two;
//     document.getElementById('check').onclick = check;

    

//     function check (){
//         console.log(pointA.value);
//         console.log(pointB.value);
//     };
    
//     var multiRoute = new ymaps.multiRouter.MultiRoute({
//         referencePoints: [
//             String(pointA.value),
//             String(pointB.value)
//         ]
//     });

//     // Включение режима редактирования.
//     multiRoute.editor.start();
//     // А вот так можно отключить режим редактирования.
//     // multiRoute.editor.stop();
//     // Добавление маршрута на карту.
//     myMap.geoObjects.add(multiRoute);
//     myMap.geoObjects.add(multiRoute);
// }); 


function init () {


    var arrRoutes = [{s: "Данков, пл. Ленина, 1", d: "Липецк, Проспект победы, 10"}, {s: "Тула, пл. Ленина, 1", d: "Елец, Проспект победы, 10"}];

    var form = document.forms.refPoints;
    var pointA = form.elements.one;
    var pointB = form.elements.two;
    document.getElementById('check').onclick = check;

    

    function check (){
        console.log(pointA.value);
        console.log(pointB.value);
    };

    /**
     * Создаем мультимаршрут.
     * Первым аргументом передаем модель либо объект описания модели.
     * Вторым аргументом передаем опции отображения мультимаршрута.
     * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRoute.xml
     * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRouteModel.xml
     */
    var multiRoute = new ymaps.multiRouter.MultiRoute({
        // Описание опорных точек мультимаршрута.
        referencePoints: [
            "Липецк, Советская, 64",
            "Елец, Орджоникидзе, 1"
        ],
        // Параметры маршрутизации.
        params: {
            // Ограничение на максимальное количество маршрутов, возвращаемое маршрутизатором.
            results: 1
        }
    }, {
        // Автоматически устанавливать границы карты так, чтобы маршрут был виден целиком.
        boundsAutoApply: true,
        strictBounds: true
    });

    // Создаем кнопки для управления мультимаршрутом.
    var trafficButton = new ymaps.control.Button({
            data: { content: "Учитывать пробки" },
            options: { selectOnClick: true }
        }),
        viaPointButton = new ymaps.control.Button({
            data: { content: "Добавить транзитную точку" },
            options: { selectOnClick: true }
          });

    // Объявляем обработчики для кнопок.
    trafficButton.events.add('select', function () {
        /**
         * Задаем параметры маршрутизации для модели мультимаршрута.
         * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRouteModel.xml#setParams
         */
        multiRoute.model.setParams({ avoidTrafficJams: true }, true);
    });

    trafficButton.events.add('deselect', function () {
        multiRoute.model.setParams({ avoidTrafficJams: false }, true);
    });

    viaPointButton.events.add('select', function () {
        var referencePoints = multiRoute.model.getReferencePoints();
        referencePoints.splice(1, 0, "Данков, пл. Ленина, 1");
        referencePoints.splice(2, 0, "Елец, Ленина, 10");
        /**
         * Добавляем транзитную точку в модель мультимаршрута.
         * Обратите внимание, что транзитные точки могут находится только
         * между двумя путевыми точками, т.е. не могут быть крайними точками маршрута.
         * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRouteModel.xml#setReferencePoints
         */
        multiRoute.model.setReferencePoints(referencePoints, [1]);
    });

    viaPointButton.events.add('deselect', function () {
        var referencePoints = multiRoute.model.getReferencePoints();
        referencePoints.splice(1, 2);
        multiRoute.model.setReferencePoints(referencePoints, []);
    });

    // Создаем карту с добавленными на нее кнопками.
    var myMap = new ymaps.Map('map', {
        center: [55.750625, 37.626],
        zoom: 7,
        controls: [trafficButton, viaPointButton]
    }, {
        buttonMaxWidth: 300
    });

    // Добавляем мультимаршрут на карту.
    myMap.geoObjects.add(multiRoute);
    myMap.geoObjects.add(multiRoute);

    for (var key in arrRoutes) {
        //alert( arr[key] ); // Яблоко, Апельсин, Груша


        ymaps.geocode(arrRoutes[key].s, {
            /**
            * Опции запроса
            * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/geocode.xml
            */
            // Сортировка результатов от центра окна карты.
            // boundedBy: myMap.getBounds(),
            // strictBounds: true,
            // Вместе с опцией boundedBy будет искать строго внутри области, указанной в boundedBy.
            // Если нужен только один результат, экономим трафик пользователей.
            results: 1
        }).then(function (res) {
                // Выбираем первый результат геокодирования.
                var firstGeoObject = res.geoObjects.get(0),
                    // Координаты геообъекта.
                    coords = firstGeoObject.geometry.getCoordinates(),
                    // Область видимости геообъекта.
                    bounds = firstGeoObject.properties.get('boundedBy');

                firstGeoObject.options.set('preset', 'islands#darkBlueDotIconWithCaption');
                // Получаем строку с адресом и выводим в иконке геообъекта.
                firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());

                // Добавляем первый найденный геообъект на карту.
                myMap.geoObjects.add(firstGeoObject);
                // Масштабируем карту на область видимости геообъекта.
        });
    }
}

ymaps.ready(init);


// function init () {
//     /**
//      * Создание мультимаршрута.
//      * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRoute.xml
//      */
//     var multiRoute = new ymaps.multiRouter.MultiRoute({
//         referencePoints: ["Липецк", "Елец"]
//     }, {
//         // Тип промежуточных точек, которые могут быть добавлены при редактировании.
//         editorMidPointsType: "via",
//         // В режиме добавления новых путевых точек запрещаем ставить точки поверх объектов карты.
//         editorDrawOver: false,
        
//     });

//     var buttonEditor = new ymaps.control.Button({
//         data: { content: "Добавить промежуточный маршрут" }
//     });

//     buttonEditor.events.add("select", function () {
//         /**
//          * Включение режима редактирования.
//          * В качестве опций может быть передан объект с полями:
//          * addWayPoints - разрешает добавление новых путевых точек при клике на карту. Значение по умолчанию: false.
//          * dragWayPoints - разрешает перетаскивание уже существующих путевых точек. Значение по умолчанию: true.
//          * removeWayPoints - разрешает удаление путевых точек при двойном клике по ним. Значение по умолчанию: false.
//          * dragViaPoints - разрешает перетаскивание уже существующих транзитных точек. Значение по умолчанию: true.
//          * removeViaPoints - разрешает удаление транзитных точек при двойном клике по ним. Значение по умолчанию: true.
//          * addMidPoints - разрешает добавление промежуточных транзитных или путевых точек посредством перетаскивания маркера, появляющегося при наведении курсора мыши на активный маршрут. Тип добавляемых точек задается опцией midPointsType. Значение по умолчанию: true
//          * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRoute.xml#editor
//          */
//         multiRoute.editor.start({
//             addWayPoints: false,
//             removeWayPoints: true,
//             addMidPoints: true
            
//         });
//     });

//     buttonEditor.events.add("deselect", function () {
//         // Выключение режима редактирования.
//         multiRoute.editor.stop();
//     });

//     // Создаем карту с добавленной на нее кнопкой.
//     var myMap = new ymaps.Map('map', {
//         center: [56.399625, 36.71120],
//         zoom: 7,
//         controls: [buttonEditor],
//         mapStateAutoApply: true
//     }, {
//         buttonMaxWidth: 300
//     });

//     // Добавляем мультимаршрут на карту.
//     myMap.geoObjects.add(multiRoute);
// }

// ymaps.ready(init);





//     function init () {
//     /**
//      * Создаем мультимаршрут.
//      * Первым аргументом передаем модель либо объект описания модели.
//      * Вторым аргументом передаем опции отображения мультимаршрута.
//      * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRoute.xml
//      * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRouteModel.xml
//      */
//     var multiRoute = new ymaps.multiRouter.MultiRoute({
//         // Описание опорных точек мультимаршрута.
//         referencePoints: [
//             "Липецк, ул. Стаханова, 16",
//             "Липецк, ул. Советская, 35"
//         ],
//         // Параметры маршрутизации.
//         params: {
//             // Ограничение на максимальное количество маршрутов, возвращаемое маршрутизатором.
//             results: 1
//         }
//     }, {
//         // Автоматически устанавливать границы карты так, чтобы маршрут был виден целиком.
//         boundsAutoApply: true
//     });

//     // Создаем кнопки для управления мультимаршрутом.
//     var trafficButton = new ymaps.control.Button({
//             data: { content: "Учитывать пробки" },
//             options: { selectOnClick: true }
//         }),
//         viaPointButton = new ymaps.control.Button({
//             data: { content: "Добавить транзитную точку" },
//             options: { selectOnClick: true }
//         });

//     // Объявляем обработчики для кнопок.
//     trafficButton.events.add('select', function () {
//         /**
//          * Задаем параметры маршрутизации для модели мультимаршрута.
//          * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRouteModel.xml#setParams
//          */
//         multiRoute.model.setParams({ avoidTrafficJams: true }, true);
//     });

//     trafficButton.events.add('deselect', function () {
//         multiRoute.model.setParams({ avoidTrafficJams: false }, true);
//     });

//     viaPointButton.events.add('select', function () {
//         var referencePoints = multiRoute.model.getReferencePoints();
//         referencePoints.splice(1, 0, "Москва, ул. Солянка, 7");
//         /**
//          * Добавляем транзитную точку в модель мультимаршрута.
//          * Обратите внимание, что транзитные точки могут находится только
//          * между двумя путевыми точками, т.е. не могут быть крайними точками маршрута.
//          * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRouteModel.xml#setReferencePoints
//          */
//         multiRoute.model.setReferencePoints(referencePoints, [1]);
//     });

//     viaPointButton.events.add('deselect', function () {
//         var referencePoints = multiRoute.model.getReferencePoints();
//         referencePoints.splice(1, 1);
//         multiRoute.model.setReferencePoints(referencePoints, []);
//     });

//     // Создаем карту с добавленными на нее кнопками.
//     var myMap = new ymaps.Map('map', {
//         center: [55.750625, 37.626],
//         zoom: 7,
//         controls: [trafficButton, viaPointButton]
//     }, {
//         buttonMaxWidth: 300
//     });

//     // Добавляем мультимаршрут на карту.
//     myMap.geoObjects.add(multiRoute);
// }

// ymaps.ready(init);
    
    