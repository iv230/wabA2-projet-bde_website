<?php

namespace App;


class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $passwordHash;
    protected $school;
    protected $role;

    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $email
     * @param $passwordHash
     * @param $school
     * @param $role
     */
    public function __construct($id, $name, $email, $passwordHash, $school, $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->school = $school;
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * @param mixed $passwordHash
     */
    public function setPasswordHash($passwordHash): void
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @return mixed
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * @param mixed $school
     */
    public function setSchool($school): void
    {
        $this->school = $school;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }


}
