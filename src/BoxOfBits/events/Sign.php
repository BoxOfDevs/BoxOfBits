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
        if($player->hasPermission("boxofbits" || "boxofbits.allowcolour" || "boxofbits.allowcolour.chat")){
            $message = $event->getMessage();
            $message = str_replace("§0", TF::BLACK, $message);
            $message = str_replace("§1", TF::DARK_BLUE, $message);
            $message = str_replace("§2", TF::DARK_GREEN, $message);
            $message = str_replace("§3", TF::DARK_AQUA, $message);
            $message = str_replace("§4", TF::DARK_RED, $message);
            $message = str_replace("§5", TF::DARK_PURPLE, $message);
            $message = str_replace("§6", TF::GOLD, $message);
            $message = str_replace("§7", TF::GRAY, $message);
            $message = str_replace("§8", TF::DARK_GRAY, $message);
            $message = str_replace("§9", TF::BLUE, $message);
            $message = str_replace("§a", TF::GREEN, $message);
            $message = str_replace("§b", TF::AQUA, $message);
            $message = str_replace("§c", TF::RED, $message);
            $message = str_replace("§d", TF::LIGHT_PURPLE, $message);
            $message = str_replace("§e", TF::YELLOW, $message);
            $message = str_replace("§f", TF::WHITE, $message);
            $message = str_replace("§k", TF::OBFUSCATED, $message);
            $message = str_replace("§l", TF::BOLD, $message);
            $message = str_replace("§m", TF::STRIKETHROUGH, $message);
            $message = str_replace("§n", TF::UNDERLINE, $message);
            $message = str_replace("§o", TF::ITALIC, $message);
            $message = str_replace("§r", TF::RESET, $message);
        }
        return $event;
    }

}

?>