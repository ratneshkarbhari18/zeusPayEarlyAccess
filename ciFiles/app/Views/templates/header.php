
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title><?php echo $title ?> | easyPay</title>


    <!-- Bootstrap core CSS -->
    <link href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Admin css -->
    <link href="<?php echo site_url('assets/css/app.min.css'); ?>" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <style>
    body{font-size:.875rem}.feather{width:16px;height:16px;vertical-align:text-bottom}.sidebar{position:fixed;top:0;bottom:0;left:0;z-index:100;padding:48px 0 0;box-shadow:inset -1px 0 0 rgba(0,0,0,.1)}@media (max-width:767.98px){.sidebar{top:2rem}}.sidebar-sticky{position:relative;top:0;height:calc(100vh - 48px);padding-top:.5rem;overflow-x:hidden;overflow-y:auto}@supports ((position:-webkit-sticky) or (position:sticky)){.sidebar-sticky{position:-webkit-sticky;position:sticky}}.sidebar .nav-link{font-weight:500;color:#333}.sidebar .nav-link .feather{margin-right:4px;color:#999}.sidebar .nav-link.active{color:#007bff}.sidebar .nav-link.active .feather,.sidebar .nav-link:hover .feather{color:inherit}.sidebar-heading{font-size:.75rem;text-transform:uppercase}.navbar-brand{padding-top:.75rem;padding-bottom:.75rem;font-size:1rem;background-color:rgba(0,0,0,.25);box-shadow:inset -1px 0 0 rgba(0,0,0,.25)}.navbar .navbar-toggler{top:.25rem;right:1rem}.navbar .form-control{padding:.75rem 1rem;border-width:0;border-radius:0}.form-control-dark{color:#fff;background-color:rgba(255,255,255,.1);border-color:rgba(255,255,255,.1)}.form-control-dark:focus{border-color:transparent;box-shadow:0 0 0 3px rgba(255,255,255,.25)}
    </style>
  </head>
  <body>
      <header>
      
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow bg-primary" >
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="<?php echo site_url(); ?>">EasyPay</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 d-none" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3 w-100">
    
    <li class="nav-item text-nowrap d-block w-100 d-sm-block d-md-block d-xl-none d-lg-none">
      <a class="nav-link" style="color: white !important;" href="<?php echo site_url('logout'); ?>">Sign out</a>
    </li>
  </ul>
  <ul class="navbar-nav px-3 d-none d-lg-block d-xl-block">
 
    <li class="nav-item text-nowrap d-block w-100">
      <a class="nav-link" style="color: white !important;" href="<?php echo site_url('logout'); ?>">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link sidebar-link" href="<?php echo site_url('/'); ?>">
                Dashboard 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-link" href="<?php echo site_url('manage-customers'); ?>">
                Customers 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-link" href="<?php echo site_url('manage-invoices'); ?>">
                Invoices
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link sidebar-link" href="<?php echo site_url('transactions'); ?>">
                All Transactions
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link sidebar-link" href="<?php echo site_url('settlement'); ?>">
                Settlement
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link sidebar-link" href="<?php echo site_url('settings'); ?>">
                  Settings
                </a>
            </li>
            
        </ul>

        <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div> -->
    </nav>
      </header>
      <script src="<?php echo site_url("assets/js/jquery.min.js"); ?>"></script>