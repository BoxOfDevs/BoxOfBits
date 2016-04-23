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
use pocketmine\event\player\PlayerJoinEvent;

class Join extends Loader implements Listener{
    
    public function onJoin(PlayerJoinEvent $event){
		$messages = new Config($this->getDataFolder . "/messages.yml", CONFIG::YAML);
        $player = $event->getPlayer();
		$name = $player->getName();
		$line = "\n";
		$t = str_replace("{player}", $name, $messages->get("onJoinTip"));
		$tip = str_replace("{line}", $line, $t);
		if($tip === "disabled"){
			return false;
		}elseif(!$tip === "disabled"){
			$this->getServer()->broadcastTip($tip);
		}
		$p = str_replace("{player}", $name, $messages->get("onJoinPopup"));
		$popup = str_replace("{line}", $line, $p);
		if($popup === "disabled"){
			return false;
		}elseif(!$popup === "disabled"){
			$this->getServer()->broadcastPopup($popup);
		}
		$m = str_replace("{player}", $name, $messages->get("onJoinMessage"));
		$message = str_replace("{line}", $line, $m);
		if($message === "disabled"){
			$event->setJoinMessage(false);
		}elseif(!$message === "disabled" || "default" ){
			$event->setJoinMessage($message);
		}
		$wt = str_replace("{player}", $name, $messages->get("onJoinWelcomeTip"));
		$wtip = str_replace("{line}", $line, $wt);
		if($wtip === "disabled"){
			return false;
		}elseif(!$wtip === "disabled"){
			$sender->sendTip($wtip);
		}
		$wp = str_replace("{player}", $name, $messages->get("onJoinWelcomePopup"));
		$wpopup = str_replace("{line}", $line, $wp);
		if($wpopup === "disabled"){
			return false;
		}elseif(!$wpopup === "disabled"){
			$sender->sendPopup($wpopup);
		}
		$wm = str_replace("{player}", $name, $messages->get("onJoinWelcomeMessage"));
		$wmessage = str_replace("{line}", $line, $wm);
		if($message === "disabled"){
			return false;
		}elseif(!$wmessage === "disabled"){
			$sender->sendMessage($wmessage);
		}
		if($player->isOP()){
		    $opt = str_replace("{player}", $name, $messages->get("OP-onJoinTip"));
			$optip = str_replace("{line}", $line, $opt);
			if($optip === "disabled"){
				return false;
			}elseif(!$optip === "disabled"){
				$this->getServer()->broadcastTip($optip);
			}
			$opp = str_replace("{player}", $name, $messages->get("OP-onJoinPopup"));
			$oppopup = str_replace("{line}", $line, $opp);
			if($oppopup === "disabled"){
				return false;
			}elseif(!$oppopup === "disabled"){
				$this->getServer()->broadcastPopup($oppopup);
			}
			$opm = str_replace("{player}", $name, $messages->get("OP-onJoinMessage"));
			$opmessage = str_replace("{line}", $line, $opm);
			if($opmessage === "disabled"){
				return false;
			}elseif(!$opmessage === "disabled"){
				$event->setJoinMessage($opmessage);
			}
			$wopt = str_replace("{player}", $name, $messages->get("OP-onJoinWelcomeTip"));
			$woptip = str_replace("{line}", $line, $wopt);
			if($woptip === "disabled"){
				return false;
			}elseif(!$woptip === "disabled"){
				$sender->sendTip($woptip);
			}
			$wopp = str_replace("{player}", $name, $messages->get("OP-onJoinWelcomePopup"));
			$woppopup = str_replace("{line}", $line, $wopp);
			if($woppopup === "disabled"){
				return false;
			}elseif(!$woppopup === "disabled"){
				$sender->sendPopup($woppopup);
			}
			$wopm = str_replace("{player}", $name, $messages->get("OP-onJoinWelcomeMessage"));
			$wopmessage = str_replace("{line}", $line, $wopm);
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
