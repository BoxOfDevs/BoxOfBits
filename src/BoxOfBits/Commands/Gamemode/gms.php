<?php

/*
  ____             ____   __ ____  _ _       
 |  _ \           / __ \ / _|  _ \(_) |      
 | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
 |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
 | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
 |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
 
 The growing plugin with so many features
 
*/

namespace BoxOfBits\Commands\Gamemode;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;
;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use pocketmine\Server;

class gms extends Loader{
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "gms")){
            if(!($sender instanceof Player)){
				if(!isset($args[0])){
					$sender->sendMessage("§4Usage: /gms [playername] - [playername] required when run from console!");
                }else{
                    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
                        if($player->getGamemode() == 0){
							$name = $player->getName();
							$sender->sendMessage("§4$name is already in Survival");
				        }else{
							$player->setGamemode(0);
							$player->sendMessage("§aYou are now in Survival");
							$name = $player->getName();
							$sender->sendMessage("§a$name is now in Survival");
							$line = "\n";
							$message = str_replace("{player}", $name, "{line}", $line, $this->getConfig->get("GamemodeChangePopup"));
							$this->getServer()->broadcastPopup($message);
		          		}else{
				            $sender->sendMessage("§4Player not found");
			         	}
                    }
				}
            }
            if($sender instanceof Player){
                if(!isset($args[0])){
				    if($sender->getGamemode() == 0){
				        $sender->sendMessage("§4You are already in Survival");
                    }else{
				        $sender->setGamemode(0);
				        $sender->sendMessage("§aYou are now in Survival");
                        $name = $player->getName();
                        $line = "\n";
                        $message = str_replace("{player}", $name, "{line}", $line, $this->getConfig->get("GamemodeChangePopup"));
                        $this->getServer()->broadcastPopup($message);
				    }
				}
                if(isset($args[0])){
				    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
				        if($player->getGamemode() == 0){
				            $name = $player->getName();
				            $sender->sendMessage("§4$name is already in Survival");
				        }else{
				            $player->setGamemode(0);
				            $player->sendMessage("§aYou are now in Survival");
				            $name = $player->getName();
				            $sender->sendMessage("§a$name is now in Survival");
				            $line = "\n";
				            $message = str_replace("{player}", $name, "{line}", $line, $this->getConfig->get("GamemodeChangePopup"));
				            $this->getServer()->broadcastPopup($message);
				        }
				    }else{
				        $sender->sendMessage("§4Player not found");
				    }				        
				}
            }
        }
        return true;
    }

}

?>
