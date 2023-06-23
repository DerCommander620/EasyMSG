<?php
namespace EasyMSG;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Main extends PluginBase{

    public function onEnable(): void{
        Server::getInstance()->getCommandMap()->unregister(Server::getInstance()->getCommandMap()->getCommand("tell"));
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        switch($command->getName()){
            case "msg":
                $player = Server::getInstance()->getPlayerExact($args[0]);
                $message = $args([1]);
                if(empty($args[0])){
                    $sender->sendMessage("§cPlease enter a Player Name!");
                }
                if(empty($args[1])){
                    $sender->sendMessage("§cPlease enter the Message you want to send");
                }
                if(!$player){
                    $sender->sendMessage("§cPlayer not found.");
                }else{
                    $player->sendMessage("§bFrom " . $sender->getName() . ": §r§f" . $message);
                    $this->getLogger()->info($sender->getName() . " send " . $player->getName() . " a message:" . $message);
                    $sender->sendMessage("§d§lTo: §r§a" . $player->getName() . ". §r§f " . $message);
                }
        }
    return true;    
    }
}
