<?php
ob_start();
include_once('db_connect.php');
include_once('header.php');
$page = 'Login';
if(isset($_POST['submit']))
{
    $email= $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password' ";
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
    $row =mysqli_fetch_assoc($result);
    if($row)
    {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        header("location:index.php");
    }
    else
    {
        echo '<div class="container alert alert-danger" role="alert">
  Wrong Credentials.
  </div>';
    }
}
?>
<!-- Login Page Starts Here -->
<section class="container bg-light mt-1">
        <div class="row ">
            <div style=" justify-content: center;">
                <div class="row m-4">
                    <div style="width: 100%;  margin: auto; border: 1px solid lightgrey; border-radius: 10px; box-shadow:  5px 5px lightgrey;" class="text-dark">
                        <!-- LOGIN FORM STARTS HERE-->
                        <form action="#" class=" bg-light text-dark" method="post" name="login">
                            <h1 class="text-dark text text-center"><b>Login Here...</b></h1>
                            <div class="form-group p-1">
                                <label for="" class=" text-dark" style="font-size: 20px;">Enter Your
                                    Email</label>
                                <input type="email" name="email" style="font-size: 15px;" class="form-control text-dark mt-2" placeholder="Email id.....">
                            </div>
                            <div class="form-group p-1">
                                <label for="" class="text-dark mb-2" style="font-size: 20px;">Enter Your
                                    Password</label>
                                <input class="text-dark form-control" name="password" type="password" style="font-size: 15px;" class="form-control text-dark mt-2" placeholder="Password">
                            </div>
                            <div class="form-group p-2">
                                <input type="submit" name="submit" value="Login" class="btn btn-success">
                                <input type="reset" name="reset" value="Reset" class="btn btn-danger">
                            </div>
                            <p>If Not Registered, Please <a href="signup.php" style="text-decoration: none;">
                                    Register Here..</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php
    include_once('footer.php')
?>