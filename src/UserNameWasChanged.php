<?php

namespace EventsExample;

class UserNameWasChanged implements Event
{

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $oldName;

    /**
     * @var string
     */
    private $newName;


    /**
     * @param string $userId
     * @param string $oldName
     * @param string $newName
     */
    public function __construct($userId, $oldName, $newName)
    {
        $this->userId = $userId;
        $this->oldName = $oldName;
        $this->newName = $newName;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getOldName()
    {
        return $this->oldName;
    }

    /**
     * @return string
     */
    public function getNewName()
    {
        return $this->newName;
    }



}
