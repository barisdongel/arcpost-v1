<?php
include_once 'header.php';

$masa = tekveri("masalar", "id", $_GET['id']);
$adisyon = tekveri("adisyonlar", "masa_id", $_GET['id']);
?>

<header class="text-center mt-4">
    <nav>
        <a class="btn btn-primary rounded-0 p-4" href="index.php"><i class="fa fa-home"></i> ANASAYFA</a>
        <a class="btn btn-danger rounded-0 p-4" href="#"><i class="fa fa-up-down-left-right"></i> MASAYI TAŞI</a>
        <a class="btn btn-warning rounded-0 p-4" href="javascript:void(0);" onclick="sendTableData()"><i class="fa fa-file-invoice"></i> FİŞ ÇIKAR</a>
        <a class="btn btn-success rounded-0 p-4" href="#"><i class="fa fa-wallet"></i> HESABI KAPAT</a>
    </nav>
</header>

<div class="container">
    <div class="row">
        <h1 class="text-center fw-bold mt-5">MASA <?= $masa['masa_kod'] ?></h1>
        <div class="col-8">
            <div class="row">
                <?php foreach (cokVeri("category", "*", "where status = 1") as $category) : ?>
                    <h4 class="text-warning mt-5"><?= $category['name'] ?></h4>
                    <hr>
                    <?php foreach (cokveri("item", "*", "where status = 1 AND category_id = {$category['id']}") as $row) : ?>
                        <a href="javascript:void(0)" class="border text-decoration-none text-dark p-5 col-3" onclick="addtocart(<?= $row['id'] ?>, <?= $adisyon['id'] ?>)">
                            <div>
                                <?= $row['name'] ?><br><?= $row['price'] . "₺" ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-4 mt-5">
            <div class="border p-4">
                <h3>Hesap</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Ürün</td>
                                <td>Adet</td>
                                <td>Fiyat</td>
                                <td>İşlemler</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $urunler = json_decode($adisyon['urunler'], true);

                            // Ürünleri gruplayarak toplam sayıları hesapla
                            $groupedUrunler = array();
                            foreach ($urunler as $urunId) {
                                if (!isset($groupedUrunler[$urunId])) {
                                    $groupedUrunler[$urunId] = 1;
                                } else {
                                    $groupedUrunler[$urunId]++;
                                }
                            }

                            $toplamFiyat = 0; // Toplam fiyatı sıfırla
                            foreach ($groupedUrunler as $urunId => $urunAdet) {
                                $urun = tekveri("item", "id", $urunId);
                                $toplamFiyat += $urun['price'] * $urunAdet; // Her ürünün fiyatını adetle çarp ve toplama ekle
                            }
                            ?>
                        <tbody id="urunler">
                            <?php foreach ($groupedUrunler as $urunId => $urunAdet) : ?>
                                <?php
                                $urun = tekveri("item", "id", $urunId);
                                ?>
                                <tr id="urunler">
                                    <td><?= $urun['id'] ?></td>
                                    <td><?= $urun['name'] ?></td>
                                    <td>x<?= $urunAdet ?></td> <!-- Ürün adetini görüntüle -->
                                    <td><?= $urun['price'] * $urunAdet ?> ₺</td> <!-- Toplam fiyatı hesapla -->
                                    <td>
                                        <button type="button" onclick="removeItem(<?= $urun['id'] ?>,<?= $adisyon['id'] ?>)" class="btn btn-danger fs-6">Sil
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Toplam Hesap</td>
                                <td><?= $toplamFiyat ?> ₺</td>
                                <td></td>
                            </tr>
                        </tfoot>

                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Masa adını almak için bir değişken oluşturun
    var masaAdi = "<?= $masa['masa_kod'] ?>";

    function sendTableData() {
        var tableData = []; // Boş bir dizi oluşturuyoruz

        // Tüm tr elemanlarını seçip içindeki verileri dolaşıyoruz
        $('#urunler tr').each(function() {
            var rowData = {
                id: $(this).find('td:eq(0)').text(),
                name: $(this).find('td:eq(1)').text(),
                adet: $(this).find('td:eq(2)').text().replace('x', ''),
                price: $(this).find('td:eq(3)').text().replace(' ₺', ''),
            };
            tableData.push(rowData); // Veriyi diziye ekliyoruz
        });

        // AJAX isteği gönderiyoruz
        $.ajax({
            type: 'POST',
            url: '../fis.php',
            data: {
                tableData: tableData,
                masa: masaAdi // Düzgün bir şekilde masa adını ekliyoruz
            },
            success: function(response) {
                // İstek başarılı olduğunda yapılacak işlemler
                console.log(response);
            },
            error: function(xhr, status, error) {
                // İstek başarısız olduğunda yapılacak işlemler
                console.error(error);
            }
        });
    }


    function addtocart(urunId, adisyonId) {
        $.ajax({
            url: 'ajax.php?siparis_ekle',
            type: 'POST',
            data: {
                id: urunId,
                adisyonId: adisyonId
            },
            success: function(response) {
                location.reload()
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function removeItem(urunId, adisyonId) {
        $.ajax({
            url: 'ajax.php?removeItem',
            type: 'POST',
            data: {
                id: urunId,
                adisyonId: adisyonId
            },
            success: function(response) {
                location.reload()
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>

<?php include_once 'footer.php' ?>