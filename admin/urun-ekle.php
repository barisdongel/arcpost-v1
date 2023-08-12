<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Ürün Ekle</h4>
      </div>
      <form action="<?=base_url("islem.php")?>" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <div class="form-group">
              <label><i class="fa fa-image"></i> Ürün Fotoğrafı</label>
              <input style="height: 50px;" type="file" name="image" class="form-control">
            </div>
            <label><i class="fa fa-heading"></i> Ürün Ad</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label><i class="fa fa-text"></i> Ürün Açıklaması</label>
            <input type="text" name="description" class="form-control">
          </div>
          <div class="form-group">
            <label><i class="fa fa-money"></i> Ürün Fiyatı</label>
            <input type="text" name="price" class="form-control">
          </div>
          <div class="form-group">
            <label><i class="fa fa-list-alt"></i> Ürün Kategorisi</label>
            <select class="form-control" name="category_id">
              <?php
              $kategorisor=$db->prepare("SELECT * FROM category ORDER BY name ASC");
              $kategorisor->execute();
              while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $kategoricek['id'] ?>"><?php echo $kategoricek['name'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-12 text-right">
        <a class="btn btn-warning" href="urunler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
        <button class="btn btn-info" type="submit" name="urunekle">Ekle</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
