<?php

namespace BoxOfBits\tasks;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;

class BroadcastTask extends PluginTask{ // Never forget to set the class name to the file name

    public function __construct(Broadcast $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }

    public function onRun($tick){
        $config = new Config($this->getDataFolder . "config.yml", Config::YAML); // the "/" are not needed since the $this->getDataFolder() automaticly fill it
        $messages = new Config($this->getDataFolder . "messages.yml", Config::YAML);
	$broadcast = str_replace("{line}", "\n", $messages->get("Broadcasts"));
        $prefix = $messages->get("BroadcastPrefix")." "; // Or the message would be right next to the prefix :/
        $msgnumber = rand(1,5);
        if($msgnumber === 1){
            $this->getServer()->broadcastMessage($prefix . $broadcast[1]);
        }elseif($msgnumber === 2){
            $this->getServer()->broadcastMessage($prefix . $broadcast[2]);
        }elseif($msgnumber === 3){
            $this->getServer()->broadcastMessage($prefix . $broadcast[3]);
        }elseif($msgnumber === 4){
            $this->getServer()->broadcastMessage($prefix . $broadcast[4]);
        }elseif($msgnumber === 5){
            $this->getServer()->broadcastMessage($prefix . $broadcast[5]);
        }
    }

}

?>
