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

/* themes/sglobal/templates/content/node.html.twig */
class __TwigTemplate_83107e763501f25d02865bfc3d6570e6 extends \Twig\Template
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
        // line 73
        echo "<article";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 73, $this->source), "html", null, true);
        echo ">

  ";
        // line 75
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 75, $this->source), "html", null, true);
        echo "
  ";
        // line 76
        if ( !($context["page"] ?? null)) {
            // line 77
            echo "    <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 77, $this->source), "html", null, true);
            echo ">
      <a href=\"";
            // line 78
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 78, $this->source), "html", null, true);
            echo "\" rel=\"bookmark\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 78, $this->source), "html", null, true);
            echo "</a>
    </h2>
  ";
        }
        // line 81
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 81, $this->source), "html", null, true);
        echo "

  ";
        // line 83
        if (($context["display_submitted"] ?? null)) {
            // line 84
            echo "    <footer>
      ";
            // line 85
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_picture"] ?? null), 85, $this->source), "html", null, true);
            echo "
      <div";
            // line 86
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_attributes"] ?? null), 86, $this->source), "html", null, true);
            echo ">
        ";
            // line 87
            echo t("Submitted by @author_name on @date", array("@author_name" => ($context["author_name"] ?? null), "@date" => ($context["date"] ?? null), ));
            // line 88
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null), 88, $this->source), "html", null, true);
            echo "
      </div>
    </footer>
  ";
        }
        // line 92
        echo "
  <div";
        // line 93
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_attributes"] ?? null), 93, $this->source), "html", null, true);
        echo ">
    ";
        // line 94
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 94, $this->source), "html", null, true);
        echo "
  </div>

  ";
        // line 97
        if ((($context["prev_url"] ?? null) || ($context["next_url"] ?? null))) {
            // line 98
            echo "    <div class=\"toolbox-navigation\">
      ";
            // line 99
            if (($context["prev_url"] ?? null)) {
                // line 100
                echo "        <span class=\"previous\"><a href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prev_url"] ?? null), 100, $this->source), "html", null, true);
                echo "\"><i class=\"fas fa-arrow-left\"></i> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous Article"));
                echo "</a></span>
      ";
            }
            // line 102
            echo "      ";
            if (($context["next_url"] ?? null)) {
                // line 103
                echo "        <span class=\"next\"><a href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["next_url"] ?? null), 103, $this->source), "html", null, true);
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next Article"));
                echo " <i class=\"fas fa-arrow-right\"></i></a></span>
      ";
            }
            // line 105
            echo "    </div>
  ";
        }
        // line 107
        echo "  
</article>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/content/node.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 107,  132 => 105,  124 => 103,  121 => 102,  113 => 100,  111 => 99,  108 => 98,  106 => 97,  100 => 94,  96 => 93,  93 => 92,  85 => 88,  83 => 87,  79 => 86,  75 => 85,  72 => 84,  70 => 83,  64 => 81,  56 => 78,  51 => 77,  49 => 76,  45 => 75,  39 => 73,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/content/node.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/content/node.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 76, "trans" => 87);
        static $filters = array("escape" => 73, "t" => 100);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'trans'],
                ['escape', 't'],
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
