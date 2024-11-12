<?php
ob_start();
$page = "New-User-Registration";
include_once('db_connect.php');
include_once('header.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $profession = $_POST['profession'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $pimage = $_FILES['profileimage']['name'];
    $image = time() . "_" . $pimage;
    $path = "imgs/";
    move_uploaded_file($_FILES['profileimage']['tmp_name'], $path . $image);
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container alert alert-danger" role="alert">
  Email Id Already Registered. Please try <a href="login.php" style="color:black;">Logging In</a> with Email Id & Password.
</div>';
    } else {

        $insert_query = "insert into user(name,email,contact,address,profession,gender,password, image_url) values ('$name','$email','$contact','$address','$profession','$gender','$password', '$image')";
        $test = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
        if ($test) {
            echo '<div class="container alert alert-success" role="alert">
  Account Created Suucessfully. Please <a href="login.php">Login Now</a>
  <h4> ' . $name . ' is successfully Registered.</h4>
</div>';
        } else
            echo "Data is Not Inserted";
    }
}
?>

<!-- Signup Page Starts Here -->
<section class="container bg-light mt-1">
    <div class="row ">
        <div style=" justify-content: center;">
            <div class="row m-4">
                <div style="width: 100%; margin: auto; border: 1px solid lightgrey; border-radius: 10px; box-shadow:  5px 5px lightgrey;" class="text-dark">
                    <!-- SignUp FORM STARTS HERE-->
                    <form action="#" class=" bg-light text-dark" method="post" name="login" onsubmit=" return validate()" enctype="multipart/form-data">
                        <h1 class="text-dark text text-center"><b>SignUp Here...</b></h1>
                        <div class="form-group p-1" id="name">
                            <label for="" class=" text-dark" style="font-size: 20px;">Enter Your
                                Name</label>
                            <input type="text" name="name" style="font-size: 15px;" id="name" class="form-control text-dark mt-2" placeholder="Full Name....." required> <span class="formerror"> </span>
                        </div>
                        <div class="form-group p-1" id="email">
                            <label for="" class=" text-dark" style="font-size: 20px;">Enter Your
                                Email ID</label>
                            <input type="email" name="email" id="email" style="font-size: 15px;" class="form-control text-dark mt-2" placeholder="Email ID....." required><span class="formerror"> </span>
                        </div>
                        <div class="form-group p-1" id="contact">
                            <label for="" class=" text-dark" style="font-size: 20px;">Enter Your
                                Contact No.</label>
                            <input type="number" name="contact" id="contact" style="font-size: 15px;" class="form-control text-dark mt-2" placeholder="Contact No....." required><span class="formerror"> </span>
                        </div>
                        <div class="form-group p-1" id="address">
                            <label for="" class=" text-dark" style="font-size: 20px;">Enter Your
                                Address</label>
                            <textarea style="font-size: 15px;" class="form-control text-dark mt-2" name="address" placeholder="Full Address" required></textarea><span class="formerror"> </span>
                        </div>
                        <div class="form-group p-1" id="profession">
                            <label for="" class=" text-dark" style="font-size: 20px;">Enter Your
                                Profession</label>
                            <input type="text" id="profession" name="profession" style="font-size: 15px;" class="form-control text-dark mt-2" placeholder="Profession....." required><span class="formerror"> </span>
                        </div>
                        <div class="form-group p-1" id="gender">
                            <label for="" class="text-dark mb-2" style="font-size: 20px;">Select Your
                                Gender</label>
                            <select id="gender" name="gender" required>
                                <option value="select">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Transgender">Transgender</option>
                            </select><span class="formerror"> </span>
                        </div>
                        <div class="form-group p-1" id="password">
                            <label for="" class="text-dark mb-2" style="font-size: 20px;">Enter Your
                                Password</label>
                            <input class="text-dark form-control" id="password" name="password" type="password" style="font-size: 15px;" class="form-control text-dark mt-2" placeholder="Password" required><span class="formerror"> </span>
                        </div>
                        <div class="form-group p-1" id="cpassword">
                            <label for="" class="text-dark mb-2" style="font-size: 20px;">Confirm Your
                                Password</label>
                            <input class="text-dark form-control" id="cpassword" name="cpassword" type="password" style="font-size: 15px;" class="form-control text-dark mt-2" placeholder="Re-Enter Password" required><span class="formerror"> </span>
                        </div>
                        <div class="form-group p-1">
                            <label for="file" class=" text-dark" style="font-size: 20px;">Please Upload Your Profile Image.</label>
                            <input type="file" name="profileimage" id="profileimage" style="font-size: 15px;" class="form-control text-dark mt-2"><span class="formerror"> </span>
                        </div>
                        <div class="form-group p-2">
                            <input type="submit" name="submit" value="Signup" class="btn btn-success">
                            <input type="reset" name="reset" value="Reset" class="btn btn-danger">
                        </div>
                        <p>If Already Registered, Please <a href="login.php" style="text-decoration: none;">
                                Login Here..</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function seterror(id, error) {
        element = document.getElementById(id);
        element.getElementsByClassName('formerror')[0].innerHTML = error;
    }

    function clearError() {
        errors = document.getElementsByClassName('formerror');
        for (let item of errors) {
            item.innerHTML = "";
        }
    }

    function validate() {
        clearError();
        var returnval = true;
        var email = document.forms['login']['email'].value;
        // Validating email for @ and . symbol and a gap between these symbols
        var atpos = email.indexOf("@");
        var dotpos = email.lastIndexOf(".");
        if (atpos < 1 || (dotpos - atpos < 2)) {
            seterror("email", "* Invalid email");
            returnval = false;
        }
        var name = document.forms['login']['name'].value;
        if (name.length < 5) {
            seterror("name", "*Length of name is too short");
            returnval = false;
        }
        if (name.length == 0) {
            seterror("name", "*Name Cannot Be Empty");
            returnval = false;
        }
        var contact = document.forms['login']['contact'].value;
        if (contact.length != 10) {
            seterror("contact", "* Invalid Phone Number");
            returnval = false;
        }
        if (email.length > 100) {
            seterror("email", "* Email is too long");
            returnval = false;
        }
        let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&^])[A-Za-z\d@.#$!%*?&^]{8,15}$/;

        var password = document.forms['login']['password'].value;

        if (password.length < 9) {
            seterror("password", "* Password Should be at least 9 Characters Long");
            returnval = false;
        } else if (!regex.test(password)) {
            seterror("password", "* Password should be 8 to 15 characters long and contain at least one lowercase letter, one uppercase letter, one digit, and one special character (@.#$!%*?&^)");
            returnval = false;
        }

        var cpassword = document.forms['login']['cpassword'].value;
        if (cpassword != password) {
            seterror("cpassword", "* Password Doesn't Match");
            returnval = false;
        }
        var profession = document.forms['login']['profession'].value;
        if (profession.length < 5) {
            seterror("profession", "* Profession is too short");
            returnval = false;
        }
        return returnval;
    }
</script>
<?php
include_once('footer.php')
?>