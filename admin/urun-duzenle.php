<?php include 'header.php' ?>
<?php include 'sidebar.php';
$urunsor=$db->prepare("SELECT * FROM item where id=:id");
$urunsor->execute(array("id" => $_GET['id']));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="main-content">
	<div class="col-12 col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Ürün Düzenle</h4>
			</div>
			<form action="<?=base_url("islem.php")?>" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="id" value="<?=$uruncek['id']; ?>">

				<div class="card-body">
					<div class="form-group">
						<div class="form-group">
							<img style="width: 20%;" src="<?= base_url("{$uruncek['image']}") ?>">
						</div>
						<div class="form-group">
							<label><i class="fa fa-image"></i> Ürün Fotoğrafı</label>
							<input style="height: 50px;" type="file" name="image" class="form-control" value="<?= base_url("{$uruncek['image']}") ?>">
						</div>
						<label><i class="fa fa-heading"></i> Ürün Ad</label>
						<input type="text" name="name" class="form-control" value="<?=$uruncek['name'] ?>">
					</div>
					<div class="form-group">
						<label><i class="fa fa-file"></i> Ürün Açıklaması</label>
						<input type="text" name="description" class="form-control" value="<?=$uruncek['description'] ?>">
					</div>
					<div class="form-group">
						<label><i class="fa fa-file"></i> Ürün Fiyatı</label>
						<input type="text" name="price" class="form-control" value="<?=$uruncek['price'] ?>">
					</div>
					<div class="form-group">
						<label><i class="fa fa-list-alt"></i> Ürün Kategorisi</label>
						<select class="form-control" name="category_id">
							<?php
							$kategorisor=$db->prepare("SELECT * FROM category ORDER BY name ASC");
							$kategorisor->execute();
							while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
								<option value="<?php echo $kategoricek['id'] ?>"  <?=($uruncek['category_id']==$kategoricek['id'] ? "selected" : '');?>><?php echo $kategoricek['name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label><i class="fas fa-closed-captioning text-primary"></i></i> Aktif / Pasif</label>
						<select name="status" class="form-control">
							<option value="0" <?=($uruncek['status'] == 0 ? 'selected' : '')?> >Pasif</option>
							<option value="1" <?=($uruncek['status'] == 1 ? 'selected' : '')?> >Aktif</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-12 text-right">
				<a class="btn btn-warning" href="urunler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
				<button class="btn btn-info" type="submit" name="urunduzenle">Ekle</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
