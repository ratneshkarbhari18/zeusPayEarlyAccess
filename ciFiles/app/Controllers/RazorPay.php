<?php
namespace App\Controllers;

require_once './vendor/autoload.php'; 

use Razorpay\Api\Api;

class Razorpay extends BaseController
{

    private $keyId = "rzp_live_YwbymiPwYhjXJX";
    private $keySecret = "6NyqzGKJxtEOtlpQcotAPnfO";

    public function create_order($invoice){

        $api = new Api($this->keyId, $this->keySecret);
        $order  = $api->order->create(array('receipt' => rand(100000,99999), 'amount' => (json_decode($invoice["payment_data"],TRUE)["amount"]*100), 'currency' => json_decode($invoice["payment_data"],TRUE)["currency"])); // Creates order

        return $order;

    }

}