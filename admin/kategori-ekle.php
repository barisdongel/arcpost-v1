<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<!-- Main Content -->
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Kategori Ekle</h4>
      </div>
      <form action="<?=base_url("islem.php")?>" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <div class="form-group">
              <label><i class="fa fa-image"></i> Kategori Fotoğrafı</label>
              <input style="height: 50px;" type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
              <label><i class="fa fa-list-alt"></i> Kategori Adı</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              <label><i class="fas fa-closed-captioning text-primary"></i></i> Kategori İçerik</label>
              <input name="description" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-md-12 text-right">
          <a class="btn btn-warning" href="kategoriler.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
          <button class="btn btn-info" type="submit" name="kategoriekle">Ekle</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<?php include 'footer.php' ?>
