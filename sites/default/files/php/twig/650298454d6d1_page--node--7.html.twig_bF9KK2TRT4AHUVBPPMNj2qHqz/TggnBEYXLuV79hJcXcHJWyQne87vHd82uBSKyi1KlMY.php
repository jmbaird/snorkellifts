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

/* themes/sglobal/templates/layout/page--node--7.html.twig */
class __TwigTemplate_2a3efb5f1271d6872b279a4094f454e6 extends \Twig\Template
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
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/floatbar.html.twig"), "themes/sglobal/templates/layout/page--node--7.html.twig", 48)->display($context);
        // line 49
        echo "
\t";
        // line 50
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/header.html.twig"), "themes/sglobal/templates/layout/page--node--7.html.twig", 50)->display($context);
        // line 51
        echo "
\t<main role=\"main\">
    \t<a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 54
        echo "\t\t<div class=\"page--wrapper\">
\t\t\t<h1 class=\"page--title\">Contact Us</h1>
\t\t</div>

\t\t<section class=\"page--wrapper dealers\">
\t\t\t<h3>Find your nearest Snorkel dealer location</h3>

\t\t\t<p>Our dealer locator provides the most up-to-date information on Snorkel dealers close to you.</p>

\t\t\t<div class=\"bh-sl-form-container\">
\t\t\t\t<form id=\"bh-sl-user-location\" method=\"post\" action=\"#\">
\t\t\t\t\t<div class=\"form-input\" class=\"dealer-name-container\">
\t\t\t\t\t\t<label for=\"bh-sl-search\">Search by Dealer Name:</label>
\t\t\t\t\t\t<input type=\"text\" id=\"bh-sl-search\" name=\"bh-sl-search\" />
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-input\" class=\"locations-container\">
\t\t\t\t\t\t<label for=\"bh-sl-address\">Search by Locations</label>
\t\t\t\t\t\t<input type=\"text\" id=\"bh-sl-address\" name=\"bh-sl-address\" placeholder=\"Enter City or Zip/Postal Code\" />
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-input\" class=\"locations-container\">
\t\t\t\t\t\t<label for=\"bh-sl-maxdistance\">Distance</label>
\t\t\t\t\t\t<select id=\"bh-sl-maxdistance\" name=\"bh-sl-maxdistance\">
\t\t\t\t\t\t\t<option value=\"50\">50 mi / 80 km</option>
\t\t\t\t\t\t\t<option value=\"100\">100 mi / 160 km</option>
\t\t\t\t\t\t\t<option value=\"200\">200 mi / 320 km</option>
\t\t\t\t\t\t\t<option value=\"300\">300 mi / 480 km</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t<button id=\"bh-sl-submit\" type=\"submit\">Search</button><button id=\"bh-sl-reset reset\" class=\"reset bh-sl-reset\" type=\"submit\">Reset</button>
\t\t\t\t</form>
\t\t\t</div>

\t\t\t<div id=\"bh-sl-map-container\" class=\"bh-sl-map-container\">
\t\t\t\t<div id=\"bh-sl-map\" class=\"bh-sl-map\"></div>
\t\t\t\t<div class=\"bh-sl-loc-list\">
\t\t\t\t\t<ul class=\"list\"></ul>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t";
        // line 93
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("sglobal/store-locator"), "html", null, true);
        echo "
\t\t\t<script>
\t\t\t\tjQuery(\"#bh-sl-search\").on(\"input\", function() {
\t\t\t\t\tif( jQuery(this).val().length > 0 ) {
\t\t\t\t\t\tjQuery('#bh-sl-address').prop( \"disabled\", true )
\t\t\t\t\t}

\t\t\t\t\tif( jQuery(this).val().length === 0 ) {
\t\t\t\t\t\tjQuery('#bh-sl-address').prop( \"disabled\", false );
\t\t\t\t\t}
\t\t\t\t});

\t\t\t\tjQuery(\"#bh-sl-address\").on(\"input\", function() {
\t\t\t\t\tif( jQuery(this).val().length > 0 ) {
\t\t\t\t\t\tjQuery('#bh-sl-search').prop( \"disabled\", true );
\t\t\t\t\t}

\t\t\t\t\tif( jQuery(this).val().length === 0 ) {
\t\t\t\t\t\tjQuery('#bh-sl-search').prop( \"disabled\", false );
\t\t\t\t\t}
\t\t\t\t});

\t\t\t\tjQuery('.reset').click(function(){
\t\t\t\t\tlocation.reload();
  \t\t\t\t});

\t\t\t  \tjQuery(function() {
\t\t\t\t\tjQuery('#bh-sl-map-container').storeLocator({
\t\t\t\t\t\tlistColor1 : '#ffffff',
\t\t\t\t\t\tlistColor2 : '#ffffff',
\t\t\t\t\t\tnameSearch: true,
\t\t\t\t\t\tautoComplete: true,
\t\t\t\t\t\tautoCompleteOptions: {
\t\t\t\t\t\t\tfields: [\"name\"],
\t\t\t\t\t\t\ttypes: ['(regions)'],
\t\t\t\t\t\t},
\t\t\t\t\t\tmaxDistance: true,
\t\t\t\t\t\tkilometerLang : 'km',
\t\t\t\t\t\tkilometersLang : 'km',
\t\t\t\t\t\tmileLang : 'mi',
\t\t\t\t\t\tmilesLang : 'mi',
\t\t\t\t\t\tcatMarkers: {
\t\t\t\t\t\t\tInternational: ['sites/default/files/geofieldmap_icons/map-marker-ahern-international.png', 53, 45],
\t\t\t\t\t\t\tManufacturer: ['sites/default/files/geofieldmap_icons/map-marker-corporate-manufacturer.png', 29, 45],
\t\t\t\t\t\t\tDealer: ['sites/default/files/geofieldmap_icons/map-marker-dealers.png', 29, 45]
\t\t\t\t\t\t\t},
\t\t\t\t\t\tdataLocation : 'themes/sglobal/js/plugins/storeLocator/data/locations.json',
\t\t\t\t\t\tinfowindowTemplatePath : 'themes/sglobal/js/plugins/storeLocator/templates/infowindow-description.html',
\t\t\t\t\t\tlistTemplatePath : 'themes/sglobal/js/plugins/storeLocator/templates/location-list-description.html'
\t\t\t\t\t});
\t\t\t  \t});
\t\t\t</script>
\t\t</section>

\t\t<section class=\"page--wrapper top-10\">
\t\t\t<h3>Snorkel Company Offices</h3>

\t\t\t<div class=\"flexbox corporate-contact\">
\t\t\t\t<!-- Elwood -->
\t\t\t\t";
        // line 152
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 34), "html", null, true);
        echo "

\t\t\t\t<!-- Vigo -->
\t\t\t\t";
        // line 155
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 60), "html", null, true);
        echo "

\t\t\t\t<!-- New Zealand -->
\t\t\t\t";
        // line 158
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 61), "html", null, true);
        echo "

\t\t\t\t<!-- China -->
\t\t\t\t";
        // line 161
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 62), "html", null, true);
        echo "
\t\t\t</div>
\t\t</section>

\t\t";
        // line 165
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "after_content", [], "any", false, false, true, 165), 165, $this->source), "html", null, true);
        echo "
\t</main>

\t";
        // line 168
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/footer.html.twig"), "themes/sglobal/templates/layout/page--node--7.html.twig", 168)->display($context);
        // line 169
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/layout/page--node--7.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 169,  188 => 168,  182 => 165,  175 => 161,  169 => 158,  163 => 155,  157 => 152,  95 => 93,  54 => 54,  50 => 51,  48 => 50,  45 => 49,  43 => 48,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/page--node--7.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/page--node--7.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48);
        static $filters = array("escape" => 93);
        static $functions = array("attach_library" => 93, "drupal_entity" => 152);

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['escape'],
                ['attach_library', 'drupal_entity']
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
