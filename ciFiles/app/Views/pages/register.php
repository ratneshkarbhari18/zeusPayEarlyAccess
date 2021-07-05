<main class="page-content" id="mgt-login" style="padding-top: 3em;">

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-12 col-sm-12"></div>
            <div class="col-lg-4 col-md-12 col-sm-12">

                <h1 class="text-center"><?php echo $title; ?></h1>
                <p class="text-center text-danger"><?php echo $error; ?></p>

                <form action="<?php echo site_url("register-exe"); ?>" method="post">

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input required class="form-control" type="text" name="first_name" id="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input required class="form-control" type="text" name="last_name" id="last_name">
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input required class="form-control" type="email" name="userEmail" id="userEmail">
                    </div>
                    <div class="form-group">
                        <label for="userPassword">Password</label>
                        <input required class="form-control" type="password" name="userPassword" id="userPassword" >
                        <a id="showPwdButton" href="#" class="pwdShowHideToggleLink"><img src="<?php echo site_url("assets/images/eye.svg"); ?>" id="pwdShowHideToggleIcon"></a>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Register</button>

                    <p style="margin: 1em 0;">Already registered? <a class="text-primary" href="<?php echo site_url("login"); ?>">Login here</a></p>
                
                </form>

                <script>
                        $("a#showPwdButton").click(function (e) { 
                            e.preventDefault();
                            console.log("pressed");
                            if($("input#userPassword").attr("type")=="password"){
                                $("input#userPassword").attr("type","text");
                                $("img#pwdShowHideToggleIcon").attr("src","<?php echo site_url("assets/images/eye-off.svg"); ?>");
                            }else{
                                $("input#userPassword").attr("type","password");
                                $("img#pwdShowHideToggleIcon").attr("src","<?php echo site_url("assets/images/eye.svg"); ?>");
                            }
                        });
                    </script>
            
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
        
        </div>
    
    </div>

</main>
<style>
header,footer{
    display: none;
}
</style>