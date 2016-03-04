<?php

#  ____             ____   __ ____  _ _              __  __   ___  
# |  _ \           / __ \ / _|  _ \(_) |            /_ |/_ | / _ \ 
# | |_) | _____  _| |  | | |_| |_) |_| |_ ___  __   _| | | || | | |
# |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __| \ \ / / | | || | | |
# | |_) | (_) >  <| |__| | | | |_) | | |_\__ \  \ V /| |_| || |_| |
# |____/ \___/_/\_\\____/|_| |____/|_|\__|___/   \_/ |_(_)_(_)___/ 
#                                                                    
  
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
		$this->getLogger()->info(Colour::AQUA."BoxOfBits".Colour::GOLD." by TheDragonRing".Colour::GREEN." Enabled!");
			@mkdir($this->getDataFolder());
			$this->config = new Config($this->getDataFolder()."config.yml",Config::YAML, array(

			    #  ____             ____   __ ____  _ _              __  __   ___  
			    # |  _ \           / __ \ / _|  _ \(_) |            /_ |/_ | / _ \ 
			    # | |_) | _____  _| |  | | |_| |_) |_| |_ ___  __   _| | | || | | |
			    # |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __| \ \ / / | | || | | |
			    # | |_) | (_) >  <| |__| | | | |_) | | |_\__ \  \ V /| |_| || |_| |
			    # |____/ \___/_/\_\\____/|_| |____/|_|\__|___/   \_/ |_(_)_(_)___/ 
				#                                                                    
  

				# Custom messages which either get sent in chat or popup on the bottom of the screen when certain events occur
				# Please note that the JoinMessage and LeaveMessage replace the default join and leave/quit messages
				# Use #playername as the name of the player and § to colour the text
				"JoinMessage" => "#playername §bJoined the Server",
				"JoinPopup" => "#playername §bJoined the Server",
				"LeaveMessage" => "#playername §4Left the Server",
				"LeavePopup" => "#playername §4Left the Server",
				"KickPopup" => "#playername §4Got Kicked from the Server",
				"DeathPopup" => "#playername §4Just Died",
				"GamemodeChangePopup" => "#playername §2Changed Gamemode",

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
		$this->saveResource("config.yml");
	}
	public function onDisable(){
		$this->getLogger()->info(Colour::AQUA."BoxOfBits".Colour::GOLD." by TheDragonRing".Colour::DARK_RED." Disabled!");
	}
    private $permMessage = Colour::DARK_RED."You do not have permission to run this command!";
    private $consoleMsg = Colour::DARK_RED."This command can only be executed in-game!";

//Events
	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$popup = str_replace("#playername", $name, $this->config->get("JoinPopup"));
		$this->getServer()->broadcastPopup($popup);
		$message = str_replace("#playername", $name, $this->config->get("JoinMessage"));
		$event->setJoinMessage($message);
		$player->sendTip(Colour::GOLD."Welcome,".Colour::WHITE."$name");
	}
	public function onQuit(PlayerQuitEvent $event){
		$$player = $event->getPlayer();
		$name = $player->getName();
		$popup = str_replace("#playername", $name, $this->config->get("LeavePopup"));
		$this->getServer()->broadcastPopup($popup);
		$message = str_replace("#playername", $name, $this->config->get("LeaveMessage"));
		$event->setQuitMessage($message);
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
		$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
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
//boxofbits
		if(strtolower($cmd->getName() == "boxofbits"));
			if(!($sender instanceof Player)){
			if(!isset($args[0])){
				$sender->sendMessage(Colour::BLACK. "---[".Colour::GOLD."BoxOfBits".Colour::BLACK."]---");
				$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."Plugin Maker §o§2The§4Dragon§1Ring");
				$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."Plugin Version §61.1.0");
				$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/boxofbits 1|2|3".Colour::DARK_GREEN." Shows page 1, 2 or 3 of help");
				return true;
			}else{
				switch ($args[0]){
					case "1":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::GOLD."BoxOfBits v1.1.0 Help Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/boxofbits 1|2|3".Colour::GREEN." Shows plugin info and help");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/rules".Colour::GREEN." Shows server rules");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gms [playername]".Colour::DARK_GREEN." Changes gamemode to Survival");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gmc [playername]".Colour::DARK_GREEN." Changes gamemode to Creative");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gma [playername]".Colour::DARK_GREEN." Changes gamemode to Adventure");
						return true;
							break;
					case "2":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::GOLD."BoxOfBits v1.1.0 Help Page 2".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gmsp [playername]".Colour::DARK_GREEN." Changes gamemode to Spectator");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/xyz [playername]".Colour::DARK_GREEN." Get player coordinates");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/sendpopup server|player <message>".Colour::DARK_GREEN." Broadcasts specified popup");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/sendmessage server|player <message>".Colour::DARK_GREEN." Broadcasts specified message");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/suicide".Colour::DARK_GREEN." Kills you");
						return true;
							break;
					case "3":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::GOLD."BoxOfBits v1.1.0 Help Page 3".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/slay <playername>".Colour::DARK_GREEN." Kills specified player");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/heal [playername]".Colour::DARK_GREEN." Heals you or specified player");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/health <amount> [playername]".Colour::DARK_GREEN." Sets you or specified player's health");
						return true;
							break;
						}
				}
		}
			$player = $this->getServer()->getPlayer($sender->getName());
			if($player->hasPermission("boxofbits.info")){
			if(!isset($args[0])){
				$sender->sendMessage(Colour::BLACK. "---[".Colour::GOLD."BoxOfBits".Colour::BLACK."]---");
				$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."Plugin Maker §o§2The§4Dragon§1Ring");
				$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."Plugin Version §61.1.0");
				$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/boxofbits 1|2|3".Colour::DARK_GREEN." Shows page 1, 2 or 3 of help");
				return true;
			}else{
				switch ($args[0]){
					case "1":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::GOLD."BoxOfBits v1.1.0 Help Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/boxofbits 1|2|3".Colour::GREEN." Shows plugin info and help");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/rules".Colour::GREEN." Shows server rules");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gms [playername]".Colour::DARK_GREEN." Changes gamemode to Survival");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gmc [playername]".Colour::DARK_GREEN." Changes gamemode to Creative");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gma [playername]".Colour::DARK_GREEN." Changes gamemode to Adventure");
						return true;
							break;
					case "2":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::GOLD."BoxOfBits v1.1.0 Help Page 2".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/gmsp [playername]".Colour::DARK_GREEN." Changes gamemode to Spectator");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/xyz [playername]".Colour::DARK_GREEN." Get player coordinates");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/sendpopup server|player <message>".Colour::DARK_GREEN." Broadcasts specified popup");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/sendmessage server|player <message>".Colour::DARK_GREEN." Broadcasts specified message");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/suicide".Colour::DARK_GREEN." Kills you");
						return true;
							break;
					case "3":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::GOLD."BoxOfBits v1.1.0 Help Page 3".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/slay <playername>".Colour::DARK_GREEN." Kills specified player");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/heal [playername]".Colour::DARK_GREEN." Heals you or specified player");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE."/health <amount> [playername]".Colour::DARK_GREEN." Sets you or specified player's health");
						return true;
							break;
						}
				}
		}else{
			$sender->sendMessage("$this->permMessage");
			return true;
				}
		break;
//heal
		if(strtolower($cmd->getName() == "heal"));
			if(!($sender instanceof Player)){
				if(!isset($args[0])){
					$sender->sendMessage(Colour::DARK_RED."Usage: /heal [playername] - [playername] required when run from console!");
					return true;
						}else{
							$player = $this->getServer()->getPlayer($args[0]);
							if($player instanceof Player){
								$player->setHealth(20);
								$sender->sendMessage(Colour::AQUA."$player has been healed");
								$player->sendMessage(Colour::AQUA."You have been healed");
								return true;
									}else{
										$sender->sendMessage(Colour::DARK_RED."Player Not Found");
										return true;
											}}}else{
				if($sender->hasPermission("boxofbits.heal")){
				if(!isset($args[0])){
					$player->setHealth(20);
					$sender->sendMessage(Colour::AQUA."You have been healed");
					return true;
						}else{
							$player = $this->getServer()->getPlayer($args[0]);
							if($player instanceof Player){
								$player->setHealth(20);
								$sender->sendMessage(Colour::AQUA."$player has been healed");
								$player->sendMessage(Colour::AQUA."You have been healed");
								return true;
									}else{
										$sender->sendMessage(Colour::DARK_RED."Player Not Found");
										return true;
								}}}}else{
									$sender->sendMessage(Colour::DARK_RED."$this->permMessage");
									return true;
								}
						break;
//health
		if(strtolower($cmd->getName() == "health"));
			if(!($sender instanceof Player)){
				if(!isset($args[1])){
					$sender->sendMessage(Colour::DARK_RED."Usage: /health <amount> [playername] - [playername] required when run from console!");
					return true;
						}else{
							$player = $this->getServer()->getPlayer($args[1]);
							if($player instanceof Player){
								$player->setHealth($args[0]);
								$sender->sendMessage(Colour::AQUA."$player health has been set");
								$player->sendMessage(Colour::AQUA."Your health has been set");
								return true;
									}else{
										$sender->sendMessage(Colour::DARK_RED."Player Not Found");
										return true;
											}}}else{
				if($sender->hasPermission("boxofbits.health")){
				if(!isset($args[0])){
					$sender->sendMessage(Colour::DARK_RED."Usage: /health <amount> [playername]");
					return true;
						}else{
							$sender->setHealth($args[0]);
							$sender->sendMessage(Colour::AQUA."Your health has been set");
							}elseif(isset($args[0])){
							$player = $this->getServer()->getPlayer($args[1]);
							if($player instanceof Player){
								$player->setHealth($args[0]);
								$sender->sendMessage(Colour::AQUA."$player health has been set");
								$player->sendMessage(Colour::AQUA."Your health has been set");
								return true;
									}else{
										$sender->sendMessage(Colour::DARK_RED."Player Not Found");
										return true;
								}}}}else{
									$sender->sendMessage(Colour::DARK_RED."$this->permMessage");
									return true;
								}
						break;
//slay
		if(strtolower($cmd->getName() == "slay"));
			if(!($sender instanceof Player)){
				if(!isset($args[0])){
				$sender->sendMessage(Colour::DARK_RED."Usage: /slay <playername>");
				return true;
					}else{
						$player = $this->getServer()->getPlayer($args[0]);
							if($player instanceof Player){
								$player->setHealth(0);
									$player->sendMessage(Colour::DARK_RED."You were killed by the CONSOLE");
									$sender->sendMessage(Colour::DARK_RED."$player has been killed");
									return true;
								}else{
									$sender->sendMessage(DARK_RED."Player Not Found");
					}}}else{
						if($sender->hasPermission("boxofbits.slay")){
							$player = $this->getServer()->getPlayer($args[0]);
							if($player instanceof Player){
								$player->setHealth(0);
									$player->sendMessage(Colour::DARK_RED."You were killed by the CONSOLE");
									$sender->sendMessage(Colour::DARK_RED."$player has been killed");
									return true;
							}else{
								$sender->sendMessage(Colour::DARK_RED."Player Not Found");
							}}else{
								$sender->sendMessage(Colour::DARK_RED."$this->permMessage");
							return true;
					}}
			break;		
//suicide
		if(strtolower($cmd->getName() == "suicide"));
			if(!($sender instanceof Player)){
				$sender->sendMessage(Colour::DARK_RED."$this->consoleMsg");
				return true;
					}else{
						if($sender->hasPermission("boxofbits.suicide")){
						$sender->setHealth(0);
						$sender->sendMessage(Colour::DARK_RED."You have commited suicide!");
						return true;
						}else{
							$sender->sendMessage(Colour::DARK_RED."$this->permMessage");
							return true;
					}}
			break;		
//gms
		if(strtolower($cmd->getName() == "gms"));
			if(!($sender instanceof Player)){
				if(!isset($args[0])){
					$sender->sendMessage(Colour::DARK_RED."$this->consoleMsg");
					return true;
						}else{
							$player = $this->getServer()->getPlayer($args[0]);
							if($player instanceof Player){
							if($player->getGamemode() == 0){
							$name = $player->getName();
							$sender->sendMessage(Colour::DARK_RED."$name is already in Survival");
							return true;
							}else{
							$player->setGamemode(0);
							$player->sendMessage("You are now in Survival");
							$name = $player->getName();
							$sender->sendMessage("$name is now in Survival");
							$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
							$this->getServer()->broadcastPopup($message);
								}}else{
									$sender->sendMessage(Colour::DARK_RED."Player Not Found");
										}
			 					}
						}else{
				if(!isset($args[0])){
				$player = $this->getServer()->getPlayer($sender->getName());
				if($player->hasPermission("boxofbits.gms")){
				if($player->getGamemode() == 0){
				$player->sendMessage(Colour::DARK_RED."You are already in Survival");
				return true;
					}else{
						$player->setGamemode(0);
						$player->sendMessage("You are now in Survival");
						$name = $player->getName();
						$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
						$this->getServer()->broadcastPopup($message);
						}
						return true;
									}else{
										$sender->sendMessage("$this->$permMessage");
										return true;
									}}else{
										$runner = $this->getServer()->getPlayer($sender->getName());
										if($runner->hasPermission("boxofbits.gms")){
										$player = $this->getServer()->getPlayer($args[0]);
										if($player instanceof Player){
										if($player->getGamemode() == 0){
										$name = $player->getName();
										$sender->sendMessage(Colour::DARK_RED."$name is already in Survival");
										return true;
										}else{
											$player->setGamemode(0);
											$player->sendMessage("You are now in Survival");
											$name = $player->getName();
											$sender->sendMessage("$name is now in Survival");
											$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
											$this->getServer()->broadcastPopup($message);
											return true;
										}}else{
											$sender->sendMessage(Colour::DARK_RED."Player Not Found");
											return true;
								}
						}else{
							$sender->sendMessage("$this->$permMessage");
							}
						}
				break;
//gmc
		if(strtolower($cmd->getName() == "gmc"));
			if(!($sender instanceof Player)){
				if(!isset($args[0])){
					$sender->sendMessage(Colour::DARK_RED."$this->consoleMsg");
					return true;
						}else{
							$player = $this->getServer()->getPlayer($args[0]);
							if($player instanceof Player){
							if($player->getGamemode() == 1){
							$name = $player->getName();
							$sender->sendMessage(Colour::DARK_RED."$name is already in Survival");
							return true;
							}else{
							$player->setGamemode(1);
							$player->sendMessage("You are now in Creative");
							$name = $player->getName();
							$sender->sendMessage("$name is now in Creative");
							$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
							$this->getServer()->broadcastPopup($message);
								}}else{
									$sender->sendMessage(Colour::DARK_RED."Player Not Found");
										}
			 					}
						}else{
				if(!isset($args[0])){
				$player = $this->getServer()->getPlayer($sender->getName());
				if($player->hasPermission("boxofbits.gmc")){
				if($player->getGamemode() == 1){
				$player->sendMessage(Colour::DARK_RED."You are already in Creative");
				return true;
					}else{
						$player->setGamemode(1);
						$player->sendMessage("You are now in Creative");
						$name = $player->getName();
						$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
						$this->getServer()->broadcastPopup($message);
						}
						return true;
									}else{
										$sender->sendMessage("$this->$permMessage");
										return true;
									}}else{
										$runner = $this->getServer()->getPlayer($sender->getName());
										if($runner->hasPermission("boxofbits.gmc")){
										$player = $this->getServer()->getPlayer($args[0]);
										if($player instanceof Player){
										if($player->getGamemode() == 1){
										$name = $player->getName();
										$sender->sendMessage(Colour::DARK_RED."$name is already in Creative");
										return true;
										}else{
											$player->setGamemode(1);
											$player->sendMessage("You are now in Creative");
											$name = $player->getName();
											$sender->sendMessage("$name is now in Creative");
											$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
											$this->getServer()->broadcastPopup($message);
											return true;
										}}else{
											$sender->sendMessage(Colour::DARK_RED."Player Not Found");
											return true;
								}
						}else{
							$sender->sendMessage("$this->$permMessage");
							}
						}
				break;
//gma
		if(strtolower($cmd->getName() == "gma"));
			if(!($sender instanceof Player)){
				if(!isset($args[0])){
					$sender->sendMessage(Colour::DARK_RED."$this->consoleMsg");
					return true;
						}else{
							$player = $this->getServer()->getPlayer($args[0]);
							if($player instanceof Player){
							if($player->getGamemode() == 2){
							$name = $player->getName();
							$sender->sendMessage(Colour::DARK_RED."$name is already in Adventure mode");
							return true;
							}else{
							$player->setGamemode(2);
							$player->sendMessage("You are now in Adventure mode");
							$name = $player->getName();
							$sender->sendMessage("$name is now in Adventure mode");
							$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
							$this->getServer()->broadcastPopup($message);
								}}else{
									$sender->sendMessage(Colour::DARK_RED."Player Not Found");
										}
			 					}
						}else{
				if(!isset($args[0])){
				$player = $this->getServer()->getPlayer($sender->getName());
				if($player->hasPermission("boxofbits.gma")){
				if($player->getGamemode() == 2){
				$player->sendMessage(Colour::DARK_RED."You are already in Adventure mode");
				return true;
					}else{
						$player->setGamemode(2);
						$player->sendMessage("You are now in Adventure mode");
						$name = $player->getName();
						$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
						$this->getServer()->broadcastPopup($message);
						}
						return true;
									}else{
										$sender->sendMessage("$this->$permMessage");
										return true;
									}}else{
										$runner = $this->getServer()->getPlayer($sender->getName());
										if($runner->hasPermission("boxofbits.gma")){
										$player = $this->getServer()->getPlayer($args[0]);
										if($player instanceof Player){
										if($player->getGamemode() == 2){
										$name = $player->getName();
										$sender->sendMessage(Colour::DARK_RED."$name is already in Adventure mode");
										return true;
										}else{
											$player->setGamemode(2);
											$player->sendMessage("You are now in Adventure mode");
											$name = $player->getName();
											$sender->sendMessage("$name is now in Adventure mode");
											$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
											$this->getServer()->broadcastPopup($message);
											return true;
										}}else{
											$sender->sendMessage(Colour::DARK_RED."Player Not Found");
											return true;
								}
						}else{
							$sender->sendMessage("$this->$permMessage");
							}
						}
				break;
//gmsp
		if(strtolower($cmd->getName() == "gmsp"));
			if(!($sender instanceof Player)){
				if(!isset($args[0])){
					$sender->sendMessage(Colour::DARK_RED."$this->consoleMsg");
					return true;
						}else{
							$player = $this->getServer()->getPlayer($args[0]);
							if($player instanceof Player){
							if($player->getGamemode() == 3){
							$name = $player->getName();
							$sender->sendMessage(Colour::DARK_RED."$name is already in Spectator mode");
							return true;
							}else{
							$player->setGamemode(3);
							$player->sendMessage("You are now in Spectator mode");
							$name = $player->getName();
							$sender->sendMessage("$name is now in Spectator mode");
							$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
							$this->getServer()->broadcastPopup($message);
								}}else{
									$sender->sendMessage(Colour::DARK_RED."Player Not Found");
										}
			 					}
						}else{
				if(!isset($args[0])){
				$player = $this->getServer()->getPlayer($sender->getName());
				if($player->hasPermission("boxofbits.gmsp")){
				if($player->getGamemode() == 3){
				$player->sendMessage(Colour::DARK_RED."You are already in Spectator mode");
				return true;
					}else{
						$player->setGamemode(3);
						$player->sendMessage("You are now in Spectator mode");
						$name = $player->getName();
						$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
						$this->getServer()->broadcastPopup($message);
						}
						return true;
									}else{
										$sender->sendMessage("$this->$permMessage");
										return true;
									}}else{
										$runner = $this->getServer()->getPlayer($sender->getName());
										if($runner->hasPermission("boxofbits.gmsp")){
										$player = $this->getServer()->getPlayer($args[0]);
										if($player instanceof Player){
										if($player->getGamemode() == 3){
										$name = $player->getName();
										$sender->sendMessage(Colour::DARK_RED."$name is already in Spectator mode");
										return true;
										}else{
											$player->setGamemode(3);
											$player->sendMessage("You are now in Spectator mode");
											$name = $player->getName();
											$sender->sendMessage("$name is now in Spectator mode");
											$message = str_replace("#playername", $name, $this->config->get("GamemodeChangePopup"));
											$this->getServer()->broadcastPopup($message);
											return true;
										}}else{
											$sender->sendMessage(Colour::DARK_RED."Player Not Found");
											return true;
								}
						}else{
							$sender->sendMessage("$this->$permMessage");
							}
						}
				break;
//rules
		if(strtolower($cmd->getName() == "rules"));
			if(!($sender instanceof Player)){
			if(!isset($args[0])){
				$sender->sendMessage(Colour::DARK_RED. "Usage: " .Colour::WHITE."/rules 1|2".Colour::DARK_RED." Shows page 1 or 2 of server rules");
				return true;
			}else{
				switch ($args[0]){
					case "1":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."Server Rules Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule1")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule2")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule3")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule4")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule5")));
						return true;
							break;
					case "2":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."Server Rules Page 2".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule6")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule7")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule8")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule9")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule10")));
							return true;
							break;
						}
				}
		}
			$player = $this->getServer()->getPlayer($sender->getName());
			if($player->hasPermission("boxofbits.rules")){
			if(!isset($args[0])){
				$sender->sendMessage(Colour::DARK_RED. "Usage: " .Colour::WHITE."/rules 1|2".Colour::DARK_RED." Shows page 1 or 2 of server rules");
				return true;
			}else{
				switch ($args[0]){
					case "1":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."Server Rules Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule1")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule2")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule3")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule4")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule5")));
						return true;
							break;
					case "2":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."Server Rules Page 2".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule6")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule7")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule8")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule9")));
						$sender->sendMessage(Colour::BLACK. "- " ($this->config->get(Colour::WHITE."Rule10")));
							return true;
							break;
						}
				}
		}else{
			$sender->sendMessage("$this->permMessage");
			return true;
				}
		break;
//xyz
		if(strotolower($cmd->getName() == "xyz"));
				if(!($sender instanceof Player)){
				if(!isset($args[0])){
				$sender->sendMessage(Colour::DARK_RED."$consoleMsg");
				return true;
				}else{
					if(isset($args[0])){
					if($this->getServer()->getPlayer($args[0])){
    					$reciever = $this->getServer()->getPlayer($args[0]);
							$reciever->sendMessage(Colour::GOLD."Coordinates: \n".Colour::DARK_GREEN."X: ".Colour::WHITE."$player->getFloorX()".Colour::DARK_GREEN."Y: ".Colour::WHITE."$player->getFloorY()".Colour::DARK_GREEN."Z: ".Colour::WHITE."$player->getFloorZ()");
											return true;
										}else{
											$sender->sendMessage(Colour::DARK_RED."Player Not Found");
											return true;
										}}}
						if($sender instanceof Player){
						$player = $this->getServer()->getPlayer($sender->getName());
						if($player->hasPermission("boxofbits.xyz")){
								$sender->sendMessage(Colour::GOLD."Coordinates: \n".Colour::DARK_GREEN."X: ".Colour::WHITE."$player->getFloorX()".Colour::DARK_GREEN."Y: ".Colour::WHITE."$player->getFloorY()".Colour::DARK_GREEN."Z: ".Colour::WHITE."$player->getFloorZ()");
						return true;
							}else{
								$player->sendMessage(Colour::DARK_RED."$this->$permMessage");
									return true;
											}}
										if(isset($args[0])){
										if($this->getServer()->getPlayer($args[0])){
    								$reciever = $this->getServer()->getPlayer($args[0]);
												$reciever->sendMessage(Colour::GOLD."Coordinates: \n".Colour::DARK_GREEN."X: ".Colour::WHITE."$player->getFloorX()".Colour::DARK_GREEN."Y: ".Colour::WHITE."$player->getFloorY()".Colour::DARK_GREEN."Z: ".Colour::WHITE."$player->getFloorZ()");
											return true;
										}else{
											$sender->sendMessage(Colour::DARK_RED."Player Not Found");
											return true;

										}

									}
						break;
//sendbroadcast
		if(strtolower($cmd->getName() == "sendbroadcast"));
			$player = $this->getServer()->getPlayer($sender->getName());
			if($player->hasPermission("boxofbits.broadcast")){
			if(!isset($args[0]) && isset($args[1])){
				$sender->sendMessage(Colour::DARK_RED."Usage: /sendbroadcast server|player <message>");
			}else{
				if(isset($args[0]) && isset($args[1])){
					if($args[0]=="server"){
    							if($sender instanceof CommandSender){
    								foreach($this->plugin->getServer()->getOnlinePlayers() as $onlineplayers){
    									$onlineplayers->sendMessage($this->plugin->messagebyConsole($sender, $this->temp, $this->plugin->getMessagefromArray($args)));
    								}
    							}elseif($sender instanceof Player){
    								foreach($this->plugin->getServer()->getOnlinePlayers() as $onlineplayers){
    									$onlineplayers->sendMessage($this->plugin->messagebyPlayer($sender, $this->temp, $this->plugin->getMessagefromArray($args)));
    								}
    							}	
    						}else{
    							if($this->getServer()->getPlayer($args[0])){
    								$reciever = $this->getServer()->getPlayer($args[0]);
    								if($sender instanceof CommandSender){
    									$receiver->sendMessage($this->plugin->messagebyConsole($sender, $this->temp, $this->plugin->getMessagefromArray($args)));
    								}elseif($sender instanceof Player){
    									$receiver->sendMessage($this->plugin->messagebyPlayer($sender, $this->temp, $this->plugin->getMessagefromArray($args)));
    								}
    							}else{
    								$sender->sendMessage(Color::DARK_RED."Player not found");
    							}
    						}
    				}else{
    					$sender->sendMessage(Colour::DARK_RED."$this->permMessage");
    					return true;
    				}
				break;
//sendpopup
		if(strtolower($cmd->getName() == "sendpopup"));
			$player = $this->getServer()->getPlayer($sender->getName());
			if($player->hasPermission("boxofbits.popup")){
			if(!isset($args[0]) && isset($args[1])){
				$sender->sendMessage(Colour::DARK_RED."Usage: /sendpopup server|player <message>");
			}else{
				if(isset($args[0]) && isset($args[1])){
					if($args[0]=="server"){
    							if($sender instanceof CommandSender){
    								foreach($this->plugin->getServer()->getOnlinePlayers() as $onlineplayers){
    									$onlineplayers->sendPopup($this->plugin->messagebyConsole($sender, $this->temp, $this->plugin->getMessagefromArray($args)));
    								}
    							}elseif($sender instanceof Player){
    								foreach($this->plugin->getServer()->getOnlinePlayers() as $onlineplayers){
    									$onlineplayers->sendPopup($this->plugin->messagebyPlayer($sender, $this->temp, $this->plugin->getMessagefromArray($args)));
    								}
    							}	
    						}else{
    							if($this->getServer()->getPlayer($args[0])){
    								$reciever = $this->getServer()->getPlayer($args[0]);
    								if($sender instanceof CommandSender){
    									$receiver->sendPopup($this->plugin->messagebyConsole($sender, $this->temp, $this->plugin->getMessagefromArray($args)));
    								}elseif($sender instanceof Player){
    									$receiver->sendPopup($this->plugin->messagebyPlayer($sender, $this->temp, $this->plugin->getMessagefromArray($args)));
    								}
    							}else{
    								$sender->sendMessage(Color::DARK_RED."Player not found");
    							}
    						}
    				}else{
    					$sender->sendMessage(Colour::DARK_RED."$this->permMessage");
    					return true;
    				}
				break;
		}
}
