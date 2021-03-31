<?php
session_start();
//4005580000000040
//4009000000501

//4012000000003028

// $elJson= '{
// "acctNumber": "4009000000502",
// "cardExpiryDate": "2411",
// "purchaseAmount": "78.5",
// "redirectURI": "http://localhost/mpi_v2/query.php",
// "purchaseCurrency": "COP"
// }';
$elJson= '{
	"acctInfo": {
		"chAccAgeInd": "05",
		"chAccDate": "20180412"
	},
	"mobilePhone": {
		"cc": 593,
		"subscriber": 983771863
	},
  "acctNumber": "",
	"redirectURI": "http://localhost/mpi_v2/query.php",
	"billAddrCity": "Quito",
	"cardExpiryDate": 2101,
	"cardholderName": "nombre de la tarejta",
	"purchaseAmount": 112.00,
	"billAddrCountry": "ECU",
	"purchaseCurrency": "USD"
} ';



// Forzar validación
// "threeDSChallengeInd": "03"
// 4009000000502

$url = 'https://3dss-test.placetopay.com/api/threeds/v2/sessions';


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $elJson);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json; charset=UTF-8',
  'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMmI1Yzk2MjNlYTJjMWY0ODEyM2QwMGUxYjY4ZjU4ODE3NDQwYjg0OTI4ZTBmY2FjYjFmMjk5ZDRkYmMzODhhYTVmNmY0ZDk5NzYxM2RiNzYiLCJpYXQiOjE2MTUzMDMyMDYsIm5iZiI6MTYxNTMwMzIwNiwiZXhwIjoxNjQ2ODM5MjA2LCJzdWIiOiIxMiIsInNjb3BlcyI6W119.Tn6bbGgeHqcNjGkwzKwTVUHqbJv7TcxAK1tUoBCBZlmaF_QQ5vg-mIn_KOzs2VYHz1qHVF4MIxseDNZIuV7DKyBEXWaYcEgVfkC8JstQYhfsiUwhrJIVHhqOTnzEqiPTnlV32KyUiynlIcUVw6Z9i1g9Mote5KG-886XnSmHL-Y'
));
$resultMPI = curl_exec($ch);
$respuestaMPI = json_decode($resultMPI);
var_dump($respuestaMPI);

$_SESSION["requestID"]=$respuestaMPI->transactionID;

header("Location:$respuestaMPI->redirectURL"."?csrt=7475009582537682797");
 ?>
