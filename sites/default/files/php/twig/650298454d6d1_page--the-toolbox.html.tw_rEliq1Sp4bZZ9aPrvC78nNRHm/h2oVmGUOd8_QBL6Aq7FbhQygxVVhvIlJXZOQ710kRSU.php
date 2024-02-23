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

/* themes/sglobal/templates/layout/page--the-toolbox.html.twig */
class __TwigTemplate_67121e78a30db5b545672adf88a5d61c extends \Twig\Template
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
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/floatbar.html.twig"), "themes/sglobal/templates/layout/page--the-toolbox.html.twig", 48)->display($context);
        // line 49
        echo "\t
\t";
        // line 50
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/header.html.twig"), "themes/sglobal/templates/layout/page--the-toolbox.html.twig", 50)->display($context);
        // line 51
        echo "\t
\t<main role=\"main\">
    \t<a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 54
        echo "\t\t<div class=\"page--wrapper toolbox-teaser\">
\t\t\t";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
        echo "
\t\t\t";
        // line 56
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 56)) {
            // line 57
            echo "\t\t\t  <div id=\"sidebar-second\" class=\"page--sidebar-right\">
\t\t\t\t<aside class=\"section\" role=\"complementary\">
\t\t\t\t  ";
            // line 59
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
            echo "
\t\t\t\t</aside>
\t\t\t  </div>
\t\t\t";
        }
        // line 63
        echo "\t\t</div>
\t\t";
        // line 64
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "after_content", [], "any", false, false, true, 64), 64, $this->source), "html", null, true);
        echo "
\t</main>
\t
\t";
        // line 67
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/footer.html.twig"), "themes/sglobal/templates/layout/page--the-toolbox.html.twig", 67)->display($context);
        // line 68
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/layout/page--the-toolbox.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 68,  83 => 67,  77 => 64,  74 => 63,  67 => 59,  63 => 57,  61 => 56,  57 => 55,  54 => 54,  50 => 51,  48 => 50,  45 => 49,  43 => 48,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/page--the-toolbox.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/page--the-toolbox.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48, "if" => 56);
        static $filters = array("escape" => 55);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape'],
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
