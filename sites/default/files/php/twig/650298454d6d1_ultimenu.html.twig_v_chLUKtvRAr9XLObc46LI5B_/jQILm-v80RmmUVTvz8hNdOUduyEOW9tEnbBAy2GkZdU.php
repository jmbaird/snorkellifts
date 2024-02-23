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

/* themes/sglobal/templates/navigation/ultimenu.html.twig */
class __TwigTemplate_a218f30d58a963e5fcfd8ec0cd8b6b87 extends \Twig\Template
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
        // line 29
        $context["classes"] = [0 => "ultimenu", 1 => ("ultimenu--" . $this->sandbox->ensureToStringAllowed(        // line 31
($context["delta"] ?? null), 31, $this->source)), 2 => ((twig_get_attribute($this->env, $this->source,         // line 32
($context["config"] ?? null), "orientation", [], "any", false, false, true, 32)) ? (\Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "orientation", [], "any", false, false, true, 32), 32, $this->source))) : ("")), 3 => ((twig_in_filter("v", twig_get_attribute($this->env, $this->source,         // line 33
($context["config"] ?? null), "orientation", [], "any", false, false, true, 33))) ? ("ultimenu--vertical") : ("ultimenu--horizontal")), 4 => ((twig_get_attribute($this->env, $this->source,         // line 34
($context["config"] ?? null), "skin_name", [], "any", false, false, true, 34)) ? (\Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "skin_name", [], "any", false, false, true, 34), 34, $this->source))) : (""))];
        // line 37
        echo "
";
        // line 39
        $context["item_classes"] = [0 => "ultimenu__item", 1 => "uitem"];
        // line 44
        ob_start(function () { return ''; });
        // line 45
        if (($context["items"] ?? null)) {
            // line 46
            echo "<ul id=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, \Drupal\Component\Utility\Html::getId($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "id", [], "any", false, false, true, 46), 46, $this->source)), "html", null, true);
            echo "\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 46), 46, $this->source), "id"), "html", null, true);
            echo ">";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 48
                echo "<li";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 48), "addClass", [0 => ($context["item_classes"] ?? null), 1 => ((twig_get_attribute($this->env, $this->source, $context["item"], "flyout", [], "any", false, false, true, 48)) ? ("has-ultimenu") : (""))], "method", false, false, true, 48), 48, $this->source), "html", null, true);
                echo ">";
                // line 49
                if (twig_get_attribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, true, 49)) {
                    // line 50
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, true, 50), 50, $this->source), "html", null, true);
                }
                // line 52
                if (twig_get_attribute($this->env, $this->source, $context["item"], "flyout", [], "any", false, false, true, 52)) {
                    // line 53
                    echo "<section";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "flyout_attributes", [], "any", false, false, true, 53), "addClass", [0 => "ultimenu__flyout"], "method", false, false, true, 53), 53, $this->source), "html", null, true);
                    echo ">
            ";
                    // line 54
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "flyout", [], "any", false, false, true, 54), 54, $this->source), "html", null, true);
                    echo "
          </section>";
                }
                // line 57
                echo "</li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "\t  <li>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block", "exposedformsearch_productspage_1_2", "full", null, false), "html", null, true);
            echo "</li>
  ";
            // line 62
            echo "  </ul>";
        }
        // line 64
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/navigation/ultimenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 64,  96 => 62,  91 => 60,  85 => 57,  80 => 54,  75 => 53,  73 => 52,  70 => 50,  68 => 49,  64 => 48,  60 => 47,  54 => 46,  52 => 45,  50 => 44,  48 => 39,  45 => 37,  43 => 34,  42 => 33,  41 => 32,  40 => 31,  39 => 29,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/navigation/ultimenu.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/navigation/ultimenu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 29, "spaceless" => 44, "if" => 45, "for" => 47);
        static $filters = array("clean_class" => 32, "escape" => 46, "clean_id" => 46, "without" => 46);
        static $functions = array("drupal_entity" => 60);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'spaceless', 'if', 'for'],
                ['clean_class', 'escape', 'clean_id', 'without'],
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
