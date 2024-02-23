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

/* themes/sglobal/templates/layout/page--front.html.twig */
class __TwigTemplate_eaf75bbe2ffa2785771f02d1e1600cbb extends \Twig\Template
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
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/floatbar.html.twig"), "themes/sglobal/templates/layout/page--front.html.twig", 48)->display($context);
        // line 49
        echo "
\t";
        // line 50
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/header.html.twig"), "themes/sglobal/templates/layout/page--front.html.twig", 50)->display($context);
        // line 51
        echo "
\t<!-- <div class=\"notification\">
\t\t<i class=\"fa fa-info-circle\" style=\"font-style:normal;\"></i> <strong>COVID-19</strong>&emsp;We're here for you: Important coronavirus updates. <a href=\"/Snorkel-COVID-19-Commitment-to-Safety\">Learn more</a>
\t</div>
\t-->\t
\t<div class=\"homepage-hero\">
\t\t<div class=\"homepage-hero--wrapper\">
\t\t\t<div class=\"homepage-hero--left-column\">
\t\t\t\t";
        // line 59
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "hero_1", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
        echo "
\t\t\t</div>
\t\t\t<div class=\"homepage-hero--right-column\">
\t\t\t\t";
        // line 62
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "hero_2", [], "any", false, false, true, 62), 62, $this->source), "html", null, true);
        echo "
\t\t\t\t";
        // line 63
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "hero_3", [], "any", false, false, true, 63), 63, $this->source), "html", null, true);
        echo "
\t\t\t\t";
        // line 64
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "hero_4", [], "any", false, false, true, 64), 64, $this->source), "html", null, true);
        echo "
\t\t\t\t";
        // line 65
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "hero_5", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
        echo "
\t\t\t</div>
\t\t</div>
\t</div>

\t";
        // line 70
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "equipment_selector", [], "any", false, false, true, 70)) {
            // line 71
            echo "\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "equipment_selector", [], "any", false, false, true, 71), 71, $this->source), "html", null, true);
            echo "
\t";
        }
        // line 73
        echo "
\t<main role=\"main\">
    \t<a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 76
        echo "\t\t";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
        echo "
\t</main>

\t";
        // line 79
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/footer.html.twig"), "themes/sglobal/templates/layout/page--front.html.twig", 79)->display($context);
        // line 80
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/layout/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 80,  105 => 79,  98 => 76,  94 => 73,  88 => 71,  86 => 70,  78 => 65,  74 => 64,  70 => 63,  66 => 62,  60 => 59,  50 => 51,  48 => 50,  45 => 49,  43 => 48,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/page--front.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48, "if" => 70);
        static $filters = array("escape" => 59);
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
