<?php

include  '../public/assets/header.php';

session_start();
if (!isset($_SESSION['user'])) {
  header("Location:  / ");
  exit();
}

$user = $_SESSION['user'];

?>

<?php require __DIR__ . '/../sessionMsg.php'; ?>

<main class='p-2' style="margin-top: 150px;margin-bottom: 250px">

  <h3 class="text-center">edit profile</h3>
  <form action="/edit-profile" method="post" enctype="multipart/form-data">
    <div class="row align-items-center pt-4 pb-3">
      <div class="col-md-3 ps-5">
        <h6 class="mb-0">Username</h6>
      </div>
      <div class="col-md-9 pe-5">
        <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter username" required value="<?= $user->username ?>">
      </div>
    </div>
    <!-- email Input -->
    <div class="row align-items-center py-3">
      <div class="col-md-3 ps-5">
        <h6 class="mb-0">Email</h6>
      </div>
      <div class="col-md-9 pe-5">
        <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter email" required value="<?= $user->email ?>">
      </div>
    </div>

    <!-- old password Input -->
    <div class="row align-items-center py-3">
      <div class="col-md-3 ps-5">
        <h6 class="mb-0">Old Password</h6>
      </div>
      <div class="col-md-9 pe-5">
        <input type="password" name="oldpassword" class="form-control form-control-lg" placeholder="Enter old password" required value="">
      </div>

      <!-- new password Input -->
      <div class="row align-items-center py-3">
        <div class="col-md-3 ps-5">
          <h6 class="mb-0">New Password</h6>
        </div>
        <div class="col-md-9 pe-5">
          <input type="password" name="newpassword" class="form-control form-control-lg" placeholder="Enter new password" required value="">
        </div>
      </div>

      <!-- edit Button -->
      <div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <button type="submit" name='update' class="btn btn-primary btn-lg">Edit</button>
        </div>
      </div>
  </form>
</main>


<?php include '../public/assets/footer.php' ?>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>