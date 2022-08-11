
<?php

require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken("TEST-3388107613062044-081019-44526e3a70b4632c9e28013168d35dca-341711745");

$payment = new MercadoPago\Payment();
$payment->transaction_amount = 100;
$payment->description = "Título do produto";
$payment->payment_method_id = "pix";
$payment->payer = array(
    "email" => "test@test.com",
    "first_name" => "Test",
    "last_name" => "User",
    "identification" => array(
        "type" => "CPF",
        "number" => "19119119100"
     ),
    "address"=>  array(
        "zip_code" => "06233200",
        "street_name" => "Av. das Nações Unidas",
        "street_number" => "3003",
        "neighborhood" => "Bonfim",
        "city" => "Osasco",
        "federal_unit" => "SP"
     )
  );

$payment->save();

//echo "<pre>",print_r($payment),"</pre>";
echo "<img style='width: 300px; height: 300px;' src='data:image/png;base64, ".$payment->point_of_interaction->transaction_data->qr_code_base64."' alt='Pix do cliente X'>";

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Display Image</title>
  </head>
  <body>
    <img style='display:block; width:100px;height:100px;' id='base64image'
       src='data:image/jpeg;base64,${qr_code_base64}' />
  </body>
</html>