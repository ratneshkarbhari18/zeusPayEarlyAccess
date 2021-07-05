<?php

namespace App\Controllers;
use App\Models\AuthModel;
use App\Controllers\PageLoader;
use App\Controllers\ApiKey;

class Authentication extends BaseController
{

    public function verifyEmailVerifCode(){
        $enteredCode = $this->request->getPost("enteredVerifCode");
        $session = session();
        $savedCode = $session->emailVerifCode;
        if ($enteredCode==$savedCode) {
            exit("email-verified");
        } else {
            exit("code-incorrect");
        }
    }

    public function change_pwd_exe(){
        $authModel = new AuthModel();
        $pageLoader = new PageLoader();
        $userData = $authModel->find(session("id"));
        $enteredCurrentPwd = $this->request->getPost("current_pwd");
        $newPwd = $this->request->getPost("new_pwd");
        $repeatNewPwd = $this->request->getPost("repeat_new_pwd");
        if (password_verify($enteredCurrentPwd,$userData["password"])&&($newPwd==$repeatNewPwd)) {
            $authModel->where("email",$userData["email"])->set(['password' => password_hash($newPwd,PASSWORD_DEFAULT)])->update();
            $pageLoader->change_password("Password Changed successfully","");
        } else {
            $pageLoader->change_password("","Current password you entered is incorrect or new password and repeat new password arent same");
        }
    }


    public function login_exe(){

        $session = session();

        if($session->role=="mgt"){
            return redirect()->to(site_url("mgt-dashboard"));
        }

        $enteredUserEmail = $this->request->getPost("userEmail");
        $enteredUserPassword = $this->request->getPost("userPassword");
        
        $pageLoader = new PageLoader();

        if ($enteredUserEmail==""||$enteredUserPassword=="") {
            
            $pageLoader->login("Please enter both email and password");

        }else {
            
            $authModel = new AuthModel();

            $userData = $authModel->where("email",$enteredUserEmail)->first();

            if ($userData) {

                $passwordCorrect = password_verify($enteredUserPassword,$userData["password"]);

                if ($passwordCorrect) {


                    $todaytimestamp = strtotime(date("d-m-Y"));



                    $session->set(
                        array(
                            "id" => $userData["id"],
                            "public_id" => $userData["public_id"],
                            "first_name" => $userData["first_name"],
                            "last_name" => $userData["last_name"],
                            "email" => $userData["email"],
                            "role" => $userData["role"],
                            "bname" => $userData["bname"],
                            "gstin" => $userData["gstin"],
                            "pan" => $userData["pan"],
                            "tan" => $userData["tan"],
                            "cin" => $userData["cin"]
                        )
                    );

                    return redirect()->to(site_url());

                } else {
                    
                    $pageLoader->login("Password Incorrect");

                }
                
            } else {

                $pageLoader->login("The Email entered is incorrect");

            }
            

        }

    }

    public function register()
    {

        $session = session();

        if($session->role=="mgt"){
            return redirect()->to(site_url("mgt-dashboard"));
        }elseif($session->role=="user"){
            return redirect()->to(site_url("/"));
        }

        $enteredUserEmail = $this->request->getPost("userEmail");
        $enteredUserPassword = $this->request->getPost("userPassword");
        $enteredfirst_name = $this->request->getPost("first_name");
        $enteredlast_name = $this->request->getPost("last_name");
        
        
        $pageLoader = new PageLoader();

        if ($enteredUserEmail==""||$enteredUserPassword==""||$enteredfirst_name==""||$enteredlast_name=="") {
            
            $pageLoader->register("Please enter both all details");

        }else {
            
            $authModel = new AuthModel();

            $userData = $authModel->where("email",$enteredUserEmail)->first();

            if ($userData) {

                $pageLoader->register("There is already an account with that email, maybe try logging in");                
                
            } else {

                $hashedPwd = password_hash($enteredUserPassword,PASSWORD_DEFAULT);
                $apiKeyObj = new ApiKey(); 
                $apiKey = $apiKeyObj->encrypt();

                $authModel = new AuthModel();

                $publicId = uniqid();

                $dataToInsert = array(
                    "first_name" => $enteredfirst_name,
                    "public_id" => $publicId,
                    "last_name" => $enteredlast_name,
                    "email" => $enteredUserEmail,
                    "password" => $hashedPwd,
                    "apiKey" => $apiKey,
                    "role" => "user",
                    "email_verified" => "no",
                    "kyv_verif" => "no"
                );

                $created = $authModel->insert($dataToInsert);

                if ($created) {

                    $userData = $authModel->where("email",$enteredUserEmail)->first();
                    
                    $session->set(
                        array(
                            "id" => $userData["id"],
                            "public_id" => $userData["public_id"],
                            "first_name" => $userData["first_name"],
                            "last_name" => $userData["last_name"],
                            "email" => $userData["email"],
                            "role" => "user",
                            "bname" => $userData["bname"],
                            "gstin" => $userData["gstin"],
                            "pan" => $userData["pan"],
                            "tan" => $userData["tan"],
                            "cin" => $userData["cin"]
                        )
                    );

                    return redirect()->to(site_url());
                    
                } else {
                    return redirect()->to(site_url("registration-failed"));

                }
                

            }
            

        }

        
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(site_url("login"));
    }

}