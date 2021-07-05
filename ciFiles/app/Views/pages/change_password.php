<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
        <p class="text-success"><?php echo $success; ?></p>
        <p class="text-danger"><?php echo $error; ?></p>
        <form action="<?php echo site_url("change-pwd-exe"); ?>" method="post">
            <div class="form-group">
                <label for="current_pwd">Current Password</label>
                <input type="text" class="form-control" required name="current_pwd" id="current_pwd">
            </div>
            <div class="form-group">
                <label for="new_pwd">New Password</label>
                <input type="text" class="form-control" required name="new_pwd" id="new_pwd">
            </div>
            <div class="form-group">
                <label for="repeat_new_pwd">Repeat New Password</label>
                <input type="text" class="form-control" required name="repeat_new_pwd" id="repeat_new_pwd">
            </div>
            <button type="submit" class="btn btn-success">Update Password</button>
        </form>
    </div>
</main>