<?php

include __DIR__ . '/../../public/assets/header.php';
include __DIR__ . '/../models/Post.php';
include __DIR__ . '/../controllers/cookie.php';

$post = new Post();

$posts = $post->getAllPosts();



?>
<!-- slider -->
<link rel="stylesheet" href="assets/slider/ism/css/my-slider.css" />
<script src="assets/slider/ism/js/ism-2.2.min.js"></script>

<div class="ism-slider" data-transition_type="fade" data-play_type="loop" id="my-slider">
  <ol>
    <li>
      <img src="assets/slider/ism/image/slides/flower-729514_1280.jpg">
      <div class="ism-caption ism-caption-0">posts</div>
    </li>
    <li>
      <img src="assets/slider/ism/image/slides/beautiful-701678_1280.jpg">
      <div class="ism-caption ism-caption-0">My slide caption text</div>
    </li>
    <li>
      <img src="assets/slider/ism/image/slides/summer-192179_1280.jpg">
      <div class="ism-caption ism-caption-0">My slide caption text</div>
    </li>
    <li>
      <img src="assets/slider/ism/image/slides/city-690332_1280.jpg">
      <div class="ism-caption ism-caption-0">My slide caption text</div>
    </li>
  </ol>
</div>
<!-- slider -->

<main class='p-2'>
  <h3 class='mx-4'>Featured</h3>

  <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php foreach ($posts as $post) : ?>
      <div class="col">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title"><?= $post->title ?></h5>
            <p class="card-text"><?= $post->content ?></p>
            <a href="/show-post?id=<?= $post->id ?>" class="btn btn-primary stretched-link">Details</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</main>



<?php include '../public/assets/footer.php' ?>



<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>