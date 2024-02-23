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

/* themes/sglobal/templates/layout/region--footer-sitemap.html.twig */
class __TwigTemplate_ffed8eb3a0c52b5153a171748060a048 extends \Twig\Template
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
        // line 15
        echo "
  <div";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 16, $this->source), "html", null, true);
        echo ">
    
    <div data-quickedit-entity-id=\"block_content/22\" id=\"block-footersitemap\" class=\"contextual-region\" data-quickedit-entity-instance-id=\"0\">

      ";
        // line 27
        echo "
      ";
        // line 28
        if ((($context["country_available"] ?? null) == "Germany")) {
            // line 29
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 76), "html", null, true);
            echo "
        ";
            // line 31
            echo "    \t";
        } elseif ((($context["us_can_latin"] ?? null) == "usa_can_latin_contact")) {
            // line 32
            echo "    \t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 22), "html", null, true);
            echo "
        ";
            // line 34
            echo "    \t";
        } elseif ((($context["all_else"] ?? null) == "all_else_contact")) {
            // line 35
            echo "    \t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 74), "html", null, true);
            echo "
        ";
            // line 37
            echo "    \t";
        }
        // line 38
        echo "\t  </div>
  </div>


";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/layout/region--footer-sitemap.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 38,  75 => 37,  70 => 35,  67 => 34,  62 => 32,  59 => 31,  54 => 29,  52 => 28,  49 => 27,  42 => 16,  39 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/region--footer-sitemap.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/region--footer-sitemap.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 28);
        static $filters = array("escape" => 16);
        static $functions = array("drupal_entity" => 29);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
