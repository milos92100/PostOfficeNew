<?php
declare(strict_types = 1);
namespace PostOffice\Configuration;

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

    public static $CONTROLLERS = "CONTROLLERS";

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

