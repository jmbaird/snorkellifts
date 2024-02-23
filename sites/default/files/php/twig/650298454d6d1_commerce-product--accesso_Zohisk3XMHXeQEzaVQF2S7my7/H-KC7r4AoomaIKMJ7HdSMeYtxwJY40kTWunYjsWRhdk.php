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

/* themes/sglobal/templates/layout/commerce-product--accessory-packages.html.twig */
class __TwigTemplate_72f72d4a9d9f6e18018c22b962198a8d extends \Twig\Template
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
        // line 22
        echo "
<script type=\"text/javascript\">
jQuery(document).ready(function() {
\tfunction close_accordion_section() {
\t\tjQuery('.single-product--accordion .single-product--accordion-section-title').removeClass('single-product--accordion-section-title-close');
\t\tjQuery('.single-product--accordion .single-product--accordion-section-content').slideUp(800).removeClass('open');
\t}

\tjQuery('.single-product--accordion-section-title').click(function(e) {
\t\tvar currentAttrValue = jQuery(this).attr('href');

\t\tif(jQuery(e.target).is('.single-product--accordion-section-title-close')) {
\t\t\tclose_accordion_section();
\t\t}else {
\t\t\tclose_accordion_section();
\t\t\t// Add single-product--accordion-section-title-close class to section title
\t\t\tjQuery(this).addClass('single-product--accordion-section-title-close');
\t\t\t// Open up the hidden content panel
\t\t\tjQuery('.single-product--accordion ' + currentAttrValue).slideDown(800).addClass('open'); 
\t\t}

\t\te.preventDefault();
\t});

\t// Hide the Get a Quote button from appearing directly under Specifications list
\t// NOTE: This init function no longer needed. See web/themes/sglobal/templates/form/fieldset--snorkel-attributes.html.twig
\t/*jQuery( init );
\tfunction init() {
\t\tjQuery('.attribute-widgets').remove();
\t  \t// Delete the contents of #myDiv1 and #myDiv2
\t  \t//jQuery('#edit-actions').empty();
\t}*/
});
</script>


<article";
        // line 58
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 58, $this->source), "html", null, true);
        echo ">
\t<div class=\"page--wrapper\">
\t\t<div class=\"single-product--information\">
\t\t\t<div class=\"single-product--accordion\">
\t\t\t\t<div class=\"single-product--accordion-section\">
\t\t\t\t\t<a class=\"single-product--accordion-section-title single-product--accordion-section-title-close\" href=\"#accordion-1\"><h3>";
        // line 63
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "title", [], "any", false, false, true, 63), 63, $this->source), "html", null, true);
        echo "</h3></a>
\t\t\t\t\t<div id=\"accordion-1\" class=\"single-product--accordion-section-content open\" style=\"display:block;\">
\t\t\t\t\t\t";
        // line 65
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "body", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
        echo "
\t\t\t\t\t\t<p>";
        // line 66
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_package", [], "any", false, false, true, 66), 66, $this->source), "html", null, true);
        echo "</p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"single-product--accordion-section\">
\t\t\t\t\t<a class=\"single-product--accordion-section-title\" href=\"#accordion-2\"><h3>Packages Available On</h3></a>
\t\t\t\t\t<div id=\"accordion-2\" class=\"single-product--accordion-section-content\">
\t\t\t\t\t\t<p>";
        // line 73
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_packages_available_for", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
        echo "</p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"single-product--cta\">
\t\t\t\t\t";
        // line 78
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variations", [], "any", false, false, true, 78), 78, $this->source), "html", null, true);
        echo "
\t\t\t\t\t<a href=\"/contact\" class=\"single-product--dealer-link\">Find a Dealer</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"single-product--media\">
\t\t\t\t<div class=\"single-product--video-gallery\">
\t\t\t\t\t";
        // line 84
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_walk_around_video", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
        echo "
\t\t\t\t</div>

\t\t\t\t<div class=\"single-product--photo-gallery\">
\t\t\t\t\t";
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_photo_gallery", [], "any", false, false, true, 88), 88, $this->source), "html", null, true);
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</article>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/layout/commerce-product--accessory-packages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 88,  121 => 84,  112 => 78,  104 => 73,  94 => 66,  90 => 65,  85 => 63,  77 => 58,  39 => 22,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/commerce-product--accessory-packages.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/commerce-product--accessory-packages.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 58);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
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
