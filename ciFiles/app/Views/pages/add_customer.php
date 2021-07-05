<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>

        <p class="text-danger"><?php echo $error; ?></p>
    
        <p class="text-success"><?php echo $success; ?></p>


        <form action="<?php echo site_url("create-customer-exe"); ?>" method="post">

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

            <button type="submit" class="btn btn-success">Create Customer</button>
            
        
        </form>

    </div>
</main>