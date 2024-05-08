<?php
session_start();
if (isset($_SESSION['user'])) {
  header("Location:  / ");
  exit();
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>register </title>

  <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin w-100 m-auto">
    <form action="/register-controller" method="post">
      <a href="home">
        <img class="mb-4 rounded-circle shadow" src="assets/images/logo.jpg" alt="" width="92" height="92" style="object-fit: cover;">
      </a>
      <h1 class="h3 mb-3 fw-normal">Create account</h1>

      <?php require __DIR__ . '/../sessionMsg.php'; ?>

      <div class="form-floating">
        <input value="" name="username" type="text" class="form-control mb-2" id="floatingInput" placeholder="Username" required>
        <label for="floatingInput">Username</label>
      </div>

      <div class="form-floating">
        <input value="" name="email" type="email" class="form-control" id="floatingInput" placeholder="Email" required>
        <label for="floatingInput">Email address</label>
      </div>

      <div class="form-floating">
        <input value="" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>


      <div class="form-floating">
        <input value="" name="retype_password" type="password" class="form-control" id="floatingPassword" placeholder="Retype Password" required>
        <label for="floatingPassword">Retype Password</label>
      </div>


      <div class="my-2">Already have an account? <a href="/login">Login here</a></div>



      <button class="w-100 btn btn-lg btn-primary" type="submit">Create</button>
      <p class="mt-5 mb-3 text-muted">&copy; <?= date("Y") ?></p>
    </form>
  </main>



</body>

</html>