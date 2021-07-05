<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>


        <form action="<?php echo site_url("create-invoice-exe"); ?>" method="post">

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
                <input value="<?php echo $customer["city"]; ?>" class="form-control" required type="text" name="city" id="city">    
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input value="<?php echo $customer["state"]; ?>" class="form-control" required type="text" name="state" id="state">    
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input value="<?php echo $customer["country"]; ?>" name="country" id="country" class="form-control" type="text">   
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
                <label for="country">Country</label>
                <input class="form-control" required type="text" name="country" id="country">    
            </div>
            
                
            <?php endif; ?>

            <h6>Payment Data</h6>
            <div class="form-group">
                <label for="product_service">Product / Service</label>
                <input required class="form-control" required type="text" name="product_service" id="product_service">    
            </div>
            <span id="actualAmount"></span>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input required class="form-control" id="amountField" required type="text" name="amount" id="amount">    
            </div>
            
            <div class="form-group">
                <label for="currency">Currency</label>
                <select name="currency" id="currency" class="form-control">
                    <option value="INR">INR</option>
                    <option value="USD">USD</option>
                    <option value="GBP">GBP</option>
                    <option value="EUR">EUR</option>
                </select>
            </div>
            <script>
                $("input#amountField,select#currency").change(function (e) { 
                    e.preventDefault();
                    let amountYouGet = 0.93*($("input#amountField").val());
                    let currency = $("select#currency").val();
                    $("span#actualAmount").html('Amount you Get: '+ currency +' '+ amountYouGet);
                });
            </script>
            <div class="form-group">
                <label for="validity">Validity (In format dd-mm-yyyy)</label>
                <input required class="form-control" required type="text" name="validity" id="validity">    
            </div>
            <button type="submit" class="btn btn-success">Create Invoice</button>
            
        
        </form>

    </div>
</main>