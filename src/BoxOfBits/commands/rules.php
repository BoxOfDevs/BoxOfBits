<<?php

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

namespace BoxOfBits\commands;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\permission\Permission;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\math\Vector3;

class rules extends Loader implements CommandExecutor{
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "rules")){
            if(!($sender instanceof Player)){
                $name = $sender->getName();
                $line = "\n";
                $rules = str_replace("{player}", $name, "{line}", $line, $this->getConfig()->get("ServerRules"));
                $this->getLogger()->info($rules);
            }elseif($sender instanceof Player){
                if($sender->hasPermission("boxofbits" || "boxofbits.rules")){
                    $name = $sender->getName();
                    $line = "\n";
                    $rules = str_replace("{player}", $name, "{line}", $line, $this->getConfig()->get("ServerRules"));
                    $sender->sendMessage($rules)
                }
            }
        }
        return $cmd;
    }

}

?>
