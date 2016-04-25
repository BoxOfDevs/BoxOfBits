<?php

/*
*  ____             ____   __ ____  _ _       
* |  _ \           / __ \ / _|  _ \(_) |      
* | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
* |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
* | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
* |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
* 
* The growing plugin with so many features
*
* @author BoxOfDevs Team
* @link http://boxofdevs.x10host.com/
* 
*/

namespace BoxOfBits\commands;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\permission\Permission;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\math\Vector3;

class fly extends Loader implements CommandExecutor{

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "fly")){
            if(!$sender instanceof Player){
				if(!isset($args[0])){
				    $this->getLogger()->info(self::PREFIX . TF::DARK_RED . " Usage: /fly [player] - [player] required when run from console!");
				}elseif(isset($args[0])){
    				$player = $this->getServer()->getPlayer($args[0]);
					$player_name = $args[0];
    				if(!$player instanceof Player){
    				    $this->getLogger()->info(self::PREFIX . TF::DARK_RED . " Player not found");
                    }elseif($player instanceof Player){
				        if($sender->getAllowFlight()){
                    		$this->getLogger()->info(self::PREFIX . TF::AQUA . " Flying Disabled for " . $player_name . "!");
							$player->sendMessage(self::PREFIX . TF::AQUA . " Flying Disabled by CONSOLE!");
                    		$player->setAllowFlight(false);
                		}elseif(!$player->getAllowFlight()){
                    		$this->getLogger()->info(self::PREFIX . TF::AQUA . "  Flying Enabled for " . $player_name . "!");
							$player->sendMessage(self::PREFIX . TF::AQUA . " Flying Disabled by CONSOLE!");
                    		$player->setAllowFlight(true);
                		}
				    }
				}
            }elseif($sender instanceof Player){
                if(!$sender->hasPermission("boxofbits" || "boxofbits.fly")){
					$sender->sendMessage(self::PREFIX . TF::DARK_RED . " You do not have permission to run this command!");
				}elseif($sender->hasPermission("boxofbits" || "boxofbits.fly")){
				    if(!isset($args[0])){
				    	if($sender->getAllowFlight()){
                    		$sender->sendMessage(self::PREFIX . TF::AQUA . " Flying Disabled!");
                    		$sender->setAllowFlight(false);
                		}elseif(!($player->getAllowFlight())){
                    		$sender->sendMessage(self::PREFIX . TF::AQUA . " Flying Enabled!");
                    		$sender->setAllowFlight(true);
                		}
					}elseif(isset($args[0])){
    					$player = $this->getServer()->getPlayer($args[0]);
						$player_name = $args[0];
						$sender_name = $sender->getName();
    					if(!$player instanceof Player){
    					    $this->getLogger()->info(self::PREFIX . TF::DARK_RED . " Player not found");
                    	}elseif($player instanceof Player){
				    	    if($sender->getAllowFlight()){
                    			$this->getLogger()->info(self::PREFIX . TF::AQUA . " Flying Disabled for " . $player_name . "!");
								$player->sendMessage(self::PREFIX . TF::AQUA . " Flying Disabled by " . $sender_name . "!");
                    			$player->setAllowFlight(false);
                			}elseif(!$player->getAllowFlight()){
                    			$this->getLogger()->info(self::PREFIX . TF::AQUA . " Flying Enabled for " . $player_name . "!");
								$player->sendMessage(self::PREFIX . TF::AQUA . " Flying Disabled by " . $sender_name . "!");
                    			$player->setAllowFlight(true);
							}
                		}
				    }
				}
            }
        }
        return $cmd;
    }

}

?>
