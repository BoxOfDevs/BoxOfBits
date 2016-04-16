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

namespace BoxOfBits;

use BoxOfBits\commands\xyz;
use BoxOfBits\commands\rules;
use BoxOfBits\commands\info;
use BoxOfBits\commands\fly;
use BoxOfBits\commands\Teleport\wild;
use BoxOfBits\commands\PermissionsManager\setperm;
use BoxOfBits\commands\PermissionsManager\rmperm;
use BoxOfBits\commands\PermissionsManager\checkperm;
// use BoxOfBits\commands\PermissionsManager\seeperms;
use BoxOfBits\commands\NameTag\nick;
use BoxOfBits\commands\NameTag\hidetag;
use BoxOfBits\commands\Message\message;
use BoxOfBits\commands\Message\popup;
use BoxOfBits\commands\Message\tip;
use BoxOfBits\commands\Message\pm;
use BoxOfBits\commands\HealthManager\heal;
use BoxOfBits\commands\HealthManager\health;
use BoxOfBits\commands\HealthManager\slay;
use BoxOfBits\commands\HealthManager\suicide;
use BoxOfBits\commands\Gamemode\gma;
use BoxOfBits\commands\Gamemode\gmc;
use BoxOfBits\commands\Gamemode\gms;
use BoxOfBits\commands\Gamemode\gmsp;
use BoxOfBits\utils\SymbolFormat;
use BoxOfBits\Events\Bed;
use BoxOfBits\Events\Chat;
use BoxOfBits\Events\Death;
use BoxOfBits\Events\GamemodeChange;
use BoxOfBits\Events\Join;
use BoxOfBits\Events\Kick;
use BoxOfBits\Events\Quit;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\Listener;

class Loader extends PluginBase extends Listener{
    
    const AUTHOR = "BoxOfDevs Team";
    const VERSION = "1.2.3";
    const WEBSITE = "https://boxofdevs.github.io/BoxOfBits/";
    const PREFIX = "§0§l[§r§bBoxOfBits§0§l]§r";
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->reloadConfig();
        $config_data =
        $this->getConfig()->set($config_data);
        $this->getConfig()->save();
        $this->getLogger()->info(TF::GREEN . "Enabled!");
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

    public function getWebsite(){
        return self::WEBSITE;
    }

    public function onDisable(){
        $this->getLogger()->info(TF::RED . "Disabled!");
    }
    
}

?>
