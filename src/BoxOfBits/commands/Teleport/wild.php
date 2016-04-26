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
use pocketmine\level\Level;
use pocketmine\level\Position;

class wild extends Loader implements CommandExecutor{

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "wild")){
            if(!$sender instanceof Player){
				if(!isset($args[0])){
				    $this->getLogger()->info(self::PREFIX . TF::DARK_RED . " Usage: /wild [player] - [player] required when run from console!");
				}elseif(isset($args[0])){
    				$player = $this->getServer()->getPlayer($args[0]);
					$player_name = $args[0];
    				if(!$player instanceof Player){
    				    $this->getLogger()->info(self::PREFIX . TF::DARK_RED . " Player not found");
                    }elseif($player instanceof Player){
						$x = rand(1,999);
            			$y = rand(1,128);
            			$z = rand(1,999);
            			$player->teleport(new Position($x,$y,$z));
           				$player->sendMessage(self::PREFIX . TF::AQUA . " CONSOLE teleported you to a random position!");
						$this->getLogger()->info(self::PREFIX . TF::AQUA . " " . $player_name . " was teleported to a random position!");
				    }
				}
            }elseif($sender instanceof Player){
                if(!$sender->hasPermission("boxofbits" || "boxofbits.tp" || "boxofbits.tp.wild")){
					$sender->sendMessage(self::PREFIX . TF::DARK_RED . " You do not have permission to run this command!");
				}elseif($sender->hasPermission("boxofbits" || "boxofbits.tp" || "boxofbits.tp.wild")){
				    if(!isset($args[0])){
						$x = rand(1,999);
            			$y = rand(1,128);
            			$z = rand(1,999);
            			$sender->teleport(new Position($x,$y,$z));
            	$		sender->sendMessage(self::PREFIX . TF::AQUA . " Teleported to a random position!");
					}elseif(isset($args[0])){
    					$player = $this->getServer()->getPlayer($args[0]);
						$player_name = $args[0];
						$sender_name = $sender->getName();
    					if(!$player instanceof Player){
    					    $this->getLogger()->info(self::PREFIX . TF::DARK_RED . " Player not found");
                    	}elseif($player instanceof Player){
							$x = rand(1,999);
            				$y = rand(1,128);
            				$z = rand(1,999);
            				$player->teleport(new Position($x,$y,$z));
            				$player->sendMessage(self::PREFIX . TF::AQUA . " " . $sender_name . " teleported you to a random position!");
							$sender->sendMessage(self::PREFIX . TF::AQUA . " " . $player_name . " was teleported to a random position!");
                		}
				    }
				}
            }
        }
        return true;
    }

}

?>
