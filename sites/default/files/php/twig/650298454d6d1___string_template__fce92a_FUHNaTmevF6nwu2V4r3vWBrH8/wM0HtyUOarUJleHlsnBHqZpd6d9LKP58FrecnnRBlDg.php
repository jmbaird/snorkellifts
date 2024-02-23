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

/* __string_template__fce92a7224f6cd276aeba964fe76009e */
class __TwigTemplate_0792676ef62b19a55ef59509e05e5d91 extends \Twig\Template
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
        ob_start(function () { return ''; });
        echo "\$";
        if ((((((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "total_labor_hours_", [], "any", false, false, true, 1)) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "labor_per_hour", [], "any", false, false, true, 1))) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "total_travel_hours_", [], "any", false, false, true, 1))) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "travel_per_hour", [], "any", false, false, true, 1))) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "total_cost_for_freight_", [], "any", false, false, true, 1))) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "total_cost_for_misc_", [], "any", false, false, true, 1)))) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_number_format_filter($this->env, (((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "total_labor_hours_", [], "any", false, false, true, 1) * twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "labor_per_hour", [], "any", false, false, true, 1)) + (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "total_travel_hours_", [], "any", false, false, true, 1) * twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "travel_per_hour", [], "any", false, false, true, 1))) + (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "total_cost_for_freight_", [], "any", false, false, true, 1) + twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "total_cost_for_misc_", [], "any", false, false, true, 1))), 2), "html", null, true);
        } else {
            echo "total_cost_";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "__string_template__fce92a7224f6cd276aeba964fe76009e";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__fce92a7224f6cd276aeba964fe76009e", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("spaceless" => 1, "if" => 1);
        static $filters = array("length" => 1, "escape" => 1, "number_format" => 1);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['spaceless', 'if'],
                ['length', 'escape', 'number_format'],
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
