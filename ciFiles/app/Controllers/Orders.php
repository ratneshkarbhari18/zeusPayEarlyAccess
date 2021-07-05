<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\AuthModel;

class Orders extends BaseController
{

    public function create_api()
    {

        $headers = apache_request_headers();

        $apiKey = $headers["apiKey"];

        $authModel = new AuthModel();

        $userData = $authModel->where("apiKey",$apiKey)->first();

        if ($userData) {

            $customerData = array(
                "first_name" => $this->request->getPost("first_name"),
                "last_name" => $this->request->getPost("last_name"),
                "email" => $this->request->getPost("email"),
                "mobile_number" => $this->request->getPost("contact_number"),
                "bname" => $this->request->getPost("b_name"),
                "gstin" => $this->request->getPost("gstin"),
                "city" => $this->request->getPost("city"),
                "state" => $this->request->getPost("state"),
                "country" => $this->request->getPost("country"),
            );  

            if ($this->request->getPost("purpose")==NULL) {
                return json_encode(array(
                    "status" => "failure",
                    "reason" => "Please send the purpose (product / service delivered for this payment) "
                ));
            }
    
            $paymentData = array(
                "purpose" => $this->request->getPost("purpose"),
                "amount" => $this->request->getPost("amount"),
                "currency" => $this->request->getPost("currency"),
                "client_tx_id" => $this->request->getPost("client_tx_id"),
            );
    
            $date = date("d-m-Y");
            
            if ($this->request->getPost("merchant_redirect_url")==""||$this->request->getPost("merchant_redirect_url")==NULL) {
                $merchant_redirect_url = "";
            } else {
                $merchant_redirect_url = $this->request->getPost("merchant_redirect_url");
            }
            

            $pubid = uniqid();
            $dataToInsert = array(
                "public_id" => $pubid,
                "customer_data" => json_encode($customerData),
                "payment_data" => json_encode($paymentData),
                "date" => $date,
                "amount" => $this->request->getPost("amount"),
                "currency" => $this->request->getPost("currency"),
                "merchant_redirect_url" =>  $merchant_redirect_url,
                "status" => "created",
                "user" => $userData["id"]
            );
    
            $orderModel = new OrderModel();
    
            $created = $orderModel->insert($dataToInsert);
    
            if ($created) {
                return json_encode(array(
                    "status" => "success",
                    "orderId" => $pubid
                    // "paymentUrl" => site_url("payment/".$pubid)
                ));
            } else {

                return json_encode(array(
                    "status" => "failure",
                    "reason" => "We are facing technical issues try later"
                ));
                
            }
            
        } else {
            
            return json_encode(array(
                "status" => "failure",
                "reason" => "API Key incorrect"
            ));
            
        }

    }

}