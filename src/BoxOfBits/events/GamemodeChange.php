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
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerGameModeChange;

class GameModeChange extends Loader implements Listener{
    
    public function onGameModeChange(PlayerGameModeChangeEvent $event){
        $messages = new Config($this->getDataFolder . "/messages.yml", CONFIG::YAML);
		$player = $event->getPlayer();
		$name = $player->getName();
		$line = "\n";
		$t = str_replace("{player}", $name, $message->get("onGamemodeChangeTip"));
		$tip = str_replace("{line}", $line, $t);
		if($tip === "disabled"){
			return false;
		}elseif(!$tip === "disabled"){
			$this->getServer()->broadcastTip($tip);
		}
		$p = str_replace("{player}", $name, $messages->get("onGamemodeChangePopup"));
		$popup = str_replace("{line}", $line, $p);
		if($popup === "disabled"){
			return false;
		}elseif(!$popup === "disabled"){
			$this->getServer()->broadcastPopup($popup);
		}
		$m = str_replace("{player}", $name, $messages->get("onGamemodeChangeMessage"));
		$message = str_replace("{line}", $line, $m);
		if($message === "disabled"){
			return false;
		}elseif(!$message === "disabled"){
			$this->getServer()->broadcastMessage($message);
		}
        return $event;
    }

}

?>