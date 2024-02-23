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

/* themes/sglobal/templates/layout/page--node--790.html.twig */
class __TwigTemplate_777a92b03d941fd9968a6f10007a95c8 extends \Twig\Template
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
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/floatbar.html.twig"), "themes/sglobal/templates/layout/page--node--790.html.twig", 48)->display($context);
        // line 49
        echo "
\t";
        // line 50
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/header.html.twig"), "themes/sglobal/templates/layout/page--node--790.html.twig", 50)->display($context);
        // line 51
        echo "
\t<main role=\"main\">
    \t<a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 54
        echo "\t\t<div class=\"page--wrapper\">
\t\t\t";
        // line 56
        echo "\t\t\t<div class=\"flexbox\">
\t\t\t\t<div class=\"page--content\">
\t\t\t\t\t";
        // line 58
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 58), 58, $this->source), "html", null, true);
        echo "
\t\t\t\t</div>
\t\t\t\t<div id=\"sidebar-second\" class=\"page--sidebar-right\">
\t\t\t\t\t<aside class=\"section\" role=\"complementary\">
\t\t\t\t\t\t";
        // line 62
        if (($context["us_can_latin"] ?? null)) {
            // line 63
            echo "\t\t\t\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 49), "html", null, true);
            echo "
\t\t\t\t\t\t";
        }
        // line 65
        echo "\t\t\t\t\t\t";
        if (($context["new_zealand"] ?? null)) {
            // line 66
            echo "\t\t\t\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 50), "html", null, true);
            echo "
\t\t\t\t\t\t";
        }
        // line 68
        echo "\t\t\t\t\t\t";
        if (($context["all_else"] ?? null)) {
            // line 69
            echo "\t\t\t\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 51), "html", null, true);
            echo "
\t\t\t\t\t\t";
        }
        // line 71
        echo "\t\t\t\t\t</aside>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t";
        // line 75
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "after_content", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
        echo "
\t</main>

\t";
        // line 78
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/footer.html.twig"), "themes/sglobal/templates/layout/page--node--790.html.twig", 78)->display($context);
        // line 79
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/layout/page--node--790.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 79,  106 => 78,  100 => 75,  94 => 71,  88 => 69,  85 => 68,  79 => 66,  76 => 65,  70 => 63,  68 => 62,  61 => 58,  57 => 56,  54 => 54,  50 => 51,  48 => 50,  45 => 49,  43 => 48,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/page--node--790.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/page--node--790.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48, "if" => 62);
        static $filters = array("escape" => 58);
        static $functions = array("drupal_entity" => 63);

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
