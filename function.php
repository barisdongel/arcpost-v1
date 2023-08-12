<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Istanbul');
@ob_start();
@session_start();
try {

	$db = new PDO("mysql:host=localhost;dbname=qrmenu_db;charset=utf8", 'root', '');
} catch (PDOException $e) {
	echo $e->getMessage();
}

if (isset($_POST['login'])) {
	global $db;

	$username = $_POST['username'];
	$password = $_POST['password'];

	$kullanicisor = $db->prepare("SELECT * FROM admin where username=:name and password=:password");
	$kullanicisor->execute(array(
		'name' => $username,
		'password' => $password
	));
	$say = $kullanicisor->rowCount();
	$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);
	echo $id = $kullanicicek['id'];
	if ($say > 0) {
		$_SESSION['id'] = $id;
		go("admin/index.php");
	} else {
		go("admin/login.php");
	}
}

function base_url($url = "")
{
	return sprintf(
		"%s://%s/%s",
		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		$_SERVER['SERVER_NAME'],
		$url
	);
}

function go($url)
{
	header("Location: {$url}");
}

function tekveri($table, $row, $id)
{
	global $db;

	$data = $db->query("SELECT * FROM {$table} WHERE {$row} = '{$id}'")->fetch(PDO::FETCH_ASSOC);
	return $data;

	//$singleselect = tekVeri("users", "id", "1");
}


function cokveri($table, $selects, $manuel)
{
	global $db;

	$data = $db->query("SELECT {$selects} FROM {$table} {$manuel}", PDO::FETCH_ASSOC);
	return $data;

	//$alltable = cokVeri("users", "*", "ORDER BY id DESC");
}

function sil($table, $row, $id)
{
	global $db;

	$query = $db->prepare("DELETE FROM {$table} WHERE {$row} = :id");
	$delete = $query->execute(array(
		'id' => $id
	));
	//$deleteuser = sil("users", "id", "1");
}

function ekle($rows, $values, $table)
{
	global $db;

	$other = array();
	$query = "";
	$count = count($values);
	$a = 0;
	for ($i = 0; $i < $count; $i++) {
		$a++;
		if ($a == $count)
			$query .= $rows[$i] . " = ?";
		else
			$query .= $rows[$i] . " = ?,";
	}

	$sql = $db->prepare("INSERT INTO {$table} SET {$query}");
	$insert = $sql->execute($values);

	if ($insert)
		return true;
	else
		return false;

	/*
    $rows = array("username", "password");
    $values = array("serhanozcan", "pass123");

    $insertuser = ekle($rows, $values, "users");
    */
}

function guncelle($rows, $values, $table, $target, $id)
{
	global $db;

	$other = array();
	$query = "";
	$a = 0;
	$count = count($values);
	for ($i = 0; $i < $count; $i++) {
		$a++;
		if ($a == $count)
			$query .= $rows[$i] . " = :a_" . $rows[$i];
		else
			$query .= $rows[$i] . " = :a_" . $rows[$i] . ",";
	}

	$b = 0;
	foreach ($rows as $rows) {
		$other["a_" . $rows] = $values[$b];
		$b++;
	}

	$other["id"] = $id;

	$sql = $db->prepare("UPDATE {$table} SET {$query} WHERE {$target} = :id");
	$update = $sql->execute($other);

	if ($update)
		return true;
	else
		return false;

	/*
    $rows = array("username", "password");
	$values = array("serhanozcan", "pass123");

	$updateuser = guncelle($rows, $values, "users", "id", "1");
	*/
}

function kisalt($metin, $uzunluk)
{
	// substr ile belirlenen uzunlukta kesiyoruz
	$metin = substr($metin, 0, $uzunluk) . "...";
	// kesilen metindeki son kelimeyi buluyoruz
	$metin_son = strrchr($metin, " ");
	// son kelimeyi " ..." ile değiştiriyoruz
	$metin = str_replace($metin_son, " ...", $metin);

	return $metin;
}

function seo($s)
{
	$tr = array('ş', 'Ş', 'ı', 'I', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'Ç', 'ç', '(', ')', '/', ' ', ',', '?');
	$eng = array('s', 's', 'i', 'i', 'i', 'g', 'g', 'u', 'u', 'o', 'o', 'c', 'c', '', '', '-', '-', '', '');
	$s = str_replace($tr, $eng, $s);
	$s = strtolower($s);
	$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
	$s = preg_replace('/\s+/', '-', $s);
	$s = preg_replace('|-+|', '-', $s);
	$s = preg_replace('/#/', '', $s);
	$s = str_replace('.', '', $s);
	$s = trim($s, '-');
	return $s;
}
