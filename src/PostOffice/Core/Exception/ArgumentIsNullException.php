<?php
declare(strict_types = 1);
namespace PostOffice\Core\Exception;

/**
 * This exception should be used when the passed argument is null
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core Exception
 * @namespace PostOffice\Core\Exception
 *           
 */
final class ArgumentIsNullException extends \InvalidArgumentException
{

    public function __construct($argumentName)
    {
        parent::__construct("$argumentName must not be null.");
    }
}