<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

interface TemplateManagerInterface
{

    public function render(string $page, array $args = array()): string;
}