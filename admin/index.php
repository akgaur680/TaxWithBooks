<?php
ob_start();
include_once('../db_connect.php');
include_once('header.php');
$sql = "SELECT * FROM article ORDER BY article_id DESC LIMIT 10";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
<section class="container mt-5">
    <div>
        <div class="row">
            <div class="col-sm-8">
                <h2><i class="fa-solid fa-book " style="color: black; transform: skewY(20deg);"></i>&nbsp; Latest Article ......</h2>
                <hr>
                <div>
                    <?php
                    while ($row = mysqli_fetch_row($result)) {
                        echo '          
                    <div>
                    <a style="text-decoration:none;" href="view_article.php?article_id=' . $row[0] . '">
                        <h2 style="color:#4588bc;">
                        ' . $row[1] . '
                    </h2>
                    </div>
                    </a>
                    <div class="row" style="color:black;" >
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
                       <div class="col-sm-2">
                            <p> <a href="view_article.php?article_id=' . $row[0] . '" style="text-decoration:none; color:black;"> <i class="fa-solid fa-eye fa-lg" style="color: #74C0FC;"></i> &nbsp;View</a></p>
                        </div>
                    </div>
                    <div>
                        <article style="color:black; height:50px; overflow-y:hidden;"> <span><strong>' . $row[3] . ' : </strong></span>' . $row[2] . '</article>
                    </div>
                    <hr>
                ';
                    }
                    ?>
                </div>
                <div class="mb-3" style="text-align:right;">
                    <a style="color: black; font-size:25px;" href="article.php">View All Articles......</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once('../footer.php');
?>