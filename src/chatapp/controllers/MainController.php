<?php

/**
 * Created by PhpStorm.
 * User: dylangomez

 */
namespace chatapp\controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;


/**
 * Class MainController that holds all main methods used in multiple Controllers
 */
class MainController
{

    public function getParameterBody(Request $request, String $nameOfParameter){

        $parameterBody = $request->getParsedBody();

        return $parameterBody;
    }

}