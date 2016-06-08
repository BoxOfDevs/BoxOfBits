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

use BoxOfBits\BaseFiles\BaseAPI;
use BoxOfBits\Tasks\BroadcastTask;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;

class Loader extends PluginBase implements Listener, CommandExecutor{

	public function onEnable(){
		$this->loadConfigBox();
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$broadcastSettings = $this->getBroadcastSettings();
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new BroadcastTask($this), $broadcastSettings["SecondsBetweenBroadcast"] * 20);
		$this->getLogger()->info(TF::GREEN . "Enabled!");
	}

	public function onDisable(){
		$this->getLogger()->info(TF::RED . "Disabled!");
	}

}

?>
