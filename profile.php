<?php
ob_start();
include_once('db_connect.php');
include_once('header.php');
$query = "SELECT * From user WHERE id = " . $_SESSION['id'];
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
if (isset($_REQUEST['delid'])) {
    $delid = $_REQUEST['delid'];
    $del_query = "DELETE FROM article WHERE article_id ='$delid' ";
    $delete = mysqli_query($conn, $del_query) or die(mysqli_error($conn));
    if ($delete) {
        echo '<script>alert("Post Deleted Succesfully...")</script>';
    } else {
        echo "Data has Not Deleted";
    }
}

?>
<section class="container bg-light" style="border-radius: 10px;">
    <div>
        <div>
            <a href="index.php"><img src="img/logo3.png" style="height: 100px; width:350px;"></a>
        </div>
        <div class="row">
            <div class="col-sm-3 m-2 text-center">
            <div>
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
                <img src="<?php If(isset($pic)) echo $pic ?>" id="profileimage" width="200px" height="200px">
               
            </div>

            </div>
            <div class="col-sm-8 m-2">
                <div class="container p-1" style="background-color:#3b5998; border-radius:10px; color:white; height:50px;">
                    <?php echo '  <h4>My Dashboard <a href="editprofile.php?editid=' . $_SESSION['id'] . '"> <button type="button" style="float:right;" class="btn btn-primary">Edit Profile</button> </a></h4> '; ?>
                </div>
                <div>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <table class="table table-bordered text-center" style="table-layout:fixed;">
                                <thead>
                                    <tr>
                                        <th> Name:</th>
                                        <td><?php echo $row['name'] ?></td>
                                    </tr>
                                    <tr>
                                        <th> Email:</th>
                                        <td><?php echo $row['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th> Contact No. :</th>
                                        <td><?php echo "+91&nbsp;" . $row['contact'] ?></td>
                                    </tr>
                                    <tr>
                                        <th> Gender:</th>
                                        <td><?php echo $row['gender'] ?></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> Profession:</th>
                                        <td><?php echo $row['profession'] ?></td>
                                    </tr>
                                    <tr>
                                        <th> Address:</th>
                                        <td><?php echo $row['address'] ?></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="margin: 0% 5%;  width:90%;" class="p-1">
            <div class="container p-1" style="background-color:#3b5998; border-radius:10px; color:white; height:50px;">
                <h4>My Posts </h4>
            </div>
            <div style="width:100%; overflow-y: hidden; ">
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr style="vertical-align:middle; text-align: center;">
                            <th>
                                Sr. No.
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Date on Posted
                            </th>
                            <th>
                                Content
                            </th>
                            <th>
                                Operations
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serial = 0;
                        $article = "SELECT * FROM article where user_id = " . $_SESSION['id'];
                        $result_article = mysqli_query($conn, $article) or die(mysqli_error($conn));
                        while ($row_article = mysqli_fetch_assoc($result_article)) {
                            echo '<tr class="text-center " style="text-align: center; vertical-align:middle;">
                               <td><strong>' . ++$serial . '</strong></td>
                                <td style="height:100px; width:25%;" >' . $row_article['title'] . '</td>
                                <td style="width:10%; height:100px;" >' . $row_article['category'] . '</td>
                                <td style="width:10%; height:100px;" >' . $row_article['date'] . '</td>
                                <td><div style="height:150px; overflow-y:scroll;">' . $row_article['content'] . '</div></td>
                                <td style="width:20% " ><a href="editpost.php?editpostid=' . $row_article['article_id'] . '"> <button type="button" class="btn btn-primary m-2">Edit Post</button> </a>
                                
                                <a href="profile.php?delid=' . $row_article['article_id'] . '"> <button type="button" class="btn btn-danger">Delete Post</button> </a></td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <a href="index.php">
                <input name="reset" value="Close" class="btn btn-danger"></a>
            <p>If You have any issue, Please <a href="contact.php" style="text-decoration: none;">
                    Contact Us..</a></p>
        </div>
    </div>
</section>
<?php
include_once('footer.php');
?>