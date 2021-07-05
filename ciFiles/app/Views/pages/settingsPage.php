<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content" id="settings">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">

                <h4>Profile Settings</h4>


                <!-- <form action="" method="post">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input class="form-control" type="text" name="first_name" value="<?php echo session("first_name"); ?>" id="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input class="form-control" type="text" name="last_name" value="<?php echo session("last_name"); ?>" id="last_name">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form> -->

                <a href="<?php echo site_url("change-email"); ?>" class="btn btn-primary">Change Email</a>
                <a href="<?php echo site_url("change-password"); ?>" class="btn btn-primary">Change Password </a>


            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h4>API Key</h4>
                <div class="form-group">
                    <input type="text" readonly value="<?php echo $apiKey; ?>" class="form-control">
                </div>
                <p class="text-success" id="apiKeyGenerateSuccess"></p>
                <button type="button"  data-toggle="modal" data-target="#regenerateKeyModal" class="btn btn-secondary">Regerate & Replace API Key</button>
                <div class="modal fade" id="regenerateKeyModal" tabindex="-1" aria-labelledby="regenerateKeyModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content container">
                            <div class="modal-body">
                                <h6>Are you sures? you wanto deactivate this key and get a new one?</h6>
                                <form action="<?php echo site_url("regerate-api-key"); ?>" method="POST" class="d-inline"><button class="btn btn-success">Yes</button></form> <button type="button" class="btn btn-link" data-dismiss="modal" aria-label="Close">
                                No
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</main>