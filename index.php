<?php include 'header.php'; ?>
<div class="container">
    <?php foreach (cokVeri("category", "*", "where status = 1") as $category) : ?>
        <div class="category my-4">
            <h1 class="text-center border-bottom"><?= $category['name'] ?></h1>
            <div class="row">
                <?php foreach (cokVeri("item", "*", "where category_id = {$category['id']} AND status = 1") as $item) : ?>
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
    <?php endforeach; ?>
</div>
<?php include 'footer.php' ?>