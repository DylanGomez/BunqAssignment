<?php
/**
 * Created by PhpStorm.
 * User: dylangomez
 */

namespace chatapp\controllers;
use domain\Message;
use Resources\DB\DatabaseTalker;

use \Psr\Http\Message\ServerRequestInterface as Request;

class ChatController extends MainController {

    private $database;
    public function __construct(DatabaseTalker $database)
    {
        $this->database = $database;
    }
    public function sendMessage(Request $request)
    {
        $attributes = $request->getAttributes();
        $sender     = $this->database->findUser($attributes['senderId']);
        $receiver   = $this->database->findUser($attributes['receiverId']);
        $content    = $this->getParameterBody('message', $request);
        $message = new Message($sender, $receiver, $content);
        $this->database->addMessage($message);
        return '';
    }

}