<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Controllers\PageLoader;

class Customers extends BaseController
{

    public function create()
    {
        $session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
        $dataToInsert = array(
            "first_name" => $this->request->getPost("first_name"),
            "public_id" => uniqid(),
            "last_name" => $this->request->getPost("last_name"),
            "email" => $this->request->getPost("email"),
            "mobile_number" => $this->request->getPost("contact_number"),
            "bname" => $this->request->getPost("b_name"),
            "gstin" => $this->request->getPost("gstin"),
            "city" => $this->request->getPost("city"),
            "state" => $this->request->getPost("state"),
            "country" => $this->request->getPost("country"),            
            "user" => $session->id,
        );     
        $customerModel = new CustomerModel();
        $pageLoader = new PageLoader();
        $created = $customerModel->insert($dataToInsert);
        if ($created) {
            $pageLoader->add_customer("Customer Created","");
        } else {
            $pageLoader->add_customer("","Customer not created");
        }
    }

    public function update()
    {
        $session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
        $customerId = $this->request->getPost("id");
        $dataToInsert = array(
            "first_name" => $this->request->getPost("first_name"),
            "last_name" => $this->request->getPost("last_name"),
            "email" => $this->request->getPost("email"),
            "mobile_number" => $this->request->getPost("contact_number"),
            "bname" => $this->request->getPost("b_name"),
            "gstin" => $this->request->getPost("gstin"),
            "city" => $this->request->getPost("city"),
            "country" => $this->request->getPost("country"),
        );     
        $customerModel = new CustomerModel();
        $pageLoader = new PageLoader();
        $updated = $customerModel->update($customerId,$dataToInsert);
        if ($updated) {
            $pageLoader->edit_customer($this->request->getPost("public_id"),"Customer updated","");
        } else {
            $pageLoader->edit_customer($this->request->getPost("public_id"),"","Customer not updated");
        }
    }

    public function delete()
    {
        $session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
        $customerId = $this->request->getPost("id");
        $customerModel = new CustomerModel();
        $pageLoader = new PageLoader();
        $deleted = $customerModel->delete($customerId);
        if ($deleted) {
            $pageLoader->manage_customers("Customer deleted","");
        } else {
            $pageLoader->manage_customers("","Customer not deleted");
        }
    }

}