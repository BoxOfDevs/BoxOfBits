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

namespace BoxOfBits\Commands\NameTag;

use BoxOfBits\Loader;
use BoxOfBits\utils\SymbolFormat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use pocketmine\Server;

class hidetag extends Loader{

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "hidetag")){
            if(!($sender instanceof Player)){
                $sender->sendMessage(TF::DARK_RED."This command can only be executed in-game!");
            }
            if($sender instanceof Player){
                if(!isset $args[0]){
                    $sender->sendMessage(TF::DARK_RED."Usage: /hidetag on|off");
                }
                if($args[0] === "on"){
                    $sender->sendMessage(TF::AQUA."Tag Showing!");
                    $sender->setNameTagVisible(true);
                }
                if($args[0] === "off"){
                    $sender->sendMessage(TF::AQUA."Tag Hidden!");
                    $sender->setNameTagVisible(false);
                }
            }
        }
        return true;
    }

}

?>
