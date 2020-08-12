<?php
 include 'header.php';
 if(isset($_GET['id'])){
  $patient_info=$student_obj->delete_patient_info_by_id($_GET['id']);
 
     
 }else{
  header('Location: patientList.php');
 }
 
 ?>
