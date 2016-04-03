<?php

/*
  ____             ____   __ ____  _ _       
 |  _ \           / __ \ / _|  _ \(_) |      
 | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
 |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
 | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
 |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
 
 The growing plugin with so many features, an alternative to Essentials or EssentialsPE
 
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
use pocketmine\math\Vector3;

class xyz extends Loader{
    
    private $permMessage = "§4You do not have permission to run this command!";
    private $consoleMsg = "§4This command can only be executed in-game!";
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "xyz")){
            if(!($sender instanceof Player)){
				if(!isset($args[0])){
				    $sender->sendMessage("§4$this->$consoleMsg");
				}
				if(isset($args[0])){
    				$player = $this->getServer()->getPlayer($args[0]);
    				if($player instanceof Player){
    				    $x = $player->getX();
    				    $y = $player->getY();
    				    $z = $player->getZ();
				        $player->sendMessage("§6Coordinates: \n §2X:§f $x §2Y:§f $y §2Z:§f $z");
                    }else{
				        $sender->sendMessage(Colour::DARK_RED."Player Not Found");
				    }
				}
            }
            if($sender instanceof Player){
				if(!$sender->hasPermission("boxofbits" or "boxofbits.xyz")){
				    $sender->sendMessage("$this->permMessage");
				}else{
				    if(!isset($args[0])){
    				    $x = $sender->getX();
                        $y = $sender->getY();
    				    $z = $sender->getZ();
				        $sender->sendMessage("§6Coordinates: \n §2X:§f $x §2Y:§f $y §2Z:§f $z");
				    }
				    if(isset($args[0])){
    				    $player = $this->getServer()->getPlayer($args[0]);
    				    if($player instanceof Player){
    				        $x = $player->getX();
    				        $y = $player->getY();
    				        $z = $player->getZ();
				            $player->sendMessage("§6Coordinates: \n §2X:§f $x §2Y:§f $y §2Z:§f $z");
                        }else{
				            $sender->sendMessage(Colour::DARK_RED."Player Not Found");
				        }
				    }
				}
            }
        }
        return true;
    }

}
