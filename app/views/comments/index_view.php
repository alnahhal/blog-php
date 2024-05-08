<?php
include  '../public/assets/header.php';

include  __DIR__ . '/../../controllers/comments/index.php';


?>


<main class='p-2'>
    <?php require __DIR__ . '/../../sessionMsg.php'; ?>
    <h3 class="text-center" style="margin-top: 20px">Comments</h3>
    
    <div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top: 20px;margin-bottom: 50px">
    

        <?php foreach ($comments as $comment) : ?>
            <div class="col">
                <div class="card  ">
                    <div class="card-body">
                        
                        <p class="card-text"><?= $comment->comment ?></p>
                        <a href="/show-post?id=<?= $comment->post_id ?>" class="btn btn-primary ">show</a>
                        <a href="/edit/comment?id=<?= $comment->id ?>" class="btn btn-primary ">edit</a>
                        <a href="/delete-comment?id=<?= $comment->id ?>" onclick="return confirm('Are you sure you want to delete this post?');" class="btn btn-danger ">delete</a>

                    </div>

                </div>
            </div>
        <?php  endforeach; ?>
    </div>

    <?php if (empty($comments)) : ?>
        <div>
            <div class=" text-center">No comments yet.</div>
        </div>
    <?php endif; ?>

</main>



<?php include '../public/assets/footer.php' ?>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>