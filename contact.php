<?php
ob_start();
$page = "Contact_Us";
include_once('db_connect.php');
include_once('header.php');
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $query = $_POST['query'];
    $insert_query = "INSERT into contact (name,email,contact,query) values ('$name','$email','$contact','$query')";
    $test = mysqli_query($conn, $insert_query) or die (mysqli_error($conn));
    if($test)
    {
        echo "Thank you for Contacting Us<br> We Will Contact you shortly";
        header('refresh:2;url=index.php');
    }
    else
    {
        echo "Something Error Occured. Please Try Again After Sometime.";
    }
}


?>
    <section class="container mt-3" >
        <div class="container row"  >
            <div class="col-sm-6 " style="box-shadow:2px 0px grey;">
            <h2 class="contact p-3"><strong>CONTACT US</strong></h2>
            <div class="bg-light p-3" style="border-radius:10px;">
                <p style="font-size:20px; line-height:200%">
                    TaxWithBooks Consultancy & Accounting Services<br>
                    #240, St. No. 3, Bhagat Singh Colony, Moti Nagar<br>
                    Ludhiana, Punjab, India, 141010.<br>
                    <i class="fa-solid fa-phone"></i> &nbsp;<strong>+91 &nbsp;98&nbsp;77442&nbsp;467</strong><br>
                    <i class="fa-solid fa-envelope"></i> &nbsp;<strong>info@taxwithbooks.in</strong>
                </p>
            </div>
            </div>
            
        
            <div class="col-sm-6 mb-2">
            <h2 class="contact p-3"><strong>FOR ANY QUERY / FEEDBACK</strong></h2>
        <form action="#" class=" bg-light text-dark mt-3" method="post" name="contact" style="border-radius:10px;">
                            <div class="form-group p-1">
                                <label for="" class=" text-dark" style="font-size: 20px;">Enter Your
                                    Name</label>
                                <input type="text" name="name" style="font-size: 15px;" class="form-control text-dark mt-2" placeholder="Full Name....." required>
                            </div>
                            <div class="form-group p-1">
                                <label for="" class=" text-dark" style="font-size: 20px;">Enter Your
                                    Email ID</label>
                                <input type="email" name="email" style="font-size: 15px;" class="form-control text-dark mt-2" placeholder="Email ID....."required>
                            </div>
                            <div class="form-group p-1">
                                <label for=""class="text-dark" style="font-size:20px">Enter Contact No. </label>
                                <input type="number" name="contact" style="font-size:15px"class="form-control text-dark mt-2"placeholder="Contact No........"required>
                            </div>
                            
                            <div class="form-group p-1">
                                <label for=""class="text-dark" style="font-size:20px">Ask Your Question </label>
                                <textarea type="text" name="query" style="font-size:15px"class="form-control text-dark mt-2"placeholder="Query........"required></textarea>
                            </div>
                            <div class="form-group p-1" style="text-align:center;">
                                <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                <input type="reset" name="reset" value="Reset" class="btn btn-danger">

                            </div>
                            </form>
                            
        </div>
                        
        </div>
    </section>




<?php
    include_once('footer.php');
?>