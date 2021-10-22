<h1 class="text-center mt-5"><?= $text; ?></h1>


<form action="/api/upload-image" method="post" enctype="multipart/form-data" class="w-50 mx-auto">
    <input type="file" name="image" class="form-control">
    <button type="submit" class="btn btn-primary">Send !</button>
</form>