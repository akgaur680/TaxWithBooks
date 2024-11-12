<?php
ob_start();
include_once('../db_connect.php');
include_once("header.php");
$page = "View_Article";
$article_id = $_REQUEST['article_id'];
if (isset($_REQUEST['article_id'])) {
    $id = $_REQUEST['article_id'];
    $sql = "SELECT * FROM article WHERE article_id = " . $article_id;
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
} else {
    header('location:article.php');
}

    

?>
<section class="container mt-5">
    <div>
        <div class="row">
            <div class="col-sm-8">
                <div id="printableArea" class="p-4 mb-2" style="border: 1px solid lightgrey; border-radius:10px; box-shadow:inset 0px 5px grey; box-shadow: 5px 0px grey;">
                    <?php
                    while ($row = mysqli_fetch_row($result)) {
                        echo '
                    <div>
                        <h2 style="color:#4588bc;">
                        ' . $row[1] . '
                    </h2>
                    </div>
                    
                    <div>
                    <article> <span><strong>' . $row[3] . ' : </strong></span>' . nl2br(htmlspecialchars($row[2])) . '</article>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-4" >
                            <p><i class="fa-regular fa-calendar" style="color: #74C0FC;"></i> &nbsp;Posted on : ' . $row[5] . '</p>
                        </div>                        
                        <div class="col-sm-6" >
                            <p><i class="fa-solid fa-user-pen" style="color: #74C0FC;"></i> &nbsp;By : ';
                        $sqlauthor = "SELECT * FROM user WHERE id = " . $row[6];
                        $resultauthor = mysqli_query($conn, $sqlauthor) or die(mysqli_error($$conn));
                        $author = mysqli_fetch_row(($resultauthor));
                        echo $author[5] . ' : ' . $author[1]
                            . '</p>
                        </div>                        
                        <div class="form-group p-2">
                    <input type="submit" name="submit" value="Approve" class="btn btn-success">
                    <input type="reset" name="reset" value="Reject" class="btn btn-danger">
                </div>
                    </div>
                    <hr>
                ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once('footer.php');
?>