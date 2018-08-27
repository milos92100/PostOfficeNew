<?php declare(strict_types=1);

namespace PostOffice\Core\Abstraction;

interface IHttpProvider {

    function getRequestUri(): string;
}