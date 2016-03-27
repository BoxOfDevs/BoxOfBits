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
 
namespace TheDragonRing\BoxOfBits\Commands;
 
use TheDragonRing\BoxOfBits\Loader;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\permission\Permission;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class popup extends Loader{
    
    private $permMessage = "§4You do not have permission to run this command!";
    private $consoleMsg = "§4This command can only be executed in-game!";
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "popup")){
            if(!(isset($args[1]))){
                $sender->sendMessage("§4Usage: /popup server|playername <message...>");
            }else{
                if($args[0] === "server"){
                    unset($args[0]);
                    $popup = implode(" ", $args);
                    $this->getServer()->broadcastPopup($popup);
                }else{
                    $name = $args[0];
                    $player = $this->getServer()->getPlayer($name);
                    if($player === null){
                        $sender->sendMessage("§4Player Not Found");
                    }else{
                        unset($args[0]);
                        $popup = implode(" ", $args);
                        $player->sendPopup($popup);                                               
                    }
                }
            }
        }
        return true;
    }

}
