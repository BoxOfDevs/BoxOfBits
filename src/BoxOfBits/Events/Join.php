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
		$popup = str_replace("&", $formatter, "{player}", $name, "{line}", $line, $this->getConfig()->get("JoinPopup"));
		$this->getServer()->broadcastPopup($popup);
		$message = str_replace("{player}", $name, "{line}", $line, $this->getConfig()->get("JoinMessage"));
		$event->setJoinMessage($message);
		if($player isOP()){
		    $op = str_replace("{player}", $name, "{line}", $line, $this->getConfig()->get("OPJoinMsg"));
		    $this->getServer()->broadcastMessage($op);
		}
        return true;
    }

}

?>
