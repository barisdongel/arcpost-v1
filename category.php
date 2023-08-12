<?php include 'header.php';
$id = $_GET['id'];
$urun = cokveri("item", "*", "where category_id = $id");
?>
<div class="container">
    <div class="row">
        <?php foreach ($urun as $item) : ?>
            <div class="col-6 py-2 px-2">
                <div class="card text-center">
                    <img src="<?= $item['image'] ?>" class="card-img-top" alt="item" style="width:100%; height:200px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['name'] ?></h5>
                        <p class="card-text"><?= $item['description'] ?></p>
                        <a href="#" class="btn btn-primary">Fiyat: <?= $item['price'] ?> ₺</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include 'footer.php' ?>