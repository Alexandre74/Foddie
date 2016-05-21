<?

if(isset($_POST["login"])) {
	
	$login = $_POST["login"];
	$password = $_POST["password"];
	
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://foodiebjtu.herokuapp.com/user/login",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n    \"email\": \"$login\",\n    \"password\": \"$password\"\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 0af2fcd0-79e1-cbb9-e861-506f001d8c64"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$result = json_decode($response);

if (json_last_error() === JSON_ERROR_NONE) {
    echo "<script type='text/javascript'>window.location.href='index_user.php';</script>";
}
else {
	echo "invalid login / password";
}
}
?>