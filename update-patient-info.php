<?php
include 'header.php';
if (isset($_GET['id'])) {
    $patient_info = $student_obj->view_patient_by_id($_GET['id']);
    if (isset($_POST['update_patient']) && $_GET['id'] === $_POST['id']) {
        $student_obj->update_patient_info($_POST);
    }
} else {
    header('Location: index.php');
}
?>
<div class="container " > 
    <div class="row content">
        <a href="patientList.php"  class="button button-purple mt-12 pull-right">View Patient List</a> 
        <h3>Update Patient Info</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>

        <hr/>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php if (isset($patient_info['id'])) {
            echo $patient_info['id'];
        } ?>" id=""  >
            <div class="form-group">
                <label for="firstName">Name:</label>
                <input type="text" name="firstName" value="<?php if (isset($patient_info['firstName'])) {
                   echo $patient_info['firstName'];
        } ?>" id="firstName" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" value="<?php if (isset($patient_info['email'])) {
            echo $patient_info['email'];
        } ?>" name="email" id="email" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" value="<?php if (isset($patient_info['address'])) {
            echo $patient_info['address'];
        } ?>" name="address" id="address"  maxlength="50">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="">Select</option>
                    <option value="Male" <?php if (isset($patient_info['gender']) && $patient_info['gender'] == 'Male') {
            echo 'selected';
        } ?>>Male</option>
                    <option value="Female" <?php if (isset($patient_info['gender']) && $patient_info['gender'] == 'Female') {
            echo 'selected';
        } ?>>Female</option>

                </select>

            </div> 
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" value="<?php if (isset($patient_info['city'])) {
            echo $patient_info['city'];
        } ?>" id="city" class="form-control"  maxlength="50">
            </div>
            <div class="form-group">
                <label for="familyDrName">Family Doctor Name:</label>
                <input type="text" name="familyDrName" value="<?php if (isset($patient_info['familyDrName'])) {
            echo $patient_info['familyDrName'];
        } ?>" id="familyDrName" class="form-control"  maxlength="50">
            </div>
             <div class="form-group">
                <label for="familyDrPhn">Family Doctor Phone:</label>
                <input type="text" name="familyDrPhn" value="<?php if (isset($patient_info['familyDrPhn'])) {
            echo $patient_info['familyDrPhn'];
        } ?>" id="familyDrPhn" class="form-control"  maxlength="50">
            </div>
             <div class="form-group">
                <label for="reasonForReg">Reason:</label>
                <input type="text" name="reasonForReg" value="<?php if (isset($patient_info['reasonForReg'])) {
            echo $patient_info['reasonForReg'];
        } ?>" id="reasonForReg" class="form-control"  maxlength="50">
            </div>
            <div class="form-group">
                <label for="city">Signature:</label>
                <div>
                    <img style="width:300px; height: 100px" src = "<?php echo $patient_info['image']; ?>" />
                </div>
            </div>
            <input type="submit" class="button button-green  pull-right" name="update_patient" value="Update"/>
        </form> 
    </div>
</div>
<hr/>
<?php
include 'footer.php';
?>

