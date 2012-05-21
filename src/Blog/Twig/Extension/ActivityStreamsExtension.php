<?php

namespace Blog\Twig\Extension;

use ActivityStreams\Action\ActionInterface;

class ActivityStreamsExtension extends \Twig_Extension
{
    protected $defaultTemplate;

    public function __construct($defaultTemplate)
    {
        $this->defaultTemplate = $defaultTemplate;
    }

    public function getFunctions()
    {
        return array(
            'activitystreams_render' => new \Twig_Function_Method($this, 'render', array('needs_environment' => true, 'is_safe' => array('html'))),
        );
    }

    public function render(\Twig_Environment $twig, ActionInterface $action, $template = null)
    {
        $template = $template ?: $this->defaultTemplate;

        return $twig->render($template, array('action' => $action));
    }

    public function getName()
    {
        return 'activitystreams';
    }
}
