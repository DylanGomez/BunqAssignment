<?php

/**
 * Created by PhpStorm.
 * User: dylangomez
 * Date: 29/06/2017
 * Time: 12:13
 */
namespace Resources\DB;

use domain\Message;
use domain\User;

class DatabaseTalker
{
    private $iConnection;

    public function __construct(IConnect $iConnection)
    {
        $this->iConnection = $iConnection;
    }

    public function connectUser(string $username) :User{
        $username = $this->iConnection->selectUserByUsername($username);

        return $username;

    }

    public function findMessages(User $user) : array
    {
        return $this->iConnection->selectAllMessages($user);
    }

    public function addMessage(Message $message)
    {
        $this->iConnection->insertMessage($message);
    }

    public function findUser(int $userId)
    {
        return $this->iConnection->selectUserById($userId);
    }
}