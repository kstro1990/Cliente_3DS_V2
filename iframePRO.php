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

$url = 'https://3ds-mpi.placetopay.com/api/threeds/v2/sessions';


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $elJson);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json; charset=UTF-8',
  'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNTQ0NmNiOTA1ZTRjNDdiNWU0YTZkY2VkZTk5NzM2ZjFhODdhY2EwZDYzNDY0Y2ZjN2Y3N2RkMDg1MGM5YWNjYjhkYTdlZmRjMzNkNDA5MGEiLCJpYXQiOjE2MDU1NTQ3OTksIm5iZiI6MTYwNTU1NDc5OSwiZXhwIjoxNjM3MDkwNzk5LCJzdWIiOiIzMCIsInNjb3BlcyI6W119.ntZwRaWe8tQBrNSnB1U4Uzb6-nL5e3EzCv0pi0fyv9BTmmQK92YAjxlfzyT1SZVZSPBIQgZs8K-Nt5_EC-FKvyqpW59hDkIVeMK5kQrbebx1LoRo9rK9UlHJTq5z53Rs-3eyizSBKQQhao9pRa0Q2d8zub-m7DnuQJ9eJ9e4yaY'
));
$resultMPI = curl_exec($ch);
$respuestaMPI = json_decode($resultMPI);

echo '<iframe src="'.$respuestaMPI->redirectURL.'" height="200" width="300" title="Iframe Example"></iframe>';
 ?>




</body>
</html>
