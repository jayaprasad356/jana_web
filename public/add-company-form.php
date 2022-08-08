<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

$sql = "SELECT id, name FROM categories ORDER BY id ASC";
$db->sql($sql);
$res = $db->getResult();

?>
<?php
if (isset($_POST['btnAdd'])) {
        
        $company_name = $db->escapeString(($_POST['company_name']));
        $job_title = $db->escapeString(($_POST['job_title']));
        $category = $db->escapeString(($_POST['category']));
        $location = $db->escapeString(($_POST['location']));
        $salary = $db->escapeString(($_POST['salary']));
        $status = $db->escapeString(($_POST['status']));
        
        // get image info
        $menu_image = $db->escapeString($_FILES['company_image']['name']);
        $image_error = $db->escapeString($_FILES['company_image']['error']);
        $image_type = $db->escapeString($_FILES['company_image']['type']);

        // create array variable to handle error
        $error = array();
            // common image file extensions
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // get image file extension
        error_reporting(E_ERROR | E_PARSE);
        $extension = end(explode(".", $_FILES["company_image"]["name"]));
        

        if(empty($company_name)){
            $error['company_name'] = "Company Name is required";
        }
        if(empty($job_title)){
            $error['job_title'] = "Job Title is required";
        }

        if (empty($category)) {
            $error['category'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($location)) {
            $error['location'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($salary)) {
            $error['salary'] = " <span class='label label-danger'>Required!</span>";
        }
       
       if (!empty($company_name) && !empty($job_title) && !empty($category) && !empty($location) && !empty($salary)) {
            $result = $fn->validate_image($_FILES["company_image"]);
                // create random image file name
                $string = '0123456789';
                $file = preg_replace("/\s+/", "_", $_FILES['company_image']['name']);
                $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
        
                // upload new image
                $upload = move_uploaded_file($_FILES['company_image']['tmp_name'], 'upload/images/' . $menu_image);
        
                // insert new data to menu table
                $upload_image = 'upload/images/' . $menu_image;

            
           
            $sql_query = "INSERT INTO companies (company_name,job_title,category,location,salary,image,status)VALUES('$company_name','$job_title','$category','$location','$salary','$upload_image',0)";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                $error['add_company'] = "<section class='content-header'>
                                                <span class='label label-success'>Company Added Successfully</span>
                                                <h4><small><a  href='companies.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Companies</a></small></h4>
                                                 </section>";
            } else {
                $error['add_company'] = " <span class='label label-danger'>Failed</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Company <small><a href='companies.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Companies</a></small></h1>

    <?php echo isset($error['add_company']) ? $error['add_company'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Company</h3>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_company" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                   <div class="col-md-4">
                                            <label for="exampleInputEmail1">Company Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['company_name']) ? $error['company_name'] : ''; ?>
                                            <input type="text" class="form-control" name="company_name" required>
                                    </div>
                                    <div class='col-md-4'>
                                        <label for="">Category</label> <i class="text-danger asterik">*</i>
                                        <select id='category' name="category" class='form-control' required>
                                        <option value="">Select</option>
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
                                        <label for="exampleInputEmail1">Job Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['job_title']) ? $error['job_title'] : ''; ?>
                                        <input type="text" class="form-control" name="job_title" required />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Location</label> <i class="text-danger asterik">*</i><?php echo isset($error['location']) ? $error['location'] : ''; ?>
                                            <input type="text" class="form-control"  name="location" required></textarea>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Salary</label> <i class="text-danger asterik">*</i><?php echo isset($error['salary']) ? $error['salary'] : ''; ?>
                                            <input type="text" class="form-control"  name="salary" required></textarea>
                                    </div>
                                 </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                         <label for="exampleInputFile">Image</label> <i class="text-danger asterik">*</i><?php echo isset($error['company_image']) ? $error['company_image'] : ''; ?>
                                        <input type="file" name="company_image" onchange="readURL(this);" accept="image/png,  image/jpeg" id="company_image" required/>
                                        <img id="blah" src="#" alt="image" />
                                    </div>

                                </div>
                            </div>
                            <hr>
                           
                    </div>
                  
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnAdd">Add</button>
                        <input type="reset" class="btn-warning btn" value="Clear" />
                    </div>

                </form>

            </div><!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_company').validate({

        ignore: [],
        debug: false,
        rules: {
            company_name: "required",
            job_title: "required",
            location: "required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<?php $db->disconnect(); ?>