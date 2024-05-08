<?php

include __DIR__ . '/../../public/assets/header.php';
include __DIR__ . '/../models/User.php';

session_start();

if (!isset($_SESSION['user'])) {
  header("Location:  / ");
  exit();
}

$user = $_SESSION['user'];

?>

<?php require __DIR__ . '/../sessionMsg.php'; ?>
<main class='p-2' style="margin-top: 150px;margin-bottom: 250px">
  <div class="row justify-content-center align-items-center h-100">
    <div class="col-md-3">
      <div class="card h-100 shadow">
        <div class="card-body text-center">
          <h5 class="card-title"><?= $user->username ?></h5>
          <p class="card-text"><?= $user->email ?></p>
          <a href="/posts" class="btn btn-primary">Posts</a>
          <a href="/comments" class="btn btn-primary ">comments</a>
          <a href="/edit-profile-view" class="btn btn-danger ">Edit profile</a>

        </div>
      </div>
    </div>
  </div>
</main>



<?php include '../public/assets/footer.php' ?>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>