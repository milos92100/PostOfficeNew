<?php
declare(strict_types = 1);
namespace PostOffice\Configuration;

/**
 * ResourceKeyValue
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core component
 * @namespace PostOffice\Configuration
 */
final class ResourceKeyValue
{

    /**
     * Key
     *
     * @var string
     */
    private $key = null;

    /**
     * Value
     *
     * @var string
     */
    private $value = null;

    /**
     * Constructor
     *
     * @param string $key
     * @param string $value
     * @throws \InvalidArgumentException
     */
    public function __construct(string $key, string $value)
    {
        if (isEmpty($key)) {
            throw new \InvalidArgumentException();
        }

        if (isEmpty($value)) {
            throw new \InvalidArgumentException();
        }

        $this->key = $key;
        $this->value = $value;
    }

    /**
     * Returns the key
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Returns the value
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}

