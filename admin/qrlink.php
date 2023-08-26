<?php include 'header.php' ?>
<?php include 'sidebar.php'; ?>
<div class="main-content">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <form action="#" id="form-submit" class="p-2" method="post">
        <label>QR Koda Çevirmek İstediğiniz Site Linki</label>
        <input type="text" id="siteurl" name="siteurl" class="form-control p-2" />
        <button class="btn btn-primary p-2 mt-3" type="submit">Oluştur</button>
        <button class="btn btn-warning p-2 mt-3" onclick="printQRCode()">Çıktı Al</button>
      </form>
      <div id="qrcode"></div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  $("#form-submit").submit(function (event) {
    event.preventDefault(); // Form submitini engelle

    var siteurl = $("#siteurl").val(); // Formdaki siteurl değerini al

    if (siteurl) {
      // Eğer siteurl boş değilse QR kodunu oluştur
      document.getElementById("qrcode").innerHTML = ""; // içeriği boşalt
      new QRCode(document.getElementById("qrcode"), siteurl);
    }
  });
  
  function printQRCode() {
  var qrcodeDiv = document.getElementById("qrcode");
  var printWindow = window.open("", "_blank");

  if (printWindow) {
    printWindow.document.open();
    printWindow.document.write("<html><body>");
    printWindow.document.write(qrcodeDiv.innerHTML);
    printWindow.document.write("</body></html>");
    printWindow.document.close();
    printWindow.print();
  } else {
    alert("Tarayıcı penceresi açılamadı. Lütfen tarayıcı ayarlarını kontrol edin.");
  }
}

</script>

<?php include 'footer.php' ?>
