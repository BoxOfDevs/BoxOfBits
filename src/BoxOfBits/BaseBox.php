<?php

/*
 *  /$$$$$$$                       /$$$$$$   /$$$$$$  /$$$$$$$  /$$   /$$             
 * | $$__  $$                     /$$__  $$ /$$__  $$| $$__  $$|__/  | $$             
 * | $$  \ $$  /$$$$$$  /$$   /$$| $$  \ $$| $$  \__/| $$  \ $$ /$$ /$$$$$$   /$$$$$$$
 * | $$$$$$$  /$$__  $$|  $$ /$$/| $$  | $$| $$$$    | $$$$$$$ | $$|_  $$_/  /$$_____/
 * | $$__  $$| $$  \ $$ \  $$$$/ | $$  | $$| $$_/    | $$__  $$| $$  | $$   |  $$$$$$ 
 * | $$  \ $$| $$  | $$  >$$  $$ | $$  | $$| $$      | $$  \ $$| $$  | $$ /$$\____  $$
 * | $$$$$$$/|  $$$$$$/ /$$/\  $$|  $$$$$$/| $$      | $$$$$$$/| $$  |  $$$$//$$$$$$$/
 * |_______/  \______/ |__/  \__/ \______/ |__/      |_______/ |__/   \___/ |_______/
 *
 * @author BoxOfDevs Team
 * @version 1.0.0
 * @description The growing plugin with so many features!
 * @license Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License, Copyright © 2017 BoxOfDevs Team
 * @website boxofdevs.com
 *
 */

namespace BoxOfBits;

use BoxOfBits\Commands\Broadcast\addbroadcast;
use BoxOfBits\Tasks\BroadcastTask;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\IPlayer;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\scheduler\PluginTask;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;

class BaseBox extends PluginBase implements Listener, CommandExecutor {
	
	//Constant Variables...
	const Author = "BoxOfDevs Team";
	const Version = "1.0.0";
	const Description = "The growing plugin with so many features!";
	const License = "Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License, Copyright © 2017 BoxOfDevs Team";
	const Website = "boxofdevs.com";
	const Prefix = TF::BLACK.TF::BOLD."[".TF::RESET.TF::AQUA."BoxOfBits".TF::BLACK.TF::BOLD."]".TF::RESET." ";

	public function onLoad(){
		//Loading Message...
		$this->getLogger()->info(TF::GOLD."Loading...");
	}

	public function onEnable(){
		//Configuration Stuff...
		$this->saveConfigs();

		//Register Events & Commands...
		// $this->registerEvents();
		$this->registerCommands();

		//Start Broadcast Task...
		$broadcastSettings = $this->getBroadcastSettings();
		if($broadcastSettings["Enabled"] === true){
			$this->getServer()->getScheduler()->scheduleRepeatingTask(new BroadcastTask($this), $broadcastSettings["SecondsBetweenBroadcast"] * 20);
		}

		//Enabled Message...
		$this->getLogger()->info(TF::GREEN."Enabled!");
	}

	public function onDisable(){
		//Configuration Stuff...
		$this->saveConfigs();

		//Disabled Message...
		$this->getLogger()->info(TF::DARK_RED . "Disabled!");
	}

/*
 *  /$$$$$$$                       /$$$$$$  /$$$$$$$  /$$$$$$
 * | $$__  $$                     /$$__  $$| $$__  $$|_  $$_/
 * | $$  \ $$  /$$$$$$  /$$   /$$| $$  \ $$| $$  \ $$  | $$  
 * | $$$$$$$  /$$__  $$|  $$ /$$/| $$$$$$$$| $$$$$$$/  | $$  
 * | $$__  $$| $$  \ $$ \  $$$$/ | $$__  $$| $$____/   | $$  
 * | $$  \ $$| $$  | $$  >$$  $$ | $$  | $$| $$        | $$  
 * | $$$$$$$/|  $$$$$$/ /$$/\  $$| $$  | $$| $$       /$$$$$$
 * |_______/  \______/ |__/  \__/|__/  |__/|__/      |______/
 *
 */

	/*
	 *   _____        _        
	 *  |  __ \      | |       
	 *  | |  | | __ _| |_ __ _ 
	 *  | |  | |/ _` | __/ _` |
	 *  | |__| | (_| | || (_| |
	 *  |_____/ \__,_|\__\__,_|
	 *
	 */

	public function saveConfigs(){
		//Creates Configuration Files Directory..
		@mkdir($this->getDataFolder());

		//Loads & Saves: Settings.yml...
		$this->saveResource("Settings.yml");
		$settings = $this->getSettings();
		$settings->save();

		//Loads & Saves: Messages.yml...
		$this->saveResource("Messages.yml");
		$messages = $this->getMessages();
		$messages->save();

		//Loads & Saves: PlayerData.yml...
		$this->saveResource("PlayerData.yml");
		$playerData = $this->getPlayerData();
		$playerData->save();
	}

	public function registerEvents(){
		//Registers exampleEvent...
		$this->getServer()->getPluginManager()->registerEvents(new exampleEvent($this),$this);
	}

	public function registerCommands(){
		//Registers addbroadcast...
		$this->getCommand("addbroadcast")->setExecutor(new addbroadcast($this));
	}

	public function getSettings(){
		//Returns Settings.yml...
		return ($settings = new Config($this->getDataFolder()."Settings.yml", Config::YAML));
	}

	public function getMessages(){
		//Returns Messages.yml...
		return ($messages = new Config($this->getDataFolder()."Messages.yml", Config::YAML));
	}

	public function getPlayerData(){
		//Returns PlayerData.yml...
		return ($playerData = new Config($this->getDataFolder()."PlayerData.yml", Config::YAML));
	}

	public function getAuthor(){
		//Returns Author...
		return ($author = self::Author);
	}

	public function getVersion(){
		//Returns Version...
		return ($version = self::Version);
	}

	public function getPlugDescription(){
		//Returns Description...
		return ($description = self::Description);
	}

	public function getLicense(){
		//Returns License...
		return ($license = self::License);
	}

	public function getWebsite(){
		//Returns Website...
		return ($website = self::Website);
	}

	public function getPrefix(){
		//Returns Prefix...
		return ($prefix = self::Prefix);
	}

	/*
	 *   ______                         _   _   _             
	 *  |  ____|                       | | | | (_)            
	 *  | |__ ___  _ __ _ __ ___   __ _| |_| |_ _ _ __   __ _ 
	 *  |  __/ _ \| '__| '_ ` _ \ / _` | __| __| | '_ \ / _` |
	 *  | | | (_) | |  | | | | | | (_| | |_| |_| | | | | (_| |
	 *  |_|  \___/|_|  |_| |_| |_|\__,_|\__|\__|_|_| |_|\__, |
	 *                                                   __/ |
	 *                                                  |___/
	 *
	 */

	public function formatText($text){
		//Defines Colours...
		$colours = array(TF::BLACK, TF::DARK_BLUE, TF::DARK_GREEN, TF::DARK_AQUA, TF::DARK_RED, TF::DARK_PURPLE, TF::GOLD, TF::GRAY, TF::DARK_GRAY, TF::BLUE, TF::GREEN, TF::AQUA, TF::RED, TF::LIGHT_PURPLE, TF::YELLOW, TF::WHITE, TF::OBFUSCATED, TF::BOLD, TF::STRIKETHROUGH, TF::UNDERLINE, TF::ITALIC, TF::RESET);

		//Formats Symbol Colours...
		$symbols1 = array("§0", "§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§f", "§k", "§l", "§m", "§n", "§o", "§r");
		$symbols2 = array("&0", "&1", "&2", "&3", "&4", "&5", "&6", "&7", "&8", "&9", "&a", "&b", "&c", "&d", "&e", "&f", "&k", "&l", "&m", "&n", "&o", "&r");
		$text = str_replace($symbols1, $colours, $text);
		$text = str_replace($symbols2, $colours, $text);

		//Formats {COLOUR}'s...
		$tags = array("{COLOUR_BLACK}", "{COLOUR_DARK_BLUE}", "{COLOUR_DARK_GREEN}", "{COLOUR_DARK_AQUA}", "{COLOUR_DARK_RED}", "{COLOUR_DARK_PURPLE}", "{COLOUR_GOLD}", "{COLOUR_GRAY}", "{COLOUR_DARK_GRAY}", "{COLOUR_BLUE}", "{COLOUR_GREEN}", "{COLOUR_AQUA}", "{COLOUR_RED}", "{COLOUR_LIGHT_PURPLE}", "{COLOUR_YELLOW}", "{COLOUR_WHITE}", "{COLOUR_OBFUSCATED}", "{COLOUR_BOLD}", "{COLOUR_STRIKETHROUGH}", "{COLOUR_UNDERLINE}", "{COLOUR_ITALIC}", "{COLOUR_RESET}");
		$text = str_replace($tags, $colours, $text);

		//Formats Other Stuff...
		$text = str_replace("{LINE}", "\n", $text);

		//Returns Final Text...
		return $text;
	}

	public function stripTextColour($text){
		//Defines Reset...
		$reset = array(TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET, TF::RESET);

		//Removes Symbol Colour's...
		$symbols1 = array("§0", "§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§f", "§k", "§l", "§m", "§n", "§o", "§r");
		$symbols2 = array("&0", "&1", "&2", "&3", "&4", "&5", "&6", "&7", "&8", "&9", "&a", "&b", "&c", "&d", "&e", "&f", "&k", "&l", "&m", "&n", "&o", "&r");
		$text = str_replace($symbols1, $reset, $text);
		$text = str_replace($symbols2, $reset, $text);

		//Removes {COLOUR}'s...
		$tags = array("{COLOUR_BLACK}", "{COLOUR_DARK_BLUE}", "{COLOUR_DARK_GREEN}", "{COLOUR_DARK_AQUA}", "{COLOUR_DARK_RED}", "{COLOUR_DARK_PURPLE}", "{COLOUR_GOLD}", "{COLOUR_GRAY}", "{COLOUR_DARK_GRAY}", "{COLOUR_BLUE}", "{COLOUR_GREEN}", "{COLOUR_AQUA}", "{COLOUR_RED}", "{COLOUR_LIGHT_PURPLE}", "{COLOUR_YELLOW}", "{COLOUR_WHITE}", "{COLOUR_OBFUSCATED}", "{COLOUR_BOLD}", "{COLOUR_STRIKETHROUGH}", "{COLOUR_UNDERLINE}", "{COLOUR_ITALIC}", "{COLOUR_RESET}");
		$text = str_replace($tags, $reset, $text);

		//Returns Final Text...
		return $text;
	}

	/*
	 *   ____                      _               _       
	 *  |  _ \                    | |             | |      
	 *  | |_) |_ __ ___   __ _  __| | ___ __ _ ___| |_ ___ 
	 *  |  _ <| '__/ _ \ / _` |/ _` |/ __/ _` / __| __/ __|
	 *  | |_) | | | (_) | (_| | (_| | (_| (_| \__ \ |_\__ \
	 *  |____/|_|  \___/ \__,_|\__,_|\___\__,_|___/\__|___/
	 *
	*/

	public function getBroadcastSettings(){
		//Gets Broadcast Settings...
		$settings = $this->getSettings();
		$broadcastSettings = $settings->get("Broadcast");

		//Returns Broadcast Settings...
		return $broadcastSettings;
	}

	public function getBroadcasts(){
		//Gets Broadcasts...
		$messages = $this->getMessages();
		$broadcasts = $messages->get("Broadcasts");

		//Returns Broadcasts...
		return $broadcasts;
	}

	public function addBroadcast($broadcast){
		//Adds Broadcast...
		$messages = $this->getMessages();
		$broadcasts = $messages->get("Broadcasts");
		array_push($broadcasts, $broadcast);
		$messages->set("Broadcasts", $broadcasts);

		//Saves Data...
		$messages->save();
	}

	public function sendBroadcast($type){
		//Gets Broadcasts & Broadcast Settings...
		$broadcastSettings = $this->getBroadcastSettings();
		$prefix = $broadcastSettings["Prefix"];
		$broadcasts = $this->getBroadcasts();

		//Chooses Random Broadcast...
		$msgamount = rand(1, count($broadcasts)-1);
		$message = $broadcasts[$msgamount];
		
		//Gets Players...
		foreach($this->getServer()->getOnlinePlayers() as $player){
			if($player->hasPermission("boxofbits") || $sender->hasPermission("boxofbits.broadcast") || $sender->hasPermission("boxofbits.broadcast.recieve")){

				//Broadcasts Message...
				if($type === "Message"){
					$player->sendMessage($this->formatText($prefix) . " " . $this->formatText($message));
				}elseif($type === "Popup"){
					$player->sendPopup($this->formatText($prefix) . " " . $this->formatText($message));
				}
			}
		}
	}

	public function sendCustomBroadcast($type, $prefix, $message){
		//Broadcasts Message...
		if($type === "Message"){
			$this->getServer()->broadcastMessage($this->formatText($prefix) . " " . $this->formatText($message));
		}elseif($type === "Popup"){
			$this->getServer()->broadcastPopup($this->formatText($prefix) . " " . $this->formatText($message));
		}
	}
}