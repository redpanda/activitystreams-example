<?php

/* _action_render.twig */
class __TwigTemplate_189f1924ed56d601e07487247dd19ba2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"action\">
    ";
        // line 2
        if ($this->getAttribute($this->getContext($context, "action"), "targetId")) {
            // line 3
            echo "        <p>
            <a href=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "actorUrl"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "actorName"), "html", null, true);
            echo "</a> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "verb"), "html", null, true);
            echo " <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "objectUrl"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "objectName"), "html", null, true);
            echo "</a> at <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "targetUrl"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "targetName"), "html", null, true);
            echo "</a> on ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "publishedAt"), "m/d/Y"), "html", null, true);
            echo "
        </p>
    ";
        } elseif ($this->getAttribute($this->getContext($context, "action"), "objectId")) {
            // line 7
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "actorUrl"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "actorName"), "html", null, true);
            echo "</a> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "verb"), "html", null, true);
            echo " <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "objectUrl"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "objectName"), "html", null, true);
            echo "</a> on ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "publishedAt"), "m/d/Y"), "html", null, true);
            echo "
    ";
        } else {
            // line 9
            echo "        <p>
            <a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "actorUrl"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "actorName"), "html", null, true);
            echo "</a> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "verb"), "html", null, true);
            echo "  on ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "action"), "publishedAt"), "m/d/Y"), "html", null, true);
            echo "
        </p>
    ";
        }
        // line 13
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "_action_render.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 13,  64 => 10,  61 => 9,  45 => 7,  25 => 4,  22 => 3,  20 => 2,  17 => 1,);
    }
}
