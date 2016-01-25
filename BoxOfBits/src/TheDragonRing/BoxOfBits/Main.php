<?php

namespace TheDragonRing\BoxOfBits;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as Colour;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerGameModeChangeEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerKickEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\permission\Permission;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(Colour::AQUA."BoxOfBits".Colour::DARK_RED." by TheDragonRing".Colour::GREEN." Enabled!");	
			if(!is_dir($this->getDataFolder())){	
			@mkdir($this->getDataFolder());
			}
			$this->config = new Config($this->getDataFolder()."config.yml",Config::YAML, array(
				"JoinPopup" => "#playername §bJoined the Server",
				"LeavePopup" => "#playername §4Left the Server",
				"KickPopup" => "#playername §4Got Kicked from the Server",
				"DeathPopup" => "#playername §4Just Died",
				"GamemodeChangePopup" => "#playername §2Changed Gamemode",
			));
	}
	public function onDisable(){
		$this->getLogger()->info(Colour::AQUA."BoxOfBits".Colour::GREEN." by TheDragonRing".Colour::DARK_RED." Disabled!");
	}
    private $permMessage = Colour::DARK_RED."You do not have permission to run this command!";
    private $consoleMsg = Colour::DARK_RED."This command can only be executed in-game!";

//Events
	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$message = str_replace("#playername", $name, $this->config->get("JoinPopup"));
		$this->getServer()->broadcastPopup($message);
		$player->sendTip(Colour::GOLD."Welcome,".Colour::WHITE."$name");
	}
	public function onQuit(PlayerQuitEvent $event){
		$$player = $event->getPlayer();
		$name = $player->getName();
		$message = str_replace("#playername", $name, $this->config->get("LeavePopup"));
		$this->getServer()->broadcastPopup($message);
	}
	public function onKick(PlayerKickEvent $event){
		$$player = $event->getPlayer();
		$name = $player->getName();
		$message = str_replace("#playername", $name, $this->config->get("KickPopup"));
		$this->getServer()->broadcastPopup($message);
	}
	public function onGameModeChange(PlayerGameModeChangeEvent $event){
		$$player = $event->getPlayer();
		$name = $player->getName();
		$message = str_replace("#playername", $name, $this->config->get("GameModeChangePopup"));
		$this->getServer()->broadcastPopup($message);

	}
	public function onDeath(PlayerDeathEvent $event){
		$$player = $event->getPlayer();
		$name = $player->getName();
		$message = str_replace("#playername", $name, $this->config->get("DeathPopup"));
		$this->getServer()->broadcastPopup($message);
	}

//Commands
	public function onCommand(CommandSender $sender,Command $cmd,$label,array $args){
		$cmd = (strtolower($cmd->getName() == "boxofbits"));
			if(!isset($args[0])){
				$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."BoxOfBits".Colour::BLACK."]---");
				$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."Plugin Maker §o§2The§4Dragon§1Ring");
				$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."Plugin Version §60.0.2");
				$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/boxofbits 1|2".Colour::GREEN." Shows page 1 or 2 of help");
				return true;
			}else{
				switch ($args[0]){
					case "1":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."BoxOfBits v0.0.2 Help Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/boxofbits 1|2".Colour::GREEN." Shows plugin help");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/rules".Colour::GREEN." Shows server rules");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gms [playername]".Colour::GREEN." Changes gamemode to Survival");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gmc [playername]".Colour::GREEN." Changes gamemode to Creative");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gma [playername]".Colour::GREEN." Changes gamemode to Adventure");
						return true;
							break;
					case "2":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."BoxOfBits v0.0.2 Help Page 2".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gmsp [playername]".Colour::GREEN." Changes gamemode to Spectator");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/xyz [playername]".Colour::GREEN." Get player coordinates");
						return true;
							break;
						}
				}
		$cmd = (strtolower($cmd->getName() == "gms"));
			if(!isset($args[0])){
			if (!($sender instanceof Player)){
			$sender->sendMessage(Colour::DARK_RED."$this->consoleMsg");
			return true;
			}
				$player = $this->getServer()->getPlayer($sender->getName());
				if ($player->hasPermission("boxofbits.gms")){
				if ($player->getGamemode() == 0){
				$player->sendMessage(Colour::DARK_RED."You are already in Survival");
					} else {
						$player->setGamemode(0);
						$player->sendMessage("You are now in Survival");
						$name = $player->getName();
						$this->getServer()->broadcastPopup(Colour::WHITE."$name".Colour::DARK_GREEN." Just changed Gamemode");
						}
						return true;
							} else {
								$player->sendMessage(Colour::DARK_RED."$this->permMessage");
								return true;
								}
									}else{
										$player = $this->getServer()->getPlayer($args[0]);
										if($player instanceof Player){
											$player->setGamemode(0);
											$player->sendMessage("You are now in Survival");
											$name = $player->getName();
											$this->getServer()->broadcastPopup(Colour::WHITE."$name".Colour::DARK_GREEN." Just changed Gamemode");
											return true;
										}else{
											$sender->sendMessage(Colour::DARK_RED."Player Not Found");
											return true;
								}
						}
				break;
		$cmd = (strtolower($cmd->getName() == "gmc"));
			if(!isset($args[0])){
			if (!($sender instanceof Player)){
			$sender->sendMessage(Colour::DARK_RED."$this->consoleMsg");
			return true;
			}
				$player = $this->getServer()->getPlayer($sender->getName());
				if ($player->hasPermission("boxofbits.gmc")){
				if ($player->getGamemode() == 1){
				$player->sendMessage(Colour::DARK_RED."You are already in Creative");
					} else {
						$player->setGamemode(1);
						$player->sendMessage("You are now in Creative");
						$name = $player->getName();
						$this->getServer()->broadcastPopup(Colour::WHITE."$name".Colour::DARK_GREEN." Just changed Gamemode");
						}
						return true;
							} else {
								$player->sendMessage(Colour::DARK_RED."$this->permMessage!");
								return true;
								}
									}else{
										$player = $this->getServer()->getPlayer($args[0]);
										if($player instanceof Player){
											$player->setGamemode(1);
											$player->sendMessage("You are now in Creative");
											$name = $player->getName();
											$this->getServer()->broadcastPopup(Colour::WHITE."$name".Colour::DARK_GREEN." Just changed Gamemode");
											return true;
										}else{
											$sender->sendMessage(Colour::DARK_RED."Player Not Found");
											return true;
								}
						}
				break;
		$cmd = (strtolower($cmd->getName() == "gma"));
			if(!isset($args[0])){
			if (!($sender instanceof Player)){
			$sender->sendMessage(Colour::DARK_RED."$this->consoleMsg");
			return true;
			}
				$player = $this->getServer()->getPlayer($sender->getName());
				if ($player->hasPermission("boxofbits.gma")){
				if ($player->getGamemode() == 2){
				$player->sendMessage(Colour::DARK_RED."You are already in Adventure mode");
					} else {
						$player->setGamemode(2);
						$player->sendMessage("You are now in Adventure mode");
						$name = $player->getName();
						$this->getServer()->broadcastPopup(Colour::WHITE."$name".Colour::DARK_GREEN." Just changed Gamemode");
						}
						return true;
							} else {
								$player->sendMessage(Colour::DARK_RED."$this->permMessage");
								return true;
								}
									}else{
										$player = $this->getServer()->getPlayer($args[0]);
										if($player instanceof Player){
											$player->setGamemode(2);
											$player->sendMessage("You are now in Adventure mode");
											$name = $player->getName();
											$this->getServer()->broadcastPopup(Colour::WHITE."$name".Colour::DARK_GREEN." Just changed Gamemode");
											return true;
										}else{
											$sender->sendMessage(Colour::DARK_RED."Player Not Found");
											return true;
								}
						}
				break;
		$cmd = (strtolower($cmd->getName() == "gmsp"));
			if(!isset($args[0])){
			if (!($sender instanceof Player)){
			$sender->sendMessage(Colour::DARK_RED."$this->consoleMsg");
			return true;
			}
				$player = $this->getServer()->getPlayer($sender->getName());
				if ($player->hasPermission("boxofbits.gmsp")){
				if ($player->getGamemode() == 3){
				$player->sendMessage(Colour::DARK_RED."You are already in Spectator mode");
					} else {
						$player->setGamemode(3);
						$player->sendMessage("You are now in Spectator mode");
						$name = $player->getName();
						$this->getServer()->broadcastPopup(Colour::WHITE."$name".Colour::DARK_GREEN." Just changed Gamemode");
						}
						return true;
							} else {
								$player->sendMessage(Colour::DARK_RED."$this->permMessage");
								return true;
								}
									}else{
										$player = $this->getServer()->getPlayer($args[0]);
										if($player instanceof Player){
											$player->setGamemode(3);
											$player->sendMessage("You are now in Spectator mode");
											$name = $player->getName();
											$this->getServer()->broadcastPopup(Colour::WHITE."$name".Colour::DARK_GREEN." Just changed Gamemode");
											return true;
										}else{
											$sender->sendMessage(Colour::DARK_RED."Player Not Found");
											return true;
												}
													}
													break;
														}
}
