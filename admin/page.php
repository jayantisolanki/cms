<?php 
include_once 'controllers/config.php';
include_once 'controllers/functions.php';
if(!isset($_SESSION["loginUser"])) {header("Location: index.php");exit; }
if(isset($_GET["action"])){echo $action = $_GET["action"];}
if(isset($_GET["id"])){echo $id = $_GET["id"];}

function string_limit_words($string) {
	$words = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
	return $words;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$title = $_POST["title"];
    $content = $_POST["content"];
	$slug = string_limit_words($title); // First 6 words
	$seotitle = $_POST["seotitle"];
	$seodescrition = $_POST["seodescrition"];
	$seokeyword = $_POST["seokeyword"];
	if (empty($title)) {$message .= '<div class="alert alert-danger">Enter your page title</div>'; }
	if (empty($content)) {$message .= '<div class="alert alert-danger">Enter your page content</div>'; }
	$prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
    
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $message .= '<div class="alert alert-danger">A user with this email address already exists.</div>';
        }
    }
	
	if (empty($message)) {
		if (addPage($title, $content, $slug, $seotitle, $seodescrition, $seokeyword, $mysqli) == true) {
			
		} else {
			$message = '<div class="alert alert-danger">Invalid!</div>';
		}
	}
}
?>
<?php include('templates/header.php');?>
<?php echo $message; ?>
<?php 
$res = $mysqli->query("SELECT id FROM tbl_pages ORDER BY id ASC");
$res->data_seek(0);
while ($row = $res->fetch_assoc()) {
    echo $row['id'];
}
?>
<h1>Add Page</h1>
<form name="addPages" method="post" action="" class="form-horizontal">
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Page Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="content" class="col-sm-2 control-label">Page Content</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="content" id="content"><?php echo $content; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="seotitle" class="col-sm-2 control-label">SEO Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="seotitle" name="seotitle" value="<?php echo $seotitle; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="seodescrition" class="col-sm-2 control-label">SEO Descrition</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="seodescrition" id="seodescrition"><?php echo $seodescrition; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="seokeyword" class="col-sm-2 control-label">Keyword</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="seokeyword" name="seokeyword" value="<?php echo $seokeyword; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input class="btn btn-primary" type="submit" value="Submit">
    </div>
  </div>
</form>
<?php include('templates/footer.php'); ?>
