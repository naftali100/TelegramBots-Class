<?php

/**
 * This file is part of the TelegramBots-Class package.
 *
 * (C) Yehuda Eisenberg
 * This file can be used under the MIT license.
 * 
 * @link https://github.com/PHP-Telegram-Bots/TelegramBots-Class
 * @package TelegramBots-Class
 * 
 */

namespace YehudaEi\TelegramBots\Objects;

use YehudaEi\TelegramBots\Exception\TelegramException;

class Parser{
    public $updateObject;

    public function __construct($update){
        if(gettype($update) == "string"){
            $update = json_decode($update, true);
            if($update == null){
                throw new TelegramException("Invalid update");
            }
        }
        $this->updateObject = new Update();
        $this->currentObj = &$this->updateObject;
        $this->walker($update);
    }

    public function walker($arr){
        
        foreach($arr as $subarrK => $subarrV){
            if(gettype($subarrV) == "array"){
                $objName = __NAMESPACE__ ."\\". ucfirst($subarrK);
                $newObject = new $objName();

                $this->currentObj->$subarrK = $newObject; // creat new sub object to update key

                $tmp = $this->currentObj->$subarrK; // put the pointer to previus level in tmp 

                $this->currentObj = $this->currentObj->$subarrK; // set current object to dipper
                $this->walker($subarrV); // walk over the sub object
                $this->currentObj = $tmp; // return the pointer
            }else{
                $this->currentObj->$subarrK = $subarrV;
            }
        }
    }
}