<?php
declare(strict_types = 1);
namespace PostOffice\Domain\Entity;

use PostOffice\Domain\Entity\Abstraction\BaseEntity;

class User extends BaseEntity
{

    private $id;

    private $email;

    private $firstName;

    private $lastName;

    private $dateTimeModified;

    private $dateTimeAdded;

    public function __construct(string $id, string $email, string $firstName, string $lastName, string $dateTimeModified, string $dateTimeAdded)
    {
        $this->id = $id;
        $this->email = $email;
        $this->firstName = $firstName;
    }
}