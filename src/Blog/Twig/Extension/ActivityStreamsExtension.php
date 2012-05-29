<?php

namespace Blog\Twig\Extension;

use ActivityStreams\Action\ActionInterface;
use ActivityStreams\Renderer\RendererProviderInterface;

class ActivityStreamsExtension extends \Twig_Extension
{
    protected $rendererProvider;

    public function __construct(RendererProviderInterface $rendererProvider)
    {
        $this->rendererProvider = $rendererProvider;
    }

    public function getFunctions()
    {
        return array(
            'activitystreams_render' => new \Twig_Function_Method($this, 'render', array('needs_environment' => true, 'is_safe' => array('html'))),
        );
    }

    public function render(\Twig_Environment $twig, ActionInterface $action, $type, array $options = array())
    {
        $type = $type ?: $action->getObjectType();

        if ($this->rendererProvider->has($type)) {
            $template =  $this->rendererProvider->get($type)->render($action, $options);
        } else {
            $template =  $this->rendererProvider->get()->render($action, $options);
        }

        return $twig->render($template, array('action' => $action));
    }

    public function getName()
    {
        return 'activitystreams';
    }
}
