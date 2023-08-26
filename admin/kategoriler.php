<?php include 'header.php' ?>
<?php include 'sidebar.php';

$kategorisor=$db->prepare("SELECT * FROM category");
$kategorisor->execute();?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
   <div class="card">
     <div class="card-header">
       <h4>Kategoriler</h4>
     </div>
     <form action="<?=base_url("islem.php")?>" method="POST">
         <div class="table-responsive">
      <table class="table table-striped table-md">
        <tr>
          <th>Kategori Foto</th>
          <th>Kategori Adı</th>
          <th>Kategori Açıklama</th>
          <th></th>
          <th></th>
          <th>
            <a href="kategori-ekle.php" class="btn btn-success"><i class="fa fa-plus"></i> Yeni Ekle</a></th>
          </tr>
          <?php while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr class="text-center">
              <td style="width: 10%;" class="text-center"><img style="width: 100%;" src="<?=base_url("{$kategoricek['image']}")?>"></td>
              <td><?php echo $kategoricek['name']; ?></td>
              <td><?php echo $kategoricek['description']; ?></td>
              <td class="mt-4 text-white badge badge-<?=($kategoricek['status'] == 0 ? 'danger' : 'success')?>"><?=($kategoricek['status'] == 0 ? 'Pasif' : 'Aktif')?></td>
              <td style="text-align: center;"><a href="kategori-duzenle.php?id=<?php echo $kategoricek['id'] ?>" class="btn btn-outline-info"><i class="fa fa-pencil-alt"></i> Düzenle</a></td>
              <td><a href="../islem.php?kategorisil=ok&id=<?php echo $kategoricek['id'] ?>" onclick="return confirm('Silmek istediğinize emin misiniz?')" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Sil</a></td>
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
