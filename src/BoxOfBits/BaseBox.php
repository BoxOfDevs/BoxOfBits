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

namespace BoxOfBits;

use BoxOfBits\Tasks\BroadcastTask;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;

class BaseBox extends PluginBase implements Listener, CommandExecutor{

	const Author = "BoxOfDevs Team";
    const Version = "1.1";
    const Description = "The growing plugin with so many features!";
    const License = "BoxOfDevs General Software License 1.1, Copyright © 2016 BoxOfDevs Team";
    const Website = "boxofdevs.com";
    const Prefix = "§0§l[§r§bBoxOfBits§p§l]§r";

    public function onLoad(){
        //Loading Message...
		$this->getLogger()->info(TF::DARK_GREEN . "Loading BoxOfBits...");
    }

	public function onEnable(){
	    //Configuration Stuff...
		$this->saveBoxConfig();

		//Register Events & Commands...
		$this->getServer()->getPluginManager()->registerEvents($this,$this);

        //Start Broadcast Task...
		$broadcastSettings = $this->getBroadcastSettings();
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new BroadcastTask($this), $broadcastSettings["SecondsBetweenBroadcast"] * 20);

		//Enabled Message...
		$this->getLogger()->info(TF::DARK_GREEN . "BoxOfBits Enabled!");
	}

	public function onDisable(){
	    //Configuration Stuff...
		$this->saveBoxConfig();

	    //Disabled Message...
        $this->getLogger()->info(TF::DARK_GREEN . "BoxOfBits Disabled!");
	}

	/*
	 *  $$$$$$\                        $$\                                    $$$$$$\  $$$$$$$\ $$$$$$\ 
	 * $$  __$$\                       $$ |                                  $$  __$$\ $$  __$$\\_$$  _|
	 * $$ /  \__|$$\   $$\  $$$$$$$\ $$$$$$\    $$$$$$\  $$$$$$\$$$$\        $$ /  $$ |$$ |  $$ | $$ |  
	 * $$ |      $$ |  $$ |$$  _____|\_$$  _|  $$  __$$\ $$  _$$  _$$\       $$$$$$$$ |$$$$$$$  | $$ |  
	 * $$ |      $$ |  $$ |\$$$$$$\    $$ |    $$ /  $$ |$$ / $$ / $$ |      $$  __$$ |$$  ____/  $$ |  
	 * $$ |  $$\ $$ |  $$ | \____$$\   $$ |$$\ $$ |  $$ |$$ | $$ | $$ |      $$ |  $$ |$$ |       $$ |  
	 * \$$$$$$  |\$$$$$$  |$$$$$$$  |  \$$$$  |\$$$$$$  |$$ | $$ | $$ |      $$ |  $$ |$$ |     $$$$$$\ 
	 *  \______/  \______/ \_______/    \____/  \______/ \__| \__| \__|      \__|  \__|\__|     \______|
	 *
	 */

	public function getBoxAuthor(){
		return self::Author;
	}

	public function getBoxVersion(){
		return self::Version;
	}

	public function getBoxDescription(){
		return self::Description;
	}

	public function getBoxLicense(){
		return self::License;
	}

	public function getBoxWebsite(){
		return self::Website;
	}

	public function getBoxPrefix(){
		return self::Prefix;
	}

	public function saveBoxConfig(){
		//Creates Configuration Files Directory..
		@mkdir($this->getDataFolder());

		//Loads & Saves: config.yml...
		$this->saveResource("config.yml");
		$config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
		$config->save();

		//Loads & Saves: messages.yml...
		$this->saveResource("messages.yml");
		$messages = new Config($this->getDataFolder() . "messages.yml", Config::YAML);
		$messages->save();

		//Loads & Saves: playerData.yml...
		$this->saveResource("playerData.yml");
		$playerData = new Config($this->getDataFolder() . "playerData.yml", Config::YAML);
		$playerData->save();
	}

	public function formatText($text){
		//Formats Symbol Colour's...
		$text = str_replace("&0", TF::BLACK, $text);
		$text = str_replace("&1", TF::DARK_BLUE, $text);
		$text = str_replace("&2", TF::DARK_GREEN, $text);
		$text = str_replace("&3", TF::DARK_AQUA, $text);
		$text = str_replace("&4", TF::DARK_RED, $text);
		$text = str_replace("&5", TF::DARK_PURPLE, $text);
		$text = str_replace("&6", TF::GOLD, $text);
		$text = str_replace("&7", TF::GRAY, $text);
		$text = str_replace("&8", TF::DARK_GRAY, $text);
		$text = str_replace("&9", TF::BLUE, $text);
		$text = str_replace("&a", TF::GREEN, $text);
		$text = str_replace("&b", TF::AQUA, $text);
		$text = str_replace("&c", TF::RED, $text);
		$text = str_replace("&d", TF::LIGHT_PURPLE, $text);
		$text = str_replace("&e", TF::YELLOW, $text);
		$text = str_replace("&f", TF::WHITE, $text);
		$text = str_replace("&k", TF::OBFUSCATED, $text);
		$text = str_replace("&l", TF::BOLD, $text);
		$text = str_replace("&m", TF::STRIKETHROUGH, $text);
		$text = str_replace("&n", TF::UNDERLINE, $text);
		$text = str_replace("&o", TF::ITALIC, $text);
		$text = str_replace("&r", TF::RESET, $text);
		$text = str_replace("§0", TF::BLACK, $text);
		$text = str_replace("§1", TF::DARK_BLUE, $text);
		$text = str_replace("§2", TF::DARK_GREEN, $text);
		$text = str_replace("§3", TF::DARK_AQUA, $text);
		$text = str_replace("§4", TF::DARK_RED, $text);
		$text = str_replace("§5", TF::DARK_PURPLE, $text);
		$text = str_replace("§6", TF::GOLD, $text);
		$text = str_replace("§7", TF::GRAY, $text);
		$text = str_replace("§8", TF::DARK_GRAY, $text);
		$text = str_replace("§9", TF::BLUE, $text);
		$text = str_replace("§a", TF::GREEN, $text);
		$text = str_replace("§b", TF::AQUA, $text);
		$text = str_replace("§c", TF::RED, $text);
		$text = str_replace("§d", TF::LIGHT_PURPLE, $text);
		$text = str_replace("§e", TF::YELLOW, $text);
		$text = str_replace("§f", TF::WHITE, $text);
		$text = str_replace("§k", TF::OBFUSCATED, $text);
		$text = str_replace("§l", TF::BOLD, $text);
		$text = str_replace("§m", TF::STRIKETHROUGH, $text);
		$text = str_replace("§n", TF::UNDERLINE, $text);
		$text = str_replace("§o", TF::ITALIC, $text);
		$text = str_replace("§r", TF::RESET, $text);

		//Formats {COLOUR}'s...
		$text = str_replace("{COLOUR_BLACK}", TF::BLACK, $text);
		$text = str_replace("{COLOUR_DARK_BLUE}", TF::DARK_BLUE, $text);
		$text = str_replace("{COLOUR_DARK_GREEN}", TF::DARK_GREEN, $text);
		$text = str_replace("{COLOUR_DARK_AQUA}", TF::DARK_AQUA, $text);
		$text = str_replace("{COLOUR_DARK_RED}", TF::DARK_RED, $text);
		$text = str_replace("{COLOUR_DARK_PURPLE}", TF::DARK_PURPLE, $text);
		$text = str_replace("{COLOUR_GOLD}", TF::GOLD, $text);
		$text = str_replace("{COLOUR_GRAY}", TF::GRAY, $text);
		$text = str_replace("{COLOUR_DARK_GRAY}", TF::DARK_GRAY, $text);
		$text = str_replace("{COLOUR_BLUE}", TF::BLUE, $text);
		$text = str_replace("{COLOUR_GREEN}", TF::GREEN, $text);
		$text = str_replace("{COLOUR_AQUA}", TF::AQUA, $text);
		$text = str_replace("{COLOUR_RED}", TF::RED, $text);
		$text = str_replace("{COLOUR_LIGHT_PURPLE}", TF::LIGHT_PURPLE, $text);
		$text = str_replace("{COLOUR_YELLOW}", TF::YELLOW, $text);
		$text = str_replace("{COLOUR_WHITE}", TF::WHITE, $text);
		$text = str_replace("{COLOUR_OBFUSCATED}", TF::OBFUSCATED, $text);
		$text = str_replace("{COLOUR_BOLD}", TF::BOLD, $text);
		$text = str_replace("{COLOUR_STRIKETHROUGH}", TF::STRIKETHROUGH, $text);
		$text = str_replace("{COLOUR_UNDERLINE}", TF::UNDERLINE, $text);
		$text = str_replace("{COLOUR_ITALIC}", TF::ITALIC, $text);
		$text = str_replace("{COLOUR_RESET}", TF::RESET, $text);

		//Formats Other Stuff...
		$text = str_replace("{LINE}", "\n", $text);

		//Returns Final Text...
		return $text;
    }

	public function stripTextColour($text, $symbol){
		//Removes Symbol Colour's...
		$text = str_replace("&0", TF::RESET, $text);
		$text = str_replace("&1", TF::RESET, $text);
		$text = str_replace("&2", TF::RESET, $text);
		$text = str_replace("&3", TF::RESET, $text);
		$text = str_replace("&4", TF::RESET, $text);
		$text = str_replace("&5", TF::RESET, $text);
		$text = str_replace("&6", TF::RESET, $text);
		$text = str_replace("&7", TF::RESET, $text);
		$text = str_replace("&8", TF::RESET, $text);
		$text = str_replace("&9", TF::RESET, $text);
		$text = str_replace("&a", TF::RESET, $text);
		$text = str_replace("&b", TF::RESET, $text);
		$text = str_replace("&c", TF::RESET, $text);
		$text = str_replace("&d", TF::RESET, $text);
		$text = str_replace("&e", TF::RESET, $text);
		$text = str_replace("&f", TF::RESET, $text);
		$text = str_replace("&k", TF::RESET, $text);
		$text = str_replace("&l", TF::RESET, $text);
		$text = str_replace("&m", TF::RESET, $text);
		$text = str_replace("&n", TF::RESET, $text);
		$text = str_replace("&o", TF::RESET, $text);
		$text = str_replace("&r", TF::RESET, $text);
		$text = str_replace("§0", TF::RESET, $text);
		$text = str_replace("§1", TF::RESET, $text);
		$text = str_replace("§2", TF::RESET, $text);
		$text = str_replace("§3", TF::RESET, $text);
		$text = str_replace("§4", TF::RESET, $text);
		$text = str_replace("§5", TF::RESET, $text);
		$text = str_replace("§6", TF::RESET, $text);
		$text = str_replace("§7", TF::RESET, $text);
		$text = str_replace("§8", TF::RESET, $text);
		$text = str_replace("§9", TF::RESET, $text);
		$text = str_replace("§a", TF::RESET, $text);
		$text = str_replace("§b", TF::RESET, $text);
		$text = str_replace("§c", TF::RESET, $text);
		$text = str_replace("§d", TF::RESET, $text);
		$text = str_replace("§e", TF::RESET, $text);
		$text = str_replace("§f", TF::RESET, $text);
		$text = str_replace("§k", TF::RESET, $text);
		$text = str_replace("§l", TF::RESET, $text);
		$text = str_replace("§m", TF::RESET, $text);
		$text = str_replace("§n", TF::RESET, $text);
		$text = str_replace("§o", TF::RESET, $text);
		$text = str_replace("§r", TF::RESET, $text);

		//Removes {COLOUR}'s...
		$text = str_replace("{COLOUR_BLACK}", TF::RESET, $text);
		$text = str_replace("{COLOUR_DARK_BLUE}", TF::RESET, $text);
		$text = str_replace("{COLOUR_DARK_GREEN}", TF::RESET, $text);
		$text = str_replace("{COLOUR_DARK_AQUA}", TF::RESET, $text);
		$text = str_replace("{COLOUR_DARK_RED}", TF::RESET, $text);
		$text = str_replace("{COLOUR_DARK_PURPLE}", TF::RESET, $text);
		$text = str_replace("{COLOUR_GOLD}", TF::RESET, $text);
		$text = str_replace("{COLOUR_GRAY}", TF::RESET, $text);
		$text = str_replace("{COLOUR_DARK_GRAY}", TF::RESET, $text);
		$text = str_replace("{COLOUR_BLUE}", TF::RESET, $text);
		$text = str_replace("{COLOUR_GREEN}", TF::RESET, $text);
		$text = str_replace("{COLOUR_AQUA}", TF::RESET, $text);
		$text = str_replace("{COLOUR_RED}", TF::RESET, $text);
		$text = str_replace("{COLOUR_LIGHT_PURPLE}", TF::RESET, $text);
		$text = str_replace("{COLOUR_YELLOW}", TF::RESET, $text);
		$text = str_replace("{COLOUR_WHITE}", TF::RESET, $text);
		$text = str_replace("{COLOUR_OBFUSCATED}", TF::RESET, $text);
		$text = str_replace("{COLOUR_BOLD}", TF::RESET, $text);
		$text = str_replace("{COLOUR_STRIKETHROUGH}", TF::RESET, $text);
		$text = str_replace("{COLOUR_UNDERLINE}", TF::RESET, $text);
		$text = str_replace("{COLOUR_ITALIC}", TF::RESET, $text);
		$text = str_replace("{COLOUR_RESET}", TF::RESET, $text);


		//Returns Final Text...
		return $text;
    }

	public function getBroadcastSettings(){
		//Gets Broadcast Settings...
		$config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
		$broadcastSettings = $config->get("BroadcastSettings");

		//Returns Broadcast Settings...
		return $broadcastSettings;
	}

	public function getBroadcasts(){
		//Gets & Formats Broadcasts...
		$messages = new Config($this->getDataFolder() . "messages.yml", Config::YAML);
		$broadcasts = $messages->get("Broadcasts");

		//Returns Broadcasts...
		return $broadcasts;
	}

	public function sendBroadcast($type){
		//Gets Broadcasts & Broadcast Settings...
		$broadcastSettings = $this->getBroadcastSettings();
		$prefix = $broadcastSettings["Prefix"];
		$broadcasts = $this->getBroadcasts();

		//Chooses Random Broadcast...
		$msgamount = rand(1, count($broadcasts)-1);
		$message = $broadcasts[$msgamount];

		//Broadcasts Message...
		if($type === "Message"){
			$this->getServer()->broadcastMessage($this->formatText($prefix) . " " . $this->formatText($message));
		}elseif($type === "Popup"){
			$this->getServer()->broadcastPopup($this->formatText($prefix) . " " . $this->formatText($message));
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

?>
