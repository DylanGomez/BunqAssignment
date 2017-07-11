<?php

/**
 * Created by PhpStorm.
 * User: dylangomez

 */
namespace Resources\DB;

use domain\Message;
use domain\User;
use MongoDB\BSON\Timestamp;


interface IConnect
{

    public function selectUserByUsername(string $username);

    public function selectUserById(int $userId);

    public function addNewUser(string $username);

    public function updateLastSeen(int $userId);

    public function updateUser(string $username);

    public function insertMessage(string $messageBody);

    public function selectAllMessages(User $user) : array;
}