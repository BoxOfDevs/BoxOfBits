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
use pocketmine\event\player\PlayerDeathEvent;

class Death extends Loader implements Listener{
    
    public function onDeath(PlayerDeathEvent $event){
        $player = $event->getEntity();
		$name = $player->getName();
		$line = "\n";
		$tip = str_replace("{player}", $name, $this->getConfig()->get("onDeathTip"));
		$tip = str_replace("{line}", $line, $this->getConfig()->get("onDeathTip"));
		if($tip === "disabled"){
			return false;
		}elseif(!$tip === "disabled"){
			$this->getServer()->broadcastTip($tip);
		}
		$popup = str_replace("{player}", $name, $this->getConfig()->get("onDeathPopup"));
		$popup = str_replace("{line}", $line, $this->getConfig()->get("onDeathPopup"));
		if($popup === "disabled"){
			return false;
		}elseif(!$popup === "disabled"){
			$this->getServer()->broadcastPopup($popup);
		}
		$message = str_replace("{player}", $name, $this->getConfig()->get("onDeathMessage"));
		$message = str_replace("{line}", $line, $this->getConfig()->get("onDeathMessage"));
		if($message === "disabled"){
			$event->setDeathMessage(false);
		}elseif(!$message === "disabled" || "default" ){
			$event->setDeathMessage($message);
		}
		if($player isOP()){
		    $optip = str_replace("{player}", $name, $this->getConfig()->get("OP-onDeathTip"));
			$optip = str_replace("{line}", $line, $this->getConfig()->get("OP-onDeathTip"));
			if($optip === "disabled"){
				return false;
			}elseif(!$optip === "disabled"){
				$this->getServer()->broadcastTip($optip);
			}
			$oppopup = str_replace("{player}", $name, $this->getConfig()->get("OP-onDeathPopup"));
			$oppopup = str_replace("{line}", $line, $this->getConfig()->get("OP-onDeathPopup"));
			if($oppopup === "disabled"){
				return false;
			}elseif(!$oppopup === "disabled"){
				$this->getServer()->broadcastPopup($oppopup);
			}
			$opmessage = str_replace("{player}", $name, $this->getConfig()->get("OP-onDeathMessage"));
			$opmessage = str_replace("{line}", $line, $this->getConfig()->get("OP-onDeathMessage"));
			if($opmessage === "disabled"){
				return false;
			}elseif(!$opmessage === "disabled" || "default" ){
				$event->setDeathMessage($opmessage);
			}
		}
        return $event;
    }

}

?>
