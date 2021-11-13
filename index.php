<?php
define('1795668315:AAH1DYr61KkJX3p0tWX6Y1NI7llSFApzGMQ','CHANGE_THIS');
function getTxt(){
        $text = json_decode(file_get_contents('php://input'));
        return $text;
    }
	
$result = getTxt();
$text = $result->message->text;

// user
$messageid = $result->message->message_id;
$userid = $result->message->from->id;

$chatid = $result->message->chat->id;

// member
$newmemberid = $result->message->new_chat_member->id;
$newmemberfname = $result->message->new_chat_member->first_name;
$leftmemberid = $result->message->left_chat_member->id;
$leftmemberfname = $result->message->left_chat_member->first_name;
$entityType = $result->message->entities[0]->type;

function deleteMessage($chatid,$msgid){
        $url= 'https://api.telegram.org/bot'.TOKEN.'/deleteMessage?chat_id='.$chatid.'&message_id='.$msgid;
        file_get_contents($url);
    }
function kickChatMember($chatid,$userid){
        $url= 'https://api.telegram.org/bot'.TOKEN.'/kickChatMember?chat_id='.$chatid.'&user_id='.$userid;
        file_get_contents($url);
    }
function sendMessage($userid,$text){
        $url= 'https://api.telegram.org/bot'.TOKEN.'/sendMessage?chat_id='.$userid.'&text='.$text;
        file_get_contents($url);
    }
function sendReply($userid,$text,$msgid){
        $url= 'https://api.telegram.org/bot'.TOKEN.'/sendMessage?chat_id='.$userid.'&text='.$text.'&reply_to_message_id='.$msgid;
        file_get_contents($url);
    }

    $telegram->sendMessage($userid,json_encode($telegram));
