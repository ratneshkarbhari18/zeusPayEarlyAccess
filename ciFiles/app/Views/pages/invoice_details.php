
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">

<div class="container">
    <h1 class="page-title"><?php echo $title; ?></h1>
    <a href="<?php echo site_url("edit-invoice/".$invoice["public_id"]); ?>" class="btn-secondary action-button btn">Edit</a>
    <form action="<?php echo site_url("delete-invoice"); ?>" method="POST" class="d-inline">
        <input type="hidden" name="id" value="<?php echo $invoice["id"]; ?>">
        <button type="submit" class="btn btn-danger action-button">Delete</button>
    </form>    

    
    <h3>Payment Data</h3>

    <h6><strong>Amount:</strong> <?php  echo $invoice["currency"].' '.$invoice["amount"]; ?></h6>
    <h6><strong>Status:</strong> <?php  echo ucfirst(str_replace('_',' ',$invoice["status"])); ?></h6>
    <h6><strong>Validity:</strong> <?php  echo ucfirst($invoice["validity"]); ?></h6>

    <br><br>

    <h3>Customer Data</h3>

    <?php $customerData = json_decode($invoice["customer_data"],TRUE) ?>

    <h6><strong>Full Name:</strong> <?php echo $customerData["first_name"].' '.$customerData["last_name"]; ?></h6>
    <h6><strong>Email:</strong> <?php  echo $customerData["email"]; ?></h6>
    <h6><strong>Contact Number: </strong> <?php  echo $customerData["mobile_number"]; ?></h6>
    <h6><strong>City: </strong> <?php  echo $customerData["city"]; ?></h6>
    <h6><strong>State: </strong> <?php  echo $customerData["state"]; ?></h6>
    <h6><strong>County: </strong> <?php  echo $customerData["country"]; ?></h6>
    <h6><strong> Business  Name: </strong> <?php  echo $customerData["bname"]; ?></h6>
    <h6><strong> GSTIN: </strong> <?php  echo $customerData["gstin"]; ?></h6>
</div>

</main>