<?php

/**
 * Created by PhpStorm.
 * User: dylangomez

 */
namespace domain;

class Message implements JsonSerializable
{
    private $sendingUser;

    private $receivingUser;

    private $messageBody;

    private $messageId;


    public function __construct(User $sendingUser, User $receivingUser, String $messageBody){
        $this->sendingUser = $sendingUser;
        $this->receivingUser = $receivingUser;
        $this->messageBody = $messageBody;
    }

    /**
     * @param mixed $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @return User
     */
    public function getSendingUser(): User
    {
        return $this->sendingUser;
    }

    /**
     * @return User
     */
    public function getReceivingUser(): User
    {
        return $this->receivingUser;
    }

    /**
     * @return String
     */
    public function getMessageBody(): String
    {
        return $this->messageBody;
    }

    /**
     * @return mixed
     */
    public function getMessageId()
    {
        return $this->messageId;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}