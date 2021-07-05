<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">

        <div id="newEmailBox">
            <div class="form-group">
                <label for="new_email">Enter New Email</label>
                <input class="form-control" type="email" name="new_email" id="new_email">
            </div>

            <div class="form-group">
                <label for="repeat_new_email">Repeat New Email</label>
                <input class="form-control" type="email" name="repeat_new_email" id="repeat_new_email">
            </div>
            
            <p>You will get a verification code on your new Email.</p>

            <p id="verifEmailError" class="text-danger" ></p>
            <button type="button" id="getVerifEmailButton" class="btn btn-success">Verify New Email</button>

            <script>
                $("button#getVerifEmailButton").click(function (e) { 
                    let newEmail = $("input#new_email").val();
                    let repeatNewEmail = $("input#repeat_new_email").val();
                    if (newEmail==""||repeatNewEmail=="") {
                        $("p#verifEmailError").html("Please enter new email twice to avoid any mistakes and getting locked out.");
                    } else {

                            e.preventDefault();
                            $(this).addClass("disabled");

                            if ((newEmail==repeatNewEmail)) {
                                localStorage.setItem("emailtoverify",newEmail);
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo site_url("send-verif-email-exe"); ?>",
                                    data: {
                                        "newEmail" : newEmail
                                    },
                                    success: function (response) {
                                        if (response=="emailSent") {
                                            $("p#verifEmailError").html("");
                                            $("div#newEmailBox").addClass("d-none");
                                            $("div#otpBox").removeClass("d-none");
                                        } else {
                                            $("p#verifEmailError").html("We are facing some technical issues, try again later");
                                        }
                                    }
                                });
                            }else{
                                $(this).removeClass("disabled");

                                $("p#verifEmailError").html("Email and Repeat Email does not match");
                            }
                        }
                        
                    
                    });
                
            </script>
        
        </div>
        <div id="otpBox" class="d-none">

            <p class="text-danger" id="emailVerifError"></p>
            <div class="form-group">
                <label for="verifCode">Enter Verification Code sent to your Email</label>
                <input class="form-control" type="text" name="verifCode" id="verifCode">
            </div>
            <a href="">Resend Code</a>

            <button type="button" class="btn btn-success" id="verifyEmailExe">Verify Email</button>

            <script>

                $("button#verifyEmailExe").click(function (e) { 
                    e.preventDefault();
                    let enteredCode = $("input#verifCode").val();
                    console.log(enteredCode);
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url("verify-email-verif-code") ?>",
                        data: {
                            "enteredVerifCode" : enteredCode
                        },
                        success: function (response) {
                            if (response=="email-verified") {
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo site_url("update-email"); ?>",
                                    data: {
                                        "email" : localStorage.getItem("emailtoverify")
                                    },
                                    success: function (response) {
                                        window.location.reload();
                                    }
                                });
                            } else if(response=="code-incorrect") {
                                $("p#emailVerifError").html("Incorrect code");
                            }else{
                                $("p#emailVerifError").html("We are facing technical issues, try later");
                            }
                        }
                    });
                });

            </script>
        
        </div>


    </div>
</main>