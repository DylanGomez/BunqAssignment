<?php
/**
 * Created by PhpStorm.
 * User: dylangomez
 * Date: 29/06/2017
 * Time: 11:55
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