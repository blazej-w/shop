<?php

class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $address;

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPasswordHash($password)
    {
        $this->password = $password;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function checkPassword($password)
    {
        return password_verify($password, $this->password);
    }

    static public function findByEmail($email, mysqli $conn)
    {
        $email = $conn->escape_string($email);

        $query = "SELECT * FROM `user` WHERE `email` = '$email'";

        $result = $conn->query($query);

        if (!$result) {
            throw new Exception($conn->error);
        }

        $userArray = $result->fetch_assoc();

        if (0 === $result->num_rows) {
            throw new Exception('User not found');
        }

        $user = new User();

        $user->setId($userArray['id']);
        $user->setEmail($userArray['email']);
        $user->setPasswordHash($userArray['password']);
        $user->setFirstName($userArray['first_name']);
        $user->setLastName($userArray['last_name']);
        $user->setAddress($userArray['address']);

        return $user;
    }

    static public function findById($id, mysqli $conn)
    {
        $id = $conn->escape_string($id);

        $query = "SELECT * FROM `user` WHERE `id` = $id";

        $result = $conn->query($query);

        if (!$result) {
            throw new Exception($conn->error);
        }

        $userArray = $result->fetch_assoc();

        if (0 === $result->num_rows) {
            throw new Exception('User not found');
        }

        $user = new User();

        $user->setId($userArray['id']);
        $user->setEmail($userArray['email']);
        $user->setPasswordHash($userArray['password']);
        $user->setFirstName($userArray['first_name']);
        $user->setLastName($userArray['last_name']);
        $user->setAddress($userArray['address']);

        return $user;
    }
}
