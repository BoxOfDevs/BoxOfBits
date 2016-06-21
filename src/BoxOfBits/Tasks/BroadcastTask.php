<?php

/*
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
 * @version 1.1
 * @description The growing plugin with so many features!
 * @license BoxOfDevs General Software License 1.1, Copyright © 2016 BoxOfDevs Team
 * @website boxofdevs.com
 * @prefix [BoxOfBits]
 *
 */

namespace BoxOfBits\Tasks;

use BoxOfBits\BaseBox;

use pocketmine\scheduler\PluginTask;
use pocketmine\Server;

class BroadcastTask extends PluginTask{

	public function __construct(BaseBox $BoxAPI){
		parent::__construct($BoxAPI);
		$this->getBoxAPI = $BoxAPI;
	}

	public function onRun($tick){
		$broadcastSettings = $this->getBoxAPI->getBroadcastSettings();
		if($broadcastSettings["Enabled"] === "Yes"){
			$this->getBoxAPI->sendBroadcast($broadcastSettings["Type"]);
		}
	}

}

?>
