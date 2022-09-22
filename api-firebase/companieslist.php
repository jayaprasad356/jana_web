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

$sql = "SELECT * FROM companies WHERE status = '1'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num >= 1) {
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['company_name'] = $row['company_name'];
        $temp['job_title'] = $row['job_title'];
        $temp['category'] = $row['category'];
        $temp['location'] = $row['location'];
        $temp['salary'] = $row['salary'];
        $temp['image'] = DOMAIN_URL  .$row['image'];
        $rows[] = $temp;
        
    }
    $response['success'] = true;
    $response['message'] = "Companies Retrived Successfully";
    $response['data'] = $res;
    print_r(json_encode($response));

}
else{
    $response['success'] = false;
    $response['message'] = "Companies Not Found";
    $response['data'] = $res;
    print_r(json_encode($response));

}




?>