<?php
/**
 * Created by PhpStorm.
 * User: dylangomez
*/
namespace chatapp\controllers;

use Resources\DB\DatabaseTalker;
use \Psr\Http\Message\ServerRequestInterface as Request;
use domain\Message;

class MessageHandlerController extends MainController {

    private $database;

    public function __construct(DatabaseTalker $database)
    {
        $this->database = $database;
    }

    public function all(Request $request)
    {
        $userId = $request->getAttribute('userId');
        $user   = $this->database->findUser($userId);
        return $this->database->findMessages($user);
    }

    public function poll(Request $request)
    {
        $userId = $request->getAttribute('userId');
        $user = $this->database->findUser($userId);
        return $this->database->findMessages($user);
    }
}