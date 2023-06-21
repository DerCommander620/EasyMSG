<?php
namespace EasyMSG\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class MSGCommand extends Command{

    public function __construct(){
        parent::__construct("msg", "", "msg <playername> <Message>", ["tell"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if($sender instanceof Player){
            if (isset($args[0])) {
                if(isset($args[1])){
                    $p = $args[0];
                    if ($p instanceof Player) {
                        $p->sendMessage($args[1]);
                    }
                }
                if(!$p){
                    $sender->sendMessage("Player not found or is not online");
                }
            }            
        }else{
            $sender->sendMessage("You cant Message other Players as a Unvalid Entity!");
        }
    }
}
