<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Каталог товаров / IT4B</title>
    <link rel="icon" type="image/png" href="img/common/logo.png" />

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/buttons.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
    
        <div class="index-head">
                <div class="al_l">
                    <img src="img/common/logo.png" />
                </div>
                <div class="al_r">
                    <a class="btn btn-prym" data-toggle="modal" data-target=".modal-auth">Войти</a>
                </div>
            </div>
    <div class="body-wrap">
        


        <section class="main-section transport">
            <div class="inner">
                <h1>Транспортным компаниям</h1>
                <p>
                    Ищете клиентов? Регистрируйся на платформе “IT4B”, чтобы найти работу для вашей техники без посредников.
                </p>
                <a href="#" class="btn btn-prym" data-toggle="modal" data-target=".modal-reg-1">Зарегистрироваться</a>
            </div>
        </section>
        <section class="main-section buy">
            <div class="inner">
                <h1>Покупателям</h1>
                <p>
                    Ищете поставщика? Регистрируйся на платформе “IT4B”, чтобы найти работу для вашей техники без посредников.
                </p>
                <a href="#" class="btn btn-prym" data-toggle="modal" data-target=".modal-reg-2">Зарегистрироваться</a>
            </div>
        </section>
        <section class="main-section vendor">
            <div class="inner">
                <h1>Поставщикам</h1>
                <p>
                    Ищете место сбыта? Регистрируйся на платформе “IT4B”, чтобы найти работу для вашей техники без посредников.
                </p>
                <a href="#" class="btn btn-prym" data-toggle="modal" data-target=".modal-reg-3">Зарегистрироваться</a>
            </div>
        </section>
    </div>

    <!-- modal -->
    <!-- Large modal -->
    

    <div class="modal fade modal-reg-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                    <a class="close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                <div class="modal-reg-container">
                    <form name="reg">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название компании:</label>
                            <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Номер телефона:</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <select id="type" style="display:none">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль:</label>
                            <input id="pass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="modal_btn">
                            <button type="submit" class="btn btn-prym btn-100 mb-2" onclick="send()">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-reg-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                    <a class="close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                <div class="modal-reg-container">
                    <form name="reg">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название компании:</label>
                            <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Номер телефона:</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль:</label>
                            <input id="pass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <select id="type">
                            <option value="1">1</option>
                            <option value="2" selected>2</option>
                            <option value="3">3</option>
                        </select>
                        <div class="modal_btn">
                            <button type="submit" class="btn btn-prym btn-100 mb-2">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-reg-3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                    <a class="close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                <div class="modal-reg-container">
                    <form name="reg">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название компании:</label>
                            <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Номер телефона:</label>
                            <input id="phone" type="number" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail:</label>
                            <input id="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль:</label>
                            <input id="pass" type="password" class="form-control" id="pass" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <select id="type">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3" selected>3</option>
                        </select>
                        <div class="modal_btn">
                            <button type="submit" class="btn btn-prym btn-100 mb-2">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-auth" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                    <a class="close-modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                <div class="modal-reg-container">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль:</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="modal_btn">
                            <button type="submit" class="btn btn-prym btn-100 mb-2">Вход</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    <script type="text/javascript" > 
        function send() {

                sendData = {};

                if ($('#cache').get(0).checked) {
                sendData['cache'] = "yes"; 
                } else {
                sendData['cache'] = "no"; 
                }

                if ($('#clear').get(0).checked) {
                sendData['clear'] = "yes"; 
                }

                if ($('#start').get(0).value != "") {
                sendData['start'] = $('#start').get(0).value; 
                }

                if ($('#end').get(0).value != "") {
                sendData['end'] = $('#end').get(0).value; 
                }

                sendData['statusGroups'] = $(".group:checked").map(function () { 
                return this.value; 
                }).get().join(",");

                sendData['paid'] = $('#paid').get(0).value;

                console.log(sendData);
                console.log(JSON.stringify(sendData));

                $(document).ready( function() { 
                console.log('i am ready');
                $.ajax({
                type: "POST",
                url:"$scriptName",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                data: "data="+JSON.stringify(sendData),
                success: function(data){
                $('#response').html(data);
                $('html').removeClass("wait");
                console.log(data);
                }
                } );});
                }
    </script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hmdOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- <script src="js/dropzone.js"></script> -->

</body>

</html>