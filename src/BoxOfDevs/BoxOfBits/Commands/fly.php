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

class fly extends Loader{
    
    private $permMessage = "§4You do not have permission to run this command!";
    private $consoleMsg = "§4This command can only be executed in-game!";
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "fly")){
            if(!($sender instanceof Player)){
                $sender->sendMessage("$this->consoleMsg");
            }
            if($sender instanceof Player){
                if($sender->hasPermission("boxofbits" or "boxofbits.fly")){
                    if($sender->getAllowFlight()){
                        $sender->sendMessage("§4Flying Disabled!");
                        $sender->setAllowFlight(false);
                    }else{
                        $sender->sendMessage("§aFlying Enabled!");
                        $sender->setAllowFlight(true);
                    }
                }else{
                    $sender->sendMessage("$this->permMessage");
                }
            }
        }
        return true;
    }

}
