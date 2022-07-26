<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

$sql = "SELECT id, name FROM category ORDER BY id ASC";
$db->sql($sql);

$res = $db->getResult();
$sql = "SELECT value FROM settings WHERE variable = 'Currency'";
$pincode_ids_exc = "";
$db->sql($sql);

$res_cur = $db->getResult();
if (isset($_POST['btnAdd'])) {
        $error = array();
        $job_title= $db->escapeString($_POST['job_title']);  
        $company_name = $db->escapeString($_POST['company_name']);
        $company_address = $db->escapeString($_POST['company_address']);
        $category = $db->escapeString($_POST['category']);
        $email= $db->escapeString($_POST['email']);
        $phone_no = $db->escapeString($_POST['phone_no']);
        $interview_date = $db->escapeString($_POST['interview_date']);
        $interview_time= $db->escapeString($_POST['interview_time']);
        $emp_qualification = $db->escapeString($_POST['emp_qualification']);
        $emp_experience = $db->escapeString($_POST['emp_experience']);
        $link= $db->escapeString($_POST['link']);
        $venue = $db->escapeString($_POST['venue']);
        $salary=$db->escapeString($_POST['salary']);
        $more_details= $db->escapeString($_POST['more_details']);
        $language = $db->escapeString($_POST['language']);     
       
        if (empty($job_title)) {
            $error['job_title'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($company_name)) {
            $error['company_name'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($company_address)) {
            $error['company_address'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($category)) {
            $error['category'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($email)) {
            $error['email'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($phone_no)) {
            $error['phone_no'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($interview_date)) {
            $error['interview_date'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($interview_time)) {
            $error['interview_time'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($emp_qualification)) {
            $error['emp_qualification'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($emp_experience)) {
            $error['emp_experience'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($link)) {
            $error['link'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($venue)) {
            $error['venue'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($salary)) {
            $error['salary'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($more_details)) {
            $error['more_details'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($language)) {
            $error['language'] = " <span class='label label-danger'>Required!</span>";
        }


        if (!empty($job_title) && !empty($company_name) && !empty($company_address) && !empty($category) && !empty($email) && !empty($phone_no) && !empty($interview_date) && !empty($interview_time) && !empty($emp_qualification) && !empty($emp_experience) && !empty($link) && !empty($venue) && !empty($salary) && !empty($more_details) && !empty($language)) 
        {
            $sql= "INSERT INTO news_jobs (job_title, company_name, company_address,category_id, email, phone_no, interview_date, interview_time, emp_qualification, emp_experience, link, venue, salary, more_details, language) VALUES ('$job_title', '$company_name', '$company_address','$category', '$email', '$phone_no', '$interview_date', '$interview_time', '$emp_qualification', '$emp_experience', '$link', '$venue', '$salary', '$more_details', '$language')";
            $db->sql($sql);
            $news_result = $db->getResult();
            if (!empty($news_result)) {
                $news_result = 0;
            } else {
                $news_result = 1;
            }
            if ($news_result == 1) {
                $error['add_menu'] = "<section class='content-header'>
                                                <span class='label label-success'>Job News Added Successfully</span>
                                                <h4><small><a  href='news_jobs.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to News JObs</a></small></h4>
                                                 </section>";
            } else {
                $error['add_menu'] = " <span class='label label-danger'>Failed</span>";
            }

        }
    }
?>
<section class="content-header">
    <h1>Add Job News</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Job News</h3>
                </div>
                <div class="box-header">
                    <?php echo isset($error['cancelable']) ? '<span class="label label-danger">Till status is required.</span>' : ''; ?>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form id='add_news_form' method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Job Title</label> <i class="text-danger asterik">*</i><?php echo isset($error['job_title']) ? $error['job_title'] : ''; ?>
                                    <input type="text" class="form-control" name="job_title" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Company Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['company_name']) ? $error['company_name'] : ''; ?>
                                    <input type="text" class="form-control" name="company_name" required>
                                </div>
                                <div class='col-md-3'>
                                    <label for="exampleInputEmail1">Company Address</label> <i class="text-danger asterik">*</i><?php echo isset($error['company_address']) ? $error['company_address'] : ''; ?>
                                    <input type="text" class="form-control" name="company_address" required>
                                </div>
                                <div class='col-md-3'>
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
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Email</label> <i class="text-danger asterik">*</i><?php echo isset($error['email']) ? $error['email'] : ''; ?>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Phone Number</label> <i class="text-danger asterik">*</i><?php echo isset($error['phone_no']) ? $error['phone_no'] : ''; ?>
                                    <input type="text" class="form-control" name="phone_no" required>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Interview Date</label> <i class="text-danger asterik">*</i><?php echo isset($error['interview_date']) ? $error['interview_date'] : ''; ?>
                                    <input type="date" class="form-control" name="interview_date" required>
                                </div>   
                            </div>
                         </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Interview Time</label> <i class="text-danger asterik">*</i><?php echo isset($error['interview_time']) ? $error['interview_time'] : ''; ?>
                                    <input type="text" class="form-control" name="interview_time" required>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1"> Emp Qualification</label> <i class="text-danger asterik">*</i><?php echo isset($error['emp_qualification']) ? $error['emp_qualification'] : ''; ?>
                                    <input type="text" class="form-control" name="emp_qualification" required>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Emp Experience </label> <i class="text-danger asterik">*</i><?php echo isset($error['emp_experience']) ? $error['emp_experience'] : ''; ?>
                                    <input type="text" class="form-control" name="emp_experience" required>
                                </div>   
                            </div>
                         </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Link</label> <i class="text-danger asterik">*</i><?php echo isset($error['link']) ? $error['link'] : ''; ?>
                                    <input type="text" class="form-control" name="link" required>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Venue</label> <i class="text-danger asterik">*</i><?php echo isset($error['venue']) ? $error['venue'] : ''; ?>
                                    <input type="text" class="form-control" name="venue" required>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Salary </label> <i class="text-danger asterik">*</i><?php echo isset($error['salary']) ? $error['salary'] : ''; ?>
                                    <input type="text" class="form-control" name="salary" required>
                                </div>   
                            </div>
                         </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">More Details</label> <i class="text-danger asterik">*</i><?php echo isset($error['more_details']) ? $error['more_details'] : ''; ?>
                                    <input type="text" class="form-control" name="more_details" required>
                                </div>
                                <div class='col-md-4'>
                                    <label for="exampleInputEmail1">Language</label> <i class="text-danger asterik">*</i><?php echo isset($error['language']) ? $error['language'] : ''; ?>
                                    <input type="text" class="form-control" name="language" required>
                                </div>
                            </div>
                         </div>
                        <hr>
                    </div>
                        
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="submit" class="btn-primary btn" value="Add" name="btnAdd" />&nbsp;
                        <input type="reset" class="btn-danger btn" value="Clear" id="btnClear" />
                        <!--<div  id="res"></div>-->
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_news_form').validate({

        ignore: [],
        debug: false,
        rules: {
            job_title: "required",
            company_name: "required",
            company_address: "required",
            email:"required",
            phone_no:"required",
            interview_date:"required",
            interview_time:"required",
            emp_qualification:"required",
            emp_experience:"required",
            link:"required",
            venue:"required",
            salary:"required",

        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>