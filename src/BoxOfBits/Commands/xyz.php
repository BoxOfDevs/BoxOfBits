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
use pocketmine\math\Vector3;

class xyz extends Loader{

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "xyz")){
            if(!($sender instanceof Player)){
				if(!isset($args[0])){
				    $sender->sendMessage(TF::DARK_RED."Usage: /xyz [player] - [player] required when run from console!");
				}elseif(isset($args[0])){
    				$player = $this->getServer()->getPlayer($args[0]);
    				if($player instanceof Player){
    				    $x = $player->getX();
    				    $y = $player->getY();
    				    $z = $player->getZ();
				        $player->sendMessage(TF::GOLD."Coordinates: \n ".TF::DARK_GREEN."X:".TF::WHITE." $x §".TF::DARK_GREEN."Y:".TF::WHITE." $y ".TF::DARK_GREEN."Z:".TF::WHITE." $z");
                    }else{
				        $sender->sendMessage(TF::DARK_RED."Player not found");
				    }
				}
            }
            if($sender instanceof Player){
				if(!isset($args[0])){
                    $x = $sender->getX();
                    $y = $sender->getY();
                    $z = $sender->getZ();
                    $sender->sendMessage(TF::GOLD."Coordinates: \n ".TF::DARK_GREEN."X:".TF::WHITE." $x §".TF::DARK_GREEN."Y:".TF::WHITE." $y ".TF::DARK_GREEN."Z:".TF::WHITE." $z");
				}
				if(isset($args[0])){
                    $player = $this->getServer()->getPlayer($args[0]);
    				if($player instanceof Player){
    				    $x = $player->getX();
    				    $y = $player->getY();
    				    $z = $player->getZ();
				        $player->sendMessage(TF::GOLD."Coordinates: \n ".TF::DARK_GREEN."X:".TF::WHITE." $x §".TF::DARK_GREEN."Y:".TF::WHITE." $y ".TF::DARK_GREEN."Z:".TF::WHITE." $z");
                    }else{
				        $sender->sendMessage(TF::DARK_RED."Player not found");
				    }
				}
            }
        }
        return true;
    }

}

?>
