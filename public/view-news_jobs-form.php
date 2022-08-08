<?php
include_once('includes/functions.php');
date_default_timezone_set('Asia/Kolkata');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;
// session_start();
$news_jobs_id = $_GET['id'];
?>
<section class="content-header">
    <h1>View Job News</h1>
    <?php echo isset($error['add_menu']) ? $error['add_menu'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>

</section>
<section class="content">
<div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Job News Detail</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <table class="table table-bordered">
                        <?php
                        $sql = "SELECT * FROM news_jobs WHERE id = $news_jobs_id";
                        $db->sql($sql);
                        $res = $db->getResult();
                        $num = $db->numRows();
                        if($num >= 1){
                        ?>
                            <tr>
                                <th style="width: 200px">ID</th>
                                <td><?php echo $res[0]['id'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Job Title</th>
                                <td><?php echo $res[0]['job_title'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Company Name</th>
                                <td><?php echo $res[0]['company_name'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Company Address</th>
                                <td><?php echo $res[0]['company_address'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px"> Email</th>
                                <td><?php echo $res[0]['email'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Phone Number</th>
                                <td><?php echo $res[0]['phone_no'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Interview Date</th>
                                <td><?php echo $res[0]['interview_date'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Interview Time</th>
                                <td><?php echo $res[0]['interview_time'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Emp Qualification</th>
                                <td><?php echo $res[0]['emp_qualification']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Emp Experience</th>
                                <td><?php echo $res[0]['emp_experience']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Link</th>
                                <td><?php echo $res[0]['link']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Venue</th>
                                <td><?php echo $res[0]['venue']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Salary</th>
                                <td><?php echo $res[0]['salary']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">More Details</th>
                                <td><?php echo $res[0]['more_details']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 200px">Language</th>
                                <td><?php echo $res[0]['language']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="news_jobs.php" class="btn btn-sm btn-default btn-flat pull-left">Back</a>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
</section>
<div class="separator"> </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
   
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
    
</script>
<script>
    document.getElementById('valid').valueAsDate = new Date();

</script>
