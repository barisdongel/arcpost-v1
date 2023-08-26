<?php include_once 'header.php'; ?>

<h1 class="text-center">Arcpos Adisyon Sistemi</h1>
<div class="mx-4 mt-5">
    <div class="row">
        <?php foreach (cokveri("masalar", "*", "order by id") as $rows):
            $adisyon = tekveri("adisyonlar","masa_id","{$rows['id']} AND status = 1");
            ?>
            <a href="detail.php?id=<?= $rows['id'] ?>" class="col-3 border py-5 px-5 text-center text-decoration-none text-dark <?=($adisyon['status'] == 1 ? 'bg-warning' : '')?>">
                <div id="table">
                    <h1><?= $rows['masa_kod'] ?></h1>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once 'footer.php' ?>
