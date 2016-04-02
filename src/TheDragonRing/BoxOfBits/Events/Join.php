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

namespace TheDragonRing\BoxOfBits\Events;

use TheDragonRing\BoxOfBits\Loader;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as Colour;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;

class Join extends Loader implements Listener{
    
    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
		$name = $player->getName();
		$line = "\n";
		$popup = str_replace("{player}", $name, "{line}", $line, $this->config->get("JoinPopup"));
		$this->getServer()->broadcastPopup($popup);
        $tip = str_replace("{player}", $name, "{line}", $line, $this->config->get("WelcomeMsg"));
		$player->sendTip($tip);
		$message = str_replace("{player}", $name, "{line}", $line, $this->config->get("JoinMessage"));
		$event->setJoinMessage($message);
		if($player is OP){
		    $op = str_replace("{player}", $name, "{line}", $line, $this->config->get("OPJoinMsg"));
		    $this->getServer()->broadcastMessage($op);
		}
		return true;
    }

}
