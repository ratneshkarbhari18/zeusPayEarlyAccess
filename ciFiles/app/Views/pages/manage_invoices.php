<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>

        <a href="<?php echo site_url('create-invoice'); ?>" class="btn btn-success">+ Invoice</a>


        <div class="items-container">
        
        
            <?php if(count($invoices)>0): ?>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td style="font-size: 1.2rem; font-weight: 500;">Id</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Amount</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Status</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Link</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Customer</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($invoices as $invoice): ?>
                            <tr>
                                <td><?php echo $invoice["public_id"]; ?></td>
                                <td><?php echo $invoice["currency"].' '.$invoice["amount"]; ?></td>
                                <td><?php echo str_replace('_',' ',$invoice["status"]); ?></td>
                                <td><?php echo site_url("invoice-payment/".$invoice["public_id"]); ?></td>
                                <td><?php $customerData = json_decode($invoice["customer_data"],TRUE); echo $customerData["first_name"].' '.$customerData["last_name"].'<br>'.$customerData["bname"]; ?></td>
                                <td>
                                    <!-- <a href="<?php echo site_url("send-invoice/".$invoice["public_id"]); ?>" class="btn btn-success action-button">Send</a> -->
                                    <a href="<?php echo site_url("invoice/".$invoice["public_id"]); ?>" class="btn btn-primary action-button">Details</a>
                                    <a href="<?php echo site_url("edit-invoice/".$invoice["public_id"]); ?>" class="btn btn-secondary action-button">Edit</a>
                                    <form action="<?php echo site_url("delete-invoice"); ?>" method="POST" class="d-inline">
                                        <input type="hidden" name="id" value="<?php echo $invoice["id"]; ?>">
                                        <button type="submit" class="btn btn-danger action-button">Delete</button>
                                    </form>  
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>

                <h6>No Invoices Added</h6>

            <?php endif; ?>

        </div>


    </div>
</main>