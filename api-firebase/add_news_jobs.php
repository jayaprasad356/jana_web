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
if (empty($_POST['job_title'])) {
    $response['success'] = false;
    $response['message'] = "Job Title  is Empty";
    print_r(json_encode($response));
    
    return false;
}
if (empty($_POST['company_name'])) {
    $response['success'] = false;
    $response['message'] = "Company Name  is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['company_address'])) {
    $response['success'] = false;
    $response['message'] = "Company Address  is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['email'])) {
    $response['success'] = false;
    $response['message'] = "Email  is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['phone_no'])) {
    $response['success'] = false;
    $response['message'] = " Phone number  is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['interview_date'])) {
    $response['success'] = false;
    $response['message'] = " Interview Date is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['interview_time'])) {
    $response['success'] = false;
    $response['message'] = " Interview Time is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['emp_qualification'])) {
    $response['success'] = false;
    $response['message'] = " Employee qualification is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['emp_experience'])) {
    $response['success'] = false;
    $response['message'] = " Employee experience  is Empty";
    print_r(json_encode($response));
    return false;
}


if (empty($_POST['venue'])) {
    $response['success'] = false;
    $response['message'] = " Venue  is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['salary'])) {
    $response['success'] = false;
    $response['message'] = " Salary  is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['more_details'])) {
    $response['success'] = false;
    $response['message'] = " More details  is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['language'])) {
    $response['success'] = false;
    $response['message'] = " language  is Empty";
    print_r(json_encode($response));
    return false;
}
$job_title = $db->escapeString($_POST['job_title']);
$company_name = $db->escapeString($_POST['company_name']);
$company_address = $db->escapeString($_POST['company_address']);
$email = $db->escapeString($_POST['email']);
$phone_no = $db->escapeString($_POST['phone_no']);
$interview_date = $db->escapeString($_POST['interview_date']);
$interview_time = $db->escapeString($_POST['interview_time']);
$emp_qualification = $db->escapeString($_POST['emp_qualification']);
$emp_experience = $db->escapeString($_POST['emp_experience']);
$link = (isset($_POST['link']) && !empty($_POST['link'])) ? trim($db->escapeString($_POST['link'])) : "";
$venue = $db->escapeString($_POST['venue']);
$salary = $db->escapeString($_POST['salary']);
$more_details = $db->escapeString($_POST['more_details']);
$language = $db->escapeString($_POST['language']);

$sql = "INSERT INTO news_jobs(`job_title`,`company_name`,`company_address`,`email`,`phone_no`,`interview_date`,`interview_time`,`emp_qualification`,`emp_experience`,`link`,`venue`,`salary`,`more_details`,`language`)
VALUES('$job_title','$company_name','$company_address','$email','$phone_no','$interview_date','$interview_time','$emp_qualification','$emp_experience','$link','$venue','$salary','$more_details','$language')";


//$sql = "INSERT INTO news_jobs(`job_title`,`company_address`,`email`,`phone_no`,`interview_date`,`interview_time`,`emp_qualification`,`emp_experience`,`link`,`venue`,`salary`,`more_details`,`language`)
//VALUES('$job_title','$company_address','$email','$phone_no','$interview_date','$interview_time','$emp_qualification','$emp_experience','$link','$venue','$salary','$more_details','$language')";

$db->sql($sql);
    $res = $db->getResult();

    $response['success'] = true;
    $response['message'] = "Add News Job Sucessfully";
    print_r(json_encode($response));
    return false;
    

?>