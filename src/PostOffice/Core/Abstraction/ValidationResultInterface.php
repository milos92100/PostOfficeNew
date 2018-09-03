<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

/**
 * ValidationResultInterface
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core interface
 * @namespace PostOffice\Core\Abstraction
 */
interface ValidationResultInterface
{

    /**
     * Returns if the validation has succeeded
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     * Returns error messages if the validation failed.
     *
     * @return array
     */
    public function getErrors(): array;
}
