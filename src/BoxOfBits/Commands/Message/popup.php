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

namespace BoxOfBits\Commands\Message;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use pocketmine\Server;

class popup extends Loader{

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "popup")){
            if(!($sender instanceof Player)){
                if(!(isset($args[1]))){
                    $sender->sendPopup("§4Usage: /popup <server|player> <popup...>");
                }else{
                    if($args[0] === "server"){
                        unset($args[0]);
                        $popup = implode(" ", $args);
                        $this->getServer()->broadcastPopup($popup);
                    }else{
                        $name = $args[0];
                        $player = $this->getServer()->getPlayer($name);
                        if($player === null){
                            $sender->sendPopup("§4Player not found");
                        }else{
                            unset($args[0]);
                            $popup = implode(" ", $args);
                            $player->sendPopup($popup);                                               
                        }
                    }
                }
            }
            if($sender instanceof Player){
                if(!(isset($args[1]))){
                    $sender->sendPopup("§4Usage: /popup <server|player> <popup...>");
                }else{
                    if($args[0] === "server"){
                        unset($args[0]);
                        $popup = implode(" ", $args);
                        $this->getServer()->broadcastPopup($popup);
                    }else{
                        $name = $args[0];
                        $player = $this->getServer()->getPlayer($name);
                        if($player === null){
                            $sender->sendPopup("§4Player not found");
                        }else{
                            unset($args[0]);
                            $popup = implode(" ", $args);
                            $player->sendPopup($popup);                                               
                        }
                    }
                }
            }
        }
        return true;
    }

}

?>
