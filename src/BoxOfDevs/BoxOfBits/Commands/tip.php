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

class tip extends Loader{
    
    private $permMessage = "§4You do not have permission to run this command!";
    private $consoleMsg = "§4This command can only be executed in-game!";
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "tip")){
            if(!($sender instanceof Player)){
                if(!(isset($args[1]))){
                    $sender->sendTip("§4Usage: /tip server|playername <tip...>");
                }else{
                    if($args[0] === "server"){
                        unset($args[0]);
                        $tip = implode(" ", $args);
                        $this->getServer()->broadcastTip($tip);
                    }else{
                        $name = $args[0];
                        $player = $this->getServer()->getPlayer($name);
                        if($player === null){
                            $sender->sendTip("§4Player Not Found");
                        }else{
                            unset($args[0]);
                            $tip = implode(" ", $args);
                            $player->sendTip($tip);                                               
                        }
                    }
                }
            }
            if($sender instanceof Player){
                if(!($player->hasPermission("boxofbits" or "boxofbits.tip"))){
                    $sender->sendTip("$this->permMessage");
                }else{
                    if(!(isset($args[1]))){
                        $sender->sendTip("§4Usage: /tip server|playername <tip...>");
                    }else{
                        if($args[0] === "server"){
                            unset($args[0]);
                            $tip = implode(" ", $args);
                            $this->getServer()->broadcastTip($tip);
                        }else{
                            $name = $args[0];
                            $player = $this->getServer()->getPlayer($name);
                            if($player === null){
                                $sender->sendTip("§4Player Not Found");
                            }else{
                                unset($args[0]);
                                $tip = implode(" ", $args);
                                $player->sendTip($tip);                                               
                            }
                        }
                    }
                }
            }
        }
        return true;
    }

}
