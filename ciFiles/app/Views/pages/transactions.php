<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
    
        <h3 class="page-title"><?php echo $title; ?></h3>


        <!-- <a href="<?php echo site_url('create-invoice'); ?>" class="btn btn-success">+ Invoice</a> -->


        <div class="items-container">
        
        
            <?php if(count($transactions)>0): ?>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td style="font-size: 1.2rem; font-weight: 500;">Id</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Date</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Amount</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Status</td>
                                <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                            </tr>
                        </thead>
                        <tbody id="txTableBody">
                            <?php foreach($transactions as $transaction): ?>
                            <tr>
                                <td><?php echo $transaction["public_id"]; ?></td>
                                <td><?php echo $transaction["date"]; ?></td>
                                <td><?php echo $transaction["amount"].' '.$transaction["currency"]; ?></td>
                                <td><?php echo $transaction["status"]; ?></td>
                                <td>
                                    <a href="<?php echo site_url("transaction-details/".$transaction["public_id"]); ?>" class="btn btn-secondary">Details</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if(count($transactions)>=50): ?>
                <div class="text-center">
                    <p class="text-danger" id="nothingFoundFlag"></p>
                    <button type="button" class="btn btn-primary" id="fetchTx">Fetch More</button>
                </div>
                <?php endif; ?>

                <script>
                    let currentSet = 1;
                    $("button#fetchTx").click(function (e) { 
                        e.preventDefault();
                        currentSet++;
                        let newTxRows = '';
                        offset = currentSet*50;
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url("fetch-tx"); ?>",
                            data: {
                                "requestingUser" : "<?php echo session("id"); ?>",
                                "limit" : 50,
                                "offset" : offset
                            },
                            success: function (transactions) {
                                if(transactions=="nothing-found"){
                                    $("p#nothingFoundFlag").html("Nothing Found");
                                }else{
                                    $("tbody#txTableBody").append(transactions);
                                }
                            }
                        });
                    });
                </script>

            <?php else: ?>

                <h6>No Transactions Done</h6>

            <?php endif; ?>

        </div>


    </div>
</main>