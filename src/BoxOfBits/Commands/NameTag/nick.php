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

class nick extends Loader{
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "nick")){
            if(!($sender instanceof Player)){
                $sender->sendMessage(TF::DARK_RED."This command can only be executed in-game!");
            }elseif($sender instanceof Player){
                if(!isset($args[0]){
                    $sender->sendMessage(TF::DARK_RED."Usage: /nick <nickname|reset>");
                }
                if($args[0] === "reset"){
                    $realname = $sender->getName();
                    $sender->setDisplayName($realname);
                    $sender->sendMessage(TF::DARK_GREEN."Your nick has been reset to:".TF::WHITE." $realname");
                }elseif(isset($args[0]){
                    $nick = $args[0];
                    $sender->setDisplayName($nick);
                    $sender->sendMessage(TF::DARK_GREEN."Your nick is now:".TF::WHITE." $nick");
                }
            }
        }
        return true;
    }

}

?>
