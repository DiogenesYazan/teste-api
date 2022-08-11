<?php

    $access_token = "TEST-3388107613062044-081019-44526e3a70b4632c9e28013168d35dca-341711745";

    require_once 'vendor/autoload.php';

    MercadoPago\SDK::setAccessToken("$access_token");


    $preference = new MercadoPago\Preference();

    $item = new MercadoPago\Item();
    $item->title = "Teste";
    $item->quantity = 1;
    $item->unit_price = (double)00.01;
    $preference->items = array($item);

    $preference->back_urls = array(
        "success" => "http://localhost/mercadopago/success.php",
        "failure" => "http://localhost/mercadopago/failure.php",
        "pending" => "http://localhost/mercadopago/pending.php"
    );

    $preference->notification_url = "http://localhost/mercadopago/notification.php";
    $preference->external_reference = "4545";
    $preference->save();

    $link = $preference->init_point;

    echo $link;


    //https://www.youtube.com/watch?v=DP0MSOkj4hw&t=226s&ab_channel=LuanAlves
?>