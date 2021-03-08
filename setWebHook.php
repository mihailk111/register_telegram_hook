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
Usage: php setWebHook.php <token> <web-hook-url> [.pem file path]    
    < ... > : Mandatory
    [ ... ] : Optional 

Requiremen:  curl \e[0m \n

MS;



 if (count ($argv) > 1 )
 {
    if ($argv[1] === "--help" || $argv[1] === "-h")
    {
        echo $message;
        exit;
    } 


    if (count($argv) === 3 )
    {

        // without file
        $token = $argv[1];
        $hook = $argv[2];


        $comand = "curl https://api.telegram.org/bot".$token."/setwebhook?url=".$hook;
        exec($comand, $response);

        


        $json = json_decode( implode("\n", $response), true);

        echo  PHP_EOL ." \e[1;32m ";
        
        print_r($json);

        echo "\e[0m" . PHP_EOL. PHP_EOL ;

    }
    else if (count($argv) === 4)
    {
        // with file
        
        $token = $argv[1];
        $hook = $argv[2];
        $file = $argv[3];
        $comand = "curl -F url=". $hook ." -F certificate=@".$file." https://api.telegram.org/bot".$token."/setwebhook";
        exec($comand, $response);

        $json = json_decode( implode("\n", $response), true);

        echo  PHP_EOL ." \e[1;32m ";
        
        print_r($json);

        echo "\e[0m" . PHP_EOL. PHP_EOL ;

    }
    else
    {
        echo $message;
        exit;
    }
 }
 else
 {
  
     echo $message;
 }
