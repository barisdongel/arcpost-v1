<?php

require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

if(isset($_POST['tableData'])) {
    $tableData = $_POST['tableData'];
    $masaAdi = $_POST['masa'];

    // Fonksiyon ile toplam hesabı hesapla
    function calculateTotal($data) {
        $total = 0;
        foreach ($data as $item) {
            $total += ($item['price']);
        }
        return $total;
    }

    // Çıktıyı oluşturan fonksiyon
    function generateReceipt($data, $totalAmount, $masaAdi) {
        try {
            $connector = new WindowsPrintConnector("ZJ-58");
            $printer = new Printer($connector);

            // Masa adını ekleyin
            $printer->text("MASA: " . $masaAdi . "\n");
            $printer->text("--------------------\n");

            foreach ($data as $item) {
                $line = $item['name'] . ' x' . $item['adet'] . ' ' . $item['price'] . ' TL';
                $printer->text($line . "\n");
            }
            
            // Toplam hesabı ekleyin
            $printer->text("--------------------\n");
            $printer->text("Toplam: " . $totalAmount . " TL\n");
            
            $printer->cut();
            $printer->close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
        }
    }

    // Toplam hesabı hesapla
    $totalAmount = calculateTotal($tableData);

    // Çıktıyı oluştur
    generateReceipt($tableData, $totalAmount, $masaAdi);
}