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
 
namespace TheDragonRing\BoxOfBits\Commands;
 
use TheDragonRing\BoxOfBits\Loader;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\permission\Permission;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class boxofbits extends Loader{
    
    private $permMessage = "§4You do not have permission to run this command!";
    private $consoleMsg = "§4This command can only be executed in-game!";
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "boxofbits")){
            if(!($sender instanceof Player)){
                if(!isset($args[0])){
                    $sender->sendMessage("§4Usage: /boxofbits commands|permissions|other"
                }
                if($args[0] === "commands"){
                    $sender->sendMessage("§0---[§bBoxOfBits Commands§0]--- \n §0• §2/boxofbits commands|permissions|other §0- §fView all the info about BoxOfBits, version, author, commands and permissions (alias = /bb) \n §0• §2/message server|playername <message...> §0- §fSend a message to either the whole server or one player (alias = /m) \n §0• §2/popup server|playername <message...> §0- §fSend a popup to either the whole server or one player (alias = /p) \n §0• §2/tip server|playername <message...> §0- §fSend a tip to either the whole server or one player (alias = /t) \n §0• §2/gms [playername] §0- §fChanges gamemode to Survival (aliases = /survival, /s, & /0) \n §0• §2/gmc [playername] §0- §fChanges gamemode to Creative (aliases = /creative, /c & /1) \n §0• §2/gma [playername] §0- §fChanges gamemode to Adventure (aliases = /adventure, /a, & /2) \n §0• §2/gmsp [playername] §0- §fChanges gamemode to Spectator (aliases = /spectator, /sp, & /3) \n §0• §2/xyz [playername] §0- §fGet player coordinates (alias = /coords) \n §0• §2/rules §0- §fShows the server rules \n §0• §2/suicide §0- §fKill yourself \n §0• §2/slay <playername> §0- §fKills specified player \n §0• §2/heal [playername] §0- §fHeals you or specified player \n §0• §2/health [playername] §0- §fSets you or specified players health \n §0• §2/fly §0- §gLets you fly in survival \n §0• §2/hidetag on|off §0- §fHides the nametag above your head");
                }
                if($args[0] === "permissions"){
                    $sender->sendMessage("§0---[§bBoxOfBits Permissions§0]--- \n §0• §2boxofbits §0- §fAllows all BoxOfBits features §0- §7Default: Disabled/False \n §0• §2boxofbits.info §0- §fFor /boxofbits §0- §7Default: Anyone/True \n §0• §2boxofbits.msg §0- §fFor /message §0- §7Default: OP Only \n §0• §2boxofbits.popup §0- §fFor /popup §0- §7Default: OP Only \n §0• §2boxofobits.tip §0- §fFor /tip §0- §7Default: OP Only \n §0• §2boxofbits.gms §0- §fFor /gms §0- §7Default: OP Only \n §0• §2boxofbits.gmc §0- §fFor /gmc §0- §7Default: OP Only \n §0• §2boxofbits.gma §0- §fFor /gma §0- §7Default: OP Only \n §0• §2boxofbits.gmsp §0- §fFor /gmsp §0- §7Default: OP Only \n §0• §2boxofbits.rules §0- §fFor /srules §0- §7Default: Anyone/True \n §0• §2boxofbits.xyz §0- §fFor /xyz §0- §7Default: Anyone/True \n §0• §2boxofbits.suicide §0- §fFor /suicide §0- §7Default: Anyone/True \n §0• §2boxofbits.slay §0- §fFor /slay §0- §7Default: OP Only \n §0• §2boxofbits.heal §0- §fFor /heal §0- §7Default: OP Only \n §0• §2boxofbits.health §0- §fFor /health §0- §7Default: OP Only \n §0• §2boxofbits.fly §0- §fFor /fly §0- §7Default: OP Only \n §0• §2boxofbits.ht §0- §fFor /hidetag §0- §7Default: OP Only");
                }
                if($args[0] === "other"){
                    $sender->sendMessage("§0---[§bBoxOfBits Info§0]--- \n §0• §2Version: §f1.2.3 \n §0• §2Author: §fTheDragonRing \n §i§6Download this yourself from the ImagicalMine Forums!!!");
                }
            }
            if($sender instanceof Player){
                if(!($sender->hasPermission("disablecmds.info"))){
                    $sender->sendMessage("$this->permMessage");
                }else{
                    if(!isset($args[0])){
                        $sender->sendMessage("§4Usage: /boxofbits commands|permissions|other"
                    }
                    if($args[0] === "commands"){
                        $sender->sendMessage("§0---[§bBoxOfBits Commands§0]--- \n §0• §2/boxofbits commands|permissions|other §0- §fView all the info about BoxOfBits, version, author, commands and permissions (alias = /bb) \n §0• §2/message server|playername <message...> §0- §fSend a message to either the whole server or one player (alias = /m) \n §0• §2/popup server|playername <message...> §0- §fSend a popup to either the whole server or one player (alias = /p) \n §0• §2/tip server|playername <message...> §0- §fSend a tip to either the whole server or one player (alias = /t) \n §0• §2/gms [playername] §0- §fChanges gamemode to Survival (aliases = /survival, /s, & /0) \n §0• §2/gmc [playername] §0- §fChanges gamemode to Creative (aliases = /creative, /c & /1) \n §0• §2/gma [playername] §0- §fChanges gamemode to Adventure (aliases = /adventure, /a, & /2) \n §0• §2/gmsp [playername] §0- §fChanges gamemode to Spectator (aliases = /spectator, /sp, & /3) \n §0• §2/xyz [playername] §0- §fGet player coordinates (alias = /coords) \n §0• §2/rules §0- §fShows the server rules \n §0• §2/suicide §0- §fKill yourself \n §0• §2/slay <playername> §0- §fKills specified player \n §0• §2/heal [playername] §0- §fHeals you or specified player \n §0• §2/health [playername] §0- §fSets you or specified players health \n §0• §2/fly §0- §gLets you fly in survival \n §0• §2/hidetag on|off §0- §fHides the nametag above your head");
                    }
                    if($args[0] === "permissions"){
                        $sender->sendMessage("§0---[§bBoxOfBits Permissions§0]--- \n §0• §2boxofbits §0- §fAllows all BoxOfBits features §0- §7Default: Disabled/False \n §0• §2boxofbits.info §0- §fFor /boxofbits §0- §7Default: Anyone/True \n §0• §2boxofbits.msg §0- §fFor /message §0- §7Default: OP Only \n §0• §2boxofbits.popup §0- §fFor /popup §0- §7Default: OP Only \n §0• §2boxofobits.tip §0- §fFor /tip §0- §7Default: OP Only \n §0• §2boxofbits.gms §0- §fFor /gms §0- §7Default: OP Only \n §0• §2boxofbits.gmc §0- §fFor /gmc §0- §7Default: OP Only \n §0• §2boxofbits.gma §0- §fFor /gma §0- §7Default: OP Only \n §0• §2boxofbits.gmsp §0- §fFor /gmsp §0- §7Default: OP Only \n §0• §2boxofbits.rules §0- §fFor /srules §0- §7Default: Anyone/True \n §0• §2boxofbits.xyz §0- §fFor /xyz §0- §7Default: Anyone/True \n §0• §2boxofbits.suicide §0- §fFor /suicide §0- §7Default: Anyone/True \n §0• §2boxofbits.slay §0- §fFor /slay §0- §7Default: OP Only \n §0• §2boxofbits.heal §0- §fFor /heal §0- §7Default: OP Only \n §0• §2boxofbits.health §0- §fFor /health §0- §7Default: OP Only \n §0• §2boxofbits.fly §0- §fFor /fly §0- §7Default: OP Only \n §0• §2boxofbits.ht §0- §fFor /hidetag §0- §7Default: OP Only");
                    }
                    if($args[0] === "other"){
                        $sender->sendMessage("§0---[§bBoxOfBits Info§0]--- \n §0• §2Version: §f1.2.3 \n §0• §2Author: §fTheDragonRing \n §i§6Download this yourself from the ImagicalMine Forums!!!");
                    }
                }
            }
        }
        return true;
    }

}
