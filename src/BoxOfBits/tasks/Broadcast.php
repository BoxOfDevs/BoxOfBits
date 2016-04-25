<?php

namespace BoxOfBits\tasks;

use BoxOfBits\Loader;
use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;

class Broadcast extends PluginTask{

    public function __construct(Loader $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }

}

?>
