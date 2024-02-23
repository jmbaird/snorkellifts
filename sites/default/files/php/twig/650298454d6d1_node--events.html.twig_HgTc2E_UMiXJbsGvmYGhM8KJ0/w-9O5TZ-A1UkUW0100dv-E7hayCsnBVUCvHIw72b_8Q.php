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

/* themes/sglobal/templates/content/node--events.html.twig */
class __TwigTemplate_ce0985679b63bc3df8b7c25e417fab3e extends \Twig\Template
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
        echo "
<script type=\"text/javascript\">
jQuery(document).ready(function() {
\tjQuery(\".event-detail--photo-gallery-images div div:contains('Photo Gallery')\" ).css('display', 'none');
\tjQuery(\".event-detail--photo-gallery-images div div:contains('2nd gallery')\" ).css('display', 'none');
\t
});
</script>


<article";
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 83, $this->source), "html", null, true);
        echo ">
  <div class=\"event-detail--container flexbox\">
  
  \t<div class=\"event-detail--left-col\">
\t\t";
        // line 87
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_event_logo", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
        echo "
\t</div>
\t
\t<div class=\"event-detail--right-col\">
\t
\t\t<div class=\"event-detail--dates\">
\t\t\t";
        // line 93
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_start_date", [], "any", false, false, true, 93), 0, [], "any", false, false, true, 93), 93, $this->source), "html", null, true);
        echo " - ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_end_date", [], "any", false, false, true, 93), 0, [], "any", false, false, true, 93), 93, $this->source), "html", null, true);
        echo "
\t\t</div>
\t\t
\t\t<div class=\"event-detail--venue\">
\t\t\t<div class=\"event-detail--venue-name\">
\t\t\t\t";
        // line 98
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_0 = (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_venue", [], "any", false, false, true, 98)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[0] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#title"] ?? null) : null), 98, $this->source), "html", null, true);
        echo "
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"event-detail--venue-address\">
\t\t\t\t";
        // line 102
        if ( !twig_test_empty((($__internal_compile_2 = (($__internal_compile_3 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_venue", [], "any", false, false, true, 102), "entity", [], "any", false, false, true, 102), "field_venue_address", [], "any", false, false, true, 102), "value", [], "any", false, false, true, 102)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[0] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["locality"] ?? null) : null))) {
            // line 103
            echo "\t\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_4 = (($__internal_compile_5 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_venue", [], "any", false, false, true, 103), "entity", [], "any", false, false, true, 103), "field_venue_address", [], "any", false, false, true, 103), "value", [], "any", false, false, true, 103)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[0] ?? null) : null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["locality"] ?? null) : null), 103, $this->source), "html", null, true);
            echo ", 
\t\t\t\t";
        }
        // line 105
        echo "\t\t\t\t";
        if ( !twig_test_empty((($__internal_compile_6 = (($__internal_compile_7 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_venue", [], "any", false, false, true, 105), "entity", [], "any", false, false, true, 105), "field_venue_address", [], "any", false, false, true, 105), "value", [], "any", false, false, true, 105)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[0] ?? null) : null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["dependent_locality"] ?? null) : null))) {
            // line 106
            echo "\t\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_8 = (($__internal_compile_9 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_venue", [], "any", false, false, true, 106), "entity", [], "any", false, false, true, 106), "field_venue_address", [], "any", false, false, true, 106), "value", [], "any", false, false, true, 106)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[0] ?? null) : null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["dependent_locality"] ?? null) : null), 106, $this->source), "html", null, true);
            echo ", 
\t\t\t\t";
        }
        // line 108
        echo "\t\t\t\t";
        if ( !twig_test_empty((($__internal_compile_10 = (($__internal_compile_11 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_venue", [], "any", false, false, true, 108), "entity", [], "any", false, false, true, 108), "field_venue_address", [], "any", false, false, true, 108), "value", [], "any", false, false, true, 108)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[0] ?? null) : null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["administrative_area"] ?? null) : null))) {
            // line 109
            echo "\t\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_12 = (($__internal_compile_13 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_venue", [], "any", false, false, true, 109), "entity", [], "any", false, false, true, 109), "field_venue_address", [], "any", false, false, true, 109), "value", [], "any", false, false, true, 109)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13[0] ?? null) : null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["administrative_area"] ?? null) : null), 109, $this->source), "html", null, true);
            echo ", 
\t\t\t\t";
        }
        // line 111
        echo "\t\t\t\t";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_14 = (($__internal_compile_15 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_venue", [], "any", false, false, true, 111), "entity", [], "any", false, false, true, 111), "field_venue_address", [], "any", false, false, true, 111), "value", [], "any", false, false, true, 111)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15[0] ?? null) : null)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["country_code"] ?? null) : null), 111, $this->source), "html", null, true);
        echo "
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"event-detail--booth-no\">
\t\t\t\t";
        // line 115
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_booth_number", [], "any", false, false, true, 115), 0, [], "any", false, false, true, 115), 115, $this->source), "html", null, true);
        echo " ";
        if ( !twig_test_empty((($__internal_compile_16 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_brand_event", [], "any", false, false, true, 115), "value", [], "any", false, false, true, 115)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16[0] ?? null) : null))) {
            echo "(";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_17 = (($__internal_compile_18 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_brand_event", [], "any", false, false, true, 115)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18[0] ?? null) : null)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["#title"] ?? null) : null), 115, $this->source), "html", null, true);
            echo ")";
        }
        // line 116
        echo "\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"event-detail--website\">
\t\t\t<a href=\"";
        // line 120
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_19 = (($__internal_compile_20 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_category", [], "any", false, false, true, 120), "entity", [], "any", false, false, true, 120), "field_website", [], "any", false, false, true, 120), "value", [], "any", false, false, true, 120)) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20[0] ?? null) : null)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19["uri"] ?? null) : null), 120, $this->source), "html", null, true);
        echo "\" target=\"blank\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_21 = (($__internal_compile_22 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_category", [], "any", false, false, true, 120), "entity", [], "any", false, false, true, 120), "field_website", [], "any", false, false, true, 120), "value", [], "any", false, false, true, 120)) && is_array($__internal_compile_22) || $__internal_compile_22 instanceof ArrayAccess ? ($__internal_compile_22[0] ?? null) : null)) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21["uri"] ?? null) : null), 120, $this->source), "html", null, true);
        echo "</a>
\t\t</div>
\t\t
\t\t<div class=\"event-detail--content\">
\t\t\t";
        // line 124
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 124), 124, $this->source), "html", null, true);
        echo "
\t\t</div>
\t\t
\t\t<div class=\"event-detail--photo-gallery\">
\t\t\t<div>";
        // line 128
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_gallery_one_title", [], "any", false, false, true, 128), 128, $this->source), "html", null, true);
        echo "</div>
\t\t</div>
\t\t
\t\t<div class=\"event-detail--photo-gallery-images\">
\t\t\t";
        // line 132
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_events_photo_gallery", [], "any", false, false, true, 132), 132, $this->source), "html", null, true);
        echo "
\t\t</div>
\t\t
\t\t<div class=\"event-detail--photo-gallery\">
\t\t\t<div>";
        // line 136
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_gallery_two_title", [], "any", false, false, true, 136), 136, $this->source), "html", null, true);
        echo "</div>
\t\t</div>
\t\t<div class=\"event-detail--photo-gallery-images\">
\t\t\t";
        // line 139
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_2nd_gallery", [], "any", false, false, true, 139), 139, $this->source), "html", null, true);
        echo "
\t\t</div>
\t\t
\t</div>
\t
  </div>
  
</article>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/content/node--events.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 139,  162 => 136,  155 => 132,  148 => 128,  141 => 124,  132 => 120,  126 => 116,  118 => 115,  110 => 111,  104 => 109,  101 => 108,  95 => 106,  92 => 105,  86 => 103,  84 => 102,  77 => 98,  67 => 93,  58 => 87,  51 => 83,  39 => 73,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/content/node--events.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/content/node--events.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 102);
        static $filters = array("escape" => 83);
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
