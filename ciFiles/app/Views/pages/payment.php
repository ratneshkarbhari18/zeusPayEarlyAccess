<script src="https://checkout.razorpay.com/v1/checkout.js"></script> 
<?php

use PhpParser\Node\Stmt\Echo_;

$payment_data = json_decode($order_data["payment_data"],TRUE); 
$customer_data = json_decode($order_data["customer_data"],TRUE); ?> 
<main role="main" class="page-content">
    
    <div class="container">
        <h4 class="text-center text-success" id="successNotif"></h4>
        <h4 id="failureNotif" class="text-center text-danger"></h4>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body"> 
                        <h3>Payment Data</h3><h6><strong>Amount:</strong> <?php echo $order_data["currency"].''.$order_data["amount"]; ?></h6><h6><strong>Purpose:</strong> <?php echo $payment_data["purpose"]; ?></h6></div></div><br><br><div class="card"><div class="card-body"><h3>Your Data</h3>
                        <?php $customerData = json_decode($order_data["customer_data"],TRUE) ?>
                        <h6><strong>Full Name:</strong> <?php echo $customerData["first_name"].' '.$customerData["last_name"]; ?></h6>
                        <h6><stro ng>Email:</strong> <?php echo $customerData["email"]; ?></h6>
                        <h6><strong>Contact Number: </strong> <?php echo $customerData["mobile_number"]; ?></h6>
                        <h6><strong>City: </strong> <?php echo $customerData["city"]; ?></h6>
                        <h6><strong>State: </strong> <?php echo $customerData["state"]; ?></h6>
                        <h6><strong>Country: </strong> <?php echo $customerData["country"]; ?></h6>
                        <?php if($customerData["bname"]!=""): ?>
                        <h6><strong> Business Name: </strong> <?php echo $customerData["bname"]; ?></h6>
                        <?php endif; ?> <?php if($customerData["gstin"]!=""): ?>
                        <h6><strong> GSTIN: </strong> <?php echo $customerData["gstin"]; ?></h6>
                        <?php endif; ?></div></div>
                        <button id="makePayment" style="margin-top: 2em;" class="btn btn-success btn-block">Pay Now</button></div>
                        <div class="col-lg-4 col-md-12 col-sm-12"></div>
                    </div>
                </div> 
            </div> 
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
        </div>
    </div>


<style>
header,footer{
    display: none;
}
</style>
<script>

    var options={"key":"rzp_live_YwbymiPwYhjXJX",
    "amount":"<?php echo $payment_data["amount"]*100; ?>",
    "currency":"<?php echo $order_data["currency"]; ?>","name":"<?php echo $user["bname"]; ?>",
    "description":"<?php echo $payment_data["purpose"]; ?>",
    "image":"<?php echo site_url("assets/images/logos/".$user["logo"]); ?>",
    // "order_id":"<?php echo $order_data["id"]; ?>",
    "handler":function(response){
            let status = "success";
            let gwTxId = response.razorpay_payment_id;
            let txId = '<?php echo $tx_data["public_id"]; ?>';
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("update-transaction-exe"); ?>",
                data: {
                    "status" : status,
                    "gw_tx_id" : gwTxId,
                    "txId" : txId,
                    "invId" : '<?php echo $order_data["id"]; ?>'
                },
                success: function (response) {
                    window.location.replace("<?php echo site_url("transaction-successful?transaction_id=".$tx_data["public_id"]."&amount=".$tx_data["currency"]."".$tx_data["amount"]); ?>");
                }
            });
        },
        "prefill":{"name":"<?php echo $customer_data["first_name"].' '.$customer_data["last_name"]; ?>",
        "email":"<?php echo $customer_data["email"]; ?>",
        "contact":"<?php echo $customer_data["mobile_number"]; ?>"},
        "notes":{"address":"Razorpay Corporate Office"},"theme":{"color":"#3399cc"}};
        var rzp1=new Razorpay(options);rzp1.on('payment.failed',function(response){
            let status = "failure";
            let gwTxId = response.error.metadata.payment_id;
            let txId = '<?php echo $tx_data["public_id"]; ?>';
            $.ajax({
                type: "POST",
                url: "<?php echo site_url("update-transaction-exe"); ?>",
                data: {
                    "status" : status,
                    "gw_tx_id" : gwTxId,
                    "txId" : txId,
                    "invId" : '<?php echo $order_data["id"]; ?>'
                },
                success: function (response) {                    
                    window.location.replace("<?php echo site_url("transaction-failed?transaction_id=".$tx_data["public_id"]."&amount=".$tx_data["currency"]." ".$tx_data["amount"]); ?>");
                }
            });
        });
        $("button#makePayment").click(function(e){
            e.preventDefault();rzp1.open();}
        );
</script>