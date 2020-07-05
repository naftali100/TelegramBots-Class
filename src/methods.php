<?php

if(!defined('BOT_CLASS')) throw new Exception ('the file '.__FILE__.'can\'t run alone');

trait BaseTelegramMethods{
    
    //Methods
    public function sendMessage($id, $text, $replyMarkup = null, $replyMessage = null){
        $data["chat_id"] = $id;
        $data["text"] = Helpers::text_adjust($text);
        $data["parse_mode"] = $this->ParseMode;
        $data["disable_web_page_preview"] = $this->webPagePreview;
        $data["disable_notification"] = $this->Notification;
        $data["reply_to_message_id"] = $replyMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("sendMessage", $data);
    }
    public function forwardMessage($id, $fromChatId, $messageId){
        $data["chat_id"] = $id;
        $data["from_chat_id"] = $fromChatId;
        $data["disable_notification"] = $this->Notification;
        $data["message_id"] = $messageId;
        return $this->Request("forwardMessage", $data);
    }
    public function sendPhoto($id, $photo, $caption = null, $replyMessage = null, $replyMarkup = null){
        $data["chat_id"] = $id;
        $data["photo"] = $photo;
        $data["caption"] = Helpers::text_adjust($caption);
        $data["parse_mode"] = $this->ParseMode;
        $data["disable_notification"] = $this->Notification;
        $data["reply_to_message_id"] = $replyMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("sendPhoto", $data);
    }
    public function sendAudio($id, $audio, $caption = null, $replyMessage = null, $replyMarkup = null, $duration = null, $performer = null, $title = null){
        $data["chat_id"] = $id;
        $data["audio"] = $audio;
        $data["caption"] = $caption;
        $data["duration"] = $duration;
        $data["performer"] = $performer;
        $data["title"] = $title;
        $data["disable_notification"] = $this->Notification;
        $data["reply_to_message_id"] = $replyMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("sendAudio", $data);
    }
    public function sendDocument($id, $document, $caption = null, $replyMessage = null, $replyMarkup = null){
        $data["chat_id"] = $id;
        $data["document"] = $document;
        $data["caption"] = Helpers::text_adjust($caption);
        $data["parse_mode"] = $this->ParseMode;
        $data["disable_notification"] = $this->Notification;
        $data["reply_to_message_id"] = $replyMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("sendDocument", $data);
    }
    public function sendSticker($id, $sticker, $replyMessage = null, $replyMarkup = null){
        $data["chat_id"] = $id;
        $data["sticker"] = $sticker;
        $data["disable_notification"] = $this->Notification;
        $data["reply_to_message_id"] = $replyMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("sendSticker", $data);
    }
    public function sendVideo($id, $video, $caption = null, $replyMessage = null, $replyMarkup = null, $duration = null, $width = null, $height = null){
        $data["chat_id"] = $id;
        $data["video"] = $video;
        $data["duration"] = $duration;
        $data["width"] = $width;
        $data["height"] = $height;
        $data["caption"] = Helpers::text_adjust($caption);
        $data["parse_mode"] = $this->ParseMode;
        $data["disable_notification"] = $this->Notification;
        $data["reply_to_message_id"] = $replyMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("sendVideo", $data);
    }
    public function sendVoice($id, $voice, $replyMessage = null, $replyMarkup = null, $duration = null){
        $data["chat_id"] = $id;
        $data["voice"] = $voice;
        $data["duration"] = $duration;
        $data["disable_notification"] = $this->Notification;
        $data["reply_to_message_id"] = $replyMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("sendVoice", $data);
    }
    public function sendLocation($id, $latitude, $longitude, $replyMessage = null, $replyMarkup = null){
        $data["chat_id"] = $id;
        $data["latitude"] = $latitude;
        $data["longitude"] = $longitude;
        $data["disable_notification"] = $this->Notification;
        $data["reply_to_message_id"] = $replyMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("sendLocation", $data);
    }
    public function sendVenue($id, $latitude, $longitude, $title, $address, $foursquare = null, $replyMessage = null, $replyMarkup = null){
        $data["chat_id"] = $id;
        $data["latitude"] = $latitude;
        $data["longitude"] = $longitude;
        $data["title"] = $title;
        $data["address"] = $address;
        $data["foursquare_id"] = $foursquare;
        $data["disable_notification"] = $this->Notification;
        $data["reply_to_message_id"] = $replyMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("sendVenue", $data);
    }
    public function sendContact($id, $phoneNumber, $firstName, $lastName = null, $replyMessage = null, $replyMarkup = null){
        $data["chat_id"] = $id;
        $data["phone_number"] = $phoneNumber;
        $data["first_name"] = $firstName;
        $data["last_name"] = $lastName;
        $data["disable_notification"] = $this->Notification;
        $data["reply_to_message_id"] = $replyMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("sendContact", $data);
    }
    public function sendChatAction($id, $action){
        if(!in_array($action, ["typing", "upload_photo", "record_video", "upload_video", "record_audio", "upload_audio", "upload_document", "find_location"]))
            return false;
        $data["chat_id"] = $id;
        $data["action"] = $action;
        return $this->Request("sendChatAction", $data);
    }
    public function getUserProfilePhotos($uId, $offset = null, $limit = null){
        $data["user_id"] = $uId;
        $data['offset'] = $offset;
        $data['limit'] = $limit;
        return $this->Request("getUserProfilePhotos", $data);
    }
    public function kickChatMember($id, $uId){
        $data["chat_id"] = $id;
        $data["user_id"] = $uId;
        return $this->Request("kickChatMember", $data);
    }
    public function unbanChatMember($id, $uId){
        $data["chat_id"] = $id;
        $data["user_id"] = $uId;
        return $this->Request("unbanChatMember", $data);
    }
    public function getFile($fileId){
        $data["file_id"] = $fileId;
        return $this->Request("getFile", $data);
    }
    public function leaveChat($id){
        $data["chat_id"] = $id;
        return $this->Request("leaveChat", $data);
    }
    public function getChat($id){
        $data["chat_id"] = $id;
        return $this->Request("getChat", $data);
    }
    public function getChatAdministrators($id){
        $data["chat_id"] = $id;
        return $this->Request("getChatAdministrators", $data);
    }
    public function getChatMembersCount($id){
        $data["chat_id"] = $id;
        return $this->Request("getChatMembersCount", $data);
    }
    public function getChatMember($id, $uId){
        $data["chat_id"] = $id;
        $data["user_id"] = $uId;
        return $this->Request("getChatMember", $data);
    }
    public function answerCallbackQuery($callback, $text = null, $alert = false){
        $data["callback_query_id"] = $callback;
        $data["text"] = Helpers::text_adjust($text);
        $data["show_alert"] = $alert;
        return $this->Request("answerCallbackQuery", $data);
    }
    public function editMessageText($id = null, $messageId = null, $inlineMessage = null, $text, $replyMarkup = null){
        $data["chat_id"] = $id;
        $data["message_id"] = $messageId;
        $data["inline_message_id"] = $inlineMessage;
        $data["text"] = Helpers::text_adjust($text);
        $data["parse_mode"] = $this->ParseMode;
        $data["disable_web_page_preview"] = $this->webPagePreview;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("editMessageText", $data);
    }
    public function editMessageCaption($id = null, $messageId = null, $inlineMessage = null, $caption = null, $replyMarkup = null){
        $data["chat_id"] = $id;
        $data["message_id"] = $messageId;
        $data["inline_message_id"] = $inlineMessage;
        $data["caption"] = Helpers::text_adjust($caption);
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("editMessageCaption", $data);
    }
    public function editMessageMedia($id = null, $messageId = null, $inlineMessage = null, $media = null, $replyMarkup = null){
        $data["chat_id"] = $id;
        $data["message_id"] = $messageId;
        $data["inline_message_id"] = $inlineMessage;
        $data["media"] = $media;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("editMessageMedia", $data);
    }
    public function editMessageReplyMarkup($id = null, $messageId = null, $inlineMessage = null, $replyMarkup = null){
        $data["chat_id"] = $id;
        $data["message_id"] = $messageId;
        $data["inline_message_id"] = $inlineMessage;
        $data["reply_markup"] = $replyMarkup;
        return $this->Request("editMessageReplyMarkup", $data);
    }
    public function deleteMessage($id, $messageId){
        $data["chat_id"] = $id;
        $data["message_id"] = $messageId;
        return $this->Request("deleteMessage", $data);
    }
    public function answerInlineQuery($inlineMessage, $res, $cacheTime = null, $isPersonal = null, $nextOffset = null, $switchPmText = null, $switchPmParameter = null){
        $data["inline_query_id"] = $inlineMessage;
        $data["results"] = $res;
        $data["cache_time"] = $cacheTime;
        $data["is_personal"] = $isPersonal;
        $data["next_offset"] = $nextOffset;
        $data["switch_pm_text"] = $switchPmText;
        $data["switch_pm_parameter"] = $switchPmParameter;
        return $this->Request("answerInlineQuery", $data);
    }    

    public function pinChatMessage($id, $messageId, $disable_notification = false){
        $data["chat_id"] = $id;
        $data["message_id"] = $messageId;
        $data["disable_notification"] = $disable_notification;
        return $this->Request("pinChatMessage", $data);
    }
}

trait QuickMethods{
    public function delete(){
        return $this->deleteMessage($this->chatId, $this->messageId);
    }

    public function edit($newMessage, $replyMarkup = null){
        if(!$this->service_message){
            if($this->media != null)
                return $this->editMessageCaption($this->chatId, $this->messageId, $this->inlineMessageId, $newMessage, $replyMarkup);
            else
                return $this->editMessageText($this->chatId, $this->messageId, $this->inlineMessageId, $newMessage, $replyMarkup); 
        }else
            return $this;
        
    }

    public function pin($dis_notification = false){
        if($this->chatType != "private" && !$this->service_message)
            return $this->pinChatMessage($this->chatId, $this->messageId, $dis_notification);
        else
            return $this;
    }

    public function forward($to, $nocredit = false, $caption = null){
        if(!$this->service_message){
            if($nocredit){
                if($this->media != null){
                    if($caption == null){
                        $this->setparsemode("markdown");
                        $caption = $this->realtext;
                    }
                    $fn = "send".$this->media["file_type"];
                    return $this->$fn($to, $this->media['file_id'], $caption);
                }else{
                    $this->setparsemode("markdown");
                    return $this->sendMessage($to, $this->realtext);
                }
            }else
                return $this->forwardMessage($to, $this->chatId, $this->messageId);
        }else
            return $this;
    }

    public function reply($text, $replyMarkup = null){
        return $this->sendMessage($this->chatId ?? $this->fromId, $text, $replyMarkup, $this->messageId);
    }

    public function editKeyboard($newKeyboard){
        return $this->editMessageReplyMarkup($this->chatId, $this->messageId, $this->inlineMessageId, $newKeyboard);
    }

    public function alert($text, $window = false){
        if($this->data != null)
            return $this->answerCallbackQUery($this->callId, $text, $window);
        else
            return $this;
    }
    
    // new button must be ["text" => "blabla", "callback/url/etc" => "data/url/etc"] 
    // to delete button - provide only the callback_data/link of the button
    public function editButton($button_data, $new_button = null){
        $buttons = $this->buttons;
        $newkey = [];
        foreach($buttons as $k => $v){
            $row = [];
            foreach($v as $button){
                if(isset($button['callback_data'] ?? $button['url']) && ($button['callback_data'] ?? $button['url']) == $button_data){
                    if($new_button != null)
                        $row[] = $new_button;
                }else
                    $row[] = $button;
            }
            $newkey[] = $row;
        }
        return $this->editkeyboard(json_encode(["inline_keyboard" => $newkey]));
    }

    public function ban(){
        if($this->chatType != "private")
            return $this->kickChatMember($this->chatId, $this->fromId);
        else
            return $this;
    }

    public function leave(){
        if($this->chatType != "private")
            return $this->leaveChat($this->chatId);
        else
            return $this;
    }
}

trait FileMethods{
    public function download(){
        $res = $this->getFile($this->media["file_id"]);
        if($res["ok"]){

        }

    }

    public function editFile($mediaType, $newFileId, $cap = "", $rm = ""){
        return $this->editMessageMedia($this->chatId, $this->messageId, $this->inlineMessageId, json_encode(["type" => $mediaType, "media" => $newFileId, "caption" => $cap ]), $rm);
    }
}
