<?php
include_once '../function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['siparis_ekle'])) {
        $urun = $_POST['id'];
        $adisyonId = $_POST['adisyonId'];

        $adisyon = tekveri("adisyonlar", "id", $adisyonId);

        $arrUrun = json_decode($adisyon['urunler'], true); // Önceki JSON veriyi dizi olarak çözümlüyoruz
        $arrUrun[] = $urun;

        $urunJson = json_encode($arrUrun, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $update = guncelle(array("urunler","status"), array($urunJson,1), "adisyonlar", "id", $adisyonId);

        if ($update) {
            $json["success"] = $urunJson;
        } else {
            $json["error"] = 'İşlem Başarısız';
        }

        echo json_encode($json); // Sonucu JSON formatında döndürüyoruz
    }

    if (isset($_GET['removeItem'])) {
        $removeItemId = $_POST['id']; // Silinecek ürünün ID'si
        $adisyonId = $_POST['adisyonId']; // İlgili adisyonun ID'si

        $adisyon = tekveri("adisyonlar", "id", $adisyonId);

        $arrUrun = json_decode($adisyon['urunler'], true);

        // Çıkarılacak ürünü bul ve çıkar
        $index = array_search($removeItemId, $arrUrun);
        if ($index !== false) {
            array_splice($arrUrun, $index, 1); // Ürünü çıkar
            $urunJson = json_encode($arrUrun);
            if ($urunJson == null OR $urunJson == "[]"){
                $status = 0;
            }else{
                $status = 1;
            }
            $update = guncelle(array("urunler","status"), array($urunJson,$status), "adisyonlar", "id", $adisyonId);

            if ($update) {
                $json["success"] = "Ürün çıkarıldı";
            } else {
                $json["error"] = 'İşlem Başarısız';
            }
        } else {
            $json["error"] = 'Ürün bulunamadı';
        }

        echo json_encode($json); // Sonucu JSON formatında döndürüyoruz
    }

}
