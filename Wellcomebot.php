<?php
//use telegram token
//if u have any question  : graphist233@gmail.com , @fr34k233
//............................wellcome................................//
include("Telegram.php");

date_default_timezone_set("asia/tehran");

// Set the bot TOKEN

$bot_id = 'token';

// Instances the class

$telegram = new Telegram($bot_id);
$result       = $telegram->getData();
$text 			  = $telegram->Text();
$chat_id 		  = $telegram->ChatID();
$message_id   = $telegram->MessageID();
$new_chat_members = $result["message"]["new_chat_members"];
$random_welcome = ["this is default wellcome message"];
//u can use more than a message here and it will show random
  if(empty($text) && !empty($new_chat_members)){
	$rnd_num = mt_rand(1,count($random_welcome)-1);
	$welcome_msg = $random_welcome[$rnd_num];
	$content = array('chat_id' => $chat_id, 'reply_to_message_id' => $message_id, 'text' => $welcome_msg);
	$telegram->sendMessage($content);
}
