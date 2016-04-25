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

class xyz extends Loader implements CommandExecutor{

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "xyz")){
            if(!($sender instanceof Player)){
				if(!isset($args[0])){
				    $this->getLogger()->info(self::PREFIX . TF::DARK_RED . "Usage: /xyz [player] - [player] required when run from console!");
				}elseif(isset($args[0])){
    				$player = $this->getServer()->getPlayer($args[0]);
					$player_name = $args[0];
    				if(!$player instanceof Player){
    				    $this->getLogger()->info(self::PREFIX . TF::DARK_RED."Player not found");
                    }elseif($player instanceof Player){
				        $x = $player->getX();
    				    $y = $player->getY();
    				    $z = $player->getZ();
				        $this->getLogger()->info(TF::GOLD . $player_name . "'s Coordinates: \n " . TF::DARK_GREEN . "X:" . TF::WHITE . " $x " . TF::DARK_GREEN . "Y:" . TF::WHITE . " $y " . TF::DARK_GREEN . "Z:" . TF::WHITE . " $z");
				    }
				}
            }elseif($sender instanceof Player){
                if(!($sender->hasPermission("boxofbits" || "boxofbits.xyz"))){
					$sender->sendMessage(self::PREFIX . TF::DARK_RED . "You do not have permission to run this command!");
				}elseif($sender->hasPermission("boxofbits" || "boxofbits.xyz")){
				    if(!isset($args[0])){
				    	$x = $sender->getX();
    				    $y = $sender->getY();
    				    $z = $sender->getZ();
			    	    $sender->sendMessage(TF::GOLD . "Your Coordinates: \n " . TF::DARK_GREEN . "X:" . TF::WHITE . " $x " . TF::DARK_GREEN . "Y:" . TF::WHITE . " $y " . TF::DARK_GREEN . "Z:" . TF::WHITE . " $z");
					}elseif(isset($args[0])){
    					$player = $this->getServer()->getPlayer($args[0]);
						$player_name = $args[0];
    					if(!$player instanceof Player){
    					    $sender->sendMessage(self::PREFIX . TF::DARK_RED."Player not found");
                    	}elseif($player instanceof Player){
				    	    $x = $player->getX();
    					    $y = $player->getY();
    					    $z = $player->getZ();
				    	    $sender->sendMessage(TF::GOLD . $player_name . "'s Coordinates: \n " . TF::DARK_GREEN . "X:" . TF::WHITE . " $x " . TF::DARK_GREEN . "Y:" . TF::WHITE . " $y " . TF::DARK_GREEN . "Z:" . TF::WHITE . " $z");
				    }
				}
            }
        }
        return $cmd;
    }

}

?>
