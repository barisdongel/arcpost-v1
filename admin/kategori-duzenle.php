<?php include 'header.php' ?>
<?php include 'sidebar.php';
$kategorisor = $db->prepare("SELECT * FROM category where id=:id");
$kategorisor->execute(array("id" => $_GET['id']));
$kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Kategori Düzenle</h4>
			</div>
			<form action="<?= base_url("islem.php") ?>" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="id" value="<?php echo $kategoricek['id']; ?>">

				<div class="card-body">
					<div class="form-group">
						<img style="width: 20%;" src="<?= base_url("{$kategoricek['image']}") ?>">
					</div>
					<div class="form-group">
						<label><i class="fa fa-image"></i> Kategori Fotoğrafı</label>
						<input style="height: 50px;" type="file" name="image" class="form-control">
					</div>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label><i class="fa fa-heading"></i> Kategori Ad</label>
						<input type="text" name="name" value="<?php echo $kategoricek['name'] ?>" class="form-control">
					</div>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label><i class="fas fa-closed-captioning text-primary"></i></i> Kategori İçerik</label>
						<input name="description" class="form-control" type="text" value="<?= $kategoricek['description'] ?>">
					</div>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label><i class="fas fa-closed-captioning text-primary"></i></i> Aktif / Pasif</label>
						<select name="status" class="form-control">
							<option value="0" <?=($kategoricek['status'] == 0 ? 'selected' : '')?> >Pasif</option>
							<option value="1" <?=($kategoricek['status'] == 1 ? 'selected' : '')?> >Aktif</option>
						</select>
					</div>
				</div>
		</div>
		<div class="col-md-12 text-right">
			<a class="btn btn-warning" href="kategoriler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
			<button class="btn btn-info" type="submit" name="kategoriduzenle">Ekle</button>
		</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>