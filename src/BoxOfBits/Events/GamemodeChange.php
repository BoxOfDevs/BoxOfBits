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
use pocketmine\event\player\PlayerGameModeChange;

class GameModeChange extends Loader implements Listener{
    
    public function onGameModeChange(PlayerGameModeChangeEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$line = "\n";
		$tip = str_replace("{player}", $name, $this->getConfig()->get("onGamemodeChangeTip"));
		$tip = str_replace("{line}", $line, $this->getConfig()->get("onGamemodeChangeTip"));
		if($tip === "disabled"){
			return false;
		}elseif(!$tip === "disabled"){
			$this->getServer()->broadcastTip($tip);
		}
		$popup = str_replace("{player}", $name, $this->getConfig()->get("onGamemodeChangePopup"));
		$popup = str_replace("{line}", $line, $this->getConfig()->get("onGamemodeChangePopup"));
		if($popup === "disabled"){
			return false;
		}elseif(!$popup === "disabled"){
			$this->getServer()->broadcastPopup($popup);
		}
		$message = str_replace("{player}", $name, $this->getConfig()->get("onGamemodeChangeMessage"));
		$message = str_replace("{line}", $line, $this->getConfig()->get("onGamemodeChangeMessage"));
		if($message === "disabled"){
			return false;
		}elseif(!$message === "disabled" || "default" ){
			$this->getServer()->broadcastMessage($message);
		}
        return $event;
    }

}

?>
