<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once('../includes/crud.php');

$db = new Database();
$db->connect();

if (empty($_POST['category_id'])) {
    $response['success'] = false;
    $response['message'] = "Category Id is Empty";
    print_r(json_encode($response));
    return false;
}

$category_id = $db->escapeString($_POST['category_id']);

$sql = "SELECT * FROM news_jobs WHERE category_id = '$category_id'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);

if ($num >= 1) {
    foreach ($res as $row){
        $temp['id'] = $row['id'];
        $temp['job_title'] = $row['job_title'];
        $temp['company_name'] = $row['company_name'];
        $temp['category_id'] = $row['category_id'];
        $temp['company_address'] = $row['company_address'];
        $temp['email'] = $row['email'];
        $temp['phone_no'] = $row['phone_no'];
        $temp['interview_date'] = $row['interview_date'];
        $temp['interview_time'] = $row['interview_time'];
        $temp['emp_qualification'] = $row['emp_qualification'];
        $temp['emp_experience'] = $row['emp_experience'];
        $temp['link'] = $row['link'];
        $temp['venue'] = $row['venue'];
        $temp['salary'] = $row['salary'];
        $temp['more_details'] = $row['more_details'];
        $temp['language'] = $row['language'];

    }
    $response['success'] = true;
    $response['message'] = "News jobs Retrived Successfully";
    $response['data'] = $res;
    print_r(json_encode($response));

}
else{
    $response['success'] = false;
    $response['message'] = "News jobs Not Found";
    $response['data'] = $res;
    print_r(json_encode($response));

}


?>