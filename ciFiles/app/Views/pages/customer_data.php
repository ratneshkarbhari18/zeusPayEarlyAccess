
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">

    <div class="container">
        <h1 class="page-title"><?php echo $title; ?></h1>
        <a href="<?php echo site_url("create-invoice?customer=".$customer_data["public_id"]); ?>" class="btn-primary action-button btn">+ Invoice</a>
        <a href="<?php echo site_url("edit-customer/".$customer_data["public_id"]); ?>" class="btn-secondary action-button btn">Edit</a>
        <form action="<?php echo site_url("delete-customer"); ?>" method="POST" class="d-inline">
            <input type="hidden" name="id" value="<?php echo $customer_data["id"]; ?>">
            <button type="submit" class="btn btn-danger action-button">Delete</button>
        </form>    

        <h2>Customer Data</h2>

        <h6><strong>Full Name:</strong> <?php echo $customer_data["first_name"].' '.$customer_data["last_name"]; ?></h6>
        <h6><strong>Email:</strong> <?php  echo $customer_data["email"]; ?></h6>
        <h6><strong>Contact Number: </strong> <?php  echo $customer_data["mobile_number"]; ?></h6>
        <h6><strong>City: </strong> <?php  echo $customer_data["city"]; ?></h6>
        <h6><strong>State: </strong> <?php  echo $customer_data["state"]; ?></h6>
        <h6><strong>Country: </strong> <?php  echo $customer_data["country"]; ?></h6>
        <h6><strong> Business  Name: </strong> <?php  echo $customer_data["bname"]; ?></h6>
        <h6><strong> GSTIN: </strong> <?php  echo $customer_data["gstin"]; ?></h6>
    </div>

</main>