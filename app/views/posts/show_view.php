<?php
include  '../public/assets/header.php';
include __DIR__ . '/../../models/Post.php';
include __DIR__ . '/../../models/User.php';
include __DIR__ . '/../../models/Comment.php';

session_start(); 

$p = new Post();
$u = new User();
$c = new Comment();
$post = $p->getPostByPostId($_GET['id']);
$user_post = $u->getUserByUserId($post->user_id);
$comments = $c->getPostComments($post->id);



?>

<main>
<div class="container my-5 py-5">

<h3 class="text-center">Post details</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center">
                            <div>
                                <h6 class="fw-bold text-primary mb-1"><?= $post->title ?></h6>
                                <p class="text-muted small mb-0"><a style=" text-decoration: none;" href="#?id="><?= $user_post->email ?></a></p>

                            </div>
                        </div>
                        <p class="mt-3 mb-4 pb-2"><?= $post->content ?></p>
                        <div class="small d-flex justify-content-start">
                            <a href="" style=" text-decoration: none;" class="d-flex align-items-center me-3">
                                <i class="far fa-thumbs-up me-2"></i>
                                <p class="mb-0">Comments :</p>
                            </a>
                        </div>
                    </div>

                    <?php
                    if (!empty($comments)) {
                        foreach ($comments as $comment) {
                         
                            echo '<hr class="my-0" style="height: 1px;">' .
                            '<div class="card-body p-4">' .
                                '<div class="d-flex flex-start">' .
                                    '<div>' .
                                        "<h6 class='fw-bold mb-1'><a style=' text-decoration: none;' href='#?id='>$comment->username</a></h6>" .
                                        '<div class="d-flex align-items-center mb-1">' .
                                        '</div>' .
                                        "<p class='mb-0'>$comment->comment</p>" .
                                    '</div>' .
                                '</div>' .
                            '</div>' .
                            '<hr class="my-0">';
                       
                        }
                    } else {
                        echo '<hr>' .
                        '<div class="row">' .
                            '<div class="col-md-12 text-center">' .
                                '<div class="alert alert-primary" role="alert">No comments yet.</div>' .
                            '</div>' .
                        '</div>';
                   
                    }
                    ?>
                    <form action='/create-comment' method='post'>
                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                            <div class="d-flex flex-start w-100">
                                <div class="form-outline w-100">
                                    <textarea class="form-control" id="textAreaExample" name='comment' rows="4"
                                    style="background: #fff;" placeholder='Comment...' required></textarea>

                                    <input type="hidden" name="post_id" value="<?= $post->id ?>">
                               
                                </div>
                            </div>
                            <div class="float-end mt-2 mb-2 pt-1">
                                <button type="submit" onclick="check()" class="btn btn-primary btn-sm">comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </main>
<?php include '../public/assets/footer.php' ?>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>

<?php if (!isset($_SESSION['user'])) : ?>
<script>
  
function check() {
  
        if (confirm("you not logged in , Redirect to login ")) {
            window.location.href = "/login";
        }
   
}

</script>
<?php endif; ?>