<?php include 'header.php';
include 'sidebar.php'; ?>
    <!-- Main Content -->
    <div class="main-content">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Site Genel Ayarları</h4>
                </div>
                <form action="<?=base_url("islem.php")?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label><i class="fa fa-heading"></i> Site Başlığı</label>
                            <input type="text" name="ayar_title" value="<?= $ayarcek['ayar_title'] ?>"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-image"></i> Logo</label><br>
                            <?php if ($ayarcek['ayar_logo']){ ?>
                            <img style="width: 30%;" src="<?= base_url($ayarcek['ayar_logo']) ?>">
                            <?php } ?>
                            <input style="height: 30%;" type="file" name="ayar_logo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-align-left"></i> Site Açıklaması</label>
                            <input type="text" name="ayar_desc" value="<?= $ayarcek['ayar_desc'] ?>"
                                   class="form-control">
                        </div>
                    </div>
            </div>
            <div class="col-md-12 text-right">
                <a class="btn btn-warning" href="index.php"><i class="fa fa-long-arrow-alt-left"></i> Geri Dön</a>
                <button class="btn btn-info" type="submit" name="ayarguncelle">Güncelle</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
<?php include 'footer.php' ?>