<?php

namespace App\Controllers;
use App\Models\TransactionModel;
use App\Models\InvoiceModel;

class Transactions extends BaseController
{

    public function create($dataBox){  
        
        $payment_data = json_decode($dataBox["payment_data"],TRUE); 
        $customer_data = json_decode($dataBox["customer_data"],TRUE);

        if ($dataBox["order_invoice"] == "order") {
            $orderId = $dataBox["public_id"];
            $invoice = "";
        } else {
            $invoice = $dataBox["public_id"];
            $orderId = "";
            $payment_data["client_tx_id"] = "";
        }
        
        $inrConversionFactors = array(
            "USD" => 73.53,
            "GBP" => 103.02,
            "INR" => 1.00,
            "EUR" => 88.35
        );

        $dataToInsert = array(
            "first_name" => $customer_data["first_name"],
            "last_name" => $customer_data["last_name"],
            "email" => $customer_data["email"],
            "city" => $customer_data["city"],
            "state" => $customer_data["state"],
            "country" => $customer_data["country"],
            "date" => date("d-m-Y"),
            "time" => date("H:i A"),
            "status" => "processing",
            "phone" => $customer_data["mobile_number"],
            "public_id" => uniqid(),
            "amount" => $payment_data["amount"],
            "amount_inr" => $inrConversionFactors[$payment_data["currency"]]*$payment_data["amount"],
            "currency" => $payment_data["currency"],
            "client_tx_id" => $payment_data["client_tx_id"],
            "gw_tx_id" => "",
            "invoice" => $invoice,
            "orderId" => $orderId,
            "user" => $dataBox["user"],
            "settled" => "no"
        );

        $transactionModel = new TransactionModel();

        $done =  $transactionModel->insert($dataToInsert);

        if($done){
            return $dataToInsert;
        }else {
            exit();
        }
        
    }

    public function fetchTx(){
        $requestingUser = $this->request->getPost("requestingUser");
        $limit = $this->request->getPost("limit");
        $offset = $this->request->getPost("offset");
        $transactionModel = new TransactionModel();
        $session = session();
        if ($session->id==$requestingUser) {
            $transactions = $transactionModel->where("user", $session->id)->orderBy("id",'DESC')->findAll($limit,$offset);
            $txString = "";
            foreach ($transactions as $transaction) {
                $txString.='<tr>
                <td>'.$transaction["public_id"].'</td>
                <td>'.$transaction["date"].'</td>
                <td>'.$transaction["amount"].' '.$transaction["currency"].'</td>
                <td>'.$transaction["status"].'</td>
                <td>
                    <a href="'.site_url("transaction-details/".$transaction["public_id"]).'" class="btn btn-secondary">Details</a>
                </td>
            </tr>';
            }
            return $txString;
        } else {
            return 'nothing-found';
        }        
    }



    public function update_status(){
        $status = $this->request->getPost("status");
        $gwTxId = $this->request->getPost("gw_tx_id");
        $txId = $this->request->getPost("txId");
        $invId = $this->request->getPost("invId");
        $transactionModel = new TransactionModel();
        $transaction = $transactionModel->where("public_id",$txId)->first();
        $updateData = array(
            "status" => $status,
            "gw_tx_id" => $gwTxId
        );
        $transaction_updated = $transactionModel->update($transaction["id"],$updateData);
        $invoiceModel = new InvoiceModel();
        if($status=="success"){
            $dataToUpdate = array(
                "status" => "paid"
            );
            $invoiceModel->update($invId,$dataToUpdate);
        }elseif ($status=="failure") {
            $dataToUpdate = array(
                "status" => "payment_failed"
            );
            $invoiceModel->update($invId,$dataToUpdate);
        }
        if ($transaction_updated) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



}