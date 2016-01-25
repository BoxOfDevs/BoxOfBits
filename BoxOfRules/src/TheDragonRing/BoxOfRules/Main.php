
		if(strtolower($cmd->getName() == "rules"));
			$player = $this->getServer()->getPlayer($sender->getName());
			if($player->hasPermission("boxofbits.rules")){
			if(!isset($args[0])){
				$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."BoxOfRules v0.0.1".Colour::BLACK."]---");
				$sender->sendMessage(Colour::DARK_RED. "Usage: " .Colour::WHITE."/rules 1|2".Colour::DARK_RED." Shows page 1 or 2 of server rules");
				return true;
			}else{
				switch ($args[0]){
					case "1":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."Server Rules Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE($this->config->get("Rule1")));
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE($this->config->get("Rule2")));
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE($this->config->get("Rule3")));
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE($this->config->get("Rule4")));
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE($this->config->get("Rule5")));
						return true;
							break;
					case "2":
						$sender->sendMessage(Colour::BLACK. "---[".Colour::DARK_PURPLE."Server Rules Page 1".Colour::BLACK."]---");
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE($this->config->get("Rule6")));
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE($this->config->get("Rule7")));
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE($this->config->get("Rule8")));
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE($this->config->get("Rule9")));
						$sender->sendMessage(Colour::BLACK. "- " .Colour::WHITE($this->config->get("Rule10")));
						return true;
							break;
								}
									}
										}else{
											$sender->sendMessage(Colour::DARK_RED."$this->permMessage");
									return true;
								}
							break;
