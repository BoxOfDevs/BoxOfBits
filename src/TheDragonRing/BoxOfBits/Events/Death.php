<?php

/*
  ____             ____   __ ____  _ _       
 |  _ \           / __ \ / _|  _ \(_) |      
 | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
 |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
 | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
 |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
 
 The growing plugin with so many features, an alternative to Essentials or EssentialsPE
 
*/

namespace TheDragonRing\BoxOfBits\Events;

use TheDragonRing\BoxOfBits\Loader;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as Colour;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\utils\Config;

class Death extends Loader implements Listener{
    
    public function onDeath(PlayerDeathEvent $event){
        $player = $event->getPlayer();
        $name = $player->getName();
        $line = "\n";
        $popup = str_replace("{player}", $name, "{line}", $line, $this->config->get("DeathPopup"));
        $this->getServer()->broadcastPopup($popup);
        $message = str_replace("{player}", $name, "{line}", $line, $this->config->get("DeathMessage"));
        $this->getServer()->broadcastMessage($message);
        return true;
    }

}
