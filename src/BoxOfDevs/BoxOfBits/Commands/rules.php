<?php

/*
  ____             ____   __ ____  _ _       
 |  _ \           / __ \ / _|  _ \(_) |      
 | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
 |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
 | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
 |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
 
 The growing plugin with so many features, an alternative to Essentials or EssentialsPE
 
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

class rules extends Loader{
    
    private $permMessage = "§4You do not have permission to run this command!";
    private $consoleMsg = "§4This command can only be executed in-game!";
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "rules")){
            if(!($sender instanceof Player)){
                $name = $sender->getName();
                $line = "\n";
                $rules = str_replace("{player}", $name, "{line}", $line, $this->cfg->get("Rules"));
                $sender->sendMessage($rules);
            }
            if($sender instanceof Player){
                if(!($sender->hasPermission("boxofbits" or "boxofbits.rules"))){
                    $sender->sendMessage("$this->permMessage");
                }else{
                    $name = $sender->getName();
                    $line = "\n";
                    $rules = str_replace("{player}", $name, "{line}", $line, $this->cfg->get("Rules"));
                    $sender->sendMessage($rules)
                }
            }
        }
        return true;
    }

}
