<?php
include 'function.php';
/*ÜRÜN İŞLEMLERİ*/

//Ürün Ekleme
if (isset($_POST['urunekle'])) {
    if ($_FILES['image']['size'] != 0) {
        $uploads_dir = 'img/';
        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
        $sayi1 = rand(10000, 99999);
        $refimgyol = $uploads_dir . $sayi1 . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");
    } else {
        $refimgyol = '';
    }
    $urunkaydet = $db->prepare("INSERT INTO item SET
        name=:ad,
        description=:aciklama,
        price=:fiyat,
        category_id=:kategori,
        status=:aktif,
        image=:foto
    ");
    $insert = $urunkaydet->execute(array(
        'ad' => $_POST['name'],
        'aciklama' => $_POST['description'],
        'fiyat' => $_POST['price'],
        'kategori' => $_POST['category_id'],
        'aktif' => $_POST['status'],
        'foto' => $refimgyol
    ));

    if ($insert) {
        Header("Location:admin/urunler.php?durum=ok");
    } else {
        Header("Location:admin/urunler.php?durum=no");
    }
}

//ürün düzenleme
if (isset($_POST['urunduzenle'])) {

    $urunsor = $db->prepare("SELECT * FROM item where id=:id");
    $urunsor->execute(array("id" => $_POST['id']));
    $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

    if ($_FILES['image']['size'] != 0) {
        $uploads_dir = 'img/';
        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
        $refimgyol = $uploads_dir . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$name");
    } else {
        $refimgyol = $uruncek['image'];
    }
    $urunduzenle = $db->prepare("UPDATE item SET
        name=:ad,
        description=:aciklama,
        price=:fiyat,
        category_id=:kategori,
        status=:aktif,
        image=:foto
        WHERE id={$_POST['id']}
        ");
    $update = $urunduzenle->execute(array(
        'ad' => $_POST['name'],
        'aciklama' => $_POST['description'],
        'fiyat' => $_POST['price'],
        'kategori' => $_POST['category_id'],
        'aktif' => $_POST['status'],
        'foto' => $refimgyol
    ));

    $id = $_POST['id'];

    if ($update) {
        Header("Location:admin/urunler.php?durum=ok");
    } else {
        Header("Location:admin/urunler.php?durum=no");
    }
}

//ürün silme
if ($_GET['urunsil'] == "ok") {

    $select = $db->prepare("SELECT * FROM item where id=:id");
    $select->execute(array('id' => $_GET['id']));
    $bul = $select->fetch(PDO::FETCH_ASSOC);

    unlink($bul['image']);

    $sil = $db->prepare("DELETE FROM item WHERE id=:id");
    $kontrol = $sil->execute(array('id' => $_GET['id']));

    if ($kontrol) {
        header("Location:admin/urunler.php?durum=ok");
    } else {
        header("Location:admin/urunler.php?durum=no");
    }
}

/*Ürün Kategori İşlemleri*/

//ketegori Ekleme
if (isset($_POST['kategoriekle'])) {
    if (isset($_FILES['image'])) {
        $uploads_dir = 'img/';
        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
        $sayi1 = rand(10000, 99999);
        $refimgyol = $uploads_dir . $sayi1 . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");
    } else {
        $refimgyol = '';
    }
    $kategorikaydet = $db->prepare("INSERT INTO category SET
                          name=:ad,
                          description=:aciklama,
                          status=:aktif,
                          image=:foto
                          ");
    $insert = $kategorikaydet->execute(array(
        'ad' => $_POST['name'],
        'aciklama' => $_POST['description'],
        'aktif' => $_POST['status'],
        'foto' => $refimgyol
    ));
    if ($insert) {
        Header("Location:admin/kategoriler.php?durum=ok");
    } else {
        Header("Location:admin/kategoriler.php?durum=no");
    }
}

//ketegori guncelleme
if (isset($_POST['kategoriduzenle'])) {

    $kategorisor = $db->prepare("SELECT * FROM category where id=:id");
    $kategorisor->execute(array("id" => $_POST['id']));
    $kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);

    if ($_FILES['image']['size'] != 0) {
        $uploads_dir = 'img/';
        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
        $refimgyol = $uploads_dir . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$name");
    } else {
        $refimgyol = $kategoricek['image'];
    }
    $kategoriduzenle = $db->prepare("UPDATE category SET
        name=:ad,
        description=:aciklama,
        status=:aktif,
        image=:foto
        WHERE id={$_POST['id']}
        ");
    $update = $kategoriduzenle->execute(array(
        'ad' => $_POST['name'],
        'aciklama' => $_POST['description'],
        'aktif' => $_POST['status'],
        'foto' => $refimgyol
    ));

    $id = $_POST['id'];

    if ($update) {
        Header("Location:admin/kategoriler.php?id=$id&durum=ok");
    } else {
        Header("Location:admin/kategoriler.php?durum=no");
    }
}

//ketegori silme
if ($_GET['kategorisil'] == 'ok') {

    $sil = $db->prepare("DELETE FROM category where id=:id");
    $kontrol = $sil->execute(array(
        "id" => $_GET['id']
    ));

    if ($kontrol) {
        Header("Location:admin/kategoriler.php?durum=ok");
    } else {
        Header("Location:admin/kategoriler.php?durum=no");
    }
}
