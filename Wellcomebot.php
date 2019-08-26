<?php
//............................Wellcome................................//
include("Telegram.php");
date_default_timezone_set("asia/tehran");
//-------------------Set the bot TOKEN------------------
$bot_id = "TOKEN_HERE";
//----------Instances the class--------------
$telegram         = new Telegram ($bot_id);
$result           = $telegram-> getData ();
$text 		  = $telegram-> Text ();
$chat_id 	  = $telegram-> ChatID ();
$message_id 	  = $telegram-> MessageID ();
$title            = $telegram-> messageFromGroupTitle();
$new_chat_members = $result["message"]["new_chat_members"];
//-----------------send content code--------------
$random_welcome      = ['ورود شما را به' . $title .'تبریک می گویم'];
if(empty($text) && !empty($new_chat_members)){
	$rnd_num     = mt_rand(1,count($random_welcome)-1);
	$welcome_msg = $random_welcome[$rnd_num];
	$content     = array('chat_id' => $chat_id, 'reply_to_message_id' => $message_id, 'text' => $welcome_msg);
	$telegram   -> sendMessage($content);
}

?>
