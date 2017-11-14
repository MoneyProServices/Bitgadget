<?php
/**
 * Created by PhpStorm.
 * User: Luis Romero
 * Date: 14/11/2017
 * Time: 2:24 AM
 */
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
$xml = json_decode(file_get_contents("http://localbitcoins.com/sell-bitcoins-online/ve/venezuela/.json"));
$x = 0;
$data = new stdClass();
for ($i = 0 ; $i < 15 ; $i++){
    //echo $xml->data->ad_list[$i]->data->temp_price . '<br>';
    $data->precios[$i] = (float) $xml->data->ad_list[$i]->data->temp_price;
    $x = $x + (float) $xml->data->ad_list[$i]->data->temp_price;
}
$data->total = $x;
$data->promedio = $x/count($data->precios);
echo (json_encode($data));

