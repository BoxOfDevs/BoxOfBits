<?php

namespace TheDragonRing\StaffChests;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as Colour;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\permission\Permission;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(Colour::AQUA."StaffChests".Colour::DARK_RED." by TheDragonRing".Colour::GREEN." Enabled!");


	public function onDisable(){
		$this->getLogger()->info(Colour::AQUA."StaffChests".Colour::GREEN." by TheDragonRing".Colour::DARK_RED." Disabled!");
	}

    private $permMessage = Colour::DARK_RED."You do not have permission to run this command!";
    private $consoleMsg = Colour::DARK_RED."This command can only be executed in-game!";

	public function onCommand(CommandSender $sender,Command $cmd,$label,array $args){
		if(strtolower($cmd->getName() == "staffchests"));
			$player = $this->getServer()->getPlayer($sender->getName());
			if($player->hasPermission("staffchests.main")){
			if(!isset($args[0])){
