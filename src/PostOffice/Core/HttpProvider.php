<?php declare(strict_types=1);

namespace PostOffice\Core;

use PostOffice\Core\Abstraction\IHttpProvider;

class HttpProvider implements IHttpProvider {

    public function getRequestUri(): string {
        return "testCtr/testArg";
    }
}
