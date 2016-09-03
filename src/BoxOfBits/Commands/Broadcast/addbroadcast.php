<?php

/*
 * $$$$$$$\                       $$$$$$\   $$$$$$\  $$$$$$$\  $$\   $$\               
 * $$  __$$\                     $$  __$$\ $$  __$$\ $$  __$$\ \__|  $$ |              
 * $$ |  $$ | $$$$$$\  $$\   $$\ $$ /  $$ |$$ /  \__|$$ |  $$ |$$\ $$$$$$\    $$$$$$$\ 
 * $$$$$$$\ |$$  __$$\ \$$\ $$  |$$ |  $$ |$$$$\     $$$$$$$\ |$$ |\_$$  _|  $$  _____|
 * $$  __$$\ $$ /  $$ | \$$$$  / $$ |  $$ |$$  _|    $$  __$$\ $$ |  $$ |    \$$$$$$\  
 * $$ |  $$ |$$ |  $$ | $$  $$<  $$ |  $$ |$$ |      $$ |  $$ |$$ |  $$ |$$\  \____$$\ 
 * $$$$$$$  |\$$$$$$  |$$  /\$$\  $$$$$$  |$$ |      $$$$$$$  |$$ |  \$$$$  |$$$$$$$  |
 * \_______/  \______/ \__/  \__| \______/ \__|      \_______/ \__|   \____/ \_______/ 
 *
 * @author BoxOfDevs Team
 * @version 1.0.0
 * @description The growing plugin with so many features!
 * @license Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License, Copyright © 2016 BoxOfDevs Team
 * @website boxofdevs.com
 * @prefix [BoxOfBits]
 *
 */

namespace BoxOfBits\Commands\Broadcast;

use BoxOfBits\BaseBox;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\IPlayer;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\permission\Permission;

class addbroadcast extends BaseBox implements CommandExecutor{

	public function __construct(BaseBox $BaseBox){
		parent::__construct($BaseBox);
		$this->BaseBox = $BaseBox;
	}

	public function getAPI(){
		return ($api = $this->BaseBox);
	}

	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "addbroadcast")){
            if(!$sender instanceof Player){
                if(!isset($args[0])){
					$this->getLogger()->warn(TF::DARK_RED . " Usage: /addbroadcast <broadcast>");
				}else{
					$this->getAPI()->addBroadcast(implode(" ", $args));
					$this->getLogger()->info(TF::GREEN . " Broadcast Added Successfully");
				}
            }else{
                if($sender->hasPermission("boxofbits") || $sender->hasPermission("boxofbits.broadcast") || $sender->hasPermission("boxofbits.broadcast.add")){
					if(!isset($args[0])){
						$sender->sendMessage($this->getAPI()->getPrefix() . TF::DARK_RED . " Usage: /addbroadcast <broadcast>");
					}else{
						$this->getAPI()->addBroadcast(implode(" ", $args));
						$sender->sendMessage($this->getAPI()->getPrefix() . TF::GREEN . " Broadcast Added Successfully");
					}
				}else{
                    $sender->sendMessage($this->getAPI()->getPrefix() . TF::DARK_RED . " You do not have permission to run this command!");
                }
            }
        }
    }

}

?>
