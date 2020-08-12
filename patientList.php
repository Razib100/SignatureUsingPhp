<?php
include 'header.php';
$patient_list = $student_obj->patient_list();
?>
<div class="container " > 
    <div class="row content">
        <a  href="create-student-info.php"  class="button button-purple mt-12 pull-right">Create Normal Patient Registration</a> 
        <!-- <h3>Patient List</h3> -->
        <a  href="create-canvas.php"  class="button button-purple mt-12 pull-left">Register New Patient</a> 
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Gender</th>
                    <th>Signature</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
<?php
if ($patient_list->num_rows > 0) {
  while ($row = $patient_list->fetch_assoc()) {
     ?>
             <tr>
                <td><?php echo $row["firstName"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["address"] ?></td>
                <td><?php echo $row["city"] ?></td>
                <td><?php echo $row["gender"] ?></td>
                <td><?php echo "<img src=\"{$row['image']}\" width=\"200\" height=\"100\" />" ?></td>
                <td class="text-right">
                    <a  href="<?php echo 'delete-patient-info.php?id=' . $row["id"] ?>" class="button button-red">Delete</a>  
                    <a  href="<?php echo 'update-patient-info.php?id=' . $row["id"] ?>" class="button button-blue">Edit</a>  
                    <a href="<?php echo 'read-patient-info.php?id=' . $row["id"] ?>" class="button button-green">View</a>
                </td>
            </tr>
    <?php
    }
}
?>
           </tbody>
        </table>

    </div>
</div>
<?php
include 'footer.php';
?>  

