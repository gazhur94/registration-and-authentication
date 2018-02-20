


<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Увійти</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
  </head>

  <body>

  <div class="container">
        <div class="row">
            <div class="col-4 offset-4 text-center">
  <div class="container">
      <header class="blog-header py-7">
    <form class="form-signin" method="POST">
      <div class="text-center mb-6">
        <img class="mb-4" src="https://slack-files2.s3-us-west-2.amazonaws.com/avatars/2016-02-26/23343984289_ddecd105aae271e99656_512.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Введіть свої дані, для реєстрації</h1>
      </div>

      <div class="form-label-group">
        <h6>Оберіть логін</h6>
        <input type="text" value="<?php echo @$_POST['login']; ?>" id="inputEmail" class="form-control" placeholder="Логін" required="Ведіть логін" autofocus="" name = "login"> 
        
      </div>

      <br>

      <div class="form-label-group">
      <h6>Введіть свій емейл</h6>
        <input type="email" id="inputEmail" value="<?php echo @$_POST['email']; ?>" class="form-control" placeholder="Емейл" required="" name = "email">
      </div>

      <br>

      <div class="form-label-group">
      <h6>Оберіть пароль</h6>
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="" name = "password" >
      </div>

    

      <div class="form-label-group">
      <h6>Введіть свій пароль ще раз</h6>
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="" name = "password_2">
        
      </div>



      
      <input type = "submit" class="btn btn-lg btn-primary btn-block" name="do_signup" value = "Зареєструватись">
      <h6 style="color:red"><?php echo $error?></h6>
      <h6>Якщо ви вже зареєстровані, то <a href="/login">увійдіть</a></h6>
 
  
    </form>
  </div>
  </div></div></div>
