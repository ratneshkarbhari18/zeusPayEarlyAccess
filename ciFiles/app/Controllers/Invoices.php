<?php

namespace App\Controllers;
use App\Models\InvoiceModel;
use App\Controllers\PageLoader;
use App\Models\AuthModel;

class Invoices extends BaseController
{
    public function create()
    {

        $session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}

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

        $paymentData = array(
            "product_service" => $this->request->getPost("product_service"),
            "amount" => $this->request->getPost("amount"),
            "currency" => $this->request->getPost("currency"),
        );

        $date = date("d-m-Y");

        $dataToInsert = array(
            "public_id" => uniqid(),
            "customer_data" => json_encode($customerData),
            "payment_data" => json_encode($paymentData),
            "date" => $date,
            "amount" => $this->request->getPost("amount"),
            "currency" => $this->request->getPost("currency"),
            "validity" =>  $this->request->getPost("validity"),
            "status" => "created",
            "user" => session("id")
        );

        $invoiceModel = new InvoiceModel();
        $pageLoader = new PageLoader();

        $created = $invoiceModel->insert($dataToInsert);

        if ($created) {
            $pageLoader->create_invoice("Invoice created","");
        } else {
            $pageLoader->create_invoice("","Invoice Not created");
        }

    }

    

    public function update()
    {

        $invId = $this->request->getPost("id");

        $session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}

        $customerData = array(
            "first_name" => $this->request->getPost("first_name"),
            "last_name" => $this->request->getPost("last_name"),
            "email" => $this->request->getPost("email"),
            "mobile_number" => $this->request->getPost("contact_number"),
            "bname" => $this->request->getPost("b_name"),
            "gstin" => $this->request->getPost("gstin"),
            "city" => $this->request->getPost("city"),
            "country" => $this->request->getPost("country"),
        );  

        $paymentData = array(
            "product_service" => $this->request->getPost("product_service"),
            "amount" => $this->request->getPost("amount"),
            "currency" => $this->request->getPost("currency"),
        );

        $date = date("d-m-Y");

        $dataToInsert = array(
            "customer_data" => json_encode($customerData),
            "payment_data" => json_encode($paymentData),
            "amount" => $this->request->getPost("amount"),
            "currency" => $this->request->getPost("currency"),
            "validity" =>  $this->request->getPost("validity"),
        );

        $invoiceModel = new InvoiceModel();
        $pageLoader = new PageLoader();

        $updated = $invoiceModel->update($invId,$dataToInsert);

        if ($updated) {
            $pageLoader->edit_invoice($this->request->getPost("public_id"),"Invoice updated","");
        } else {
            $pageLoader->edit_invoice($this->request->getPost("public_id"),"","Invoice Not updated");
        }

    }

    public function status_update(){
        
    }

    public function delete(){
        
        $session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}

        $id = $this->request->getPost("id");
        $invoiceModel = new InvoiceModel();
        $deleted = $invoiceModel->delete($id);

        $pageLoader = new PageLoader();

        if ($deleted) {
            $pageLoader->manage_invoices("Invoice Deleted","");
        } else {
            $pageLoader->manage_invoices("","Invoice Not Deleted");
        }
        

    }

}