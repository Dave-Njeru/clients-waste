<?php
$phone_number = $amount = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone_number = test_input($_POST['mpesa-no']);
    $amount = test_input($_POST['amount']);
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

//Intialize variables
$consumer_key = 'lppATNuMJckEDFnKQMCF6CZ1rSAEDGEr';
$consumer_secret = 'Z8xp5YujRaelMVgm';
$Business_code = '174379';
$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$timestamp = date("Ymdhis");
$Transaction_type = "CustomerPayBillOnline";
$callBackURL = 'https://mydomain.com/path';
$accountReference = "WasteLTD";
$transactionDesc = "Payment of waste collection";
$OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$password = base64_encode($Business_code . $Passkey . $timestamp);

//generate authenication token

$curl_Tranfer = curl_init();
curl_setopt($curl_Tranfer, CURLOPT_URL, $Token_URL);
$credentials = base64_encode($consumer_key . ':' . $consumer_secret);
curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
curl_setopt($curl_Tranfer, CURLOPT_HEADER, false);
curl_setopt($curl_Tranfer, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_Tranfer, CURLOPT_SSL_VERIFYPEER, false);
$curl_Tranfer_response = curl_exec($curl_Tranfer);

$token = json_decode($curl_Tranfer_response)->access_token;

//Intiate STK Push
$curl_Tranfer2 = curl_init();
curl_setopt($curl_Tranfer2, CURLOPT_URL, $OnlinePayment);
curl_setopt($curl_Tranfer2, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));

$curl_Tranfer2_post_data = [
    'BusinessShortCode' => $Business_code,
    'Password' => $password,
    'Timestamp' => $timestamp,
    'TransactionType' => $Transaction_type,
    'Amount' => $amount,
    'PartyA' => $phone_number,
    'PartyB' => $Business_code,
    'PhoneNumber' => $phone_number,
    'CallBackURL' => $callBackURL,
    'AccountReference' => $accountReference,
    'TransactionDesc' => $transactionDesc,
];

$data2_string = json_encode($curl_Tranfer2_post_data);

curl_setopt($curl_Tranfer2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_Tranfer2, CURLOPT_POST, true);
curl_setopt($curl_Tranfer2, CURLOPT_POSTFIELDS, $data2_string);
curl_setopt($curl_Tranfer2, CURLOPT_HEADER, false);
curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYHOST, 0);
$curl_Tranfer2_response = json_decode(curl_exec($curl_Tranfer2));

echo json_encode($curl_Tranfer2_response, JSON_PRETTY_PRINT);

?>

<!--view-->
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment processing</title>
</head>

<body>
    <form class="contact2-form validate-form" action="#" method="post">
        <input type="hidden" name="Check_request_ID" value="<?php echo $curl_Tranfer2_response->Check_request_ID ?>">
        </br></br>
        <button class="contact2-form-btn" style="margin-bottom: 30px;">Confirm Payment is Complete</button>
    </form>
</body>

</html>