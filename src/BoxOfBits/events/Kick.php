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

namespace BoxOfBits\Events;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\player\PlayerKickEvent;

class Kick extends Loader implements Listener{
    
    public function onKick(PlayerKickEvent $event){
        $player = $event->getPlayer();
		$name = $player->getName();
		$line = "\n";
		$tip = str_replace("{player}", $name, $this->getConfig()->get("onKickTip"));
		$tip = str_replace("{line}", $line, $this->getConfig()->get("onKickTip"));
		if($tip === "disabled"){
			return false;
		}elseif(!$tip === "disabled"){
			$this->getServer()->broadcastTip($tip);
		}
		$popup = str_replace("{player}", $name, $this->getConfig()->get("onKickPopup"));
		$popup = str_replace("{line}", $line, $this->getConfig()->get("onKickPopup"));
		if($popup === "disabled"){
			return false;
		}elseif(!$popup === "disabled"){
			$this->getServer()->broadcastPopup($popup);
		}
		$message = str_replace("{player}", $name, $this->getConfig()->get("onKickMessage"));
		$message = str_replace("{line}", $line, $this->getConfig()->get("onKickMessage"));
		if($message === "disabled"){
			$event->setKickMessage(false);
		}elseif(!$message === "disabled" || "default" ){
			$event->setKickMessage($message);
		}
        return $event;
    }

}

?>
