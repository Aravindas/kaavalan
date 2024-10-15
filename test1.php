<h1>QR Code Reader using Javascript</h1>
<script src="js/html5-qrcode.min.js"></script>

<!-- QR SCANNER CODE BELOW  -->
<div class="row">
  <div class="col">
    <div id="reader"></div>
  </div>
  <div class="col" style="padding: 30px">
    <h4>Scan Result </h4>
    <div id="result">
      Result goes here
    </div>
  </div>

</div>
<style>
    h1 {
  text-align: center;
}

#reader {
  width: 500px;
}

.result {
  background-color: green;
  color: #fff;
  padding: 20px;
}

.row {
  display: flex;
}

#reader__scan_region {
  background: white;
}

</style>
<script>
    // When scan is successful fucntion will produce data
function onScanSuccess(qrCodeMessage) {
  document.getElementById("result").innerHTML =
    '<span class="result">' + qrCodeMessage + "</span>";
}

// When scan is unsuccessful fucntion will produce error message
function onScanError(errorMessage) {
  // Handle Scan Error
}

// Setting up Qr Scanner properties
var html5QrCodeScanner = new Html5QrcodeScanner("reader", {
  fps: 10,
  qrbox: 250
});

// in
html5QrCodeScanner.render(onScanSuccess, onScanError);

</script>
