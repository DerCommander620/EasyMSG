<?php
namespace EasyMSG;

use EasyMSG\Commands\MSGCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase{
    use SingletonTrait;

    public function onLoad(): void{
        self::setInstance($this);
        Server::getInstance()->getCommandMap()->unregister(Server::getInstance()->getCommandMap()->getCommand("tell"));
        Server::getInstance()->getCommandMap()->unregister(Server::getInstance()->getCommandMap()->getCommand("msg"));
    }

    public function onEnable(): void{
        self::getServer()->getCommandMap()->registerAll($this->getName(), $this[
            new MSGCommand()
        ]);
    }
}
