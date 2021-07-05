<?php

namespace App\Controllers;

class ApiKey extends BaseController
{

    public function encrypt()
    {
        $textToEncrypt = uniqid();

        $encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.

        $secretHash = date("d-m-Y H:i A");

        $iv = openssl_random_pseudo_bytes(16, $wasItSecure);

        return $encryptedKey = openssl_encrypt($textToEncrypt, $encryptionMethod, $secretHash,0,$iv);

        // //To Decrypt
        // $decryptedMessage = openssl_decrypt($encryptedMessage, $encryptionMethod, $secretHash);

        // //Result
        // echo "Encrypted: $encryptedMessage <br>Decrypted: $decryptedMessage";
        
    }

}
    