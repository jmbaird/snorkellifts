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

/* modules/contrib/webform/templates/webform-composite-address.html.twig */
class __TwigTemplate_9bedc03575da93d7f4483d95bbbaf004 extends \Twig\Template
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
        // line 16
        if (($context["flexbox"] ?? null)) {
            // line 17
            echo "<div class=\"webform-address\">
  ";
            // line 18
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "address", [], "any", false, false, true, 18)) {
                // line 19
                echo "    <div class=\"webform-flexbox webform-address__row-1\">
      <div class=\"webform-flex webform-flex--1 webform-address__address\"><div class=\"webform-flex--container\">";
                // line 20
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "address", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
                echo "</div></div>
    </div>
  ";
            }
            // line 23
            echo "
  ";
            // line 24
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "address_2", [], "any", false, false, true, 24)) {
                // line 25
                echo "    <div class=\"webform-flexbox webform-address__row-2\">
      <div class=\"webform-flex webform-flex--1 webform-address__address-2\"><div class=\"webform-flex--container\">";
                // line 26
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "address_2", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
                echo "</div></div>
    </div>
  ";
            }
            // line 29
            echo "
  ";
            // line 30
            if (((twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "city", [], "any", false, false, true, 30) || twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "state_province", [], "any", false, false, true, 30)) || twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "postal_code", [], "any", false, false, true, 30))) {
                // line 31
                echo "    <div class=\"webform-flexbox webform-address__row-3\">
      ";
                // line 32
                if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "city", [], "any", false, false, true, 32)) {
                    // line 33
                    echo "        <div class=\"webform-flex webform-flex--1 webform-address__city\"><div class=\"webform-flex--container\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "city", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
                    echo "</div></div>
      ";
                }
                // line 35
                echo "      ";
                if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "state_province", [], "any", false, false, true, 35)) {
                    // line 36
                    echo "        <div class=\"webform-flex webform-flex--1 webform-address__province\"><div class=\"webform-flex--container\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "state_province", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
                    echo "</div></div>
      ";
                }
                // line 38
                echo "      ";
                if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "postal_code", [], "any", false, false, true, 38)) {
                    // line 39
                    echo "        <div class=\"webform-flex webform-flex--1 webform-address__postal-code\"><div class=\"webform-flex--container\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "postal_code", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
                    echo "</div></div>
      ";
                }
                // line 41
                echo "    </div>
  ";
            }
            // line 43
            echo "
  ";
            // line 44
            if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "country", [], "any", false, false, true, 44)) {
                // line 45
                echo "    <div class=\"webform-flexbox webform-address__row-4\">
      <div class=\"webform-flex webform-flex--1 webform-address__country\"><div class=\"webform-flex--container\">";
                // line 46
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "country", [], "any", false, false, true, 46), 46, $this->source), "html", null, true);
                echo "</div></div>
    </div>
  ";
            }
            // line 49
            echo "</div>
";
        } else {
            // line 51
            echo "  ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 51, $this->source), "html", null, true);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "modules/contrib/webform/templates/webform-composite-address.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 51,  121 => 49,  115 => 46,  112 => 45,  110 => 44,  107 => 43,  103 => 41,  97 => 39,  94 => 38,  88 => 36,  85 => 35,  79 => 33,  77 => 32,  74 => 31,  72 => 30,  69 => 29,  63 => 26,  60 => 25,  58 => 24,  55 => 23,  49 => 20,  46 => 19,  44 => 18,  41 => 17,  39 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/webform/templates/webform-composite-address.html.twig", "/var/www/snorkellifts/web/modules/contrib/webform/templates/webform-composite-address.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 16);
        static $filters = array("escape" => 20);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
