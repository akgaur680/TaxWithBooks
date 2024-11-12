<?php
    ob_start();
    $page = "Post-Article";
    include_once('db_connect.php');
    include_once('header.php');
    if (isset($_SESSION['id'])) {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $sql = "SELECT * FROM user WHERE id=" . intval($id);
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }
    } else {
        header('location:login.php');
    }
    if(isset($_POST['submit']))
    {
        // Use mysqli_real_escape_string to escape user input
        $title = mysqli_real_escape_string($conn, strtoupper($_POST['title']));
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $source = mysqli_real_escape_string($conn, $_POST['source']);
        $user_id = $_SESSION['id'];

        $insert_query = "INSERT INTO article (title, content, category, source, user_id) VALUES ('$title', '$content', '$category', '$source', '$user_id')";

        $test = mysqli_query($conn, $insert_query) or die (mysqli_error($conn));
        if($test) 
        {
            echo "Article Posted Successfully";
            header('refresh:1;url=post.php');
        }
        else
        {
            echo "Something Error Occurred, Please Try After Sometime";
        }
    }
?>

<section class="container bg-light">
    <div class="">
        <div>
            <a href="index.php"><img src="img/logo3.png" style="height: 100px;"></a>
        </div>
        <div>
            <span style="color:red; font-size:20px;"><u><strong>Copyright Notice:</strong></u></span>
            <span style="font-size:20px;">Do not submit any material for which you don't hold the rights.</span>
        </div>
        <hr style="border: 3px solid black; border-radius:50px; box-shadow: 0px 2px black;">
        <div class="container">
            <form action="#" method="post" name="post">
                <div class="form-group p-1">
                    <label>Title<span style="color: red;">*</span></label><br>
                    <input type="text" style="width:100%;" name="title" class="form-control" required>
                </div>
                
                <div class="form-group p-1">
                    <label>Content<span style="color: red;">*</span></label><br>
                    <textarea name="content" id="a" class="form-control" required></textarea>
                </div>
                <div class="form-group p-1">
                    <label>Category <span style="color: red;">*</span></label><br>
                    <select class="mt-3 mb-3" id="category" name="category" style="width:100%; height:35px; border-radius:5px;" required>
                        <option value="CA, CS, CMA">CA, CS, CMA</option>
                        <option value="Company Law">Company Law</option>
                        <option value="Corporate Law">Corporate Law</option>
                        <option value="Custom Duty">Custom Duty</option>
                        <option value="DGFT">DGFT</option>
                        <option value="Excise Duty">Excise Duty</option>
                        <option value="Fema/RBI">Fema/RBI</option>
                        <option value="Finance">Finance</option>
                        <option value="Goods & Service Tax">Goods & Service Tax</option>
                        <option value="Income Tax">Income Tax</option>
                        <option value="SEBI">SEBI</option>
                        <option value="Service Tax">Service Tax</option>
                    </select>
                </div>
                <div class="form-group p-1">
                    <label>Source<span style="color: red;">*</span></label><br>
                    <input type="text" style="width:100%;" name="source" class="form-control" required>
                </div>
                <div class="form-group p-1">
                    <label>Upload File</label><br>
                    <input class="mb-3 mt-3" type="file" id="file" name="file">
                </div>
                <div>
                    <p>Terms & Conditions <span style="color:red;">*</span></p>
                </div>
                <div class="form-group p-2">
                    <input type="checkbox" name="terms" required>
                    <span> I have read and agree to the <a href="terms.php">Terms and Conditions</a> and <a href="privacy.php">Privacy Policy</a>.</span>
                </div>
                <div class="form-group p-2">
                    <input type="submit" name="submit" value="Post Article" class="btn btn-success">
                    <input type="reset" name="reset" value="Reset" class="btn btn-danger">
                </div>
                <p>In case of any difficulty in upload of article/Post/Files you can mail the same to us for publication on <a href="#">articles@taxwithbooks.in</a></p>
            </form>
        </div>
    </div>
</section>

<?php
    include_once('footer.php');
?>
