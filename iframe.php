<!DOCTYPE html>
<html>
<body>

<h2>HTML Iframes</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<?php
$elJson= '{
  "reference": "LCastro",
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

$url = 'https://3dss-test.placetopay.com/api/threeds/v2/sessions';


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $elJson);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json; charset=UTF-8',
  'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYmU0ODM4ZjA1YWUwOWJjNmE4ODk5YmE1ZGVjOTQ2ZDY1ZTNlNTM3NTVmYjcxMmY1ZDdjNTk0Njg4Zjk2Y2VmODMxZjM3NzVhYjVkNmY5YjMiLCJpYXQiOjE2MDE5MDY0MjgsIm5iZiI6MTYwMTkwNjQyOCwiZXhwIjoxNjMzNDQyNDI4LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.Lqb-ybasd7BMI-RcwolJXc-O-onQncI_J4KIueh5WCfycXXS_M9VYF8zlYFzJxjNvM6bV0y98ZtHMh1ZaCy7Yi_cRORzTgl_KTbKPCLqOXV3-bpZquy7EfT0wp4pM3Td0w7hEq8bEL2XimDnhVIVl1yOkG_wK4y2IuK_cjjEiWA'
));
$resultMPI = curl_exec($ch);
$respuestaMPI = json_decode($resultMPI);

echo '<iframe src="'.$respuestaMPI->redirectURL.'" height="400" width="600" title="Iframe Example"></iframe>';
 ?>




</body>
</html>
