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

/* themes/sglobal/templates/layout/page--node--3.html.twig */
class __TwigTemplate_04608bed4bffd46a0265296ba6e64306 extends \Twig\Template
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
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/floatbar.html.twig"), "themes/sglobal/templates/layout/page--node--3.html.twig", 48)->display($context);
        // line 49
        echo "\t
\t";
        // line 50
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/header.html.twig"), "themes/sglobal/templates/layout/page--node--3.html.twig", 50)->display($context);
        // line 51
        echo "\t
\t<main role=\"main\">
    \t<a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 54
        echo "\t\t";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 54)) {
            // line 55
            echo "\t\t\t<div class=\"page--wrapper flexbox\">
\t\t\t  \t<div id=\"sidebar-first\" class=\"page--sidebar-left\">
\t\t\t\t\t<aside class=\"section\" role=\"complementary\">
\t\t\t\t  \t\t";
            // line 58
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 58), 58, $this->source), "html", null, true);
            echo "
\t\t\t\t\t</aside>
\t\t\t  \t</div>
\t\t\t\t<div class=\"page--content\">
\t\t\t\t\t";
            // line 62
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 62), 62, $this->source), "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 65
($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 65)) {
            // line 66
            echo "\t\t\t<div class=\"page--wrapper flexbox\">
\t\t\t\t<div class=\"page--content\">
\t\t\t\t\t";
            // line 68
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 68), 68, $this->source), "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t\t <div id=\"sidebar-second\" class=\"page--sidebar-right\">
\t\t\t\t\t<aside class=\"section\" role=\"complementary\">
\t\t\t\t\t  \t";
            // line 72
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 72), 72, $this->source), "html", null, true);
            echo "
\t\t\t\t\t</aside>
\t\t\t\t </div>
\t\t\t</div>
\t\t";
        } else {
            // line 77
            echo "\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 44), "html", null, true);
            echo "
\t\t\t<section class=\"support--row\">
\t\t\t\t<div class=\"about--wrapper support--who-we-are\">
\t\t\t\t\t";
            // line 80
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 30), "html", null, true);
            echo "
\t\t\t\t\t";
            // line 81
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 28), "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t</section>
\t\t\t<section class=\"support--row bg--black-color suport--the-toolbox\">
\t\t\t\t";
            // line 85
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 33), "html", null, true);
            echo "
\t\t\t</section>
\t\t\t<section class=\"support--row bg--tertiary-color support--the-platform\">
\t\t\t\t";
            // line 88
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 5), "html", null, true);
            echo "
\t\t\t</section>
\t\t\t
\t\t";
        }
        // line 92
        echo "\t\t
\t\t";
        // line 93
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "after_content", [], "any", false, false, true, 93), 93, $this->source), "html", null, true);
        echo "
\t</main>
\t
\t";
        // line 96
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/footer.html.twig"), "themes/sglobal/templates/layout/page--node--3.html.twig", 96)->display($context);
        // line 97
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/layout/page--node--3.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 97,  136 => 96,  130 => 93,  127 => 92,  120 => 88,  114 => 85,  107 => 81,  103 => 80,  96 => 77,  88 => 72,  81 => 68,  77 => 66,  75 => 65,  69 => 62,  62 => 58,  57 => 55,  54 => 54,  50 => 51,  48 => 50,  45 => 49,  43 => 48,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/page--node--3.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/page--node--3.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48, "if" => 54);
        static $filters = array("escape" => 58);
        static $functions = array("drupal_entity" => 77);

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
