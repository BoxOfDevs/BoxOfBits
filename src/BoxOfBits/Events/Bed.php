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
use pocketmine\event\player\PlayerBedEnterEvent;
use pocketmine\event\player\PlayerBedLeaveEvent;

class Bed extends Loader implements Listener{
    
    public function onBedEnter(PlayerBedEnterEvent $event){
        $player = $event->getPlayer();
		$name = $player->getName();
		$line = "\n";
		$tip = str_replace("{player}", $name, $this->getConfig()->get("onSleepTip"));
		$tip = str_replace("{line}", $line, $this->getConfig()->get("onSleepTip"));
		if($tip === "disabled"){
			return false;
		}elseif(!$tip === "disabled"){
			$sender->sendTip($tip);
		}
		$popup = str_replace("{player}", $name, $this->getConfig()->get("onSleepPopup"));
		$popup = str_replace("{line}", $line, $this->getConfig()->get("onSleepPopup"));
		if($popup === "disabled"){
			return false;
		}elseif(!$popup === "disabled"){
			$sender->sendPopup($popup);
		}
		$message = str_replace("{player}", $name, $this->getConfig()->get("onSleepMessage"));
		$message = str_replace("{line}", $line, $this->getConfig()->get("onSleepMessage"));
		if($message === "disabled"){
			$event->setonSleepMessage(false);
		}elseif(!$message === "disabled"){
			$sender->sendMessage($message);
		}
		if($player isOP()){
		    $optip = str_replace("{player}", $name, $this->getConfig()->get("OP-onSleepTip"));
			$optip = str_replace("{line}", $line, $this->getConfig()->get("OP-onSleepTip"));
			if($optip === "disabled"){
				return false;
			}elseif(!$optip === "disabled"){
				$sender->sendTip($optip);
			}
			$oppopup = str_replace("{player}", $name, $this->getConfig()->get("OP-onSleepPopup"));
			$oppopup = str_replace("{line}", $line, $this->getConfig()->get("OP-onSleepPopup"));
			if($oppopup === "disabled"){
				return false;
			}elseif(!$oppopup === "disabled"){
				$sender->sendPopup($oppopup);
			}
			$opmessage = str_replace("{player}", $name, $this->getConfig()->get("OP-onSleepMessage"));
			$opmessage = str_replace("{line}", $line, $this->getConfig()->get("OP-onSleepMessage"));
			if($opmessage === "disabled"){
				return false;
			}elseif(!$opmessage === "disabled"){
				$sender->sendMessage($opmessage);
			}
		}
        return $event;
    }
    
    public function onBedLeave(PlayerBedLeaveEvent $event){
        $player = $event->getPlayer();
		$name = $player->getName();
		$line = "\n";
		$tip = str_replace("{player}", $name, $this->getConfig()->get("onWakeTip"));
		$tip = str_replace("{line}", $line, $this->getConfig()->get("onWakeTip"));
		if($tip === "disabled"){
			return false;
		}elseif(!$tip === "disabled"){
			$sender->sendTip($tip);
		}
		$popup = str_replace("{player}", $name, $this->getConfig()->get("onWakePopup"));
		$popup = str_replace("{line}", $line, $this->getConfig()->get("onWakePopup"));
		if($popup === "disabled"){
			return false;
		}elseif(!$popup === "disabled"){
			$sender->sendPopup($popup);
		}
		$message = str_replace("{player}", $name, $this->getConfig()->get("onWakeMessage"));
		$message = str_replace("{line}", $line, $this->getConfig()->get("onWakeMessage"));
		if($message === "disabled"){
			$event->setonWakeMessage(false);
		}elseif(!$message === "disabled"){
			$sender->sendMessage($message);
		}
		if($player isOP()){
		    $optip = str_replace("{player}", $name, $this->getConfig()->get("OP-onWakeTip"));
			$optip = str_replace("{line}", $line, $this->getConfig()->get("OP-onWakeTip"));
			if($optip === "disabled"){
				return false;
			}elseif(!$optip === "disabled"){
				$sender->sendTip($optip);
			}
			$oppopup = str_replace("{player}", $name, $this->getConfig()->get("OP-onWakePopup"));
			$oppopup = str_replace("{line}", $line, $this->getConfig()->get("OP-onWakePopup"));
			if($oppopup === "disabled"){
				return false;
			}elseif(!$oppopup === "disabled"){
				$sender->sendPopup($oppopup);
			}
			$opmessage = str_replace("{player}", $name, $this->getConfig()->get("OP-onWakeMessage"));
			$opmessage = str_replace("{line}", $line, $this->getConfig()->get("OP-onWakeMessage"));
			if($opmessage === "disabled"){
				return false;
			}elseif(!$opmessage === "disabled"){
				$sender->sendMessage($opmessage);
			}
		}
        return $event;
    }

}

?>
