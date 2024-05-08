<?php

include  '../public/assets/header.php';

include  __DIR__ . '/../../models/Post.php';

session_start();
if ( !isset($_SESSION['user'])) {
    header("Location:  / ");
    exit();
}

$user = $_SESSION['user'];

?>

<main class='p-2' style="margin-top: 150px;margin-bottom: 250px">
<h3 class="text-center">create post</h3>
    <form action="/create-post" method="post">

        <div class="card-body">
            <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Title :</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" required value="">
                    <input type="hidden" name="user_id" value="<?= $user->id ?>">
                </div>
            </div>
            <!-- Content Input -->
            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Content :</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <textarea class="form-control form-control-lg" name="content" placeholder="Content" style="height: 200px;" maxlength="255" required></textarea>


                </div>
            </div>
            <!-- Submit Button -->
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <button type="submit" name='update' class="btn btn-primary btn-lg">Create</button>
                </div>
            </div>

        </div>
    </form>
</main>




<?php include '../public/assets/footer.php' ?>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>