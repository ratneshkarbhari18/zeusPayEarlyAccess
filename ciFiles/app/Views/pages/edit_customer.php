<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>


        <form action="<?php echo site_url("update-customer-exe"); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $customer["id"]; ?>">
            <input type="hidden" name="public_id" value="<?php echo $customer["public_id"]; ?>">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input  value="<?php echo $customer["first_name"]; ?>" class="form-control" required type="text" name="first_name" id="first_name">    
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input  value="<?php echo $customer["last_name"]; ?>" class="form-control" required type="text" name="last_name" id="last_name">    
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input  value="<?php echo $customer["email"]; ?>" class="form-control" required type="email" name="email" id="email">    
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input  value="<?php echo $customer["mobile_number"]; ?>" class="form-control" required type="text" name="contact_number" id="contact_number">    
            </div>
            <div class="form-group">
                <label for="b_name">Business Name</label>
                <input  value="<?php echo $customer["bname"]; ?>" class="form-control" type="text" name="b_name" id="b_name">    
            </div>
            <div class="form-group">
                <label for="gstin">GSTIN</label>
                <input  value="<?php echo $customer["gstin"]; ?>" class="form-control" type="text" name="gstin" id="gstin">    
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input  value="<?php echo $customer["city"]; ?>" class="form-control" required type="text" placeholder="City, Country" name="city" id="city">    
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input  value="<?php echo $customer["state"]; ?>" class="form-control" required type="text" name="state" id="state">    
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input  value="<?php echo $customer["country"]; ?>" class="form-control" required type="text" placeholder="City, Country" name="country" id="country">    
            </div>
            <button type="submit" class="btn btn-success">Update Customer</button>
            
        
        </form>

    </div>
</main>