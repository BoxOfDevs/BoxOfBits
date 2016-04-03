<?php

/*
  ____             ____   __ ____  _ _       
 |  _ \           / __ \ / _|  _ \(_) |      
 | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
 |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
 | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
 |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
 
 The growing plugin with so many featuree
 
 */
 
namespace BoxOfDevs\BoxOfBits\Commands;
 
use BoxOfDevs\BoxOfBits\Loader;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\permission\Permission;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class heal extends Loader{
    
    private $permMessage = "§4You do not have permission to run this command!";
    private $consoleMsg = "§4This command can only be executed in-game!";
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "heal")){
			if(!($sender instanceof Player)){
				if(!isset($args[0])){
					$sender->sendMessage("§4Usage: /heal [playername] - [playername] required when run from console!");
				}else{
				    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
				        $player->setHealth(20);
				        $sender->sendMessage("§b$player has been healed");
				        $player->sendMessage("§bYou have been healed");
				    }else{
				        $sender->sendMessage("§4Player Not Found");
				    }
				}
            }
            if($sender instanceof Player){
                if($sender->hasPermission("boxofbits" or "boxofbits.heal")){
				    if(!isset($args[0])){
                        $player->setHealth(20);
                        $sender->sendMessage("§bYou have been healed");
                    }else{
				        $player = $this->getServer()->getPlayer($args[0]);
				        if($player instanceof Player){
				            $player->setHealth(20);
				            $sender->sendMessage("§b$player has been healed");
				            $player->sendMessage("§bYou have been healed");
				        }else{
				            $sender->sendMessage("§4Player Not Found");
				        }
				    }
				}else{
                $sender->sendMessage("$this->permMessage");
				}
            }
        }
        return true;
    }

}
