<?php
class Student
{
    private $conn;
    function __construct() {
    session_start();
    $servername = "localhost";
    $dbname = "crud";
    $username = "root";
    $password = "";
  

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
       }else{
        $this->conn=$conn;  
       }

    }


    public function student_list(){
        
       $sql = "SELECT * FROM students ORDER BY student_id asc ";
       $result=  $this->conn->query($sql);
       return $result;  
    }

    public function patient_list(){
        
       $sql = "SELECT * FROM canvas ORDER BY id DESC ";
       $result=  $this->conn->query($sql);
       return $result;  
    }
    
    public function create_student_info($post_data=array()){
         
       if(isset($post_data['create_student'])){
       $student_name= mysqli_real_escape_string($this->conn,trim($post_data['student_name']));
       $email_address= mysqli_real_escape_string($this->conn,trim($post_data['email_address']));
       $gender= mysqli_real_escape_string($this->conn,trim($post_data['gender']));
       $contact= mysqli_real_escape_string($this->conn,trim($post_data['contact']));
       $country= mysqli_real_escape_string($this->conn,trim($post_data['country']));

       $sql="INSERT INTO students (student_name, email_address, contact,country,gender) VALUES ('$student_name', '$email_address', '$contact','$country','$gender')";
        
        $result=  $this->conn->query($sql);
        
           if($result){
           
               $_SESSION['message']="Successfully Created Student Info";
               
              header('Location: index.php');
           }
          
       unset($post_data['create_student']);
       }
       
        
    }

    public function create_canvas_info($post_data=array()){

      if(isset($post_data['create_canvas'])){
      $firstName= mysqli_real_escape_string($this->conn,trim($post_data['firstName']));
      $lastName= mysqli_real_escape_string($this->conn,trim($post_data['lastName']));
      $email= mysqli_real_escape_string($this->conn,trim($post_data['email']));
      $address= mysqli_real_escape_string($this->conn,trim($post_data['address']));
      $city= mysqli_real_escape_string($this->conn,trim($post_data['city']));
      $state= mysqli_real_escape_string($this->conn,trim($post_data['state']));
      $zip= mysqli_real_escape_string($this->conn,trim($post_data['zip']));
      $gender= mysqli_real_escape_string($this->conn,trim($post_data['gender']));
      $status= mysqli_real_escape_string($this->conn,trim($post_data['status']));
      $date= mysqli_real_escape_string($this->conn,trim($post_data['date']));
      $familyDrName= mysqli_real_escape_string($this->conn,trim($post_data['familyDrName']));
      $familyDrPhn= mysqli_real_escape_string($this->conn,trim($post_data['familyDrPhn']));
      $reasonForReg= mysqli_real_escape_string($this->conn,trim($post_data['reasonForReg']));
      $medicineList= mysqli_real_escape_string($this->conn,trim($post_data['medicineList']));
      
      define('UPLOAD_DIR', 'images/');
      $img = "";
      $img = $_POST['signature'];
      $img = str_replace('data:image/png;base64,', '', $img);
      $img = str_replace(' ', '+', $img);
      $data = base64_decode($img);
      $file = UPLOAD_DIR . uniqid() . '.png';
      $success = file_put_contents($file, $data);

      $sql="INSERT INTO canvas (firstName, lastName, email, address, city, state, zip, gender,status,date,familyDrName,familyDrPhn,reasonForReg,medicineList,image) VALUES ('$firstName', '$lastName', '$email','$address','$city','$state','$zip','$gender','$status','$date','$familyDrName','$familyDrPhn','$reasonForReg','$medicineList','$file')";
       
       $result=  $this->conn->query($sql);
       
          if($result){
          
              $_SESSION['message']="Successfully Created Student Info";
              
             header('Location: patientList.php');
          }
         
      unset($post_data['create_canvas']);
      }
      
       
   }
    
    public function view_student_by_student_id($id){
       if(isset($id)){
       $student_id= mysqli_real_escape_string($this->conn,trim($id));
      
       $sql="Select * from students where student_id='$student_id'";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    

    public function view_patient_by_id($id){
       if(isset($id)){
       $id= mysqli_real_escape_string($this->conn,trim($id));
      
       $sql="Select * from canvas where id='$id'";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 

       }  
    }
    
    public function update_student_info($post_data=array()){
       if(isset($post_data['update_student'])&& isset($post_data['id'])){
           
       $student_name= mysqli_real_escape_string($this->conn,trim($post_data['student_name']));
       $email_address= mysqli_real_escape_string($this->conn,trim($post_data['email_address']));
       $gender= mysqli_real_escape_string($this->conn,trim($post_data['gender']));
       $contact= mysqli_real_escape_string($this->conn,trim($post_data['contact']));
       $country= mysqli_real_escape_string($this->conn,trim($post_data['country']));
       $student_id= mysqli_real_escape_string($this->conn,trim($post_data['id']));

       $sql="UPDATE students SET student_name='$student_name',email_address='$email_address',contact='$contact',country='$country',gender='$gender' WHERE student_id =$student_id";
     
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Updated Student Info";
           }
       unset($post_data['update_student']);
       }   
    }

    public function update_patient_info($post_data=array()){
       if(isset($post_data['update_patient'])&& isset($post_data['id'])){
           
       $firstName= mysqli_real_escape_string($this->conn,trim($post_data['firstName']));
       $email= mysqli_real_escape_string($this->conn,trim($post_data['email']));
       $gender= mysqli_real_escape_string($this->conn,trim($post_data['gender']));
       $address= mysqli_real_escape_string($this->conn,trim($post_data['address']));
       $city= mysqli_real_escape_string($this->conn,trim($post_data['city']));
       $id= mysqli_real_escape_string($this->conn,trim($post_data['id']));

       $sql="UPDATE canvas SET firstName='$firstName',email='$email',address='$address',city='$city',gender='$gender' WHERE id =$id";
     
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Updated Patient Info";
           }
       unset($post_data['update_patient']);
       header('Location: patientList.php');
       }   
    }
    
    public function delete_student_info_by_id($id){
        
       if(isset($id)){
       $student_id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  students  WHERE student_id =$student_id";
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Deleted Student Info";
            
           }
       }
         header('Location: index.php'); 
    }

    public function delete_patient_info_by_id($id){
        
       if(isset($id)){
       $id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  canvas  WHERE id =$id";
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Deleted Patient Info";
            
           }
       }
         header('Location: patientList.php'); 
    }

    public function email_info($post_data=array()){

      $message = '';

      if(isset($_POST["submit"]))
          {
            $programming_languages = '';
            foreach($_POST["programming_languages"] as $row)
            {
              $programming_languages .= $row . ', ';
            }
            $programming_languages = substr($programming_languages, 0, -2);
            $path = 'upload/' . $_FILES["resume"]["name"];
            move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
            $message = '
              <h3 align="center">Programmer Details</h3>
              <table border="1" width="100%" cellpadding="5" cellspacing="5">
                <tr>
                  <td width="30%">Name</td>
                  <td width="70%">'.$_POST["name"].'</td>
                </tr>
                <tr>
                  <td width="30%">Address</td>
                  <td width="70%">'.$_POST["address"].'</td>
                </tr>
                <tr>
                  <td width="30%">Email Address</td>
                  <td width="70%">'.$_POST["email"].'</td>
                </tr>
                <tr>
                  <td width="30%">Progamming Language Knowledge</td>
                  <td width="70%">'.$programming_languages.'</td>
                </tr>
                <tr>
                  <td width="30%">Experience Year</td>
                  <td width="70%">'.$_POST["experience"].'</td>
                </tr>
                <tr>
                  <td width="30%">Phone Number</td>
                  <td width="70%">'.$_POST["mobile"].'</td>
                </tr>
                <tr>
                  <td width="30%">Resume</td>
                  <td width="70%">'.$_POST["resume"].'</td>
                </tr>
                <tr>
                  <td width="30%">Additional Information</td>
                  <td width="70%">'.$_POST["additional_information"].'</td>
                </tr>
              </table>
            ';
            
            require 'classes/class.phpmailer.php';
            $mail = new PHPMailer;
            $mail->IsSMTP();                //Sets Mailer to send message using SMTP
            $mail->Host = 'smtp.mailtrap.io';   //Sets the SMTP hosts of your Email hosting, this for Godaddy
            $mail->Port = '2525';               //Sets the default SMTP server port
            $mail->SMTPAuth = true;             //Sets SMTP authentication. Utilizes the Username and Password variables
            $mail->Username = '9d38cb137df013';         //Sets SMTP username
            $mail->Password = 'e324cbf3c54d31';         //Sets SMTP password
            $mail->SMTPSecure = '';             //Sets connection prefix. Options are "", "ssl" or "tls"
            $mail->From = $_POST["email"];          //Sets the From email address for the message
            $mail->FromName = $_POST["name"];       //Sets the From name of the message
            $mail->AddAddress('razib.hasan@cobait.com', 'Cobait');   //Adds a "To" address
            $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
            $mail->IsHTML(true);              //Sets message type to HTML
            $mail->AddAttachment($path);          //Adds an attachment from a path on the filesystem
            $mail->Subject = 'Application for Programmer Registration';       //Sets the Subject of the message
            $mail->Body = $message;             //An HTML or plain text message body
            if($mail->Send())               //Send an Email. Return true on success or false on error
            {
              $_SESSION['message']="File sent Successfully";
              unlink($path);
              header('Location: index.php');
            }
            else
            {
              $_SESSION['message']="error";
            }
          }
        

    }

    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>