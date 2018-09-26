<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\AbstractValidationResult;
use PostOffice\Core\Abstraction\ValidationResultInterface;

/**
 * ResourceValidatonResult
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core component
 * @namespace PostOffice\Core
 */
final class ResourceValidationResult extends AbstractValidationResult implements ValidationResultInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Abstraction\ValidationResultInterface::isValid()
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Abstraction\ValidationResultInterface::getErrors()
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
