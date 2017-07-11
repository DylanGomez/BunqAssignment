<?php
/**
 * Created by PhpStorm.
 * User: dylangomez

 */
namespace chatapp\controllers;

use Resources\DB\DatabaseTalker;
use \Psr\Http\Message\ServerRequestInterface as Request;

class ConnectionController extends MainController {

    private $databaseName;

    public function __construct(DatabaseTalker $databaseName)
    {
        $this->databaseName = $databaseName;
    }

    public function connection(Request $request)
    {
        $username = $this->getParameterBody('username', $request);

        return $this->databaseName->connectUser($username);
    }
}