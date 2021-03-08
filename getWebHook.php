<?php


/**
 * @param string token
 * @param string webhookurl
 * @param string custom_ssl.pem file
 *
 * 
 */

$message = <<< MS
\e[1;31m
Usage: php getWebHook.php <token>  
    < ... > : Mandatory

Requiremen:  curl \e[0m \n

MS;



 if (count ($argv) > 1 )
 {
    if ($argv[1] === "--help" || $argv[1] === "-h")
    {
        echo $message;
        exit;
    } 
    else
    {

        $token = $argv[1];
        
        $comand = "curl https://api.telegram.org/bot".$token."/getwebhookinfo";
        exec($comand, $response);

        $json = json_decode( implode("\n", $response), true);

        echo  PHP_EOL ." \e[1;32m ";
        
        print_r($json);

        echo "\e[0m" . PHP_EOL. PHP_EOL ;

    }

 }
 else
 {
  
     echo $message;
 }
