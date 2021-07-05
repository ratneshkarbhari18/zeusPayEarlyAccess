
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">

    <div class="container">

        <h4>Transaction Data:</h4>
        

        <p>Customer First Name : <?php echo $transaction["first_name"]; ?></p>
        <p>Customer Last Name : <?php echo $transaction["last_name"]; ?></p>
        <p>Customer Email : <?php echo $transaction["email"]; ?></p>
        <p>Amount : <?php echo  $transaction["currency"].' '.$transaction["amount"]; ?></p>
        <p>Status : <?php echo $transaction["status"]; ?></p>
        <p>Date : <?php echo $transaction["date"]; ?></p>
        <p>City : <?php echo $transaction["city"]; ?></p>
        <p>State : <?php echo $transaction["state"]; ?></p>
        <p>Country : <?php echo $transaction["country"]; ?></p>
    </div>

</main>