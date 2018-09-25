<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\TemplateManagerInterface;

/**
 *
 * @author Aleksandar Petrovic
 *        
 */
final class TwigTemplateManager implements TemplateManagerInterface
{

    private $loader = null;

    private $twig = null;

    public function __construct(Twig_Loader_Filesystem $loader, Twig_Environment $twig)
    {
        $this->loader = $loader;
        $this->twig = $twig;
    }

    public function render(string $page, array $args = array()): string
    {
        $template = $this->twig->load($page);
        return $template->render($args);
    }
}