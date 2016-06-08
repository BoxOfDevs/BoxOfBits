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

class heal extends Loader{
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "heal")){
			if(!($sender instanceof Player)){
				if(!isset($args[0])){
					$sender->sendMessage(TF::DARK_RED."Usage: /heal [playername] - [playername] required when run from console!");
				}else{
				    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
				        $player->setHealth(20);
				        $sender->sendMessage(TF::AQUA."$player has been healed");
				        $player->sendMessage(TF::AQUA."You have been healed");
				    }else{
				        $sender->sendMessage(TF::DARK_RED."Player not found");
				    }
				}
            }elseif($sender instanceof Player){
				if(!isset($args[0])){
                    $player->setHealth(20);
                    $sender->sendMessage("§bYou have been healed");
                }else{
				    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
				        $player->setHealth(20);
				        $sender->sendMessage(TF::AQUA."$player has been healed");
				        $player->sendMessage(TF::AQUA."You have been healed");
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
