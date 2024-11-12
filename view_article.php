<?php
ob_start();
include_once('db_connect.php');
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
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
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
                        <div class="col-sm-2" >
                            <p><a href="#" onclick="printPageArea(printableArea)"><i class="fa-solid fa-print" style="color: #74C0FC;"></i></a>
                            
      <a href="javascript:void(0)" onclick="shareArticle();" style="text-decoration:none; color:none;">
                            
                            <!-- Share trigger modal -->
&nbsp;
<i class="fa-solid fa-share fa-lg" style="color: #74C0FC;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="copy">
        <!-- Display the URL here -->
        <span id="urlDisplay"></span>
<!-- Add this hidden textarea element -->
<textarea id="urlTextArea" style="display: none;"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="#" onclick="copy();" style="text-decoration:none; color:white;">
        <button type="button" class="btn btn-primary"> Copy </button></a>
      </div>
    </div>
  </div>
</div>
      </a></p>
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