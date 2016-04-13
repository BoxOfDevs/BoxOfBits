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

class info extends Loader{
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "boxofbits")){
            if(!($sender instanceof Player)){
                $sender->sendMessage("§0-=§l[§r§bBoxOfBits Info§0§l]§r§0=- \n    §0• §2Version§0: §f1.2.3 \n   §0•    §2Author/s§0: §fBoxOfDevs Team \n    §0• §2Website§0: §fhttps://boxofdevs.github.io/BoxOfBits/ \n    §0• §2Description§0: §fThe growing plugin with so many features! \n    §0• §2License§0: §fGNU GENERAL PUBLIC LICENSE");
            }
            if($sender instanceof Player){
                $sender->sendMessage("§0-=§l[§r§bBoxOfBits Info§0§l]§r§0=- \n    §0• §2Version§0: §f1.2.3 \n   §0•    §2Author/s§0: §fBoxOfDevs Team \n    §0• §2Website§0: §fhttps://boxofdevs.github.io/BoxOfBits/ \n    §0• §2Description§0: §fThe growing plugin with so many features! \n    §0• §2License§0: §fGNU GENERAL PUBLIC LICENSE");
            }
        }
        return true;
    }

}

?>
