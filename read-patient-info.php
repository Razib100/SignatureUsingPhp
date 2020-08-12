<?php
 include 'header.php';
 

 if(isset($_GET['id'])){
  $patient_info=$student_obj->view_patient_by_id($_GET['id']);
  


     
 }
 else{
  header('Location: index.php');
 }
 
 
 ?>
<div class="container"> 
    
  <div class="row content">

       
          
           
             <a  href="index.php"  class="button button-purple mt-12 pull-right">Home</a> 
     
 <h3>View Student Info</h3>
       
    
     <hr/>
   
   
 <!-- <form method="post"> -->
  <div id="content" style="background-color: white;"> 
  <div style="margin-left: 20px" >   
    <label >Name:</label>
   <?php  if(isset($patient_info['firstName'])){echo $patient_info['firstName']; }?>

<br/>
    <label>Email address:</label>
  <?php  if(isset($patient_info['email'])){echo $patient_info['email'];} ?>
    
    <br/>
    <label >Contact:</label>
      <?php  if(isset($patient_info['address'])){echo $patient_info['address'];} ?>
    <br/>
  <label >Country:</label>
      <?php  if(isset($patient_info['city'])){echo $patient_info['city'];} ?>
    <br/>
  <label >Gender:</label>
   <?php  if(isset($patient_info['gender'])){echo $patient_info['gender'];} ?>
  <br/>
  <label >Material Status:</label>
   <?php  if(isset($patient_info['status'])){echo $patient_info['status'];} ?>
  <br/>
  <label >Date of Birth:</label>
   <?php  if(isset($patient_info['date'])){echo $patient_info['date'];} ?>
  <br/>
  <label >Family Doctor Name:</label>
   <?php  if(isset($patient_info['familyDrName'])){echo $patient_info['familyDrName'];} ?>
  <br/>
  <label >Family Doctor Phone:</label>
   <?php  if(isset($patient_info['familyDrPhn'])){echo $patient_info['familyDrPhn'];} ?>
  <br/>
  <label >Reason For Registration:</label>
   <?php  if(isset($patient_info['reasonForReg'])){echo $patient_info['reasonForReg'];} ?>
  <br/>
  <label >Taking Medicine:</label>
   <?php  if(isset($patient_info['medicineList'])){echo $patient_info['medicineList'];} ?>
  <br/>
  <label >Signature:</label>
      <img style="width:300px; height: 100px" src = "<?php echo $patient_info['image']; ?>" />
    <br/>
    </div>
  </div>
        
    <input type="button" name="create_pdf" onClick="myFunction('<?php echo $patient_info["id"];?>');" class="btn btn-danger" value="Create PDF" />
    <a href="<?php echo 'update-patient-info.php?id='.$patient_info["id"] ?>" class="button button-blue">Edit</a>
    <button onClick="pdfConvert();">Pdf Generate</button>
     
   <!-- </form> -->
 
  </div>
</div>
<hr/>

 <?php
 include 'footer.php';
 ?>


