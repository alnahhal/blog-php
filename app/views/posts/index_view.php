<?php
include  '../public/assets/header.php';
include __DIR__ . '/../../models/Post.php';
include  __DIR__ . '/../../controllers/posts/index.php';


?>


<main class='p-2'>
    <?php require __DIR__ . '/../../sessionMsg.php'; ?>
    <h3 class="text-center" style="margin-top: 20px">Posts</h3>

    <div class="text-start">
        <a href="/create-form" class="btn btn-primary ">Create</a>
    </div>


    <div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top: 30px;margin-bottom: 50px">


        <?php foreach ($posts as $post) : ?>
            <div class="col">
                <div class="card  ">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->title ?></h5>
                        <p class="card-text"><?= $post->content ?></p>
                        <a href="/show-post?id=<?= $post->id ?>" class="btn btn-primary ">show</a>
                        <a href="/edit/post?id=<?= $post->id ?>" class="btn btn-primary ">edit</a>
                        <a href="/delete-post?id=<?= $post->id ?>" onclick="return confirm('Are you sure you want to delete this post?');" class="btn btn-danger ">delete</a>

                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if (empty($posts)) : ?>
        <div>
            <div class=" text-center">No posts yet.</div>
        </div>
    <?php endif; ?>

</main>



<?php include '../public/assets/footer.php' ?>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>