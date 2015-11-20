<?php 
include_once 'controllers/config.php';
include_once 'controllers/functions.php';
if(!isset($_SESSION["loginUser"])) {header("Location: index.php");exit;}
if(isset($_GET["action"])){$action = $_GET["action"];}else {$action = 'view';}
if(isset($_GET["id"])){$id = $_GET["id"];}
if(isset($_GET["error"])){$error = $_GET["error"];}
if(isset($_GET["success"])){$success = $_GET["success"];}
if ($action == 'edit'){
	$stmt = $mysqli->prepare("SELECT name, content, seotitle, seodescrition, seokeyword, status FROM tbl_pages WHERE id = ? LIMIT 1");
	$stmt->bind_param('s', $id);
	$stmt->execute(); 
	$stmt->store_result();
	$stmt->bind_result($name, $content, $seotitle, $seodescrition, $seokeyword, $status);
	$row = $stmt->fetch();	
}
?>
<?php include('templates/header.php');?>
  <div class="row">
    <div class="col-md-3"> <a href="<?php echo BACKEND_URL; ?>/page.php?action=add" class="btn btn-primary btn-lg btn-block" role="button">Add Page</a> </div>
    <div class="col-md-9">
      <?php if ($error != '') {echo '<div class="alert alert-danger">'.$error.'</div>';}?>
      <?php if ($success != '') {echo '<div class="alert alert-success">'.$success.'</div>';}?>
      <?php if ($action == 'view') {?>

      <h2>Page List</h2>
      <div class="table-responsive">
        <table class="table table-hover pageList">
          <tr>
            <th>Page Name</th>
            <th width="10%">Order</th>
            <th width="5%">Status</th>
            <th width="5%">Action</th>
          </tr>
          <?php $res = $mysqli->query("SELECT * FROM tbl_pages ORDER BY sortOrder ASC"); ?>
          <?php while ($row = $res->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><input type="number" name="order" id="order" value="<?php echo $row['sortOrder']; ?>" class="form-control"></td>
            <td align="center"><?php if ($row['status'] == 1){?>
              <span class="glyphicon glyphicon-eye-open " aria-hidden="true"></span>
              <?php }else{?>
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              <?php } ?></td>
            <td align="center"><a href="page.php?action=edit&id=<?php echo $row['id']; ?>" title="Edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> <a href="page.php?action=delete&id=<?php echo $row['id']; ?>" title="Delete"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <?php } else { ?>
      <h1>Add Page</h1>
      <form name="addPages" method="post" action="controllers/page_action.php" class="form-horizontal">
        <input type="hidden" name="action" value="<?php echo $action; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">Page Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
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
          <label for="seokeyword" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <label class="radio-inline">
              <input type="radio" name="status" value="1" <?php if ($status == 1) echo 'checked'; ?>>
              Active </label>
            <label class="radio-inline">
              <input type="radio" name="status" value="0" <?php if ($status == 0) echo 'checked'; ?>>
              Inactive </label>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input class="btn btn-primary" type="submit" value="Submit">
          </div>
        </div>
      </form>
      <?php } ?>
    </div>
  </div>
  <?php include('templates/footer.php'); ?>
