<?php

    date_default_timezone_set("Asia/kolkata");
    //Data From Webhook
    $content = file_get_contents("php://input");
    $update = json_decode($content, true);
    $chat_id = $update["message"]["chat"]["id"];
    $message = $update["message"]["text"];
    $message_id = $update["message"]["message_id"];
    $id = $update["message"]["from"]["id"];
    $username = $update["message"]["from"]["username"];
    $firstname = $update["message"]["from"]["first_name"];
    $chatname = $_ENV['CHAT']; 
 /// for broadcasting in Channel
$channel_id = "-100xxxxxxxxxx";

/////////////////////////

    //Extact match Commands
    if($message == "/start"){
        send_message($chat_id,$message_id, "Hey $firstname \nUse /cmds to view commands \n$chatname");
    }

    if($message == "/cmds" || $message == "/cmds@psychcrypt0_bot"){
        send_message($chat_id,$message_id, "
      
          \n/info (User Info)
          ");
    }
      if($message == "/cryptorate" || $message == "/cryptorate@psychcrypt0_bot"){
      
        send_message($chat_id,$message_id,"
	 Use command to check current Crypto rates
         \n/btcusd Bitcoin rate USD
         \n/ethusd  Etherum rate USD
         \n/ltcusd  Litecoin rate USD 
	 \n/etcusd Ethereum rate USD
         ");
    }

    
   if($message == "/help"){
        $help = "Contact @love26aa90b0";
        send_message($chat_id,$message_id, $help);
    }
   


    


    if($message == "/info"){
        send_message($chat_id,$message_id, "User Info \nName: $firstname\nID:$id \nUsername: @$username");
    }




///Commands with text


    /// BTC rate
if(strpos($message, "/btcrate") === 0){
   $curl = curl_init();
   curl_setopt_array($curl, [
CURLOPT_URL => "https://api.coinbase.com/v2/prices/BTC-USD/spot",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 50,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "accept-encoding: gzip, deflate, br",
        "accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7", 
"user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36"
  ],
]);
$btcvalue = curl_exec($curl);
curl_close($curl);
$currentBTCvalue = json_decode($btcvalue, true);

$BTCvalueinUSD = $currentBTCvalue["data"]["amount"];

send_MDmessage($chat_id,$message_id, "***Hello There 1 BTC \nUSD = $BTCvalueinUSD $ \nRate checked by @$username ***");
}

/// ETH rate
if(strpos($message, "/ethrate") === 0){
   $curl = curl_init();
   curl_setopt_array($curl, [
CURLOPT_URL => "https://api.coinbase.com/v2/prices/ETH-USD/spot",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 50,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "accept-encoding: gzip, deflate, br",
        "accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7", 
"user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36"
  ],
]);
$ethvalue = curl_exec($curl);
curl_close($curl);
$currentETHvalue = json_decode($ethvalue, true);

$ethValueInUSD = $currentETHvalue["data"]["amount"];
send_MDmessage($chat_id,$message_id, "***1 ETH \nUSD = $ethValueInUSD $ \nRate checked by @$username ***");
}

/// LTC Rate
if(strpos($message, "/ltcrate") === 0){
   $curl = curl_init();
   curl_setopt_array($curl, [
CURLOPT_URL => "https://api.coinbase.com/v2/prices/LTC-USD/spot",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 50,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "accept-encoding: gzip, deflate, br",
        "accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7", 
"user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36"
  ],
]);
$ltcvalue = curl_exec($curl);
curl_close($curl);
$currentLTCvalue = json_decode($ltcvalue, true);

$LTCvalueinUSD = $currentLTCvalue["data"]["amount"];

send_MDmessage($chat_id,$message_id, "***1 LTC \nUSD = $LTCvalueinUSD $ \nRate checked by @$username ***");
}

/// ETC Rate
if(strpos($message, "/etcrate") === 0){
   $curl = curl_init();
   curl_setopt_array($curl, [
CURLOPT_URL => "https://api.coinbase.com/v2/prices/ETC-USD/spot",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 50,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "accept-encoding: gzip, deflate, br",
        "accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7", 
"user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36"
  ],
]);
$etcvalue = curl_exec($curl);
curl_close($curl);
$currentETCvalue = json_decode($etcvalue, true);

$ETCvalueinUSD = $currentETCvalue["data"]["amount"];

send_MDmessage($chat_id,$message_id, "***Hey There 1 ETC \nUSD = $ETCvalueinUSD $ \nRate checked by @$username ***");
}

/// BTC Rate INR
if(strpos($message, "/btcrate") === 0){
   $curl = curl_init();
   curl_setopt_array($curl, [
CURLOPT_URL => "https://api.coinbase.com/v2/prices/BTC-INR/spot",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 50,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "accept-encoding: gzip, deflate, br",
        "accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7", 
"user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36"
  ],
]);
$ltcvalue = curl_exec($curl);
curl_close($curl);
$currentBTCvalue = json_decode($btcvalue, true);

$BTCvalueinINR = $currentBTCvalue["data"]["amount"];

send_MDmessage($chat_id,$message_id, "***Hello There 1 BTC \nINR = $LTCvalueinINR $ \nRate checked by @$username ***");
}

	

?>
