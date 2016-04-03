<?php

/*
  ____             ____   __ ____  _ _       
 |  _ \           / __ \ / _|  _ \(_) |      
 | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
 |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
 | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
 |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
 
 The growing plugin with so many features
 
*/

namespace BoxOfDevs\BoxOfBits\Events;

use BoxOfDevs\BoxOfBits\Loader;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as Colour;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\utils\Config;

class Leave extends Loader implements Listener{
    
    public function onQuit(PlayerQuitEvent $event){
        $player = $event->getPlayer();
        $name = $player->getName();
        $line = "\n";
        $popup = str_replace("{player}", $name, "{line}", $line, $this->config->get("LeavePopup"));
        $this->getServer()->broadcastPopup($popup);
        $message = str_replace("{player}", $name, "{line}", $line, $this->config->get("LeaveMessage"));
        $event->setLeaveMessage($message);
        if($player is OP){
		    $op = str_replace("{player}", $name, "{line}", $line, $this->config->get("OPLeaveMsg"));
		    $this->getServer()->broadcastMessage($op);
        }
        return true;
    }

}
