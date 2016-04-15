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

namespace BoxOfBits\Commands\HealthManager;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use pocketmine\Server;

class slay extends Loader{

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "slay")){
            if(!($sender instanceof Player)){
				if(!isset($args[0])){
				    $sender->sendMessage(TF::DARK_RED."Usage: /slay <player>");
				}
				if(isset($args[0])){
				    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
				        $player->setHealth(0);
				        $player->sendMessage(TF::DARK_RED."You were slain by the CONSOLE");
				        $sender->sendMessage(TF::GREEN."$player has been slain");
				        $this->getServer()->broadcastPopup(TF::DARK_RED."$player was slain by the CONSOLE");
				    }else{
				        $sender->sendMessage(TF::DARK_RED."Player not found");
					}
				}
            }
            if($sender instanceof Player){
				if(!isset($args[0])){
		        	$sender->sendMessage(TF::DARK_RED."Usage: /slay <player>");
				}
				if(isset($args[0])){
				    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
				        $name = $sender->getName();
				        $player->setHealth(0);
				        $player->sendMessage(TF::DARK_RED."You were slain by $name");
				        $sender->sendMessage(TF::GREEN."$player has been slain");
				        $this->getServer()->broadcastPopup(TF::DARK_RED."$player was slain by $name");
				    }else{
				        $sender->sendMessage(TF::DARK_RED."Player Not Found");
				    }
                }
            }
        }
        return true;
    }

}

?>
