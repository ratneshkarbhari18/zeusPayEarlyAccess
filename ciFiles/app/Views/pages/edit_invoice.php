<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>


        <form action="<?php echo site_url("update-invoice-exe"); ?>" method="post">

            <input type="hidden" name="id" value="<?php echo $invoice["id"]; ?>">
            <input type="hidden" name="public_id" value="<?php echo $invoice["public_id"]; ?>">

            <h6>Customer Data</h6>

            <?php if(!empty($customer)): ?>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input value="<?php echo $customer["first_name"]; ?>" class="form-control" required type="text" name="first_name" id="first_name">    
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input value="<?php echo $customer["last_name"]; ?>" class="form-control" required type="text" name="last_name" id="last_name">    
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="<?php echo $customer["email"]; ?>" class="form-control" required type="email" name="email" id="email">    
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input value="<?php echo $customer["mobile_number"]; ?>" class="form-control" required type="text" name="contact_number" id="contact_number">    
            </div>
            <div class="form-group">
                <label for="b_name">Business Name</label>
                <input value="<?php echo $customer["bname"]; ?>" class="form-control" type="text" name="b_name" id="b_name">    
            </div>
            <div class="form-group">
                <label for="gstin">GSTIN</label>
                <input value="<?php echo $customer["gstin"]; ?>" class="form-control" type="text" name="gstin" id="gstin">    
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input value="<?php echo $customer["city"]; ?>" class="form-control" required type="text" placeholder="City, Country" name="city" id="city">    
            </div>
            <div class="form-group">
                <label for="state">City</label>
                <input value="<?php echo $customer["state"]; ?>" class="form-control" required type="text" placeholder="City, Country" name="state" id="state">    
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input value="<?php echo $customer["country"]; ?>" class="form-control" required type="text" placeholder="City, Country" name="country" id="country">    
            </div>

            <?php else: ?>
                
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control" required type="text" name="first_name" id="first_name">    
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control" required type="text" name="last_name" id="last_name">    
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" required type="email" name="email" id="email">    
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input class="form-control" required type="text" name="contact_number" id="contact_number">    
            </div>
            <div class="form-group">
                <label for="b_name">Business Name</label>
                <input class="form-control" type="text" name="b_name" id="b_name">    
            </div>
            <div class="form-group">
                <label for="gstin">GSTIN</label>
                <input class="form-control" type="text" name="gstin" id="gstin">    
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input class="form-control" required type="text" name="city" id="city">    
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input class="form-control" required type="text" name="state" id="state">    
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input class="form-control" required type="text" name="country" id="country">    
            </div>
                
            <?php endif; ?>

            <h6>Payment Data</h6>
            <div class="form-group">
                <label for="product_service">Product / Service</label>
                <input required class="form-control" value="<?php echo $payment["product_service"]; ?>" required type="text" name="product_service" id="product_service">    
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input required class="form-control" value="<?php echo $payment["amount"]; ?>" required type="text" name="amount" id="amount">    
            </div>
            <div class="form-group">
                <label for="currency">Currency</label>
                <select name="currency" id="currency" class="form-control">
                    <option value="INR" <?php if($payment["currency"]=="INR"){echo "selected";} ?>>INR</option>
                    <option value="USD" <?php if($payment["currency"]=="USD"){echo "selected";} ?>>USD</option>
                    <option value="GBP" <?php if($payment["currency"]=="GBP"){echo "selected";} ?>>GBP</option>
                    <option value="EUR" <?php if($payment["currency"]=="EUR"){echo "selected";} ?>>EUR</option>
                </select>
            </div>
            <div class="form-group">
                <label for="validity">Validity (In format dd-mm-yyyy)</label>
                <input required class="form-control" value="<?php echo $invoice["validity"]; ?>" required type="text" name="validity" id="validity">    
            </div>
            <button type="submit" class="btn btn-success">Update Invoice</button>
            
        
        </form>

    </div>
</main>