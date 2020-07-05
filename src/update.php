<?php

trait updateVars{

    function initVars($update){
        $updateType = array_keys($update)[1];
        
        if(isset(BOT['allowed_updates']))
            if(!in_array($updateType, BOT['allowed_updates']) && $updateType != "result")
                throw new Exception ('invalid update');

        // the callback update contain the message update 
        if($updateType == 'callback_query'){
            // the clicker data
            $this->callFromId = $update["callback_query"]['from']['id'];
            $this->callId = $update["callback_query"]["id"];
            $this->callData = $update["callback_query"]["data"];
            $this->inlineMessageId = $update["callback_query"]["inline_message_id"]       ?? null;

            // update the update to $update[updateType]{update body}
            $update['callback_query'] = $update['callback_query']['message'];
        }else{
            $this->callData = null;
        }

        // global vars for all kinds of updates
        $this->userName = $update[$updateType]["chat"]["username"]                        ?? null;
        $this->chatId = $update[$updateType]["chat"]["id"]                                ?? null;
        $this->FirstName = $update[$updateType]["chat"]["first_name"]            	      ?? null;
        $this->LastName = $update[$updateType]["chat"]["last_name"]              	      ?? null;

        $this->fromId = $update[$updateType]["from"]["id"]                		          ?? null;
        $this->fromUserName = $update[$updateType]["from"]["username"]                    ?? null;
        $this->fromFirstName = $update[$updateType]["from"]["first_name"]                 ?? null;
        $this->fromLastName = $update[$updateType]["from"]["last_name"]                   ?? null;

        $this->chatType = $update[$updateType]["chat"]["type"]                            ?? null;
        $this->text = $update[$updateType]["text"] ?? $update[$updateType]['caption'] ?? $update[$updateType]['query']  ?? null;
        $this->messageId = $update[$updateType]['message_id']                             ?? null;
        $this->title = $update[$updateType]["chat"]["title"]                              ?? null;

        $this->cap = $update[$updateType]['caption']                                      ?? null;

        // FORWARD
        // f - for forward, ff - for forward from
        // c - for chat
        $this->fId = $update[$updateType]['forward_from']['id']                           ?? null;
        $this->fFN = $update[$updateType]['forward_from']['first_name']                   ?? null;
        $this->fLN = $update[$updateType]['forward_from']['last_name']                    ?? null;
        $this->fdN = $update[$updateType]['forward_from']['username']                     ?? null;
        $this->ffcId = $update[$updateType]['forward_from_chat']['id']                    ?? null;
        // $this->ffmid = forward - from - message - id

        // REPLY
        // r - for reply
        // m - for message
        // f - for from, ff - for forward from
        // t - for text
        $this->rfid = $update[$updateType]['reply_to_message']['from']['id']             ?? null;
        $this->rfUN = $update[$updateType]['reply_to_message']['from']['username']       ?? null;
        $this->rfFN = $update[$updateType]['reply_to_message']['from']['first_name']     ?? null;
        $this->rfLN = $update[$updateType]['reply_to_message']['from']['last_name']      ?? null;
        $this->rmid = $update[$updateType]['reply_to_message']['message_id']             ?? null;
        $this->rmt = $update[$updateType]['reply_to_message']['text']                    ?? null;
        $this->rffid = $update[$updateType]['reply_to_message']['forward_from']['id']    ?? null;


        //Inline
        $this->inlineQ = $update["inline_query"]["query"]                                 ?? null;
        $this->inlineQId = $update["inline_query"]["id"]                                  ?? null;
        $this->inlineQfromId = $update["inline_query"]["from"]["id"]				      ?? null;

        $this->ent = $update[$updateType]['entities']                                     ?? null;

        $this->buttons = $update[$updateType]["reply_markup"]["inline_keyboard"]          ?? null;


        // general data for all kind of files
        // there is also varibals for any kind below, you can use them both or delete one of them
        $media = null;
        $fileTypes = ['photo', 'video', 'document', 'audio', 'sticker', 'voice', 'video_note'];
        foreach($fileTypes as $type){
            if(isset($update[$updateType][$type])){
                if($type == "photo"){
                    $media = $update[$updateType]['photo'][count($update[$updateType][$type])-1];
                }else
                    $media = $update[$updateType][$type];
                $media["file_type"] = $type;
            break;
            }
        }
        $this->media = $media;

        
        //photo
        $this->tphoto = $update[$updateType]['photo']                                ?? null;
        if(!empty($tphoto))
            $this->phid = $update[$updateType]['photo'][count($this->tphoto)-1]['file_id'] ?? null;
        //audio
        $this->auid = $update[$updateType]['audio']['file_id']                       ?? null;
        $this->duration = $update[$updateType]['audio']['duration']                  ?? null;
        $this->autitle = $update[$updateType]['audio']['title']                      ?? null;
        $this->performer = $update[$updateType]['audio']['performer']                ?? null;
        //document
        $this->did = $update[$updateType]['document']['file_id']                     ?? null;
        $this->dfn = $update[$updateType]['document']['file_name']                   ?? null;
        //video
        $this->vidid = $update[$updateType]['video']['file_id']                      ?? null;
        //voice 
        $this->void = $update[$updateType]['voice']['file_id']                       ?? null;
        //video_note
        $this->vnid = $update[$updateType]['video_note']['file_id']                  ?? null;
        //contact
        $this->conph = $update[$updateType]['contact']['phone_number']               ?? null;
        $this->conf = $update[$updateType]['contact']['first_name']                  ?? null;
        $this->conl = $update[$updateType]['contact']['last_name']                   ?? null;
        $this->conid = $update[$updateType]['contact']['user_id']                    ?? null;
        //location
        $this->locid1 = $update[$updateType]['location']['latitude']                 ?? null;
        $this->locid2 = $update[$updateType]['location']['longitude']                ?? null;
        //Sticker
        $this->stid = $update[$updateType]['sticker']['file_id']                     ?? null;
        //Venue
        $this->venLoc1 = $update[$updateType]['venue']['location']['latitude']       ?? null;
        $this->venLoc2 = $update[$updateType]['venue']['location']['longitude']      ?? null;
        $this->venTit = $update[$updateType]['venue']['title']                       ?? null;
        $this->venAdd = $update[$updateType]['venue']['address']                     ?? null;


        // if thete ent in text its revers it to markdown and add `/```/*/_ to text
        $realtext = $this->message;
        if($this->ent != null){
            $i = 0;
            foreach($this->ent as $e){
                if($e['type'] == "code")
                    $replacment = "`";
                elseif($e['type'] == "pre")
                    $replacment = "```";
                elseif($e['type'] == "bold")
                    $replacment = "*";
                elseif($e['type'] == "italic")
                    $replacment = "_";
                else
                    continue;
                
                $realtext = Helpers::entToRealTxt($realtext, $replacment, $e['offset'], $e['length'], $i);
                $i += strlen($replacment)*2;
            }
        }
        $this->realtext = $realtext;

        $this->service_message = false;
        $serveiceTypes = ["new_chat_photo", "new_chat_members", "left_chat_member", "new_chat_title", "delete_chat_photo", "group_chat_created", "supergroup_chat_created", "channel_chat_created", "migrate_from_chat_id", "pinned_message"];
        foreach($serveiceTypes as $serveiceType){
            if(isset($update[$updateType][$serveiceType])){
                $this->service_message = true; break;
            }
        }
    }
}


class Update
{
    use updateVars, BaseTelegramMethods, QuickMethods, FileMethods;

    protected $BotToken;
    protected $BotId;
    protected $BotName;
    protected $BotUserName;
    protected $DBName;
    protected $Debug;
    protected $beautifi = true;
    protected $update = null;
    protected $webHook = null;
    protected $webPagePreview = true;
    protected $Notification = false;
    protected $ParseMode = null;

    public function Update($token, $update = null, $Debug = false){
        // bot verification
        $botInfo = json_decode(file_get_contents("https://api.telegram.org/bot".$token."/getMe"), true);
        if($Debug && 0)
            $this->logging($botInfo, false, "BotInfoOutput: Success!", true);
        if($botInfo['ok'] == true && $botInfo['result']['is_bot'] == true){
            $this->BotToken = $token;
            $this->Debug = $Debug;
            $this->BotId = $botInfo['result']['id'];
            $this->BotName = $botInfo['result']['first_name'];
            $this->BotUserName = $botInfo['result']['username'];
            $this->DBName = DATA_PATH.$this->botId." - ".$this->BotUserName.'.sqlite';
                
        //Update WebHook
            if(isset(BOT['webHookUrl'])){
                $res = $this->Request("getwebhookinfo");
                if($res['result']['url'] != BOT['webHookUrl'])
                    if(isset(BOT['allowed_updates']))
                        $this->Request("setwebhook", array('url' => BOT['webHookUrl'], "allowed_updates" => BOT['allowed_updates']));
                    else
                        $this->Request("setwebhook", array('url' => BOT['webHookUrl']));
            }
        // set ParseMode
            if(isset(BOT['parseMode'])){
                $this->SetParseMode(BOT['parseMode']);
            }
        // init update
            if($update != null){
                $this->update = $update;
                $this->initVars($update);
            }
        }
        else return false;
    }
    
    protected function DB($q){
        try{
            $DBConn = new SQLite3($this->DBName , SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE) 
                    or $this->sendMessage(WEBMASTER_TG_ID, 'error conncet to db. username:'.$this->BotUserName);
            $DBConn->query('CREATE TABLE IF NOT EXISTS "users" (
                        "user_id" INT(11) PRIMARY KEY,
                        "type" VARCHAR,
                        "time" TIMESTAMP
                    )');
            $DBConn->query($q);
            $DBConn->close();
        }
        catch(Exception $e){
            
        }
    }
    
    public function SaveID($id, $type){
        $this->DB('INSERT OR IGNORE INTO "users" ("user_id", "type", "time")
            VALUES ("'.$id.'", "'.$type.'" ,"'.time().'")');
    }
    
    //Setters && Getters
        //Debug Mode
    public function GetDebug(){
        return $this->Debug;
    }
    public function SetDebug($val){
        $this->Debug = $val;
    }
        //WebHook
    public function GetWebHook(){
        return $this->webHook;
    }
    public function SetWebHook($val){
        $this->webHook = $val;
        return $this->Request('setwebhook', array("url" => $val, "allowed_updates" => BOT['allowed_updates']))['ok'];
    }
    public function DelWebHook(){
        $this->webHook = NULL;
        return $this->Request('setwebhook', array("url"))['ok'];
    }
        //Updates - BETA!
    public function SetUpdate($update){
        $this->Update = $update;
        if($this->Debug)
            $this->logging($update, false, "Update input:", true);
    }
    public function GetUpdate(){
        return $this->Update;
    }
        //WebPagePreview Mode
    public function GetWebPagePreview(){
        return $this->webPagePreview;
    }
    public function SetWebPagePreview($val){
        $this->webPagePreview = $val;
    }
        //Notification Mode
    public function GetNotification(){
        return $this->Notification;
    }
    public function SetNotification($val){
        $this->Notification = $val;
    }
        //ParseMode Mode
    public function GetParseMode(){
        return $this->ParseMode;
    }
    public function SetParseMode($val){
        if("markdown" == strtolower($val) || "html" == strtolower($val) || null == $val)
            $this->ParseMode = $val;
    }
        //DBName
    public function GetDBName(){
        return $this->DBName;
    }
        //SendRequest
    protected function Request($method, $data = array()){
        $BaseUrl = "https://api.telegram.org/bot".$this->BotToken."/".$method;
    	
        $ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $BaseUrl);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch ,CURLOPT_POSTFIELDS, $data);
       
        $res = curl_exec($ch);
        if(curl_error($ch)){
            if($this->Debug)
                $this->logging(curl_error($ch), "Curl: ".$method, false, false, $data);
    		curl_close($ch);
        }else{
            curl_close($ch);
            $res = json_decode($res, true);

            // you can send to your self the error details
			if(!$res['ok'] && $this->Debug)
                Helpers::error_handler($res, true);
            
            if($this->Debug)
                $this->logging($res, "Curl: ".$method, true, true, $data);

            return new Update($this->BotToken, $res, $this->Debug);
        }
    }

    //Logging
    public function logging($data, $method = null, $success = false, $array = false, $helpArgs = null){
        $tmp = ($this->beautifi ? JSON_PRETTY_PRINT : null ) | JSON_UNESCAPED_UNICODE;
        if(!$array)
            $data = array("data" => $data);
        
        $data['added_by_log']['helpArgs'] = $helpArgs;
        $data['added_by_log']['date'] = date(DATE_RFC850);
        $data['added_by_log']['botUserName'] = $this->BotUserName;
        $data['added_by_log']['success'] = ($success ? "Success!" : "Error");
        $data['added_by_log']['method'] = $method;
        
        $data = json_encode($data, $tmp);
        file_put_contents($this->BotUserName." - log.log", $data.",\n", FILE_APPEND | LOCK_EX);
    }
}
