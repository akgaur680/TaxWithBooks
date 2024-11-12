<?php
ob_start();
$page = "Edit Profile";
include_once('db_connect.php');
include_once('header.php');
if (isset($_REQUEST['editid'])) {
    $editid = $_REQUEST['editid'];
    $sql = "SELECT * FROM user WHERE id = " . $editid;
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    $image= $row['image_url'];
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $profession = $_POST['profession'];
        $gender = $_POST['gender'];
        $path = "imgs/";
        $pimage = $_FILES['profileimage']['name'];
        if(!($pimage==""))
        {
            unlink($path.$image);
            $image=time()."-".$pimage;
            move_uploaded_file($_FILES['profileimage']['tmp_name'], $path . $image);
        }
        $sql = "UPDATE user SET name='$name',email='$email',contact='$contact',address='$address', profession='$profession', gender='$gender', image_url='$image' WHERE id = $editid";
        $test = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
}
if (isset($_POST['submit'])) {
    if ($test) {
        echo '<script> alert("Profile Updated Succesfully....") </script>';
        header('refresh:0;url=profile.php');
    }
}
?>
<section class="container bg-light mt-1">
    <div class="row ">
        <div style=" justify-content: center;">
            <div class="row m-4">
                <div style="width: 100%; margin: auto; border: 1px solid lightgrey; border-radius: 10px; box-shadow:  5px 5px lightgrey;" class="text-dark">
                    <!-- Edit Profile FORM STARTS HERE-->
                    <form action="#" class=" bg-light text-dark" method="post" name="edit" enctype="multipart/form-data">
                        <h1 class="text-dark contact p-3 "><b>Edit Profile...</b></h1>
                        <div class="fooup p-1">
                            <label for="" class=" text-dark" style="font-size: 20px;">
                                Name</label>
                            <input type="text" name="name" style="font-size: 15px;" class="form-control text-dark mt-2" value="<?php echo $row['name'] ?>">
                        </div>
                        <div class="form-group p-1">
                            <label for="" class=" text-dark" style="font-size: 20px;">
                                Email ID</label>
                            <input type="email" name="email" style="font-size: 15px;" class="form-control text-dark mt-2" value="<?php echo $row['email'] ?>">
                        </div>
                        <div class="form-group p-1">
                            <label for="" class=" text-dark" style="font-size: 20px;">
                                Contact No.</label>
                            <input type="number" name="contact" style="font-size: 15px;" class="form-control text-dark mt-2" value="<?php echo $row['contact'] ?>">
                        </div>
                        <div class="form-group p-1">
                            <label for="" class=" text-dark" style="font-size: 20px;">
                                Address</label>
                            <textarea style="font-size: 15px;" class="form-control text-dark mt-2" name="address"><?php echo $row['address'] ?></textarea>
                        </div>
                        <div class="form-group p-1">
                            <label for="" class=" text-dark" style="font-size: 20px;">
                                Profession</label>
                            <input type="text" name="profession" style="font-size: 15px;" class="form-control text-dark mt-2" value="<?php echo $row['profession'] ?>">
                        </div>
                        <div class="form-group p-1">
                            <label for="" class="text-dark mb-2" style="font-size: 20px;">Select Your
                                Gender</label>
                            <select id="gender" name="gender" value="<?php echo $row['gender'] ?> selected=" selected>
                                <option value="select" <?php if ($row['gender'] == 'Select') echo 'selected="selected"'; ?>>Select</option>
                                <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected="selected"'; ?>>Male</option>
                                <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected="selected"'; ?>>Female</option>
                                <option value="Transgender" <?php if ($row['gender'] == 'Transgender') echo 'selected="selected"'; ?>>Transgender</option>
                            </select>
                        </div>
                        <div class="form-group p-1">
                            <label for="image" class=" text-dark" style="font-size: 20px;">
                                Profile Image</label>
                                <?php 
                                    $user_pic = "imgs/".$row['image_url'];
                                    $default  = "img/blank.png";
                                    if(file_exists($user_pic))
                                    {
                                        $pic = $user_pic; 
                                    }
                                    else
                                    {
                                        $pic = $default;
                                    }
                                    
                                    ?>
                                    <img src="<?php If(isset($pic)) echo $pic ?>" width="100px" height="100px">';
                                
      <input type="file" id="profileimage" name="profileimage" style="font-size: 15px;" class="form-control text-dark mt-2" >
                            
                        </div>
                        <div class="form-group p-2">
                            <input type="submit" name="submit" value="Update" class="btn btn-success">
                            <a href="profile.php">
                                <button type="button" name="close" value="Close" class="btn btn-danger">Close</button></a>
                        </div>
                        <p>If You have any issue Please <a href="contact.php" style="text-decoration: none;">
                                Contact Us..</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once('footer.php');
?>