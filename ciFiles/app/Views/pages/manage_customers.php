<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>

        <a href="<?php echo site_url('add-customer'); ?>" class="btn btn-success">+ Customer</a>


        <div class="items-container">
        
        
            <?php if(count($customers)>0): ?>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td style="font-size: 1.2rem; font-weight: 500;">Name</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Email</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Mobile Number</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Location</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($customers as $customer): ?>
                            <tr>
                                <td><?php echo $customer["first_name"].' ',$customer["last_name"]; ?></td>
                                <td><?php echo $customer["email"]; ?></td>
                                <td><?php echo $customer["mobile_number"]; ?></td>
                                <td><?php echo $customer["city"].', '.$customer["state"].', '.$customer["country"]; ?></td>
                                <td>
                                    <a href="<?php echo site_url("create-invoice?customer=".$customer["public_id"]); ?>" class="btn-primary action-button btn">+ Invoice</a>
                                    <a href="<?php echo site_url("customer-details/".$customer["public_id"]); ?>" class="btn-secondary action-button btn">Details</a>
                                    <form action="<?php echo site_url("delete-customer"); ?>" method="POST" class="d-inline">
                                        <input type="hidden" name="id" value="<?php echo $customer["id"]; ?>">
                                        <button type="submit" class="btn btn-danger action-button">Delete</button>
                                    </form>                                    
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>

                <h6>No Customers Added</h6>

            <?php endif; ?>

        </div>


    </div>
</main>