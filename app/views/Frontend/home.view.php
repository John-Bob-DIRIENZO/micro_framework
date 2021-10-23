<h1 class="text-center"><?= $text; ?></h1>

<h2 class="text-center">Les databases</h2>
<p class="text-center">
    <?= print_r($databases); ?>
</p>

<h2 class="text-center">Un JWT</h2>
<p class="text-center">
    <?= print_r($token); ?>
</p>

<h2 class="text-center">Upload image</h2>
<form action="/api/upload-image" method="post" enctype="multipart/form-data" class="w-50 mx-auto">
    <input type="file" name="image" class="form-control mb-3">
    <button type="submit" class="btn btn-primary w-100">Send !</button>
</form>

<h2 class="text-center mt-5">Toutes les images uploadées</h2>
<ul class="list-group w-50 mx-auto">
    <?php foreach ($allImages as $image) :
    /** @var $image \App\Entity\Image */
    ?>
        <li class="list-group-item">
            <a href="<?= $image->getPath(); ?>" target="_blank">
                <?= $image->getOriginalFileName(); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
