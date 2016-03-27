<?php

/*
  ____             ____   __ ____  _ _       
 |  _ \           / __ \ / _|  _ \(_) |      
 | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
 |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
 | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
 |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
 
 The growing plugin with so many features

*/

namespace TheDragonRing\BoxOfBits;

use TheDragonRing\BoxOfBits\Events\Join;
use TheDragonRing\BoxOfBits\Events\Leave;
use TheDragonRing\BoxOfBits\Events\GamemodeChange;
use TheDragonRing\BoxOfBits\Events\Ban;
use TheDragonRing\BoxOfBits\Events\Kick;
use TheDragonRing\BoxOfBits\Events\Death;
use TheDragonRing\BoxOfBits\Commands\fly;
use TheDragonRing\BoxOfBits\Commands\gmc;
use TheDragonRing\BoxOfBits\Commands\gms;
use TheDragonRing\BoxOfBits\Commands\gma;
use TheDragonRing\BoxOfBits\Commands\gmsp;
use TheDragonRing\BoxOfBits\Commands\xyz;
use TheDragonRing\BoxOfBits\Commands\rules;
use TheDragonRing\BoxOfBits\Commands\hidetag;
use TheDragonRing\BoxOfBits\Commands\health;
use TheDragonRing\BoxOfBits\Commands\heal;
use TheDragonRing\BoxOfBits\Commands\suicide;
use TheDragonRing\BoxOfBits\Commands\slay;
use TheDragonRing\BoxOfBits\Commands\info;
use TheDragonRing\BoxOfBits\Commands\message;
use TheDragonRing\BoxOfBits\Commands\popup;
use TheDragonRing\BoxOfBits\Commands\tip;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as Colour;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;

class Loader extends PluginBase{
    
    const AUTHOR = "TheDragonRing";
    const VERSION = "1.2.3";
    const MAIN_WEBSITE = "https://thedragonring.github.io/BoxOfBits/";
    const PREFIX = "§0§l[§r§bBoxOfBits§0§l]§r";
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        $this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
            
        ));
        $this->saveResource("config.yml");
        $this->getLogger()->info("§aEnabled!");
    }
    
    public function onDisable(){
        $this->getLogger()->getInfo("§4Disabled!");
    }
    
}
