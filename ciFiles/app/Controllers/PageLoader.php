<?php

namespace App\Controllers;

require_once './vendor/autoload.php'; 
require './ciFiles/app/Controllers/RazorPay.php';
// require './ciFiles/app/Controllers/RazorPayTest.php';

use App\Models\CustomerModel;
use App\Models\InvoiceModel;
use App\Models\AuthModel;
use App\Controllers\Transactions;
use App\Models\OrderModel;
use App\Models\TransactionModel;

class PageLoader extends BaseController
{
	private function page_loader($viewName,$data)
	{
		echo view("templates/header",$data);
		echo view("pages/".$viewName,$data);
		echo view("templates/footer",$data);
	}

	public function change_password($success="",$error=""){
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$data = array(
			"title" => "Change Password",
			"success" => $success,
			"error" => $error
		);
		$this->page_loader("change_password",$data);
	}

	public function register($error="")
	{
		$session = session();
		if($session->role=="mgt"){
            return redirect()->to(site_url("mgt-dashboard"));
        }elseif($session->role=="user"){
            return redirect()->to(site_url("/"));
        }
		$data = array(
			"title" => "Register",
			"error" => $error
		);
		$this->page_loader("register",$data);
	}

	public function login($error=""){
		$session = session();
		if($session->role=="mgt"){
            return redirect()->to(site_url("mgt-dashboard"));
        }elseif($session->role=="user"){
            return redirect()->to(site_url("/"));
        }
		$data = array(
			"title" => "Login",
			"error" => $error
		);
		$this->page_loader("login",$data);
	}


	public function settlement()
	{
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$transactionModel = new TransactionModel();
		$successfulTransactions = $transactionModel->where("status","success")->where("settled","no")->where("user",session("id"))->findAll();
		$unsettledAmount = 0.00;
		foreach ($successfulTransactions as $susTran) {
			$unsettledAmount+=$susTran["amount_usd"];
		}
		$data = array(
			"title" => "Settlement",
			"unsettled_amount" => $unsettledAmount,
			"successful_transactions" => $successfulTransactions
		);
		$this->page_loader("settlement",$data);
	}

	public function dashboard(){
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
			
		$data = array(
			"title" => "Dashboard"
		);
		$this->page_loader("dashboard",$data);
			
		
	}

	public function manage_customers($success="",$error=""){
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$customerModel = new CustomerModel();
		$data = array(
			"title" => "Manage Customers",
			"customers" => $customerModel->where("user",$session->id)->paginate(10),
			"success" => $success,
			"error" => $error
		);
		$this->page_loader("manage_customers",$data);
	}
	
	public function add_customer($success="",$error=""){
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$data = array(
			"title" => "Add Customer",
			"success" => $success,
			"error" => $error
		);
		$this->page_loader("add_customer",$data);
	}	

	public function manage_invoices($success="",$error=""){
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$invoiceModel = new InvoiceModel();
		$invoices = $invoiceModel->where("user",$session->id)->paginate(10);
		$data = array(
			"title" => "Invoices",
			"success" => $success,
			"error" => $error,
			"invoices" => $invoices
		);
		$this->page_loader("manage_invoices",$data);
	}

	public function invoice_details($public_id){
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$invoiceModel = new InvoiceModel();
		$invoice = $invoiceModel->where("public_id",$public_id)->first();
		$data = array(
			"title" => "Invoice Details",
			"invoice" => $invoice
		);
		$this->page_loader("invoice_details",$data);
	}

	public function edit_invoice($uid,$success="",$error="")
	{
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$invoiceModel = new InvoiceModel();
		$invDetails = $invoiceModel->where("public_id",$uid)->first();
		$data = array(
			"title" => "Edit Invoice",
			"success" => $success,
			"error" => $error,
			"invoice"=> $invDetails,
			"customer" => json_decode($invDetails["customer_data"],TRUE),
			"payment" => json_decode($invDetails["payment_data"],TRUE),
		);
		$this->page_loader("edit_invoice",$data);
	}

	public function tx_details($public_id){
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$transactionModel = new TransactionModel();
		$txdata = $transactionModel->where("public_id",$public_id)->first();
		$data = array(
			"title" => "Transaction Details",
			"transaction" => $txdata
		);
		$this->page_loader("txDetails",$data);
	}

	public function settingsPage($success="",$error=""){

		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}

		$authModel = new AuthModel();
		$userData = $authModel->find(session("id"));

		$data = array(
			"title" => "Settings",
			"success" => $success,
			"error" => $error,
			"apiKey" => $userData["apiKey"]
		);

		$this->page_loader("settingsPage",$data);


	}

	public function change_email($success="",$error="")
	{
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$data = array(
			"title" => "Change Email",
			"success" => $success,
			"error" => $error
		);
		$this->page_loader("change_email",$data);
	}

	public function invoice_payment($uid){
		$invoiceModel = new InvoiceModel();
		$authModel = new AuthModel();
		$invoice = $invoiceModel->where("public_id",$uid)->first();
		$user = $authModel->find($invoice["user"]);
		$transactions = new Transactions();

		$order_invoice = "invoice";

		$invoice["order_invoice"] = $order_invoice;

		$txdata = $transactions->create($invoice);

		$razorPay = new Razorpay(); 

		$order = $razorPay->create_order($invoice);

		$data = array(
			"title" => "Payment",
			"invoice" => $invoice,
			"order" => $order,
			"user" => $user,
			"tx_data" => $txdata
		);
			
		$this->page_loader("inv_payment",$data); 	
		
	}

	public function payment($uid){
		$orderModel = new OrderModel();
		$authModel = new AuthModel();
		$orderData = $orderModel->where("public_id",$uid)->first();
		
		$user = $authModel->find($orderData["user"]);
		$transactions = new Transactions();

		$order_invoice = "order";

		$orderData["order_invoice"] = $order_invoice;

		$txdata = $transactions->create($orderData);

		$razorPay = new Razorpay(); 

		$order = $razorPay->create_order($orderData);

		$data = array(
			"title" => "Payment",
			"order_data" => $orderData,
			"order" => $order,
			"user" => $user,
			"tx_data" => $txdata
		);
			
		$this->page_loader("payment",$data); 	
		
	}

	public function transactions(){
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$transactionModel = new TransactionModel();
		$session = session();
		$data = array(
			"title" => "Transactions",
			"transactions" => $transactionModel->where("user", $session->id)->orderBy("id",'DESC')->findAll("50",0),
		);
		$this->page_loader("transactions",$data);
	}

	public function edit_customer($uid,$success="",$error=""){
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$customerModel = new CustomerModel();
		$customerData = $customerModel->where("public_id",$uid)->first();
		$data = array(
			"title" => "Edit Customer Data",
			"customer" => $customerData,"success"=>$success,"error"=>$error
		);
		$this->page_loader("edit_customer",$data);
	}

	public function customer_details($uid){
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		$customerModel = new CustomerModel();
		$customerData = $customerModel->where("public_id",$uid)->first();
		$data = array(
			"title" => "Customer Data",
			"customer_data" => $customerData
		);
		$this->page_loader("customer_data",$data);
	}

	public function create_invoice($success="",$error="")
	{
		$session = session();
		$role = $session->role;
		if ($role!="user") {                    
			return redirect()->to(site_url("login"));
		}
		if(!isset($_GET["customer"])){
			$customerData = array();
		}else {
			$customerPublicId = $_GET["customer"];
			$customerModel = new CustomerModel();
			$customerData = $customerModel->where("public_id",$customerPublicId)->first();
		}
		$data = array(
			"title" => "Create Invoice",
			"success" => $success,
			"error" => $error,
			"customer" => $customerData
		);
		$this->page_loader("create_invoice",$data);
	}
}
