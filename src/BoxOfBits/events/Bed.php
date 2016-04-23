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
use pocketmine\event\player\PlayerBedEnterEvent;
use pocketmine\event\player\PlayerBedLeaveEvent;

class Bed extends Loader implements Listener{
    
    public function onBedEnter(PlayerBedEnterEvent $event){
        $messages = new Config($this->getDataFolder . "/messages.yml", CONFIG::YAML);
        $player = $event->getPlayer();
		$name = $player->getName();
		$line = "\n";
		$t = str_replace("{player}", $name, $messages->get("onSleepTip"));
		$tip = str_replace("{line}", $line, $t);
		oif($tip === "disabled"){
			return false;
		}elseif(!$tip === "disabled"){
			$sender->sendTip($tip);
		}
		$p = str_replace("{player}", $name, $messages->get("onSleepPopup"));
		$popup = str_replace("{line}", $line, $p);
		if($popup === "disabled"){
			return false;
		}elseif(!$popup === "disabled"){
			$sender->sendPopup($popup);
		}
		$m = str_replace("{player}", $name, $messages->get("onSleepMessage"));
		$message = str_replace("{line}", $line, $m);
		if($message === "disabled"){
			return false;
		}elseif(!$message === "disabled"){
			$sender->sendMessage($message);
		}
		if($player->isOP()){
		    $opt = str_replace("{player}", $name, $messages->get("OP-onSleepTip"));
			$optip = str_replace("{line}", $line, $opt);
			if($optip === "disabled"){
				return false;
			}elseif(!$optip === "disabled"){
				$sender->sendTip($optip);
			}
			$opp = str_replace("{player}", $name, $messages->get("OP-onSleepPopup"));
			$oppopup = str_replace("{line}", $line, $opp);
			if($oppopup === "disabled"){
				return false;
			}elseif(!$oppopup === "disabled"){
				$sender->sendPopup($oppopup);
			}
			$opm = str_replace("{player}", $name, $messages->get("OP-onSleepMessage"));
			$opmessage = str_replace("{line}", $line, $opm);
			if($opmessage === "disabled"){
				return false;
			}elseif(!$opmessage === "disabled"){
				$sender->sendMessage($opmessage);
			}
		}
        return $event;
    }
    
    public function onBedLeave(PlayerBedLeaveEvent $event){
        $messages = new Config($this->getDataFolder . "/messages.yml", CONFIG::YAML);
        $player = $event->getPlayer();
		$name = $player->getName();
		$line = "\n";
		$t = str_replace("{player}", $name, $messages->get("onWakeTip"));
		$tip = str_replace("{line}", $line, $t);
		if($tip === "disabled"){
			return false;
		}elseif(!$tip === "disabled"){
			$sender->sendTip($tip);
		}
		$p = str_replace("{player}", $name, $messages->get("onWakePopup"));
		$popup = str_replace("{line}", $line, $p);
		if($popup === "disabled"){
			return false;
		}elseif(!$popup === "disabled"){
			$sender->sendPopup($popup);
		}
		$m = str_replace("{player}", $name, $messages->get("onWakeMessage"));
		$message = str_replace("{line}", $line, $m);
		if($message === "disabled"){
			return false;
		}elseif(!$message === "disabled"){
			$sender->sendMessage($message);
		}
		if($player->isOP()){
		    $opt = str_replace("{player}", $name, $messages->get("OP-onWakeTip"));
			$optip = str_replace("{line}", $line, $opt);
			if($optip === "disabled"){
				return false;
			}elseif(!$optip === "disabled"){
				$sender->sendTip($optip);
			}
			$opp = str_replace("{player}", $name, $messages)->get("OP-onWakePopup"));
			$oppopup = str_replace("{line}", $line, $opp);
			if($oppopup === "disabled"){
				return false;
			}elseif(!$oppopup === "disabled"){
				$sender->sendPopup($oppopup);
			}
			$opm = str_replace("{player}", $name, $messages->get("OP-onWakeMessage"));
			$opmessage = str_replace("{line}", $line, $opm);
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
