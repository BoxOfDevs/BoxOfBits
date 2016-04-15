<?php

/*
*  ____             ____   __ ____  _ _       
* |  _ \           / __ \ / _|  _ \(_) |      
* | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
* |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
* | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
* |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
* 
* The growing plugin with so many features
*
* @author BoxOfDevs Team
* @link http://boxofdevs.x10host.com/
* 
*/

namespace BoxOfBits\utils;

use pocketmine\utils\TextFormat as TF;

class SymbolFormat{

    public static function TF($message){
        $symbol = "&";
        $message = str_replace($symbol . "0", TF::BLACK, $message);
        $message = str_replace($symbol . "1", TF::DARK_BLUE, $message);
        $message = str_replace($symbol . "2", TF::DARK_GREEN, $message);
        $message = str_replace($symbol . "3", TF::DARK_AQUA, $message);
        $message = str_replace($symbol . "4", TF::DARK_RED, $message);
        $message = str_replace($symbol . "5", TF::DARK_PURPLE, $message);
        $message = str_replace($symbol . "6", TF::GOLD, $message);
        $message = str_replace($symbol . "7", TF::GRAY, $message);
        $message = str_replace($symbol . "8", TF::DARK_GRAY, $message);
        $message = str_replace($symbol . "9", TF::BLUE, $message);
        $message = str_replace($symbol . "a", TF::GREEN, $message);
        $message = str_replace($symbol . "b", TF::AQUA, $message);
        $message = str_replace($symbol . "c", TF::RED, $message);
        $message = str_replace($symbol . "d", TF::LIGHT_PURPLE, $message);
        $message = str_replace($symbol . "e", TF::YELLOW, $message);
        $message = str_replace($symbol . "f", TF::WHITE, $message);
        $message = str_replace($symbol . "k", TF::OBFUSCATED, $message);
        $message = str_replace($symbol . "l", TF::BOLD, $message);
        $message = str_replace($symbol . "m", TF::STRIKETHROUGH, $message);
        $message = str_replace($symbol . "n", TF::UNDERLINE, $message);
        $message = str_replace($symbol . "o", TF::ITALIC, $message);
        $message = str_replace($symbol . "r", TF::RESET, $message);
        return $message;
    }
}

?>
