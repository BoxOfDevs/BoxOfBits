<?php

/*
 *
 * $$$$$$$\                       $$$$$$\   $$$$$$\  $$$$$$$\  $$\   $$\               
 * $$  __$$\                     $$  __$$\ $$  __$$\ $$  __$$\ \__|  $$ |              
 * $$ |  $$ | $$$$$$\  $$\   $$\ $$ /  $$ |$$ /  \__|$$ |  $$ |$$\ $$$$$$\    $$$$$$$\ 
 * $$$$$$$\ |$$  __$$\ \$$\ $$  |$$ |  $$ |$$$$\     $$$$$$$\ |$$ |\_$$  _|  $$  _____|
 * $$  __$$\ $$ /  $$ | \$$$$  / $$ |  $$ |$$  _|    $$  __$$\ $$ |  $$ |    \$$$$$$\  
 * $$ |  $$ |$$ |  $$ | $$  $$<  $$ |  $$ |$$ |      $$ |  $$ |$$ |  $$ |$$\  \____$$\ 
 * $$$$$$$  |\$$$$$$  |$$  /\$$\  $$$$$$  |$$ |      $$$$$$$  |$$ |  \$$$$  |$$$$$$$  |
 * \_______/  \______/ \__/  \__| \______/ \__|      \_______/ \__|   \____/ \_______/ 
 *
 * @author BoxOfDevs Team
 * @link http://boxofdevs.com
 * @description The growing plugin with so many features!
 * @license MIT License, Copyright © 2016 BoxOfDevs Team
 *
 */

namespace BoxOfBits\tasks;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\utils\Config;

class BroadcastTask extends PluginTask{

	public function __construct(Loader $plugin){
		parent::__construct($plugin);
		$this->plugin = $plugin;
	}

	public function onRun($tick){
		$config = new Config($this->getDataFolder() . "config.yml", config::YAML);
		$broadcastsettings = $config->get("BroadcastSettings");
		if($broadcastsettings["Enabled"] === "Yes"){
			$prefix = $$broadcastsettings["Prefix"] . " ";
			$broadcasts = str_replace("{LINE}", "\n", $config->get("Broadcasts"));
			$msgamount = rand(1, count($broadcasts)-1);
			$message = $broadcasts[$msgamount];
			if($broadcastsettings["Type"] === "Message"){
				$this->getServer()->broadcastMessage($this->SymbolFormat($prefix) . $this->SymbolFormat($message));
			}elseif($broadcastsettings["Type"] === "Popup"){
				$this->getServer()->broadcastPopup($this->SymbolFormat($prefix) . $this->SymbolFormat($message));
			}
		}
	}

}

?>
