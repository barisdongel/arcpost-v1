<?php include 'header.php' ?>
<?php include 'sidebar.php';

$url = $_SERVER['QUERY_STRING'];
if ($url == '' || $url == NULL || $url == 'durum=ok' || $url == 'durum=no') {
	$kategorisor = $db->prepare("SELECT * FROM item inner join category on category.id=item.category_id");
	$kategorisor->execute();

	$urunsor = $db->prepare("SELECT * FROM item ORDER BY id ASC limit 20");
	$urunsor->execute();
	$say = $urunsor->rowCount();
} else {
	$kategorisor = $db->prepare("SELECT * FROM item inner join category on category.id=item.category_id where category=:category_id");
	$kategorisor->execute(array('category_id' => $_GET['category_id']));

	$urunsor = $db->prepare("SELECT * FROM item where category_id=:category_id");
	$urunsor->execute(array('category_id' => $_GET['category_id']));
}
if (isset($_POST['arama'])) {
	$aranan = $_POST['aranan'];
	$urunsor = $db->prepare("SELECT * FROM item WHERE name LIKE '%$aranan%' ORDER BY id ASC limit 20");
	$urunsor->execute();
	$say = $urunsor->rowCount();
}
$kategoriso1 = $db->prepare("SELECT * FROM category");
$kategoriso1->execute();
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<h4 class="text-center p-3">ÜRÜNLER</h4>
			<h6 class="text-center p-3">Ürün Kategorileri:</h6>
			<form action="" method="POST">
				<div class="input-group col-md-6 m-2">
					<i style="border: 0.1px solid #e91e63; background-color: #e91e63; color: #fff;" class="fa fa-search p-2"></i><input style="border: 1px solid #e91e63;" type="text" name="aranan" class="form-control" placeholder="Aramak istediğiniz ürünün adı...">
					<button style="border-radius: 0px;" type="submit" name="arama" class="btn btn-primary">Ara!</button>
				</div>
			</form>
			<form action="../islem.php" method="POST">
			    <div class="table-responsive">
				<table class="table table-striped table-md">
					<tr>
						<th class="text-center">Ürün Resim</th>
						<th>Ürün Ad</th>
						<th>Ürün Kategori</th>
						<th></th>
						<th></th>
						<th style="width: 15%;"><a href="urun-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
					</tr>

					<?php while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {?>
						<tr class="text-center">
							<td style="width: 10%;" class="text-center"><img style="width: 100%;" src="<?=base_url("{$uruncek['image']}")?>"></td>
							<td><?= $uruncek['name']; ?></td>
							<?php $kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC); ?>
							<td><?= $kategoricek['name']; ?></td>
							<td class="mt-4 text-white badge badge-<?=($uruncek['status'] == 0 ? 'danger' : 'success')?>"><?=($uruncek['status'] == 0 ? 'Pasif' : 'Aktif')?></td>
							<td><a href="urun-duzenle.php?id=<?= $uruncek['id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
							<td><a href="../islem.php?urunsil=ok&id=<?= $uruncek['id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary p-3"><i class="fa fa-trash"></i> Sil</a></td>
						</tr>
					<?php } ?>
				</table>
				</div>
		</div>
		<div class="col-md-12 text-right">
			<a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
		</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>