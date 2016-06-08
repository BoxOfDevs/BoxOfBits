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

class info extends Loader implements CommandExecutor{
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "boxofbits")){
            if(!$sender instanceof Player){
                $this->getLogger()->info(TF::BLACK . "-=[" . TF::AQUA . "BoxOfBits Info" . TF::BLACK . "]=- \n " . TF::BLACK . "• " . TF::DARK_GREEN . "Version: " . TF::WHITE . self::VERSION . " \n " . TF::BLACK . "• " . TF::DARK_GREEN . "Author/s: " . TF::WHITE . self::AUTHOR . " \n " . TF::BLACK . "• " . TF::DARK_GREEN . "Website: " . TF::WHITE . self::WEBSITE . " \n " . TF::BLACK . "• " . TF::DARK_GREEN . "Description: " . TF::WHITE . self::DESCRIPTION . " \n " . TF::BLACK . "• " . TF::DARK_GREEN . "License: " . TF::WHITE . self::LICENSE);
            }elseif($sender instanceof Player){
				if(!$sender->hasPermission("boxofbits" || "boxofbits.info")){
					$sender->sendMessage(self::PREFIX . TF::DARK_RED . "You do not have permission to run this command!");
				}elseif($sender->hasPermission("boxofbits" || "boxofbits.info")){
                	$sender->sendMessage(TF::BLACK . "-=[" . TF::AQUA . "BoxOfBits Info" . TF::BLACK . "]=- \n " . TF::BLACK . "• " . TF::DARK_GREEN . "Version: " . TF::WHITE . self::VERSION . " \n " . TF::BLACK . "• " . TF::DARK_GREEN . "Author/s: " . TF::WHITE . self::AUTHOR . " \n " . TF::BLACK . "• " . TF::DARK_GREEN . "Website: " . TF::WHITE . self::WEBSITE . " \n " . TF::BLACK . "• " . TF::DARK_GREEN . "Description: " . TF::WHITE . "The growing plugin with so many features! \n " . TF::BLACK . "• " . TF::DARK_GREEN . "License: " . TF::WHITE . "CC A-NC-ND 4.0 International License");
            }
        }
        return $cmd;
    }

}

?>
