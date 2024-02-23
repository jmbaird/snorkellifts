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

/* themes/sglobal/templates/layout/page--node--598.html.twig */
class __TwigTemplate_7020e2af89f3ede1945924da8e16380b extends \Twig\Template
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
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/floatbar.html.twig"), "themes/sglobal/templates/layout/page--node--598.html.twig", 48)->display($context);
        // line 49
        echo "\t
\t";
        // line 50
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/header.html.twig"), "themes/sglobal/templates/layout/page--node--598.html.twig", 50)->display($context);
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
            echo "\t\t\t\t<div class=\"page--wrapper\">
\t\t\t\t\t";
            // line 59
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 81), "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t";
        }
        // line 62
        echo "\t\t\t
\t\t\t<!-- if emea/rest of world-->
\t\t\t";
        // line 64
        if (($context["all_else"] ?? null)) {
            // line 65
            echo "\t\t\t\t<div class=\"page--wrapper\">
\t\t\t\t\t";
            // line 66
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 82), "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t";
        }
        // line 69
        echo "\t\t\t
\t\t</div>
\t\t";
        // line 71
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "after_content", [], "any", false, false, true, 71), 71, $this->source), "html", null, true);
        echo "
\t</main>
\t
\t";
        // line 74
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/footer.html.twig"), "themes/sglobal/templates/layout/page--node--598.html.twig", 74)->display($context);
        // line 75
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/layout/page--node--598.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 75,  95 => 74,  89 => 71,  85 => 69,  79 => 66,  76 => 65,  74 => 64,  70 => 62,  64 => 59,  61 => 58,  59 => 57,  54 => 54,  50 => 51,  48 => 50,  45 => 49,  43 => 48,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/page--node--598.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/page--node--598.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48, "if" => 57);
        static $filters = array("escape" => 59);
        static $functions = array("drupal_entity" => 59);

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
