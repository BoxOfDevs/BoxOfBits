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
use pocketmine\event\player\PlayerJoinEvent;

class Join extends Loader implements Listener{
    
    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
		$name = $player->getName();
		$line = "\n";
		$tip = str_replace("{player}", $name, $this->getConfig()->get("onJoinTip"));
		$tip = str_replace("{line}", $line, $this->getConfig()->get("onJoinTip"));
		if($tip === "disabled"){
			return false;
		}elseif(!$tip === "disabled"){
			$this->getServer()->broadcastTip($tip);
		}
		$popup = str_replace("{player}", $name, $this->getConfig()->get("onJoinPopup"));
		$popup = str_replace("{line}", $line, $this->getConfig()->get("onJoinPopup"));
		if($popup === "disabled"){
			return false;
		}elseif(!$popup === "disabled"){
			$this->getServer()->broadcastPopup($popup);
		}
		$message = str_replace("{player}", $name, $this->getConfig()->get("onJoinMessage"));
		$message = str_replace("{line}", $line, $this->getConfig()->get("onJoinMessage"));
		if($message === "disabled"){
			$event->setJoinMessage(false);
		}elseif(!$message === "disabled" || "default" ){
			$event->setJoinMessage($message);
		}
		$wtip = str_replace("{player}", $name, $this->getConfig()->get("onJoinWelcomeTip"));
		$wtip = str_replace("{line}", $line, $this->getConfig()->get("onJoinWelcomeTip"));
		if($wtip === "disabled"){
			return false;
		}elseif(!$wtip === "disabled"){
			$sender->sendTip($wtip);
		}
		$wpopup = str_replace("{player}", $name, $this->getConfig()->get("onJoinWelcomePopup"));
		$wpopup = str_replace("{line}", $line, $this->getConfig()->get("onJoinWelcomePopup"));
		if($wpopup === "disabled"){
			return false;
		}elseif(!$wpopup === "disabled"){
			$sender->sendPopup($wpopup);
		}
		$wmessage = str_replace("{player}", $name, $this->getConfig()->get("onJoinWelcomeMessage"));
		$wmessage = str_replace("{line}", $line, $this->getConfig()->get("onJoinWelcomeMessage"));
		if($message === "disabled"){
			return false;
		}elseif(!$wmessage === "disabled"){
			$sender->sendMessage($wmessage);
		}
		if($player isOP()){
		    $optip = str_replace("{player}", $name, $this->getConfig()->get("OP-onJoinTip"));
			$optip = str_replace("{line}", $line, $this->getConfig()->get("OP-onJoinTip"));
			if($optip === "disabled"){
				return false;
			}elseif(!$optip === "disabled"){
				$this->getServer()->broadcastTip($optip);
			}
			$oppopup = str_replace("{player}", $name, $this->getConfig()->get("OP-onJoinPopup"));
			$oppopup = str_replace("{line}", $line, $this->getConfig()->get("OP-onJoinPopup"));
			if($oppopup === "disabled"){
				return false;
			}elseif(!$oppopup === "disabled"){
				$this->getServer()->broadcastPopup($oppopup);
			}
			$opmessage = str_replace("{player}", $name, $this->getConfig()->get("OP-onJoinMessage"));
			$opmessage = str_replace("{line}", $line, $this->getConfig()->get("OP-onJoinMessage"));
			if($opmessage === "disabled"){
				return false;
			}elseif(!$opmessage === "disabled" || "default" ){
				$event->setJoinMessage($opmessage);
			}
			$woptip = str_replace("{player}", $name, $this->getConfig()->get("OP-onJoinWelcomeTip"));
			$woptip = str_replace("{line}", $line, $this->getConfig()->get("OP-onJoinWelcomeTip"));
			if($woptip === "disabled"){
				return false;
			}elseif(!$woptip === "disabled"){
				$sender->sendtTip($woptip);
			}
			$woppopup = str_replace("{player}", $name, $this->getConfig()->get("OP-onJoinWelcomePopup"));
			$woppopup = str_replace("{line}", $line, $this->getConfig()->get("OP-onJoinWelcomePopup"));
			if($woppopup === "disabled"){
				return false;
			}elseif(!$woppopup === "disabled"){
				$sender->sendPopup($woppopup);
			}
			$wopmessage = str_replace("{player}", $name, $this->getConfig()->get("OP-onJoinWelcomeMessage"));
			$wopmessage = str_replace("{line}", $line, $this->getConfig()->get("OP-onJoinWelcomeMessage"));
			if($wopmessage === "disabled"){
				return false;
			}elseif(!$wopmessage === "disabled"){
				$sender->sendMessage($wopmessage);
			}
		}
        return $event;
    }

}

?>
