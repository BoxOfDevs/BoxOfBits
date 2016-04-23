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
use BoxOfBits\commands\PermissionsManager\hasperm;
use BoxOfBits\commands\PermissionsManager\seeperms;
use BoxOfBits\commands\PermissionsManager\allperms;
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
use BoxOfBits\events\Bed;
use BoxOfBits\events\Chat;
use BoxOfBits\events\Death;
use BoxOfBits\events\GamemodeChange;
use BoxOfBits\events\Join;
use BoxOfBits\events\Kick;
use BoxOfBits\events\Quit;
use BoxOfBits\events\Sign;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

class Loader extends PluginBase extends Listener{
    
    const AUTHOR = "BoxOfDevs Team";
    const VERSION = "1.2.3";
    const WEBSITE = "https://boxofdevs.x10host.com/software/BoxOfBits/";
    const PREFIX = TF::BLACK . "[" . TF::AQUA . "BoxOfBits" . TF::BLACK . "]";
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $messages = new Config($this->getDataFolder . "/messages.yml", Config::YAML);
        $this->messages->save();
        $this->getLogger()->info(self::PREFIX . TF::GREEN . "Enabled!");
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
        $this->getLogger()->info(self::PREFIX . TF::RED . "Disabled!");
    }
    
}

?>
