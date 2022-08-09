<section class="content-header">
    <h1>
        News /
        <small><a href="home.php"><i class="fa fa-home"></i> Home</a></small>
   </h1>
   <ol class="breadcrumb">
        <a class="btn btn-block btn-default" href="add-news_jobs.php"><i class="fa fa-plus-square"></i> Add New Job News</a>
    </ol>
    
    
</section>
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id='users_table' class="table table-hover" data-toggle="table" data-url="api-firebase/get-bootstrap-table-data.php?table=news_jobs" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true" data-show-columns="true" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc" data-show-export="true" data-export-types='["txt","excel"]' data-export-options='{
                            "fileName": "students-list-<?= date('d-m-Y') ?>",
                            "ignoreColumn": ["operate"] 
                        }'>
                            <thead>
                                <tr>
                               
                                     <th data-field="operate1" data-events="actionEvents">View</th>
                                     <th data-field="operate" data-events="actionEvents">Action</th>
                                    <th data-field="id" data-sortable="true">ID</th>
                                    <th data-field="job_title" data-sortable="true">Job Title</th>
                                    <th data-field="company_name" data-sortable="true">Company Name</th>
                                    <th data-field="company_address" data-sortable="true" >Company Address</th>
                                    <th data-field="email" data-sortable="true" >Email</th>
                                    <th data-field="phone_no" data-sortable="true" >Phone Number</th>
                                    <th data-field="interview_date" data-sortable="true" >Interview Date</th>
                                    <th data-field="interview_time" data-sortable="true" >Interview Time</th>
                                    <th data-field="emp_qualification" data-sortable="true" >Emp Qualification</th>
                                    <th data-field="emp_experience" data-sortable="true" >Emp Experience</th>
                                    <th data-field="link" data-sortable="true" >Link</th>
                                    <th data-field="venue" data-sortable="true" >Venue</th>
                                    <th data-field="salary" data-sortable="true" >Salary</th>
                                    <th data-field="more_details" data-sortable="true" >More Details</th>
                                    <th data-field="language" data-sortable="true" >Lanuguage</th>
                                    
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="separator"> </div>
        </div>
        <!-- /.row (main row) -->
    </section>

<script>
    $('#seller_id').on('change', function() {
        $('#products_table').bootstrapTable('refresh');
    });
    $('#community').on('change', function() {
        $('#users_table').bootstrapTable('refresh');
    });

    function queryParams(p) {
        return {
            "category_id": $('#category_id').val(),
            "seller_id": $('#seller_id').val(),
            "community": $('#community').val(),
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>