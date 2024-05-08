<?php

include  '../public/assets/header.php';

include  __DIR__ . '/../../models/Post.php';

session_start();
if (!isset($_GET['id']) || !isset($_SESSION['user'])) {
    header("Location:  / ");
    exit();
}

$id = $_GET['id'];
$p = new Post();
$post = $p->getPostByPostId($id);

?>

<main class='p-2' style="margin-top: 150px;margin-bottom: 250px">
<h3 class="text-center">edit post</h3>
    <form action="/edit-post" method="post">

        <div class="card-body">
            <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Title :</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" required value="<?= $post->title ?>">
                    <input type="hidden" name="post_id" value="<?= $post->id ?>">
                </div>
            </div>
            <!-- Content Input -->
            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Content :</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <textarea class="form-control form-control-lg" name="content" placeholder="Content" style="height: 200px;" maxlength="255" required><?= $post->content ?></textarea>


                </div>
            </div>
            <!-- Submit Button -->
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <button type="submit" name='update' class="btn btn-primary btn-lg">Edit</button>
                </div>
            </div>

        </div>
    </form>
</main>




<?php include '../public/assets/footer.php' ?>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>