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

namespace BoxOfBits;

use BoxOfBits\tasks\BroadcastTask;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;

class Loader extends PluginBase implements Listener, CommandExecutor{

    const AUTHOR = "BoxOfDevs Team";
    const VERSION = "1.5";
    const WEBSITE = "boxofdevs.com";
    const PREFIX = TF::BLACK . "[" . TF::AQUA . "BoxOfBits" . TF::BLACK . "]";
    const DESCRIPTION = "The growing plugin with so many features!";
    const LICENSE = "MIT License";

	public function onEnable(){
		@mkdir($this->getDataFolder());
		$this->saveResource("config.yml");
		$config = new Config($this->getDataFolder() . "config.yml", config::YAML);
		$config->save();
		$this->saveResource("messages.yml");
		$messages = new Config($this->getDataFolder() . "messages.yml", config::YAML);
		$messages->save();
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$broadcastsettings = $config->get("BroadcastSettings");
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new BroadcastTask($this), $broadcastsettings["SecondsBetweenBroadcast"] * 20);
		$this->getLogger()->info(TF::GREEN . "Enabled!");
	}

	public function onDisable(){
		$this->getLogger()->info(TF::RED . "Disabled!");
	}

}

?>
