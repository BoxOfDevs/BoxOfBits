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
 * @version 1.0.0
 * @description The growing plugin with so many features!
 * @license Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License, Copyright © 2016 BoxOfDevs Team
 * @website boxofdevs.com
 * @prefix [BoxOfBits]
 *
 */

namespace BoxOfBits\Tasks;

use BoxOfBits\BaseBox;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\IPlayer;
use pocketmine\scheduler\PluginTask;

class BroadcastTask extends PluginTask{

	public function __construct(BaseBox $BaseBox){
		parent::__construct($BaseBox);
		$this->BaseBox = $BaseBox;
	}

	public function getAPI(){
		return ($api = $this->BaseBox);
	}

	public function onRun($tick){
		$broadcastSettings = $this->getAPI()->getBroadcastSettings();
		$this->getAPI()->sendBroadcast($broadcastSettings["Type"]);
	}

}

?>
