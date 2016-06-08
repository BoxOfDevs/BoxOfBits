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
use pocketmine\level\Level;
use pocketmine\level\Position;

class setperm extends Loader implements CommandExecutor{

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "setperm")){
			$permdata = new Config($this->getDataFolder . "permdata.yml", CONFIG::YAML);
			if(!$sender instanceof Player){
            	if(!isset($args[1])){
            	    $this->getLogger()->info(self::PREFIX . TF::DARK_RED . " Usage: /setperm <player> <permission>");
            	}else{
            	    $player_name = $args[0];
            	    $player = $this->getServer()->getPlayer($args[0]);
            	    $perm = Server::getInstance()->getPluginManager()->getPermission($args[1]);
            	    $player->addAttachment($this, $perm, true);
            	    $this->getLogger()->info(self::PREFIX . TF::AQUA . " " . $perm . " successfully set to " . $playername . "!");
					$plperms = $permdata->get($player_name);
					array_push($plperms, $args[0]);
					$permdata->set($player_name, $plperms);
					$permdata->save();
            	}
			}elseif($sender instanceof Player){
                if(!$sender->hasPermission("boxofbits" || "boxofbits.pm" || "boxofbits.pm.setperm")){
					$sender->sendMessage(self::PREFIX . TF::DARK_RED . " You do not have permission to run this command!");
				}elseif($sender->hasPermission("boxofbits" || "boxofbits.pm" || "boxofbits.pm.setperm")){
		            $player_name = $args[0];
            	    $player = $this->getServer()->getPlayer($args[0]);
            	    $perm = Server::getInstance()->getPluginManager()->getPermission($args[1]);
            	    $player->addAttachment($this, $perm, true);
            	    $sender->sendMessage(self::PREFIX . TF::AQUA . " " . $perm . " successfully set to " . $playername . "!");
					$plperms = $permdata->get($player_name);
					array_push($plperms, $args[0]);
					$permdata->set($player_name, $plperms);
					$permdata->save();
				}
			}
		}
		return true;
    }

}

?>
