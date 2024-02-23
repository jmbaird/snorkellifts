<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__15f48fcf02e879cdb40becf115ba757c */
class __TwigTemplate_993028945dcbd8d9a2541bfc6821e8af extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<span style=\"background: #f68933;border: none;color: #ffffff;display: inline-block;font-family: \"Open Sans\", sans-serif;font-size: 16px;letter-spacing: 1px;padding: 10px 10px;text-transform: uppercase;\" >Options to get more quotes:</span> <ul>
<li><a style=\"background: #f68933;border: none;color: #ffffff;display: inline-block;font-family: \"Open Sans\", sans-serif;font-size: 16px;letter-spacing: 1px;padding: 10px 10px;text-transform: uppercase;\" href=\"/equipment\">Browse by Equipment Category</a></li>
<li><a style=\"background: #f68933;border: none;color: #ffffff;display: inline-block;font-family: \"Open Sans\", sans-serif;font-size: 16px;letter-spacing: 1px;padding: 10px 10px;text-transform: uppercase;\" href=\"/equipment-select\">Find Equipment by Snorkel Selector</a></li>
<li><a style=\"background: #f68933;border: none;color: #ffffff;display: inline-block;font-family: \"Open Sans\", sans-serif;font-size: 16px;letter-spacing: 1px;padding: 10px 10px;text-transform: uppercase;\" href=\"#block-footersitemap\">View Full Product List</a></li>
</ul>";
    }

    public function getTemplateName()
    {
        return "__string_template__15f48fcf02e879cdb40becf115ba757c";
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__15f48fcf02e879cdb40becf115ba757c", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
