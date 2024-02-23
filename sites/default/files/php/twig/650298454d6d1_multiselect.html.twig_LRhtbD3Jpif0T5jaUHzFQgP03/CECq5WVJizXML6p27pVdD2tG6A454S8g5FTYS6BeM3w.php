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

/* modules/contrib/multiselect/templates/multiselect.html.twig */
class __TwigTemplate_447311377bb816c2f6e67b96f4b5c39e extends \Twig\Template
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
        echo "<div class=\"multiselect-wrapper\">
  <div class=\"multiselect-available\">
    <label for=\"";
        // line 17
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["multiselect"] ?? null), "available", [], "any", false, false, true, 17), "id", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["multiselect"] ?? null), "available", [], "any", false, false, true, 17), "label", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
        echo "</label>
    <select";
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["multiselect"] ?? null), "available", [], "any", false, false, true, 18), "attributes", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
        echo ">
    ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["multiselect"] ?? null), "available", [], "any", false, false, true, 19), "options", [], "any", false, false, true, 19));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 20
            echo "      ";
            if ((twig_get_attribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, true, 20) == "optgroup")) {
                // line 21
                echo "        <optgroup label=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["option"], "label", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
                echo "\">
          ";
                // line 22
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["option"], "options", [], "any", false, false, true, 22));
                foreach ($context['_seq'] as $context["_key"] => $context["sub_option"]) {
                    // line 23
                    echo "            <option value=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["sub_option"], "value", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
                    echo "\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, $context["sub_option"], "selected", [], "any", false, false, true, 23)) ? (" selected=\"selected\"") : ("")));
                    echo ">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["sub_option"], "label", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
                    echo "</option>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "        </optgroup>
      ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 26
$context["option"], "type", [], "any", false, false, true, 26) == "option")) {
                // line 27
                echo "        <option value=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, $context["option"], "selected", [], "any", false, false, true, 27)) ? (" selected=\"selected\"") : ("")));
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["option"], "label", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                echo "</option>
      ";
            }
            // line 29
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "    </select>
  </div>
  <div class=\"multiselect-btns\">
    <ul>
      <li class=\"multiselect-add\">";
        // line 34
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["multiselect"] ?? null), "labels", [], "any", false, false, true, 34), "add", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
        echo "</li>
      <li class=\"multiselect-remove\">";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["multiselect"] ?? null), "labels", [], "any", false, false, true, 35), "remove", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
        echo "</li>
    </ul>
  </div>
  <div class=\"multiselect-selected\">
    <label for=\"";
        // line 39
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["multiselect"] ?? null), "selected", [], "any", false, false, true, 39), "id", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["multiselect"] ?? null), "selected", [], "any", false, false, true, 39), "label", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
        echo "</label>
    <select";
        // line 40
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["multiselect"] ?? null), "selected", [], "any", false, false, true, 40), "attributes", [], "any", false, false, true, 40), 40, $this->source), "html", null, true);
        echo ">
      ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["multiselect"] ?? null), "selected", [], "any", false, false, true, 41), "options", [], "any", false, false, true, 41));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 42
            echo "        ";
            if ((twig_get_attribute($this->env, $this->source, $context["option"], "type", [], "any", false, false, true, 42) == "optgroup")) {
                // line 43
                echo "          <optgroup label=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["option"], "label", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
                echo "\">
            ";
                // line 44
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["option"], "options", [], "any", false, false, true, 44));
                foreach ($context['_seq'] as $context["_key"] => $context["sub_option"]) {
                    // line 45
                    echo "              <option value=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["sub_option"], "value", [], "any", false, false, true, 45), 45, $this->source), "html", null, true);
                    echo "\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, $context["sub_option"], "selected", [], "any", false, false, true, 45)) ? (" selected=\"selected\"") : ("")));
                    echo ">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["sub_option"], "label", [], "any", false, false, true, 45), 45, $this->source), "html", null, true);
                    echo "</option>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 47
                echo "          </optgroup>
        ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 48
$context["option"], "type", [], "any", false, false, true, 48) == "option")) {
                // line 49
                echo "          <option value=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, true, 49), 49, $this->source), "html", null, true);
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((twig_get_attribute($this->env, $this->source, $context["option"], "selected", [], "any", false, false, true, 49)) ? (" selected=\"selected\"") : ("")));
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["option"], "label", [], "any", false, false, true, 49), 49, $this->source), "html", null, true);
                echo "</option>
        ";
            }
            // line 51
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "    </select>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/multiselect/templates/multiselect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 52,  174 => 51,  164 => 49,  162 => 48,  159 => 47,  146 => 45,  142 => 44,  137 => 43,  134 => 42,  130 => 41,  126 => 40,  120 => 39,  113 => 35,  109 => 34,  103 => 30,  97 => 29,  87 => 27,  85 => 26,  82 => 25,  69 => 23,  65 => 22,  60 => 21,  57 => 20,  53 => 19,  49 => 18,  43 => 17,  39 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/multiselect/templates/multiselect.html.twig", "/var/www/snorkellifts/web/modules/contrib/multiselect/templates/multiselect.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 19, "if" => 20);
        static $filters = array("escape" => 17);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
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
