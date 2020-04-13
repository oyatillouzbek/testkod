<?php
/**
 * @birbalo_bot rasmga suz yozish bot kodi
 * @author ShaXzod Jomurodov <shah9409@gmail.com>
 * @contact https://t.me/idFox and https://t.me/ads_buy
 */

//sozlash
include 'Telegram.php';
include 'conf.php';

$telegram = new Telegram($bot_token);
$efede3 = $telegram->getData();

//basic
$text = $efede3["message"]["text"];

$msg = $efede3["message"]["message_id"];
$sana = $efede3["message"]["date"];
$chat_id = $efede3["message"]["chat"]["id"];
$fileclass = $efede3["message"]["document"]["file_name"];
$file_id = $efede3["message"]["document"]["file_id"];

// chat
$cfname = $efede3['message']['chat']['first_name'];
$cid = $efede3["message"]["chat"]["id"];
$clast_name = $efede3['message']['chat']['last_name'];
$turi = $efede3["message"]["chat"]["type"];
$username = $efede3['message']['chat']['username'];
$cusername = $efede3['message']['chat']['username'];
$ctitle = $efede3['message']['chat']['title'];

//user info
$ufname = $efede3['message']['from']['first_name'];
$uname = $efede3['message']['from']['last_name'];
$ulogin = $efede3['message']['from']['username'];
$uid = $efede3['message']['from']['id'];
$user_id = $efede3['message']['from']['id'];


        $home_uz = [["🏠Bosh menu"]];

    if ($text == '🏠Bosh menu'||$text == 'menudan chiqish') {

        $keyb = $telegram->buildKeyBoard($home_uz, $onetime = false, $resize = true, $resize = true);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Ushbu bot orqali o'z ismingizni suratga yozishingiz mumkin. Buni uchun shunchaki ismingizni menga yuboring", 'parse_mode' => 'markdown'];
        $telegram->sendMessage($content);
        exit;
    }


    if ($text == '/start' || mb_stripos($text,"/start") !==false || $text == "welcome"){

        $keyb = $telegram->buildKeyBoard($home_uz, $onetime = false, $resize = true, $resize = true);
        $content = ['chat_id' => $chat_id, 'reply_to_message_id' => $msg, 'reply_markup' => $keyb, 'text' => "Tabriklaymiz bot xush kelibsiz, ushbu bot orqali o'z ismingizni suratga yozishingiz mumkin. Buni uchun shunchaki ismingizni menga yuboring", 'parse_mode' => 'markdown'];
        $telegram->sendMessage($content);
        exit;
    }

    if ($text) {
        $txt = $text;
        $img = imagecreatefromjpeg('uyda.jpg');
        $white = imagecolorallocate($img, 255, 255, 255);
        
        $font = "arial.ttf"; 
        imagettftext($img, 100, 0, 328, 616, $white, $font, $txt);
        imagejpeg($img, "$chat_id.jpg", 80);

        $img = curl_file_create("$chat_id.jpg",'image/jpeg'); 
        $content = array('chat_id' => $chat_id, 'photo' => $img );
        $telegram->sendPhoto($content);
    }
