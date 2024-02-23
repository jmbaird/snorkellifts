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

/* themes/sglobal/templates/layout/page--node--412.html.twig */
class __TwigTemplate_a192756d4c85fb2fd1418dbf49ac0a85 extends \Twig\Template
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
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/floatbar.html.twig"), "themes/sglobal/templates/layout/page--node--412.html.twig", 48)->display($context);
        // line 49
        echo "\t
\t";
        // line 50
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/header.html.twig"), "themes/sglobal/templates/layout/page--node--412.html.twig", 50)->display($context);
        // line 51
        echo "\t
\t<main role=\"main\">
    \t<a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 54
        echo "\t\t<div class=\"page--wrapper\">
\t\t\t
\t\t\t<!-- if usa -->
\t\t\t";
        // line 57
        if (($context["us_can_latin"] ?? null)) {
            // line 58
            echo "\t\t\t\t<div class=\"flexbox\">
\t\t\t\t\t<div class=\"page--content\">
\t\t\t\t\t\t";
            // line 60
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 60), 60, $this->source), "html", null, true);
            echo "
\t\t\t\t\t\t";
            // line 61
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 66), "html", null, true);
            echo "
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"sidebar-second\" class=\"page--sidebar-right\">
\t\t\t\t\t\t<aside class=\"section\" role=\"complementary\">
\t\t\t\t\t\t\t";
            // line 65
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 67), "html", null, true);
            echo "
\t\t\t\t\t\t</aside>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 70
        echo "
\t\t\t<!-- if nz -->
\t\t\t";
        // line 72
        if (($context["new_zealand"] ?? null)) {
            // line 73
            echo "\t\t\t\t<div class=\"flexbox\">
\t\t\t\t\t<div class=\"page--content\">
\t\t\t\t\t\t";
            // line 75
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
            echo "
\t\t\t\t\t\t";
            // line 76
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 64), "html", null, true);
            echo "
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"sidebar-second\" class=\"page--sidebar-right\">
\t\t\t\t\t\t<aside class=\"section\" role=\"complementary\">
\t\t\t\t\t\t\t";
            // line 80
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 65), "html", null, true);
            echo "
\t\t\t\t\t\t</aside>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 85
        echo "\t\t\t
\t\t\t<!-- if emea/rest of world-->
\t\t\t";
        // line 87
        if (($context["all_else"] ?? null)) {
            // line 88
            echo "\t\t\t\t<div class=\"flexbox\">
\t\t\t\t\t<div class=\"page--content\">
\t\t\t\t\t\t";
            // line 90
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
            echo "
\t\t\t\t\t\t";
            // line 91
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 68), "html", null, true);
            echo "
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"sidebar-second\" class=\"page--sidebar-right\">
\t\t\t\t\t\t<aside class=\"section\" role=\"complementary\">
\t\t\t\t\t\t\t";
            // line 95
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 69), "html", null, true);
            echo "
\t\t\t\t\t\t</aside>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 100
        echo "\t\t\t
\t\t</div>
\t\t";
        // line 102
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "after_content", [], "any", false, false, true, 102), 102, $this->source), "html", null, true);
        echo "
\t</main>
\t
\t";
        // line 105
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/footer.html.twig"), "themes/sglobal/templates/layout/page--node--412.html.twig", 105)->display($context);
        // line 106
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/layout/page--node--412.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 106,  152 => 105,  146 => 102,  142 => 100,  134 => 95,  127 => 91,  123 => 90,  119 => 88,  117 => 87,  113 => 85,  105 => 80,  98 => 76,  94 => 75,  90 => 73,  88 => 72,  84 => 70,  76 => 65,  69 => 61,  65 => 60,  61 => 58,  59 => 57,  54 => 54,  50 => 51,  48 => 50,  45 => 49,  43 => 48,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/page--node--412.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/page--node--412.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48, "if" => 57);
        static $filters = array("escape" => 60);
        static $functions = array("drupal_entity" => 61);

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape'],
                ['drupal_entity']
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
