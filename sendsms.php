<?php
/*$url='http://api.yamamah.com/SendSMS';
$username='966561613062';
$password = 'Ghazkm123456789';
$msg = 'hello';

$Tagname='0561613062';
$RecepientNumber='00970599266171';
$VariableList='Daoa';
$ReplacementList='Daoa1';

$SendDateTime=0;
$EnableDR=false;


$data = array(
    'Username'      => $username,
    'Password'    => $password,
    'Tagname'       => $Tagname,
    'RecepientNumber' => $RecepientNumber,
    'VariableList'      => $VariableList,
	'ReplacementList'      => $ReplacementList,
	'Message'      => $msg,
	'SendDateTime'      => $SendDateTime,
	'EnableDR'      => $EnableDR
);

$content = json_encode($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);
echo json_encode($json_response);*/
/*
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
echo 'status: '.$status;
if ( $status != 201 ) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}


curl_close($curl);

$response = json_decode($json_response, true);

print_r($response);
*/

$code = '0123456789';
    $randstring = '';
    for ($i = 0; $i < 6; $i++) {
        $randstring = $code[rand(0, strlen($code))];
    }
    echo $randstring;

?>