<?php

/**
 * Created by PhpStorm.
 * User: dylangomez
 * Date: 29/06/2017
 * Time: 12:12
 */
namespace Resources\DB;

use domain\User;
use MongoDB\BSON\Timestamp;
use PDO;

class Connect implements IConnect
{
    const DB_DSN = 'sqlite:src/infrastructure/messages.db';

    private $pdo;

    private $mapper;

    public function __construct()
    {
        $this->pdo = new PDO(self::DB_DSN);
        $this->mapper = new DataMapper();
        $this->ensureUserTableCreated();
        $this->ensureMessageTableCreated();
    }


    public function selectUserByUsername(string $username)
    {
        $statement = $this->pdo->prepare('SELECT * FROM Users WHERE username = ?');
        $statement -> execute([$username]);
    }

    public function selectUserById(int $userId)
    {
        $statement = $this->pdo->prepare('SELECT * FROM Users WHERE id = ?');
        $statement -> execute([$userId]);
    }

    public function addNewUser( string $username)
    {
        $statement = $this->pdo->prepare('INSERT into Users (username) values (?) ');
        $statement -> execute([$username]);
    }

    public function updateLastSeen(int $userId)
    {
        // lastSeen is a value that gets called when this methods gets called
        $lastSeen = Timestamp.intlcal_get_now();
        $statement = $this->pdo->prepare('UPDATE user SET lastSeen = ? WHERE userId = ?');
        $statement -> execute([$lastSeen, $userId]);

    }

    public function updateUser(string $username)
    {
        $statement = $this->pdo->prepare('UPDATE user SET username = ? WHERE username = ?');
        $statement -> execute([$username]);    }

    public function insertMessage( string $messageBody)
    {
        $statement = $this->pdo->prepare('INSERT INTO message (text) VALUES (?) ');
        $statement -> execute([$messageBody]);
    }

    public function selectAllMessages(User $user): array
    {
        $userId = $user.getId();

        $statement = $this->pdo->prepare('SELECT text FROM messages WHERE sendingUserId = ?');
        $statement -> execute([$userId]);
    }
}