<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Controllers\PageLoader;

class Services extends BaseController
{


    public function update_email()
    {
        $email = $this->request->getPost("email");
        $session = session();
        $authModel = new AuthModel();
        return $authModel
            ->where('id', $session->id)
            ->set(['email' => $email])
            ->update();
    }

    public function regerate_api_key(){

        $textToEncrypt = uniqid();

        $encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.

        $secretHash = date("d-m-Y H:i A");

        $wasItSecure = md5(date("d-m-Y H:i A"));

        $iv = openssl_random_pseudo_bytes(16, $wasItSecure);

        $apiKey = openssl_encrypt($textToEncrypt, $encryptionMethod, $secretHash,0,$iv);

        $authModel = new AuthModel();

        $authModel->update(session("id"),array("apiKey"=>$apiKey));

        $pageLoader = new PageLoader();

        $pageLoader->settingsPage();

        exit();


    }

}