<?php
// include 'header.php';
include './class/student.php';
$student_obj = new Student();
if (isset($_POST['create_canvas'])) {
    $student_obj->create_canvas_info($_POST);
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Canvas Picture</title>   
    <!-- <meta name="description" content="Unterschriftenfeld in HTML mit Signature Pad" />  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
    <link href="assets/w3.css" type="text/css" rel="stylesheet" />

    <style type="text/css">
        .m-signature-pad--body canvas {
            position: relative;
            left: 0;
            top: 0;
            width: 100%;
            height: 250px;
            border: 1px solid #CCCCCC;
        }    
    </style>

</head>

<body>
<div class="w3-container">    
    <h1 style="text-align: center">Patient Information</h1>
    <button class="w3-btn w3-blue-grey">
      <a  href="patientList.php"  class="button button-purple mt-12 pull-right">View Patient List</a>
    </button>
    <hr/>
    <form class="w3-container" action="" method="POST" name="DAFORM" onSubmit="submitForm();" enctype="multipart/form-data" target="_self">
      <!-- Start -->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="firstName">First Name: </label>
            <input type="text" name="firstName" class="form-control" placeholder="First name">
          </div>
          <div class="form-group col-md-4">
            <label for="lastName">Last Name: </label>
            <input type="text" name="lastName" class="form-control" placeholder="Last name">
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" name="city" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
          <label for="state">State:</label>
            <select class="form-control" name="state" id="state">
                <option value="" selected>Select</option>
                <option value="Oslo" >Oslo</option>
                <option value="Berger" >Berger</option>
                <option value="Tromso" >Tromso</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" name="zip" class="form-control" id="inputZip">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
              <label for="gender">Gender:</label>
              <select class="form-control" name="gender" id="gender">
                  <option value="" selected>Select</option>
                  <option value="Male" >Male</option>
                  <option value="Female" >Female</option>
              </select>
          </div>
          <div class="form-group col-md-4">
              <legend class="col-form-label col-sm-2 pt-0">Material Status</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="Single" checked>
                  <label class="form-check-label" for="gridRadios1">
                    Single
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="Married">
                  <label class="form-check-label" for="gridRadios2">
                    Married
                  </label>
                </div>
              </div>
          </div>
          <div class="form-group col-md-4">
            <label for="date">Date of Birth: </label>
            <input type="date" name="date" class="form-control">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="familyDrName">Family Doctor Name: </label>
            <input type="text" name="familyDrName" class="form-control" placeholder="Doctor Name">
          </div>
          <div class="form-group col-md-4">
            <label for="familyDrPhn">Family Doctor Phone: </label>
            <input type="text" name="familyDrPhn" class="form-control" placeholder="Doctor Phone No">
          </div>
          <div class="form-group col-md-4">
            <label for="reasonForReg">Reason For Registration: </label>
            <input type="text" name="reasonForReg" class="form-control" placeholder="Reason">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
              <legend class="col-form-label col-sm-2 pt-0">Taking Medicine</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="medicine" id="gridRadios1" value="Yes" checked>
                  <label class="form-check-label" for="gridRadios1">
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="medicine" id="gridRadios2" value="No">
                  <label class="form-check-label" for="gridRadios2">
                    No
                  </label>
                </div>
              </div>
          </div>
          <div class="form-group col-md-9">
            <label for = "medicineList">If Yes,,,,,Please list It Here</label>
            <textarea class="form-control" name="medicineList" rows = "3" placeholder = "Player Details"></textarea>
          </div>
        </div>
        <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
      <!-- End -->
        <div id="signature-pad" class="m-signature-pad">
          <label for="sign">Your Signature: </label>
            <div class="m-signature-pad--body">
                <canvas></canvas>
                <input type="hidden" name="signature" id="signature" value="">
            </div>
        </div>        
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              I Agree
            </label>
          </div>
        </div>
        <button type="submit" name="create_canvas" class="w3-btn w3-blue-grey">Save</button>
        <button type="button" class="w3-btn w3-black" onclick="signaturePad.clear();">Clear</button>
        <button type="button" class="w3-btn w3-red" onclick="download('sig.png');">Download</button>
    </form>
</div>

<script src="assets/signature_pad.js"></script>
<script type="text/javascript">
var wrapper = document.getElementById("signature-pad"),
   canvas = wrapper.querySelector("canvas"),
   signaturePad;

/**
*  Behandlung der Größenänderung der Unterschriftenfelds
*/
function resizeCanvas() {
    var oldContent = signaturePad.toData();
    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
    signaturePad.clear();
    signaturePad.fromData(oldContent);
}
/**
*  Save Canvas Image on Server
*/

/**
*  Speichern des Inhaltes als Bild
*/
function download(filename) {
  var blob = dataURLToBlob(signaturePad.toDataURL());
  var url = window.URL.createObjectURL(blob);

  var a = document.createElement("a");
  a.style = "display: none";
  a.href = url;
  a.download = filename;

  document.body.appendChild(a);
  a.click();

  window.URL.revokeObjectURL(url);
}

/**
* DataURL in Binär umwandeln
*/
function dataURLToBlob(dataURL) {
  // Code von https://github.com/ebidel/filer.js
  var parts = dataURL.split(';base64,');
  var contentType = parts[0].split(":")[1];
  var raw = window.atob(parts[1]);
  var rawLength = raw.length;
  var uInt8Array = new Uint8Array(rawLength);

  for (var i = 0; i < rawLength; ++i) {
    uInt8Array[i] = raw.charCodeAt(i);
  }

  return new Blob([uInt8Array], { type: contentType });
}

/**
* Behanlung beim Absenden, damit der Inhalt des Canvas
* übermittelt werden kann, wird dieser als DataURL dem
* versteckten Feld zugewiesen    
*/
function submitForm() {
    //Unterschrift in verstecktes Feld übernehmen
    document.getElementById('signature').value = signaturePad.toDataURL();
}


var signaturePad = new SignaturePad(canvas);
signaturePad.minWidth = 1; //minimale Breite des Stiftes
signaturePad.maxWidth = 5; //maximale Breite des Stiftes
signaturePad.penColor = "#000000"; //Stiftfarbe
signaturePad.backgroundColor = "#FFFFFF"; //Hintergrundfarbe

window.onresize = resizeCanvas;
resizeCanvas();

</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>    
</body>
</html>