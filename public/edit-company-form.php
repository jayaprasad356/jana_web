<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;
?>
<?php

if (isset($_GET['id'])) {
    $ID = $db->escapeString($_GET['id']);
} else {
    // $ID = "";
    return false;
    exit(0);
}
if (isset($_POST['btnEdit'])) {

			$company_name = $db->escapeString(($_POST['company_name']));
			$job_title = $db->escapeString(($_POST['job_title']));
			$category = $db->escapeString(($_POST['category']));
			$location = $db->escapeString(($_POST['location']));
			$salary = $db->escapeString(($_POST['salary']));
			$status= $db->escapeString(($_POST['status']));


			if(empty($company_name)){
				$error['company_name'] = "<span class='label label-danger'>Required!</span>";
			}
			if(empty($job_title)){
				$error['job_title'] = "<span class='label label-danger'>Required!</span>";
			}
	
			if (empty($category)) {
				$error['category'] = "<span class='label label-danger'>Required!</span>";
			}
			if (empty($location)) {
				$error['location'] = "<span class='label label-danger'>Required!</span>";
			}
			if (empty($salary)) {
				$error['salary'] = "<span class='label label-danger'>Required!</span>";
			}
		

		if (!empty($company_name) && !empty($job_title) && !empty($category) && !empty($location) && !empty($salary)) {
			if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && !empty($_FILES['image'])) {
				//image isn't empty and update the image
				$old_image = $db->escapeString($_POST['old_image']);
				$extension = pathinfo($_FILES["image"]["name"])['extension'];
		
				$result = $fn->validate_image($_FILES["image"]);
				$target_path = 'upload/images/';
				
				$filename = microtime(true) . '.' . strtolower($extension);
				$full_path = $target_path . "" . $filename;
				if (!move_uploaded_file($_FILES["image"]["tmp_name"], $full_path)) {
					echo '<p class="alert alert-danger">Can not upload image.</p>';
					return false;
					exit();
				}
				if (!empty($old_image)) {
					unlink($old_image);
				}
				$upload_image = 'upload/images/' . $filename;
				$sql = "UPDATE companies SET `image`='" . $upload_image . "' WHERE `id`=" . $ID;
				$db->sql($sql);
			}
			
             $sql_query = "UPDATE companies SET company_name='$company_name',job_title='$job_title',category='$location',salary='$salary',status='$status'  WHERE id =  $ID";
			 $db->sql($sql_query);
             $update_result = $db->getResult();
			if (!empty($update_result)) {
				$update_result = 0;
			} else {
				$update_result = 1;
			}

			// check update result
			if ($update_result == 1) {
				$error['update_company'] = " <section class='content-header'><span class='label label-success'>Company updated Successfully</span></section>";
			} else {
				$error['update_company'] = " <span class='label label-danger'>Failed update company</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM companies WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "companies.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Company<small><a href='companies.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Companies</a></small></h1>
	<small><?php echo isset($error['update_company']) ? $error['update_company'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<!-- Main row -->

	<div class="row">
		<div class="col-md-12">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Company</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form id="edit_company_form" method="post" enctype="multipart/form-data">
					<div class="box-body">	
					<input type="hidden" id="old_image" name="old_image"  value="<?= $res[0]['image']; ?>">

					<div class="row">
						<div class="form-group">
							<div class="col-md-4">
								<label for="exampleInputEmail1">Company Name</label><?php echo isset($error['company_name']) ? $error['company_name'] : ''; ?>
								<input type="text" class="form-control" name="company_name" value="<?php echo $res[0]['company_name']; ?>">
							</div>
							<div class="col-md-4">
								<label for="exampleInputEmail1">Job Title</label><?php echo isset($error['job_title']) ? $error['job_title'] : ''; ?>
								<input type="text" class="form-control" name="job_title" value="<?php echo $res[0]['job_title']; ?>">
							</div>
						</div>
					</div>
					<hr>

					<div class="row">
						<div class="form-group">
						        <div class='col-md-4'>
                                    <label for="">category</label><?php echo isset($error['category']) ? $error['category'] : ''; ?>
                                    <select id='category' name="category" class='form-control' value="<?php echo $res[0]['category']; ?>">
                                            <?php
                                            $sql = "SELECT * FROM `categories`";
                                            $db->sql($sql);
                                            $result = $db->getResult();
                                            foreach ($result as $value) {
                                            ?>
                                                  <option value='<?= $value['id'] ?>'><?= $value['name'] ?></option>
                                        <?php } ?>
                                        </select>
                                </div>
								<div class="col-md-4">
									<label for="exampleInputEmail1">Location</label><?php echo isset($error['location']) ? $error['location'] : ''; ?>
									<input type="text" class="form-control" name="location" value="<?php echo $res[0]['location']; ?>">
							    </div>
								<div class="col-md-4">
									<label for="exampleInputEmail1">Salary</label><?php echo isset($error['salary']) ? $error['salary'] : ''; ?>
									<input type="text" class="form-control" name="salary" value="<?php echo $res[0]['salary']; ?>">
							    </div>
						</div>
					</div>
					<hr>
					<div class="row">
					    <div class="form-group">
						        <div class="col-md-4">
									<label for="exampleInputFile">Image</label>
									
									<input type="file" accept="image/png,  image/jpeg" onchange="readURL(this);"  name="image" id="image">
									<p class="help-block"><img id="blah" src="<?php echo $res[0]['image']; ?>" style="max-width:100%" /></p>
								</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="form-group">
						        <div class="col-md-4">
											<label class="control-label">Status</label>
									         <div id="status" class="btn-group">
													<label class="btn btn-default" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
														<input type="radio" name="status" value="0" <?= ($res[0]['status'] == 0) ? 'checked' : ''; ?>> Deactivated
													</label>
													<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="status" value="1" <?= ($res[0]['status'] == 1) ? 'checked' : ''; ?>> Activated
													</label>
								           	</div>
								</div>
							
						</div>
					</div>
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary" name="btnEdit">Update</button>
					
					</div>
				</form>
			</div><!-- /.box -->
		</div>
	</div>
</section>

<div class="separator"> </div>
<?php $db->disconnect(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

