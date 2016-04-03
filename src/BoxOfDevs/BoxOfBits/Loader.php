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

namespace BoxOfDevs\BoxOfBits;

use BoxOfDevs\BoxOfBits\Events\Join;
use BoxOfDevs\BoxOfBits\Events\Leave;
use BoxOfDevs\BoxOfBits\Events\GamemodeChange;
use BoxOfDevs\BoxOfBits\Events\Bed;
use BoxOfDevs\BoxOfBits\Events\Kick;
use BoxOfDevs\BoxOfBits\Events\Death;
use BoxOfDevs\BoxOfBits\Commands\fly;
use BoxOfDevs\BoxOfBits\Commands\gmc;
use BoxOfDevs\BoxOfBits\Commands\gms;
use BoxOfDevs\BoxOfBits\Commands\gma;
use BoxOfDevs\BoxOfBits\Commands\gmsp;
use BoxOfDevs\BoxOfBits\Commands\xyz;
use BoxOfDevs\BoxOfBits\Commands\rules;
use BoxOfDevs\BoxOfBits\Commands\hidetag;
use BoxOfDevs\BoxOfBits\Commands\health;
use BoxOfDevs\BoxOfBits\Commands\heal;
use BoxOfDevs\BoxOfBits\Commands\suicide;
use BoxOfDevs\BoxOfBits\Commands\slay;
use BoxOfDevs\BoxOfBits\Commands\info;
use BoxOfDevs\BoxOfBits\Commands\message;
use BoxOfDevs\BoxOfBits\Commands\popup;
use BoxOfDevs\BoxOfBits\Commands\tip;
use BoxOfDevs\BoxOfBits\Commands\nick;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as Colour;
use pocketmine\event\Listener;

class Loader extends PluginBase{
    
    const AUTHOR = "BoxOfDevs Team";
    const VERSION = "1.2.3";
    const MAIN_WEBSITE = "https://BoxOfDevs.github.io/BoxOfBits/";
    const PREFIX = "§0§l[§r§bBoxOfBits§0§l]§r";
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->reloadConfig();
        $this->getConfig()->set("", "");
        $this->getConfig()->save();
        $this->getLogger()->info(Colour::GREEN . "Enabled!");
    }

    public function getPrefix(){
        return self::PREFIX;
    }

    public function getAuthor(){
        return self::AUTHOR;
    }

    public function getVersion(){
        return self::VERSION;
    }

    public function getMainWebsite(){
        return self::MAIN_WEBSITE;
    }

    public function onDisable(){
        $this->getLogger()->info(Colour::RED . "Disabled!");
    }
    
}
