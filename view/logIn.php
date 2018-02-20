
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Зареєструватись</title>

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
      <form method="POST">
      <div class="text-center mb-6">
        <img class="mb-4" src="https://slack-files2.s3-us-west-2.amazonaws.com/avatars/2016-02-26/23343984289_ddecd105aae271e99656_512.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Введіть свої дані, щоб увійти на сайт</h1>
      </div>
      
      <div class="form-label-group">
        <input type="text" id="inputEmail" class="form-control" placeholder="Логін" required="" autofocus="" name="login">
        
      </div>
      <br></br>
      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="" name = "password">
        
      </div>

      <br></br>
      <button class="btn btn-lg btn-primary btn-block" name="do_login" type="submit">Увійти</button>
      <h6 style="color:red"><?php echo $error?></h6>
      <h6 >Якщо ви новий користувач, то <a href="/signup">зареєстуйтесь</a></h6>
  
    </form>
  </div>
  </div></div></div>
