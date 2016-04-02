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

class suicide extends Loader{
    
    private $permMessage = "§4You do not have permission to run this command!";
    private $consoleMsg = "§4This command can only be executed in-game!";
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "suicide")){
            if(!($sender instanceof Player)){
				$sender->sendMessage(Colour::DARK_RED."$this->consoleMsg");
            }
            if($sender instanceof Player){
				if($sender->hasPermission("boxofbits.suicide")){
				    $sender->setHealth(0);
				    $sender->sendMessage(Colour::DARK_RED."You have commited suicide!");
				    $this->getServer()->broadcastPopup("§4$sender commited suicide");
				}else{
				    $sender->sendMessage(Colour::DARK_RED."$this->permMessage");
				}
            }
        }
        return true;
    }

}
