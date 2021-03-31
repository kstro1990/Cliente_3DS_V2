<?php
session_start();
echo ($id = $_SESSION["requestID"]);

$url = "https://3dss-test.placetopay.com//api/threeds/v2/transactions/$id";



$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json; charset=UTF-8',
  'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMmI1Yzk2MjNlYTJjMWY0ODEyM2QwMGUxYjY4ZjU4ODE3NDQwYjg0OTI4ZTBmY2FjYjFmMjk5ZDRkYmMzODhhYTVmNmY0ZDk5NzYxM2RiNzYiLCJpYXQiOjE2MTUzMDMyMDYsIm5iZiI6MTYxNTMwMzIwNiwiZXhwIjoxNjQ2ODM5MjA2LCJzdWIiOiIxMiIsInNjb3BlcyI6W119.Tn6bbGgeHqcNjGkwzKwTVUHqbJv7TcxAK1tUoBCBZlmaF_QQ5vg-mIn_KOzs2VYHz1qHVF4MIxseDNZIuV7DKyBEXWaYcEgVfkC8JstQYhfsiUwhrJIVHhqOTnzEqiPTnlV32KyUiynlIcUVw6Z9i1g9Mote5KG-886XnSmHL-Y'
));
$resultMPI = curl_exec($ch);
$respuestaMPI = json_decode($resultMPI);
echo "</br>";
var_dump($respuestaMPI) ;
echo "</br>";
echo $url;

?>
