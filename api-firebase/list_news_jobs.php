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





if (empty($_POST['type'])) {
    $response['success'] = false;
    $response['message'] = " Type is Empty";
    print_r(json_encode($response));
    return false;
}
$sql = "SELECT * FROM news_jobs";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num >= 1) {
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