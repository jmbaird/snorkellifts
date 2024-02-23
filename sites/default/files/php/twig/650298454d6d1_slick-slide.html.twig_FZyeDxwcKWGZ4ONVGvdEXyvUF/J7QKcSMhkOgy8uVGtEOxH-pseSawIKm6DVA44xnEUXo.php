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

/* modules/contrib/slick/templates/slick-slide.html.twig */
class __TwigTemplate_55641a86ea72fa74b53df5e60542ab65 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'slick_slide' => [$this, 'block_slick_slide'],
            'slick_caption' => [$this, 'block_slick_caption'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        $context["classes"] = [0 => ("slide--" . $this->sandbox->ensureToStringAllowed(        // line 22
($context["delta"] ?? null), 22, $this->source)), 1 => ((twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 23
($context["item"] ?? null), "slide", [], "any", false, false, true, 23))) ? ("slide--text") : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 24
($context["settings"] ?? null), "layout", [], "any", false, false, true, 24)) ? (("slide--caption--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "layout", [], "any", false, false, true, 24), 24, $this->source)))) : ("")), 3 => ((twig_get_attribute($this->env, $this->source,         // line 25
($context["settings"] ?? null), "class", [], "any", false, false, true, 25)) ? (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "class", [], "any", false, false, true, 25)) : (""))];
        // line 29
        $context["content_classes"] = [0 => ((twig_get_attribute($this->env, $this->source,         // line 30
($context["settings"] ?? null), "detroy", [], "any", false, false, true, 30)) ? ("slide") : ("")), 1 => (( !twig_get_attribute($this->env, $this->source,         // line 31
($context["settings"] ?? null), "detroy", [], "any", false, false, true, 31)) ? ("slide__content") : (""))];
        // line 35
        $context["caption_classes"] = [0 => "slide__caption"];
        // line 39
        ob_start(function () { return ''; });
        // line 40
        echo "  ";
        $this->displayBlock('slick_slide', $context, $blocks);
        $context["slide"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 48
        echo "
";
        // line 49
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "wrapper", [], "any", false, false, true, 49)) {
            // line 50
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 50), 50, $this->source), "html", null, true);
            echo ">
  ";
            // line 51
            if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "use_ca", [], "any", false, false, true, 51)) {
                echo "<div";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method", false, false, true, 51), 51, $this->source), "html", null, true);
                echo ">";
            }
        }
        // line 53
        echo "
  ";
        // line 54
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 54)) {
            // line 55
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["slide"] ?? null), 55, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 57
        echo "
  ";
        // line 58
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 58)) {
            // line 59
            echo "    ";
            $this->displayBlock('slick_caption', $context, $blocks);
            // line 89
            echo "  ";
        }
        // line 90
        echo "
";
        // line 91
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "wrapper", [], "any", false, false, true, 91)) {
            // line 92
            echo "  ";
            if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "use_ca", [], "any", false, false, true, 92)) {
                echo "</div>";
            }
            // line 93
            echo "  </div>
";
        }
    }

    // line 40
    public function block_slick_slide($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "split", [], "any", false, false, true, 41) &&  !twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "unslick", [], "any", false, false, true, 41))) {
            // line 42
            echo "      <div class=\"slide__media\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
            echo "</div>
    ";
        } else {
            // line 44
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 44), 44, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 46
        echo "  ";
    }

    // line 59
    public function block_slick_caption($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 60
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "fullwidth", [], "any", false, false, true, 60)) {
            echo "<div class=\"slide__constrained\">";
        }
        // line 61
        echo "
        <div";
        // line 62
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["caption_attributes"] ?? null), "addClass", [0 => ($context["caption_classes"] ?? null)], "method", false, false, true, 62), 62, $this->source), "html", null, true);
        echo ">
          ";
        // line 63
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 63), "overlay", [], "any", false, false, true, 63)) {
            // line 64
            echo "            <div class=\"slide__overlay\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 64), "overlay", [], "any", false, false, true, 64), 64, $this->source), "html", null, true);
            echo "</div>
            ";
            // line 65
            if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "data", [], "any", false, false, true, 65)) {
                echo "<div class=\"slide__data\">";
            }
            // line 66
            echo "          ";
        }
        // line 67
        echo "
          ";
        // line 68
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 68), "title", [], "any", false, false, true, 68)) {
            // line 69
            echo "            <h2 class=\"slide__title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 69), "title", [], "any", false, false, true, 69), 69, $this->source), "html", null, true);
            echo "</h2>
          ";
        }
        // line 71
        echo "
          ";
        // line 72
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 72), "alt", [], "any", false, false, true, 72)) {
            // line 73
            echo "            <p class=\"slide__description\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 73), "alt", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
            echo "</p>
          ";
        }
        // line 75
        echo "
          ";
        // line 76
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 76), "data", [], "any", false, false, true, 76)) {
            // line 77
            echo "            <div class=\"slide__description\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 77), "data", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
            echo "</div>
          ";
        }
        // line 79
        echo "
          ";
        // line 80
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 80), "link", [], "any", false, false, true, 80)) {
            // line 81
            echo "            <div class=\"slide__link\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 81), "link", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
            echo "</div>
          ";
        }
        // line 83
        echo "
          ";
        // line 84
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 84), "overlay", [], "any", false, false, true, 84) && twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "data", [], "any", false, false, true, 84))) {
            echo "</div>";
        }
        // line 85
        echo "        </div>

      ";
        // line 87
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "fullwidth", [], "any", false, false, true, 87)) {
            echo "</div>";
        }
        // line 88
        echo "    ";
    }

    public function getTemplateName()
    {
        return "modules/contrib/slick/templates/slick-slide.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 88,  222 => 87,  218 => 85,  214 => 84,  211 => 83,  205 => 81,  203 => 80,  200 => 79,  194 => 77,  192 => 76,  189 => 75,  183 => 73,  181 => 72,  178 => 71,  172 => 69,  170 => 68,  167 => 67,  164 => 66,  160 => 65,  155 => 64,  153 => 63,  149 => 62,  146 => 61,  141 => 60,  137 => 59,  133 => 46,  127 => 44,  121 => 42,  118 => 41,  114 => 40,  108 => 93,  103 => 92,  101 => 91,  98 => 90,  95 => 89,  92 => 59,  90 => 58,  87 => 57,  81 => 55,  79 => 54,  76 => 53,  69 => 51,  64 => 50,  62 => 49,  59 => 48,  55 => 40,  53 => 39,  51 => 35,  49 => 31,  48 => 30,  47 => 29,  45 => 25,  44 => 24,  43 => 23,  42 => 22,  41 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/slick/templates/slick-slide.html.twig", "/var/www/snorkellifts/web/modules/contrib/slick/templates/slick-slide.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 21, "block" => 40, "if" => 49);
        static $filters = array("clean_class" => 24, "escape" => 50);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
                ['clean_class', 'escape'],
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
