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

namespace BoxOfBits\events;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\block\SignChangeEvent;

class Sign extends Loader implements Listener{
    
    public function onChange(SignChangeEvent $event){
        $player = $event->getPlayer();
        if($player->hasPermission("boxofbits" || "boxofbits.allowcolour" || "boxofbits.allowcolour.sign")){
            $lines = $event->getLines();
            $symbol = "§";
            $black = str_replace($symbol . "0", TF::BLACK, $lines);
            $dark_blue = str_replace($symbol . "1", TF::DARK_BLUE, $black);
            $dark_green = str_replace($symbol . "2", TF::DARK_GREEN, $dark_blue);
            $dark_aqua = str_replace($symbol . "3", TF::DARK_AQUA, $dark_green);
            $dark_red = str_replace($symbol . "4", TF::DARK_RED, $dark_aqua);
            $dark_purple = str_replace($symbol . "5", TF::DARK_PURPLE, $dark_red);
            $gold = str_replace($symbol . "6", TF::GOLD, $dark_purple);
            $gray = str_replace($symbol . "7", TF::GRAY, $gold);
            $dark_gray = str_replace($symbol . "8", TF::DARK_GRAY, $gray);
            $blue = str_replace($symbol . "9", TF::BLUE, $dark_gray);
            $green = str_replace($symbol . "a", TF::GREEN, $blue);
            $aqua = str_replace($symbol . "b", TF::AQUA, $green);
            $red = str_replace($symbol . "c", TF::RED, $aqua);
            $light_purple = str_replace($symbol . "d", TF::LIGHT_PURPLE, $red);
            $yellow = str_replace($symbol . "e", TF::YELLOW, $light_purple);
            $white = str_replace($symbol . "f", TF::WHITE, $yellow);
            $obfuscated = str_replace($symbol . "k", TF::OBFUSCATED, $white);
            $bold = str_replace($symbol . "l", TF::BOLD, $obfuscated);
            $strikethrough = str_replace($symbol . "m", TF::STRIKETHROUGH, $bold);
            $underline = str_replace($symbol . "n", TF::UNDERLINE, $strikethrough);
            $italic = str_replace($symbol . "o", TF::ITALIC, $underline);
            $reset = str_replace($symbol . "r", TF::RESET, $italic);
        }
        return $event;
    }

}

?>