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

namespace BoxOfBits\BaseFiles;

use BoxOfBits\Loader;
use BoxOfBits\Tasks\BroadcastTask;

use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;

class BaseAPI{

	private $box;

	private static $instance;

	const AUTHOR = "BoxOfDevs Team";
	const VERSION = "1.5";
	const WEBSITE = "boxofdevs.com";
	const PREFIX = TF::BLACK . "[" . TF::AQUA . "BoxOfBits" . TF::BLACK . "]";
	const DESCRIPTION = "The growing plugin with so many features!";
	const LICENSE = "MIT License";

	public function __construct(Loader $box){
		$this->box = $box;
		self::$instance = $this;
		$this->saveConfigBox;
	}

	public function saveConfigBox(){
		$this->saveResource("config.yml");
		$config = new Config($this->getDataFolder() . "config.yml", config::YAML);
		$config->save();
		$this->saveResource("messages.yml");
		$messages = new Config($this->getDataFolder() . "messages.yml", config::YAML);
		$messages->save();
	}

	public function formatText($message){
		$symbol = "&";
		$othersymbol = "§";
		$message = str_replace($symbol . "0", TF::BLACK, $message);
		$message = str_replace($symbol . "1", TF::DARK_BLUE, $message);
		$message = str_replace($symbol . "2", TF::DARK_GREEN, $message);
		$message = str_replace($symbol . "3", TF::DARK_AQUA, $message);
		$message = str_replace($symbol . "4", TF::DARK_RED, $message);
		$message = str_replace($symbol . "5", TF::DARK_PURPLE, $message);
		$message = str_replace($symbol . "6", TF::GOLD, $message);
		$message = str_replace($symbol . "7", TF::GRAY, $message);
		$message = str_replace($symbol . "8", TF::DARK_GRAY, $message);
		$message = str_replace($symbol . "9", TF::BLUE, $message);
		$message = str_replace($symbol . "a", TF::GREEN, $message);
		$message = str_replace($symbol . "b", TF::AQUA, $message);
		$message = str_replace($symbol . "c", TF::RED, $message);
		$message = str_replace($symbol . "d", TF::LIGHT_PURPLE, $message);
		$message = str_replace($symbol . "e", TF::YELLOW, $message);
		$message = str_replace($symbol . "f", TF::WHITE, $message);
		$message = str_replace($symbol . "k", TF::OBFUSCATED, $message);
		$message = str_replace($symbol . "l", TF::BOLD, $message);
		$message = str_replace($symbol . "m", TF::STRIKETHROUGH, $message);
		$message = str_replace($symbol . "n", TF::UNDERLINE, $message);
		$message = str_replace($symbol . "o", TF::ITALIC, $message);
		$message = str_replace($symbol . "r", TF::RESET, $message);
		$message = str_replace($othersymbol . "0", TF::BLACK, $message);
		$message = str_replace($othersymbol . "1", TF::DARK_BLUE, $message);
		$message = str_replace($othersymbol . "2", TF::DARK_GREEN, $message);
		$message = str_replace($othersymbol . "3", TF::DARK_AQUA, $message);
		$message = str_replace($othersymbol . "4", TF::DARK_RED, $message);
		$message = str_replace($othersymbol . "5", TF::DARK_PURPLE, $message);
		$message = str_replace($othersymbol . "6", TF::GOLD, $message);
		$message = str_replace($othersymbol . "7", TF::GRAY, $message);
		$message = str_replace($othersymbol . "8", TF::DARK_GRAY, $message);
		$message = str_replace($othersymbol . "9", TF::BLUE, $message);
		$message = str_replace($othersymbol . "a", TF::GREEN, $message);
		$message = str_replace($othersymbol . "b", TF::AQUA, $message);
		$message = str_replace($othersymbol . "c", TF::RED, $message);
		$message = str_replace($othersymbol . "d", TF::LIGHT_PURPLE, $message);
		$message = str_replace($othersymbol . "e", TF::YELLOW, $message);
		$message = str_replace($othersymbol . "f", TF::WHITE, $message);
		$message = str_replace($othersymbol . "k", TF::OBFUSCATED, $message);
		$message = str_replace($othersymbol . "l", TF::BOLD, $message);
		$message = str_replace($othersymbol . "m", TF::STRIKETHROUGH, $message);
		$message = str_replace($othersymbol . "n", TF::UNDERLINE, $message);
		$message = str_replace($othersymbol . "o", TF::ITALIC, $message);
		$message = str_replace($othersymbol . "r", TF::RESET, $message);
        return $message;
    }

	public function getBroadcastSettings(){
		$config = new Config($this->getDataFolder() . "config.yml", config::YAML);
		$broadcastSettings = $config->get("BroadcastSettings");
		return $broadcastSettings;
	}

	public function getBroadcasts(){
		$config = new Config($this->getDataFolder() . "messages.yml", config::YAML);
		$broadcasts = str_replace("{LINE}", "\n", $config->get("Broadcasts"));
		return $broadcasts;
	}

	public function sendBroadcast($type){
		$broadcastSettings = $this->getBroadcastSettings();
		$prefix = $$broadcastSettings["Prefix"] . " ";
		$broadcasts = $this->getBroadcasts();
		$msgamount = rand(1, count($broadcasts)-1);
		if($type === "Message"){
			$this->getServer()->broadcastMessage($this->formatText($prefix) . $this->formatText($message));
		}elseif($type === "Popup"){
			$this->getServer()->broadcastPopup($this->formatText($prefix) . $this->formatText($message));
		}
	}

}

?>
