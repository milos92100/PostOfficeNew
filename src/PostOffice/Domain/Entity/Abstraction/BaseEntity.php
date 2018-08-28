<?php
declare(strict_types = 1);
namespace PostOffice\Domain\Entity\Abstraction;

/**
 * This is an abstract class and represents a record in the persistence layer.
 * All entities should inherit form this class.
 *
 * @author Milos Stojanovic
 * @version 1.0
 * @namespace PostOffice\Domain\Entity\Abstraction
 *           
 */
abstract class BaseEntity
{

    /**
     * Indicates the record id
     *
     * @var int
     */
    protected $recordId;

    /**
     * Indicates the soft delete of the object
     *
     * @var boolean
     */
    protected $isDeleted;
}

