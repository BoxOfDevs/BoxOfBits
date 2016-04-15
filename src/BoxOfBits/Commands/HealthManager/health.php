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

class health extends Loader{

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "health")){
            if(!($sender instanceof Player)){
				if(!isset($args[1])){
					$sender->sendMessage(TF::DARK_RED."Usage: /health <amount> [playername] - [playername] required when run from console!");
				}else{
				    $player = $this->getServer()->getPlayer($args[1]);
				    if($player instanceof Player){
				        $player->setHealth($args[0]);
				        $sender->sendMessage(TF::GREEN."$player's health has been set");
				        $player->sendMessage(TF::GREEN."Your health has been set");
				    }else{
				        $sender->sendMessage(TF::DARK_RED."Player not found");
				    }
				}
            }elseif($sender instanceof Player){
                    if(!isset($args[0])){
                        $sender->sendMessage(TF::DARK_RED."Usage: /health <amount> [playername]");
                    }
				    if(!isset($args[1])){
                        $player->setHealth($args[0]);
                        $sender->sendMessage(TF::GREEN."Your health has been set");
                    }else{
				        $player = $this->getServer()->getPlayer($args[1]);
				        if($player instanceof Player){
				            $player->setHealth($args[0]);
				            $sender->sendMessage(TF::GREEN."$player's health has been set");
				            $player->sendMessage(TF::GREEN."Your health has been set");
				    }else{
				        $sender->sendMessage(TF::DARK_RED."Player not found");
				    }
				}
            }
        }
        return true;
    }

}

?>
