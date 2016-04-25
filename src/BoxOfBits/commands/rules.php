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
            if(!$sender instanceof Player){
				$config = new Config($this->getDataFolder . "config.yml", CONFIG::YAML);
				$name = $sender->getName();
                $line = "\n";
                $r = str_replace("{player}", $name, $config->get("ServerRules"));
				$rules = str_replace("{line}", $line, $r));
                $this->getLogger()->info($rules);
            }elseif($sender instanceof Player){
                if(!$sender->hasPermission("boxofbits" || "boxofbits.rules")){
					$sender->sendMessage(self::PREFIX . TF::DARK_RED . " You do not have permission to run this command!");
				}elseif($sender->hasPermission("boxofbits" || "boxofbits.rules")){
					$config = new Config($this->getDataFolder . "config.yml", CONFIG::YAML);
				    $name = $sender->getName();
                	$line = "\n";
                	$r = str_replace("{player}", $name, $config->get("ServerRules"));
					$rules = str_replace("{line}", $line, $r));
                	$sender->sendMessage($rules);
				}
            }
        }
        return $cmd;
    }

}

?>
