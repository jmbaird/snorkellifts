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

/* themes/sglobal/templates/layout/page--node--1.html.twig */
class __TwigTemplate_3e0364e5ca158518e03e8e86e231135b extends \Twig\Template
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
        // line 46
        echo "<div class=\"layout-container\">

\t";
        // line 48
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/floatbar.html.twig"), "themes/sglobal/templates/layout/page--node--1.html.twig", 48)->display($context);
        // line 49
        echo "
\t";
        // line 50
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/header.html.twig"), "themes/sglobal/templates/layout/page--node--1.html.twig", 50)->display($context);
        // line 51
        echo "
\t<main role=\"main\">

    \t<a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 55
        echo "\t\t";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 55)) {
            // line 56
            echo "\t\t\t<div class=\"page--wrapper flexbox\">
\t\t\t  \t<div id=\"sidebar-first\" class=\"page--sidebar-left\">
\t\t\t\t\t<aside class=\"section\" role=\"complementary\">
\t\t\t\t  \t\t";
            // line 59
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
            echo "
\t\t\t\t\t</aside>
\t\t\t  \t</div>
\t\t\t\t<div class=\"page--content\">
\t\t\t\t\t";
            // line 63
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 63), 63, $this->source), "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 66
($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 66)) {
            // line 67
            echo "\t\t\t<div class=\"page--wrapper flexbox\">
\t\t\t\t<div class=\"page--content\">
\t\t\t\t\t";
            // line 69
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 69), 69, $this->source), "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t\t <div id=\"sidebar-second\" class=\"page--sidebar-right\">
\t\t\t\t\t<aside class=\"section\" role=\"complementary\">
\t\t\t\t\t  \t";
            // line 73
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
            echo "
\t\t\t\t\t</aside>
\t\t\t\t </div>
\t\t\t</div>
\t\t";
        } else {
            // line 78
            echo "\t\t\t<div class=\"about-us\">
\t\t\t\t";
            // line 80
            echo "\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
            echo "
\t\t\t\t";
            // line 87
            echo "\t\t\t\t";
            // line 88
            echo "\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("about_us_worldwide_map", "block_1"), "html", null, true);
            echo "
\t\t\t\t";
            // line 90
            echo "\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 8), "html", null, true);
            echo "
\t\t\t\t";
            // line 92
            echo "\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 46), "html", null, true);
            echo "
\t\t\t</div>
\t\t";
        }
        // line 95
        echo "
\t\t";
        // line 96
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "after_content", [], "any", false, false, true, 96), 96, $this->source), "html", null, true);
        echo "
\t</main>

\t";
        // line 99
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/footer.html.twig"), "themes/sglobal/templates/layout/page--node--1.html.twig", 99)->display($context);
        // line 100
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/layout/page--node--1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 100,  133 => 99,  127 => 96,  124 => 95,  117 => 92,  112 => 90,  107 => 88,  105 => 87,  100 => 80,  97 => 78,  89 => 73,  82 => 69,  78 => 67,  76 => 66,  70 => 63,  63 => 59,  58 => 56,  55 => 55,  50 => 51,  48 => 50,  45 => 49,  43 => 48,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/page--node--1.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/page--node--1.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48, "if" => 55);
        static $filters = array("escape" => 59);
        static $functions = array("drupal_view" => 88, "drupal_entity" => 90);

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape'],
                ['drupal_view', 'drupal_entity']
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
