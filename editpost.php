<?php
ob_start();
include_once('db_connect.php');
include_once('header.php');
if (isset($_REQUEST['editpostid'])) {
    $editpostid = intval($_REQUEST['editpostid']);
    $sql = "SELECT * FROM article WHERE article_id = " . $editpostid;
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    if (isset($_POST['submit'])) {
        // Use mysqli_real_escape_string to escape user input
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $source = mysqli_real_escape_string($conn, $_POST['source']);
        $sql = "UPDATE article SET title='$title', content='$content', category='$category', source='$source' WHERE article_id= $editpostid";
        $test = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if ($test) {
            echo '<script>alert("Post Updated Successfully....")</script>';
            header('refresh:0;url=profile.php');
        }
    }
}
?>
<section class="container bg-light">
    <div class="">
        <div>
            <a href="index.php"><img src="img/logo3.png" style="height: 100px;"></a>
        </div>
        <div>
            <span style="color:red; font-size:20px;"><u><strong>Copyright Notice :</strong></u></span>
            <span style="font-size:20px;">Do not submit any material for which you don't hold the rights.</span>
        </div>
        <hr style="border: 3px solid black; border-radius:50px; box-shadow: 0px 2px black;">
        <div class="container">
            <form action="#" method="post" name="post">
                <div class="form-group p-1">
                    <label>Title<span style="color: red;">*</span></label><br>
                    <input type="text" style="width:100%;" name="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                </div>
                <div class="form-group p-1">
                    <label>Content<span style="color: red;">*</span></label><br>
                    <textarea name="content" id="a" class="form-control" required><?php echo htmlspecialchars($row['content']); ?></textarea>
                </div>
                <div class="form-group p-1">
                    <label>Category <span style="color: red;">*</span></label><br>
                    <select class="mt-3 mb-3" id="category" name="category" style="width:100%; height:35px; border-radius:5px;" required>
                        <option value="CA, CS, CMA" <?php if ($row['category'] == 'CA, CS, CMA') echo 'selected="selected"'; ?>>CA, CS, CMA</option>
                        <option value="Company Law" <?php if ($row['category'] == 'Company Law') echo 'selected="selected"'; ?>>Company Law</option>
                        <option value="Corporate Law" <?php if ($row['category'] == 'Corporate Law') echo 'selected="selected"'; ?>>Corporate Law</option>
                        <option value="Custom Duty" <?php if ($row['category'] == 'Custom Duty') echo 'selected="selected"'; ?>>Custom Duty</option>
                        <option value="DGFT" <?php if ($row['category'] == 'DGFT') echo 'selected="selected"'; ?>>DGFT</option>
                        <option value="Excise Duty" <?php if ($row['category'] == 'Excise Duty') echo 'selected="selected"'; ?>>Excise Duty</option>
                        <option value="Fema/RBI" <?php if ($row['category'] == 'Fema/RBI') echo 'selected="selected"'; ?>>Fema/RBI</option>
                        <option value="Finance" <?php if ($row['category'] == 'Finance') echo 'selected="selected"'; ?>>Finance</option>
                        <option value="Goods & Service Tax" <?php if ($row['category'] == 'Goods & Service Tax') echo 'selected="selected"'; ?>>Goods & Service Tax</option>
                        <option value="Income Tax" <?php if ($row['category'] == 'Income Tax') echo 'selected="selected"'; ?>>Income Tax</option>
                        <option value="SEBI" <?php if ($row['category'] == 'SEBI') echo 'selected="selected"'; ?>>SEBI</option>
                        <option value="Service Tax" <?php if ($row['category'] == 'Service Tax') echo 'selected="selected"'; ?>>Service Tax</option>
                    </select>
                </div>
                <div class="form-group p-1">
                    <label>Source<span style="color: red;">*</span></label><br>
                    <input type="text" style="width:100%;" name="source" class="form-control" value="<?php echo htmlspecialchars($row['source']); ?>" required>
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
                    <input type="submit" name="submit" value="Update Article" class="btn btn-success">
                    <a href="profile.php">
                        <button type="button" name="close" value="Close" class="btn btn-danger">Close</button>
                    </a>
                </div>
                <p>In case of any difficulty in upload of article/Post/Files you can mail the same to us for publications on <a href="#">articles@taxwithbooks.in</a></p>
            </form>
        </div>
    </div>
</section>
<?php
include_once('footer.php');
?>