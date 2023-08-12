<?php include 'function.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img src="https://www.kadencewp.com/wp-content/uploads/2020/10/alogo-1.png" width="30%" height="75" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php foreach (cokVeri("category", "*", "order by id") as $category) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="category?id=<?=$category['id']?>"><?=$category['name']?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <?php foreach (cokVeri("category", "*", "order by id") as $category) : ?>
            <div class="category my-4">
                <h3 class="text-center border-bottom"><?= $category['name'] ?></h3>
                <div class="row">
                    <?php foreach (cokVeri("item", "*", "where category_id = {$category['id']}") as $item) : ?>
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

    <footer class="text-center text-muted">Bu site <a class="text-dark fw-bold text-decoration-none" href="https://inoception.com">Inoception Yazılım</a> tarafından yapıldı.</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>