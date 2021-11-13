<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], // literally 149.154.160.0/20
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    // literally 91.108.4.0/22
];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if (!$ok) die("Are You Okay ?");
//------------------------------------------------------//
ob_start(); // از اصکی بدون منبع بپرهیز!
error_reporting(0);  // اولین اپن کننده Source_Home 
date_default_timezone_set('Asia/Tehran');
// ارتقا و ادیت این سورس ازاد ولی به اسم خودتون نزنید،کدشو نفروشید و شاخ نشید.
//------------------------------------------------------//
define('API_KEY',"1483463217:AAEBuk93cwaOhg4-D_9bVxAvwBLUyuhH3YA"); // Source_Home
//------------------------------------------------------//
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
// @Source_Home
//------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
$tc = $update->message->chat->type;
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $message->text;
//------------------------------------------------------
if($text == "/start" && $tc == "private"){
bot('SendMessage',[ // @source_home
'chat_id'=>$chat_id,
'text'=>"💯 به ربات بازی خوشومدی!

✅ تو این ربات میتونی دارت بازی کنی!
✅ تاس بندازی!
✅ پنالتی بزنی!
✅ بسکتبال بازی کنی!

👇 یکی از گزینه های زیر رو انتخاب کن :

@source_home",
  'reply_to_message_id'=>$message_id,
 'reply_markup'=>json_encode([
           'keyboard'=>[
           [['text'=>"🎲 تاس بنداز"],['text'=>"⚽️ پنالتی بزن"]],
           [['text'=>"🏀 بسکتبال بازی کن"],['text'=>"🎯 دارت بازی کن"]],
	],
		"resize_keyboard"=>true,
	 ]) // Source_Home رو جستجو کن بیاد بالا چنلمون 
	 // پره سورس خفن
	 ]);
	 }// @source_home
	 elseif($text == "🎯 دارت بازی کن"  && $tc == "private"){
$dice = bot('sendDice',[
'chat_id' => $chat_id,
'emoji'=> '🎯',
   'reply_markup' => json_encode([
                    'inline_keyboard' => [
    [['text' => "♻️ در حال بازی ...", 'callback_data' => "none"]],                       
                    ]
                ]) // @Source_Home
]); // Source_Home
$value = $dice->result->dice->value;
$messageid = $dice->result->message_id;
sleep(2.5); // Source_Home
if($value == 1 or $value == 2 or $value == 3){
$om = "❌ بازیو باختی،امتیاز نگرفتی";
}else{
$om = "🎊 امتیاز بازی : $value";
}
bot('editMessageReplyMarkup',[
    'chat_id'=> $chat_id,
    'message_id'=>$messageid,
	   'reply_markup' => json_encode([
                    'inline_keyboard' => [
    [['text' => "$om", 'callback_data' => "none"]],                       
                    ]
                ])
    		]);// @source_home
}
	 // Source_Home// Source_Home// Source_Home
	 elseif($text == "🏀 بسکتبال بازی کن"  && $tc == "private"){
$dice = bot('sendDice',[
'chat_id' => $chat_id,
'emoji'=> '🏀',
   'reply_markup' => json_encode([
                    'inline_keyboard' => [
    [['text' => "♻️ در حال بازی ...", 'callback_data' => "none"]],                       
                    ]
                ]) // @Source_Home
]); // Source_Home
$value = $dice->result->dice->value;
$messageid = $dice->result->message_id;
sleep(7); // Source_Home
if($value == 1 or $value == 2 or $value == 3){
$om = "❌ بازیو باختی،امتیاز نگرفتی";
}else{
$om = "🎊 امتیاز بازی : $value";
}
bot('editMessageReplyMarkup',[
    'chat_id'=> $chat_id,
    'message_id'=>$messageid,
	   'reply_markup' => json_encode([
                    'inline_keyboard' => [
    [['text' => "$om", 'callback_data' => "none"]],                       
                    ]
                ])
    		]);// Source_Home
}
	 // Source_Home// Source_Home
	 elseif($text == "⚽️ پنالتی بزن"  && $tc == "private"){
$dice = bot('sendDice',[
'chat_id' => $chat_id,
'emoji'=> '⚽️',
   'reply_markup' => json_encode([
                    'inline_keyboard' => [
    [['text' => "♻️ در حال پنالتی زدن ...", 'callback_data' => "none"]],                       
                    ]
                ]) // @Source_Home
]); // Source_Home
$value = $dice->result->dice->value;
$messageid = $dice->result->message_id;
sleep(7); // Source_Home
if($value == 1 or $value == 2){
$om = "❌ پنالتی باختی،امتیازی نگرفتی";
}else{
$om = "🎊 امتیاز پنالتی : $value";
}
bot('editMessageReplyMarkup',[
    'chat_id'=> $chat_id,
    'message_id'=>$messageid,
	   'reply_markup' => json_encode([
                    'inline_keyboard' => [
    [['text' => "$om", 'callback_data' => "none"]],                       
                    ]
                ])
    		]);// Source_Home
}
	 // Source_Home
	 elseif($text == "🎲 تاس بنداز"  && $tc == "private"){
$dice = bot('sendDice',[
'chat_id' => $chat_id,
'emoji'=> '🎲',
   'reply_markup' => json_encode([
                    'inline_keyboard' => [
    [['text' => "♻️ در حال انداختن تاس ...", 'callback_data' => "none"]],                       
                    ]
                ]) // @Source_Home
]); // Source_Home
$value = $dice->result->dice->value;
$messageid = $dice->result->message_id;
sleep(4); // Source_Home
bot('editMessageReplyMarkup',[
    'chat_id'=> $chat_id,
    'message_id'=>$messageid,
	   'reply_markup' => json_encode([
                    'inline_keyboard' => [
    [['text' => "🎲 نتیجه تاس : $value", 'callback_data' => "none"]],                       
                    ]
                ])
    		]);// Source_Home
}

/*
- DeveLoper : @Source_Home
- Channel : @Source_Home
سورس شیک و تمیز تاس!
با تشخیص مقدار تاس افتاده شده!

# اولین اپن کننده ماییم #
( تیم سورس خونه )

از زدن به اسم خود بپرهیزید.
اصکی بدون منبع حرام و بگا میری.
*/