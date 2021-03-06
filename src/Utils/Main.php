<?php

namespace Utils;

use pocketmine\plugin\PluginBase as Base;
use pocketmine\entity\Entity;

class Main extends Base{
  
  public function onLoad(){
    $this->getLogger()->notice("This plugin is a complete experiment, thanks for testing!");
  }
  
  public function onEnable(){
    @mkdir($this->getDataFolder());
    $this->config = new Config($this->getDataFolder()."config.yml", Config::YAML, [
      "block.breaking" => false,
      "percent.chance" => 5,
      "size" => 10
      ]);
      $this->players = new \SplObjectStorage();
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
      Entity::registerEntity(FireBall::class, true);
  }
}
