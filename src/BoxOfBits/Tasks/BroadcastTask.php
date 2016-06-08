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

use BoxOfBits\BaseFiles\BaseAPI;

use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\utils\Config;

class BroadcastTask extends PluginTask{

	public function __construct(Loader $plugin){
		parent::__construct($plugin);
		$this->plugin = $plugin;
	}

	public function onRun($tick){
		$this->loadConfigBox();
		$broadcastSettings = $this->getBroadcastSettings();
		if($broadcastSettings["Enabled"] === "Yes"){
			$this->sendBroadcast($broadcastsettings["Type"]);
		}
	}

}

?>
