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

namespace BoxOfBits\Commands;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use pocketmine\Server;

class rules extends Loader{
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "rules")){
            if(!($sender instanceof Player)){
                $name = $sender->getName();
                $line = "\n";
                $rules = str_replace("{player}", $name, "{line}", $line, $this->cfg->get("Rules"));
                $sender->sendMessage($rules);
            }
            if($sender instanceof Player){
                $name = $sender->getName();
                $line = "\n";
                $rules = str_replace("{player}", $name, "{line}", $line, $this->getConfig->get("Rules"));
                $sender->sendMessage($rules)
            }
        }
        return true;
    }

}

?>
