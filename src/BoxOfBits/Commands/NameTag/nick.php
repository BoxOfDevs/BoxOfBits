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
                $sender->sendMessage("§4This command can only be executed in-game!");
            }
            if($sender instanceof Player){
                if(!isset($args[0]){
                    $sender->sendMessage("§4Usage: /nick <nickname|reset>");
                }
                if($args[0] === "reset"){
                    $realname = $sender->getName();
                    $sender->setDisplayName($realname);
                    $sender->sendMessage("§2Your nick has been reset to:§f $realname");
                }elseif(isset($args[0]){
                    $nick = $args[0];
                    $sender->setDisplayName($nick);
                    $sender->sendMessage("§2Your nick is now:§f $nick");
                }
            }
        }
        return true;
    }

}

?>
