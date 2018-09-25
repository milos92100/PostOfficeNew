<?php
declare(strict_types = 1);
namespace PostOffice\Core\Configuration;

use PostOffice\Common\Collection;

/**
 * ResourceMap
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core component
 * @namespace PostOffice\Configuration
 */
final class ResourceMap extends Collection
{

    public const CONTROLLERS = "CONTROLLERS";

    public function __construct($items = array())
    {
        foreach ($items as $item) {
            $this->addResource($item);
        }
    }

    public function addResource(ResourceKeyValue $item)
    {
        $this->add($item, $item->getKey());
        return $this;
    }
}

