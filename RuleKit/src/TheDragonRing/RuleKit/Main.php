<?php

namespace TheDragonRing\RuleKit;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as Colour;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\permission\Permission;
use pocketmine\utils\Config;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(Colour::AQUA."RuleKit".Colour::DARK_RED." by TheDragonRing".Colour::GREEN." Enabled!");	
			if(!is_dir($this->getDataFolder())){	
			@mkdir($this->getDataFolder());
			}
			$this->config = new Config($this->getDataFolder()."config.yml",Config::YAML, array(
				#-------------------------------------|
				# RuleKit version 0.0.1 config file   |
				# Created by TheDragonRing    :)      |
				#-------------------------------------|

				# Custom rules which show up when /rules 1|2 is run
				# Use § to colour the text
				"Rule1" => "No Swearing",
				"Rule2" => "No Using Mods",
				"Rule3" => "No Advertising",
				"Rule4" => "No Asking For OP",
				"Rule5" => "No Asking For Creative",
				"Rule6" => "Have Fun :)",
				"Rule7" => "No Griefing",
				"Rule8" => "Another Rule",
				"Rule9" => "Another Rule",
				"Rule10" => "Another Rule",
			));
	}
	public function onDisable(){
		$this->getLogger()->info(Colour::AQUA."RuleKit".Colour::GREEN." by TheDragonRing".Colour::DARK_RED." Disabled!");
	}
    private $permMessage = Colour::DARK_RED."You do not have permission to run this command!";
    private $consoleMsg = Colour::DARK_RED."This command can only be executed in-game!";

	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$sender->sendMessage(Colour::GOLD."Please run /rules to view server rules");
	}
	public function onCommand(CommandSender $sender,Command $cmd,$label,array $args){
		if(strtolower($cmd->getName() == "rules"));
			if(!($sender instanceof Player)){
			if(!isset($args[0])){
				$sender->sendMessage(Colour::BLACK. "---[".Colour::GOLD."RuleKit v0.0.1".Colour::BLACK."]---");
				$sender->sendMessage(Colour::DARK_RED. "Usage: " .Colour::WHITE."/rules 1|2".Colour::DARK_RED." Shows page 1 or 2 of server rules");
				return true;
			}else{
				switch ($args[0]){
					case "1":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."Server Rules Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule1")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule2")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule3")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule4")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule5")));
						return true;
							break;
					case "2":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."Server Rules Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule6")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule7")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule8")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule9")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule10")));
							return true;
						}
					}
				break;
			}
			if(!isset($args[0])){
				$sender->sendMessage(Colour::BLACK. "---[".Colour::GOLD."RuleKit v0.0.1".Colour::BLACK."]---");
				$sender->sendMessage(Colour::DARK_RED. "Usage: " .Colour::WHITE."/rules 1|2".Colour::DARK_RED." Shows page 1 or 2 of server rules");
				return true;
			}else{
				switch ($args[0]){
					case "1":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."Server Rules Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule1")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule2")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule3")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule4")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule5")));
						return true;
							break;
					case "2":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."Server Rules Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule6")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule7")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule8")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule9")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get("Rule10")));

							return true;
						}
					}
				break;
			}
}
