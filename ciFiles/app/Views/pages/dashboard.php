<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">

    <div class="container">
        <h1 class="page-title">Welcome <?php $session = session(); echo $session->first_name; ?></h1>

        <div class="row text-center" style="margin: 3% 0;">
        
            <div class="col-lg-4 col-md-6 col-sm-12">
            
                <a href="<?php echo site_url('manage-customers'); ?>">
                    <div class="card custom-card-dashboard">
                    
                        Customers
                    
                    </div>
                </a>
            
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="<?php echo site_url('manage-invoices'); ?>">
                    <div class="card custom-card-dashboard">
                    
                        Invoices
                    
                    </div>
                </a>
            
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
            
                <a href="<?php echo site_url('transactions'); ?>">
                    <div class="card custom-card-dashboard">
                    
                        Transactions
                    
                    </div>
                </a>
            
            </div>
        
        </div>
    </div>

</main>