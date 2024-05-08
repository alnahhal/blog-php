<?php

include  '../public/assets/header.php';

include  __DIR__ . '/../../models/Comment.php';

session_start();
if (!isset($_GET['id']) || !isset($_SESSION['user'])) {
    header("Location:  / ");
    exit();
}

$id = $_GET['id'];
$c = new Comment();
$comment = $c->getCommentByCommentId($id);

?>

<main class='p-2' style="margin-top: 150px;margin-bottom: 250px">
<h3 class="text-center">edit comment</h3>
    <form action="/edit-comment" method="post">

        <div class="card-body">
    
            <!-- Content Input -->
            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Comment :</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <textarea class="form-control form-control-lg" name="comment" placeholder="Comment..." style="height: 200px;" maxlength="255" required><?= $comment->comment ?></textarea>

                    <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
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