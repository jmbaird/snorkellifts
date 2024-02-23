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

/* themes/sglobal/templates/layout/commerce-product.html.twig */
class __TwigTemplate_6a42d237b2d2987cd184ccc09c57985d extends \Twig\Template
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
\t\t// Grab current anchor value
\t\tvar currentAttrValue = jQuery(this).attr('href');

\t\tif(jQuery(this).is('.single-product--accordion-section-title-close')) {
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
\t<div class=\"page--hero\">
\t\t";
        // line 60
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_header_image", [], "any", false, false, true, 60), 60, $this->source), "html", null, true);
        echo "
\t</div>

\t<div class=\"single-product--quick-view-container\">
\t\t<div class=\"single-product--quick-view\">
\t\t\t";
        // line 65
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/commerce-quick-facts.html.twig"), "themes/sglobal/templates/layout/commerce-product.html.twig", 65)->display($context);
        // line 66
        echo "\t\t</div>
\t</div>


\t<div class=\"page--wrapper\">
\t\t<div class=\"single-product--information\">
\t\t\t<div class=\"single-product--accordion\">
\t\t\t\t<div class=\"single-product--accordion-section first\">
\t\t\t\t\t<a class=\"single-product--accordion-section-title single-product--accordion-section-title-close\" href=\"#accordion-1\"><h3>";
        // line 74
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "title", [], "any", false, false, true, 74), 74, $this->source), "html", null, true);
        echo "</h3></a>
\t\t\t\t\t<div id=\"accordion-1\" class=\"single-product--accordion-section-content open\" style=\"display:block;\">
\t\t\t\t\t\t";
        // line 76
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "body", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"single-product--accordion-section\">
\t\t\t\t\t<a class=\"single-product--accordion-section-title\" href=\"#accordion-2\"><h3>Specifications</h3></a>
\t\t\t\t\t<div id=\"accordion-2\" class=\"single-product--accordion-section-content specification\">
\t\t\t\t\t\t";
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variations", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
        echo "
\t\t\t\t\t\t<div class=\"spec--container\">
";
        // line 86
        echo "\t\t\t\t\t\t\t";
        if (($context["attribute_max_lift_capacity"] ?? null)) {
            // line 87
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. lift capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 88
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_lift_capacity"] ?? null), 88, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 90
        echo "\t                        ";
        if (($context["attribute_mlc_ansi_metric_"] ?? null)) {
            // line 91
            echo "\t                        \t<div class=\"spec--attribute\">Max. lift capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 92
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc_ansi_metric_"] ?? null), 92, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 94
        echo "\t                        ";
        if (($context["attribute_mlc_ce_metric_"] ?? null)) {
            // line 95
            echo "\t                        \t<div class=\"spec--attribute\">Max. lift capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 96
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc_ce_metric_"] ?? null), 96, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 98
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 100
        if (($context["attribute_max_lift_height"] ?? null)) {
            // line 101
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. lift height</div>
\t\t                        <div class=\"spec--value\">";
            // line 102
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_lift_height"] ?? null), 102, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 104
        echo "\t                        ";
        if (($context["attribute_mlh_ansi_metric_"] ?? null)) {
            // line 105
            echo "\t                        \t<div class=\"spec--attribute\">Max. lift height</div>
\t\t                        <div class=\"spec--value\">";
            // line 106
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlh_ansi_metric_"] ?? null), 106, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 108
        echo "\t                        ";
        if (($context["attribute_mlh_ce_metric_"] ?? null)) {
            // line 109
            echo "\t                        \t<div class=\"spec--attribute\">Max. lift height</div>
\t\t                        <div class=\"spec--value\">";
            // line 110
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlh_ce_metric_"] ?? null), 110, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 112
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 114
        if (($context["attribute_forward_reach"] ?? null)) {
            // line 115
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Forward reach</div>
\t\t                        <div class=\"spec--value\">";
            // line 116
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_forward_reach"] ?? null), 116, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 118
        echo "\t                        ";
        if (($context["attribute_fr_ansi_metric_"] ?? null)) {
            // line 119
            echo "\t                        \t<div class=\"spec--attribute\">Forward reach</div>
\t\t                        <div class=\"spec--value\">";
            // line 120
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fr_ansi_metric_"] ?? null), 120, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 122
        echo "\t                        ";
        if (($context["attribute_fr_ce_metric_"] ?? null)) {
            // line 123
            echo "\t                        \t<div class=\"spec--attribute\">Forward reach</div>
\t\t                        <div class=\"spec--value\">";
            // line 124
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fr_ce_metric_"] ?? null), 124, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 126
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 128
        if (($context["attribute_max_forward_reach"] ?? null)) {
            // line 129
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. forward reach</div>
\t\t                        <div class=\"spec--value\">";
            // line 130
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_forward_reach"] ?? null), 130, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 132
        echo "\t                        ";
        if (($context["attribute_mfr_ansi_metric_"] ?? null)) {
            // line 133
            echo "\t                        \t<div class=\"spec--attribute\">Max. forward reach</div>
\t\t                        <div class=\"spec--value\">";
            // line 134
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mfr_ansi_metric_"] ?? null), 134, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 136
        echo "\t                        ";
        if (($context["attribute_mfr_ce_metric_"] ?? null)) {
            // line 137
            echo "\t                        \t<div class=\"spec--attribute\">Max. forward reach</div>
\t\t                        <div class=\"spec--value\">";
            // line 138
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mfr_ce_metric_"] ?? null), 138, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 140
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 142
        if (($context["attribute_max_working_height"] ?? null)) {
            // line 143
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. working height</div>
\t\t                        <div class=\"spec--value\">";
            // line 144
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_working_height"] ?? null), 144, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 146
        echo "\t                        ";
        if (($context["attribute_max_work_height_ansi_m"] ?? null)) {
            // line 147
            echo "\t                        \t<div class=\"spec--attribute\">Max. working height</div>
\t\t                        <div class=\"spec--value\">";
            // line 148
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_work_height_ansi_m"] ?? null), 148, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 150
        echo "\t                        ";
        if (($context["attribute_max_work_height_ce_met"] ?? null)) {
            // line 151
            echo "\t                        \t<div class=\"spec--attribute\">Max. working height</div>
\t\t                        <div class=\"spec--value\">";
            // line 152
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_work_height_ce_met"] ?? null), 152, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 154
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 156
        if (($context["attribute_max_platform_height"] ?? null)) {
            // line 157
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. platform height</div>
\t\t                        <div class=\"spec--value\">";
            // line 158
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_platform_height"] ?? null), 158, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 160
        echo "\t                        ";
        if (($context["attribute_max_platform_h_ansi_me"] ?? null)) {
            // line 161
            echo "\t                        \t<div class=\"spec--attribute\">Max. platform height</div>
\t\t                        <div class=\"spec--value\">";
            // line 162
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_platform_h_ansi_me"] ?? null), 162, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 164
        echo "\t                        ";
        if (($context["attribute_max_platform_h_ce_metr"] ?? null)) {
            // line 165
            echo "\t                        \t<div class=\"spec--attribute\">Max. platform height</div>
\t\t                        <div class=\"spec--value\">";
            // line 166
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_platform_h_ce_metr"] ?? null), 166, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 168
        echo "\t                    </div>
\t                    <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 170
        if (($context["attribute_platform_length"] ?? null)) {
            // line 171
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform length</div>
\t\t                        <div class=\"spec--value\">";
            // line 172
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_length"] ?? null), 172, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 174
        echo "\t                        ";
        if (($context["attribute_pl_ansi_metric_"] ?? null)) {
            // line 175
            echo "\t                        \t<div class=\"spec--attribute\">Platform length</div>
\t\t                        <div class=\"spec--value\">";
            // line 176
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pl_ansi_metric_"] ?? null), 176, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 178
        echo "\t                        ";
        if (($context["attribute_pl_ce_metric_"] ?? null)) {
            // line 179
            echo "\t                        \t<div class=\"spec--attribute\">Platform length</div>
\t\t                        <div class=\"spec--value\">";
            // line 180
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pl_ce_metric_"] ?? null), 180, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 182
        echo "\t                    </div>
\t                    <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 184
        if (($context["attribute_max_horizontal_reach"] ?? null)) {
            // line 185
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. horizontal reach</div>
\t\t                        <div class=\"spec--value\">";
            // line 186
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_horizontal_reach"] ?? null), 186, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 188
        echo "\t                        ";
        if (($context["attribute_mhr_ansi_metric_"] ?? null)) {
            // line 189
            echo "\t                        \t<div class=\"spec--attribute\">Max. horizontal reach</div>
\t\t                        <div class=\"spec--value\">";
            // line 190
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mhr_ansi_metric_"] ?? null), 190, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 192
        echo "\t                        ";
        if (($context["attribute_mhr_ce_metric_"] ?? null)) {
            // line 193
            echo "\t                        \t<div class=\"spec--attribute\">Max. horizontal reach</div>
\t\t                        <div class=\"spec--value\">";
            // line 194
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mhr_ce_metric_"] ?? null), 194, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 196
        echo "\t                    </div>
\t                    <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 198
        if (($context["attribute_platform_width"] ?? null)) {
            // line 199
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform width</div>
\t\t                        <div class=\"spec--value\">";
            // line 200
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_width"] ?? null), 200, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 202
        echo "\t                        ";
        if (($context["attribute_pw_ansi_metric_"] ?? null)) {
            // line 203
            echo "\t                        \t<div class=\"spec--attribute\">Platform width</div>
\t\t                        <div class=\"spec--value\">";
            // line 204
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pw_ansi_metric_"] ?? null), 204, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 206
        echo "\t                        ";
        if (($context["attribute_pw_ce_metric_"] ?? null)) {
            // line 207
            echo "\t                        \t<div class=\"spec--attribute\">Platform width</div>
\t\t                        <div class=\"spec--value\">";
            // line 208
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pw_ce_metric_"] ?? null), 208, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 210
        echo "\t                    </div>
\t                    <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 212
        if (($context["attribute_platform_depth"] ?? null)) {
            // line 213
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform depth</div>
\t\t                        <div class=\"spec--value\">";
            // line 214
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_depth"] ?? null), 214, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 216
        echo "\t                        ";
        if (($context["attribute_pd_ansi_metric_"] ?? null)) {
            // line 217
            echo "\t                        \t<div class=\"spec--attribute\">Platform depth</div>
\t\t                        <div class=\"spec--value\">";
            // line 218
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pd_ansi_metric_"] ?? null), 218, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 220
        echo "\t                        ";
        if (($context["attribute_pd_ce_metric_"] ?? null)) {
            // line 221
            echo "\t                        \t<div class=\"spec--attribute\">Platform depth</div>
\t\t                        <div class=\"spec--value\">";
            // line 222
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pd_ce_metric_"] ?? null), 222, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 224
        echo "\t                    </div>
\t                    <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 226
        if (($context["attribute_stabilizer_footprint"] ?? null)) {
            // line 227
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Stabilizer footprint</div>
\t\t                        <div class=\"spec--value\">";
            // line 228
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_stabilizer_footprint"] ?? null), 228, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 230
        echo "\t                        ";
        if (($context["attribute_sf_ansi_metric_"] ?? null)) {
            // line 231
            echo "\t                        \t<div class=\"spec--attribute\">Stabilizer footprint</div>
\t\t                        <div class=\"spec--value\">";
            // line 232
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_sf_ansi_metric_"] ?? null), 232, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 234
        echo "\t                        ";
        if (($context["attribute_sf_ce_metric_"] ?? null)) {
            // line 235
            echo "\t                        \t<div class=\"spec--attribute\">Stabilizer footprint</div>
\t\t                        <div class=\"spec--value\">";
            // line 236
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_sf_ce_metric_"] ?? null), 236, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 238
        echo "\t                    </div>
\t                    <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 240
        if (($context["attribute_towing_length"] ?? null)) {
            // line 241
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Towing length</div>
\t\t                        <div class=\"spec--value\">";
            // line 242
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_towing_length"] ?? null), 242, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 244
        echo "\t                        ";
        if (($context["attribute_tl_ansi_metric_"] ?? null)) {
            // line 245
            echo "\t                        \t<div class=\"spec--attribute\">Towing length</div>
\t\t                        <div class=\"spec--value\">";
            // line 246
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tl_ansi_metric_"] ?? null), 246, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 248
        echo "\t                        ";
        if (($context["attribute_tl_ce_metric_"] ?? null)) {
            // line 249
            echo "\t                        \t<div class=\"spec--attribute\">Towing length</div>
\t\t                        <div class=\"spec--value\">";
            // line 250
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tl_ce_metric_"] ?? null), 250, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 252
        echo "\t                    </div>
\t                    <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 254
        if (($context["attribute_towing_width"] ?? null)) {
            // line 255
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Towing width</div>
\t\t                        <div class=\"spec--value\">";
            // line 256
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_towing_width"] ?? null), 256, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 258
        echo "\t                        ";
        if (($context["attribute_tw_ansi_metric_"] ?? null)) {
            // line 259
            echo "\t                        \t<div class=\"spec--attribute\">Towing width</div>
\t\t                        <div class=\"spec--value\">";
            // line 260
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tw_ansi_metric_"] ?? null), 260, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 262
        echo "\t                        ";
        if (($context["attribute_tw_ce_metric_"] ?? null)) {
            // line 263
            echo "\t                        \t<div class=\"spec--attribute\">Towing width</div>
\t\t                        <div class=\"spec--value\">";
            // line 264
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tw_ce_metric_"] ?? null), 264, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 266
        echo "\t                    </div>
\t                    <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 268
        if (($context["attribute_clearance_height_at_ma"] ?? null)) {
            // line 269
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Clearance height at max. outreach</div>
\t\t                        <div class=\"spec--value\">";
            // line 270
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_clearance_height_at_ma"] ?? null), 270, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 272
        echo "\t                        ";
        if (($context["attribute_chamo_ansi_metric_"] ?? null)) {
            // line 273
            echo "\t                        \t<div class=\"spec--attribute\">Clearance height at max. outreach</div>
\t\t                        <div class=\"spec--value\">";
            // line 274
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_chamo_ansi_metric_"] ?? null), 274, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 276
        echo "\t                        ";
        if (($context["attribute_chamo_ce_metric_"] ?? null)) {
            // line 277
            echo "\t                        \t<div class=\"spec--attribute\">Clearance height at max. outreach</div>
\t\t                        <div class=\"spec--value\">";
            // line 278
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_chamo_ce_metric_"] ?? null), 278, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 280
        echo "\t                    </div>
\t                    <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 282
        if (($context["attribute_platform_floor_size_in"] ?? null)) {
            // line 283
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform floor size (inside)</div>
\t\t                        <div class=\"spec--value\">";
            // line 284
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_floor_size_in"] ?? null), 284, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 286
        echo "\t                        ";
        if (($context["attribute_pfsi_ansi_metric_"] ?? null)) {
            // line 287
            echo "\t                        \t<div class=\"spec--attribute\">Platform floor size (inside)</div>
\t\t                        <div class=\"spec--value\">";
            // line 288
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pfsi_ansi_metric_"] ?? null), 288, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 290
        echo "\t                        ";
        if (($context["attribute_pfsi_ce_metric_"] ?? null)) {
            // line 291
            echo "\t                        \t<div class=\"spec--attribute\">Platform floor size (inside)</div>
\t\t                        <div class=\"spec--value\">";
            // line 292
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pfsi_ce_metric_"] ?? null), 292, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 294
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 296
        if (($context["attribute_platform_size"] ?? null)) {
            // line 297
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform size</div>
\t\t                        <div class=\"spec--value\">";
            // line 298
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_size"] ?? null), 298, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 300
        echo "\t                        ";
        if (($context["attribute_ps_ansi_metric_"] ?? null)) {
            // line 301
            echo "\t                        \t<div class=\"spec--attribute\">Platform size</div>
\t\t                        <div class=\"spec--value\">";
            // line 302
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ps_ansi_metric_"] ?? null), 302, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 304
        echo "\t                        ";
        if (($context["attribute_ps_ce_metric_"] ?? null)) {
            // line 305
            echo "\t                        \t<div class=\"spec--attribute\">Platform size</div>
\t\t                        <div class=\"spec--value\">";
            // line 306
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ps_ce_metric_"] ?? null), 306, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 308
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 310
        if (($context["attribute_chassis_width"] ?? null)) {
            // line 311
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Chassis width</div>
\t\t                        <div class=\"spec--value\">";
            // line 312
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_chassis_width"] ?? null), 312, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 314
        echo "\t                        ";
        if (($context["attribute_cw_ansi_metric_"] ?? null)) {
            // line 315
            echo "\t                        \t<div class=\"spec--attribute\">Chassis width</div>
\t\t                        <div class=\"spec--value\">";
            // line 316
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_cw_ansi_metric_"] ?? null), 316, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 318
        echo "\t                        ";
        if (($context["attribute_cw_ce_metric_"] ?? null)) {
            // line 319
            echo "\t                        \t<div class=\"spec--attribute\">Chassis width</div>
\t\t                        <div class=\"spec--value\">";
            // line 320
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_cw_ce_metric_"] ?? null), 320, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 322
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 324
        if (($context["attribute_lift_height_forks_up_"] ?? null)) {
            // line 325
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Lift height (forks up)</div>
\t\t                        <div class=\"spec--value\">";
            // line 326
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_lift_height_forks_up_"] ?? null), 326, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 328
        echo "\t                        ";
        if (($context["attribute_lhfu_ansi_metric_"] ?? null)) {
            // line 329
            echo "\t                        \t<div class=\"spec--attribute\">Lift height (forks up)</div>
\t\t                        <div class=\"spec--value\">";
            // line 330
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_lhfu_ansi_metric_"] ?? null), 330, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 332
        echo "\t                        ";
        if (($context["attribute_lhfu_ce_metric_"] ?? null)) {
            // line 333
            echo "\t                        \t<div class=\"spec--attribute\">Lift height (forks up)</div>
\t\t                        <div class=\"spec--value\">";
            // line 334
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_lhfu_ce_metric_"] ?? null), 334, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 336
        echo "                        </div>
                         <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 338
        if (($context["attribute_lift_height_forks_down"] ?? null)) {
            // line 339
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Lift height (forks down)</div>
\t\t                        <div class=\"spec--value\">";
            // line 340
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_lift_height_forks_down"] ?? null), 340, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 342
        echo "\t                        ";
        if (($context["attribute_lhfd_ansi_metric_"] ?? null)) {
            // line 343
            echo "\t                        \t<div class=\"spec--attribute\">Lift height (forks down)</div>
\t\t                        <div class=\"spec--value\">";
            // line 344
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_lhfd_ansi_metric_"] ?? null), 344, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 346
        echo "\t                        ";
        if (($context["attribute_lhfd_ce_metric_"] ?? null)) {
            // line 347
            echo "\t                        \t<div class=\"spec--attribute\">Lift height (forks down)</div>
\t\t                        <div class=\"spec--value\">";
            // line 348
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_lhfd_ce_metric_"] ?? null), 348, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 350
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 352
        if (($context["attribute_stowed_width"] ?? null)) {
            // line 353
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Stowed width</div>
\t\t                        <div class=\"spec--value\">";
            // line 354
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_stowed_width"] ?? null), 354, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 356
        echo "\t                        ";
        if (($context["attribute_stowedw_ansi_metric_"] ?? null)) {
            // line 357
            echo "\t                        \t<div class=\"spec--attribute\">Stowed width</div>
\t\t                        <div class=\"spec--value\">";
            // line 358
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_stowedw_ansi_metric_"] ?? null), 358, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 360
        echo "\t                        ";
        if (($context["attribute_stowedw_ce_metric_"] ?? null)) {
            // line 361
            echo "\t                        \t<div class=\"spec--attribute\">Stowed width</div>
\t\t                        <div class=\"spec--value\">";
            // line 362
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_stowedw_ce_metric_"] ?? null), 362, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 364
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 366
        if (($context["attribute_stabilizer_width"] ?? null)) {
            // line 367
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Stabilizer width</div>
\t\t                        <div class=\"spec--value\">";
            // line 368
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_stabilizer_width"] ?? null), 368, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 370
        echo "\t                        ";
        if (($context["attribute_sw_ansi_metric_"] ?? null)) {
            // line 371
            echo "\t                        \t<div class=\"spec--attribute\">Stabilizer width</div>
\t\t                        <div class=\"spec--value\">";
            // line 372
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_sw_ansi_metric_"] ?? null), 372, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 374
        echo "\t                        ";
        if (($context["attribute_sw_ce_metric_"] ?? null)) {
            // line 375
            echo "\t                        \t<div class=\"spec--attribute\">Stabilizer width</div>
\t\t                        <div class=\"spec--value\">";
            // line 376
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_sw_ce_metric_"] ?? null), 376, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 378
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 380
        if (($context["attribute_stowed_length"] ?? null)) {
            // line 381
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Stowed length</div>
\t\t                        <div class=\"spec--value\">";
            // line 382
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_stowed_length"] ?? null), 382, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 384
        echo "\t                        ";
        if (($context["attribute_sl_ansi_metric_"] ?? null)) {
            // line 385
            echo "\t                        \t<div class=\"spec--attribute\">Stowed length</div>
\t\t                        <div class=\"spec--value\">";
            // line 386
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_sl_ansi_metric_"] ?? null), 386, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 388
        echo "\t                        ";
        if (($context["attribute_sl_ce_metric_"] ?? null)) {
            // line 389
            echo "\t                        \t<div class=\"spec--attribute\">Stowed length</div>
\t\t                        <div class=\"spec--value\">";
            // line 390
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_sl_ce_metric_"] ?? null), 390, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 392
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 394
        if (($context["attribute_operating_length"] ?? null)) {
            // line 395
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Operating length</div>
\t\t                        <div class=\"spec--value\">";
            // line 396
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_operating_length"] ?? null), 396, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 398
        echo "\t                        ";
        if (($context["attribute_ol_ansi_metric_"] ?? null)) {
            // line 399
            echo "\t                        \t<div class=\"spec--attribute\">Operating length</div>
\t\t                        <div class=\"spec--value\">";
            // line 400
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ol_ansi_metric_"] ?? null), 400, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 402
        echo "\t                        ";
        if (($context["attribute_ol_ce_metric_"] ?? null)) {
            // line 403
            echo "\t                        \t<div class=\"spec--attribute\">Operating length</div>
\t\t                        <div class=\"spec--value\">";
            // line 404
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ol_ce_metric_"] ?? null), 404, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 406
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 408
        if (($context["attribute_tilt_back_length"] ?? null)) {
            // line 409
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Tilt back length</div>
\t\t                        <div class=\"spec--value\">";
            // line 410
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tilt_back_length"] ?? null), 410, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 412
        echo "\t                        ";
        if (($context["attribute_tbl_ansi_metric_"] ?? null)) {
            // line 413
            echo "\t                        \t<div class=\"spec--attribute\">Tilt back length</div>
\t\t                        <div class=\"spec--value\">";
            // line 414
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tbl_ansi_metric_"] ?? null), 414, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 416
        echo "\t                        ";
        if (($context["attribute_tbl_ce_metric_"] ?? null)) {
            // line 417
            echo "\t                        \t<div class=\"spec--attribute\">Tilt back length</div>
\t\t                        <div class=\"spec--value\">";
            // line 418
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tbl_ce_metric_"] ?? null), 418, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 420
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 422
        if (($context["attribute_tilt_back_height"] ?? null)) {
            // line 423
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Tilt back height</div>
\t\t                        <div class=\"spec--value\">";
            // line 424
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tilt_back_height"] ?? null), 424, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 426
        echo "\t                        ";
        if (($context["attribute_tbh_ansi_metric_"] ?? null)) {
            // line 427
            echo "\t                        \t<div class=\"spec--attribute\">Tilt back height</div>
\t\t                        <div class=\"spec--value\">";
            // line 428
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tbh_ansi_metric_"] ?? null), 428, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 430
        echo "\t                        ";
        if (($context["attribute_tbh_ce_metric_"] ?? null)) {
            // line 431
            echo "\t                        \t<div class=\"spec--attribute\">Tilt back height</div>
\t\t                        <div class=\"spec--value\">";
            // line 432
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tbh_ce_metric_"] ?? null), 432, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 434
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 436
        if (($context["attribute_fork_width_outside_"] ?? null)) {
            // line 437
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Fork width (outside)</div>
\t\t                        <div class=\"spec--value\">";
            // line 438
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fork_width_outside_"] ?? null), 438, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 440
        echo "\t                        ";
        if (($context["attribute_fwo_ansi_metric_"] ?? null)) {
            // line 441
            echo "\t                        \t<div class=\"spec--attribute\">Fork width (outside)</div>
\t\t                        <div class=\"spec--value\">";
            // line 442
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fwo_ansi_metric_"] ?? null), 442, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 444
        echo "\t                        ";
        if (($context["attribute_fwo_ce_metric_"] ?? null)) {
            // line 445
            echo "\t                        \t<div class=\"spec--attribute\">Fork width (outside)</div>
\t\t                        <div class=\"spec--value\">";
            // line 446
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fwo_ce_metric_"] ?? null), 446, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 448
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 450
        if (($context["attribute_fork_length"] ?? null)) {
            // line 451
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Fork length</div>
\t\t                        <div class=\"spec--value\">";
            // line 452
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fork_length"] ?? null), 452, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 454
        echo "\t                        ";
        if (($context["attribute_fl_ansi_metric_"] ?? null)) {
            // line 455
            echo "\t                        \t<div class=\"spec--attribute\">Fork length</div>
\t\t                        <div class=\"spec--value\">";
            // line 456
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fl_ansi_metric_"] ?? null), 456, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 458
        echo "\t                        ";
        if (($context["attribute_fl_ce_metric_"] ?? null)) {
            // line 459
            echo "\t                        \t<div class=\"spec--attribute\">Fork length</div>
\t\t                        <div class=\"spec--value\">";
            // line 460
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fl_ce_metric_"] ?? null), 460, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 462
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 464
        if (($context["attribute_length_to_fork_face"] ?? null)) {
            // line 465
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Length to fork face</div>
\t\t                        <div class=\"spec--value\">";
            // line 466
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_length_to_fork_face"] ?? null), 466, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 468
        echo "\t                        ";
        if (($context["attribute_ltff_ansi_metric_"] ?? null)) {
            // line 469
            echo "\t                        \t<div class=\"spec--attribute\">Length to fork face</div>
\t\t                        <div class=\"spec--value\">";
            // line 470
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ltff_ansi_metric_"] ?? null), 470, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 472
        echo "\t                        ";
        if (($context["attribute_ltff_ce_metric_"] ?? null)) {
            // line 473
            echo "\t                        \t<div class=\"spec--attribute\">Length to fork face</div>
\t\t                        <div class=\"spec--value\">";
            // line 474
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ltff_ce_metric_"] ?? null), 474, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 476
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 478
        if (($context["attribute_wheelbase"] ?? null)) {
            // line 479
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Wheelbase</div>
\t\t                        <div class=\"spec--value\">";
            // line 480
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wheelbase"] ?? null), 480, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 482
        echo "\t                        ";
        if (($context["attribute_wbase_ansi_metric_"] ?? null)) {
            // line 483
            echo "\t                        \t<div class=\"spec--attribute\">Wheelbase</div>
\t\t                        <div class=\"spec--value\">";
            // line 484
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wbase_ansi_metric_"] ?? null), 484, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 486
        echo "\t                        ";
        if (($context["attribute_wbase_ce_metric_"] ?? null)) {
            // line 487
            echo "\t                        \t<div class=\"spec--attribute\">Wheelbase</div>
\t\t                        <div class=\"spec--value\">";
            // line 488
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wbase_ce_metric_"] ?? null), 488, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 490
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 492
        if (($context["attribute_platform_size_stowed_"] ?? null)) {
            // line 493
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform size (stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 494
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_size_stowed_"] ?? null), 494, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 496
        echo "\t                        ";
        if (($context["attribute_pss_ansi_metric_"] ?? null)) {
            // line 497
            echo "\t                        \t<div class=\"spec--attribute\">Platform size (stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 498
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pss_ansi_metric_"] ?? null), 498, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 500
        echo "\t                        ";
        if (($context["attribute_pss_ce_metric_"] ?? null)) {
            // line 501
            echo "\t                        \t<div class=\"spec--attribute\">Platform size (stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 502
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pss_ce_metric_"] ?? null), 502, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 504
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 506
        if (($context["attribute_platform_size_extended"] ?? null)) {
            // line 507
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform size (extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 508
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_size_extended"] ?? null), 508, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 510
        echo "\t                        ";
        if (($context["attribute_pse_ansi_metric_"] ?? null)) {
            // line 511
            echo "\t                        \t<div class=\"spec--attribute\">Platform size (extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 512
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pse_ansi_metric_"] ?? null), 512, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 514
        echo "\t                        ";
        if (($context["attribute_pse_ce_metric_"] ?? null)) {
            // line 515
            echo "\t                        \t<div class=\"spec--attribute\">Platform size (extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 516
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pse_ce_metric_"] ?? null), 516, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 518
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 520
        if (($context["attribute_deck_extension_length"] ?? null)) {
            // line 521
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Deck extension length</div>
\t\t                        <div class=\"spec--value\">";
            // line 522
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_deck_extension_length"] ?? null), 522, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 524
        echo "\t                        ";
        if (($context["attribute_del_ansi_metric_"] ?? null)) {
            // line 525
            echo "\t                        \t<div class=\"spec--attribute\">Deck extension length</div>
\t\t                        <div class=\"spec--value\">";
            // line 526
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_del_ansi_metric_"] ?? null), 526, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 528
        echo "\t                        ";
        if (($context["attribute_del_ce_metric_"] ?? null)) {
            // line 529
            echo "\t                        \t<div class=\"spec--attribute\">Deck extension length</div>
\t\t                        <div class=\"spec--value\">";
            // line 530
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_del_ce_metric_"] ?? null), 530, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 532
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 534
        if (($context["attribute_deck_extension"] ?? null)) {
            // line 535
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Deck extension</div>
\t\t                        <div class=\"spec--value\">";
            // line 536
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_deck_extension"] ?? null), 536, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 538
        echo "\t                        ";
        if (($context["attribute_de_ansi_metric_"] ?? null)) {
            // line 539
            echo "\t                        \t<div class=\"spec--attribute\">Deck extension</div>
\t\t                        <div class=\"spec--value\">";
            // line 540
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_de_ansi_metric_"] ?? null), 540, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 542
        echo "\t                        ";
        if (($context["attribute_de_ce_metric_"] ?? null)) {
            // line 543
            echo "\t                        \t<div class=\"spec--attribute\">Deck extension</div>
\t\t                        <div class=\"spec--value\">";
            // line 544
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_de_ce_metric_"] ?? null), 544, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 546
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 548
        if (($context["attribute_overall_length"] ?? null)) {
            // line 549
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Overall length</div>
\t\t                        <div class=\"spec--value\">";
            // line 550
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_overall_length"] ?? null), 550, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 552
        echo "\t                        ";
        if (($context["attribute_overall_length_ansi_me"] ?? null)) {
            // line 553
            echo "\t                        \t<div class=\"spec--attribute\">Overall length </div>
\t\t                        <div class=\"spec--value\">";
            // line 554
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_overall_length_ansi_me"] ?? null), 554, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 556
        echo "\t                        ";
        if (($context["attribute_overall_length_ce_metr"] ?? null)) {
            // line 557
            echo "\t                        \t<div class=\"spec--attribute\">Overall length </div>
\t\t                        <div class=\"spec--value\">";
            // line 558
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_overall_length_ce_metr"] ?? null), 558, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 560
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 562
        if (($context["attribute_overall_length_with_st"] ?? null)) {
            // line 563
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Overall length (with step)</div>
\t\t                        <div class=\"spec--value\">";
            // line 564
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_overall_length_with_st"] ?? null), 564, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 566
        echo "\t                        ";
        if (($context["attribute_olws_ansi_metric_"] ?? null)) {
            // line 567
            echo "\t                        \t<div class=\"spec--attribute\">Overall length (with step)</div>
\t\t                        <div class=\"spec--value\">";
            // line 568
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_olws_ansi_metric_"] ?? null), 568, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 570
        echo "\t                        ";
        if (($context["attribute_olws_ce_metric_"] ?? null)) {
            // line 571
            echo "\t                        \t<div class=\"spec--attribute\">Overall length (with step)</div>
\t\t                        <div class=\"spec--value\">";
            // line 572
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_olws_ce_metric_"] ?? null), 572, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 574
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 576
        if (($context["attribute_overall_length_without"] ?? null)) {
            // line 577
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Overall length (without step)</div>
\t\t                        <div class=\"spec--value\">";
            // line 578
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_overall_length_without"] ?? null), 578, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 580
        echo "\t                        ";
        if (($context["attribute_olwos_ansi_metric_"] ?? null)) {
            // line 581
            echo "\t                        \t<div class=\"spec--attribute\">Overall length (without step)</div>
\t\t                        <div class=\"spec--value\">";
            // line 582
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_olwos_ansi_metric_"] ?? null), 582, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 584
        echo "\t                        ";
        if (($context["attribute_olwos_ce_metric_"] ?? null)) {
            // line 585
            echo "\t                        \t<div class=\"spec--attribute\">Overall length (without step)</div>
\t\t                        <div class=\"spec--value\">";
            // line 586
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_olwos_ce_metric_"] ?? null), 586, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 588
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 590
        if (($context["attribute_overall_olwoo"] ?? null)) {
            // line 591
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Overall length (without outriggers)</div>
\t\t                        <div class=\"spec--value\">";
            // line 592
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_olwoo"] ?? null), 592, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 594
        echo "\t                        ";
        if (($context["attribute_olwoo_ansi_metric_"] ?? null)) {
            // line 595
            echo "\t                        \t<div class=\"spec--attribute\">Overall length (without outriggers)</div>
\t\t                        <div class=\"spec--value\">";
            // line 596
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_olwoo_ansi_metric_"] ?? null), 596, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 598
        echo "\t                        ";
        if (($context["attribute_olwoo_ce_metric_"] ?? null)) {
            // line 599
            echo "\t                        \t<div class=\"spec--attribute\">Overall length (without outriggers)</div>
\t\t                        <div class=\"spec--value\">";
            // line 600
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_olwoo_ce_metric_"] ?? null), 600, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 602
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 604
        if (($context["attribute_overall_olwo"] ?? null)) {
            // line 605
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Overall length (with outriggers)</div>
\t\t                        <div class=\"spec--value\">";
            // line 606
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_olwo"] ?? null), 606, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 608
        echo "\t                        ";
        if (($context["attribute_olwo_ansi_metric_"] ?? null)) {
            // line 609
            echo "\t                        \t<div class=\"spec--attribute\">Overall length (with outriggers)</div>
\t\t                        <div class=\"spec--value\">";
            // line 610
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_olwo_ansi_metric_"] ?? null), 610, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 612
        echo "\t                        ";
        if (($context["attribute_olwo_ce_metric_"] ?? null)) {
            // line 613
            echo "\t                        \t<div class=\"spec--attribute\">Overall length (with outriggers)</div>
\t\t                        <div class=\"spec--value\">";
            // line 614
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_olwo_ce_metric_"] ?? null), 614, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 616
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 618
        if (($context["attribute_overall_width"] ?? null)) {
            // line 619
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Overall width</div>
\t\t                        <div class=\"spec--value\">";
            // line 620
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_overall_width"] ?? null), 620, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 622
        echo "\t                        ";
        if (($context["attribute_overall_width_ansi_met"] ?? null)) {
            // line 623
            echo "\t                        \t<div class=\"spec--attribute\">Overall width</div>
\t\t                        <div class=\"spec--value\">";
            // line 624
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_overall_width_ansi_met"] ?? null), 624, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 626
        echo "\t                        ";
        if (($context["attribute_overall_width_ce_metri"] ?? null)) {
            // line 627
            echo "\t                        \t<div class=\"spec--attribute\">Overall width</div>
\t\t                        <div class=\"spec--value\">";
            // line 628
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_overall_width_ce_metri"] ?? null), 628, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 630
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 632
        if (($context["attribute_overall_width_extended"] ?? null)) {
            // line 633
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Overall width (extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 634
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_overall_width_extended"] ?? null), 634, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 636
        echo "\t                        ";
        if (($context["attribute_owe_ansi_metric_"] ?? null)) {
            // line 637
            echo "\t                        \t<div class=\"spec--attribute\">Overall width (extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 638
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_owe_ansi_metric_"] ?? null), 638, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 640
        echo "\t                        ";
        if (($context["attribute_owe_ce_metric_"] ?? null)) {
            // line 641
            echo "\t                        \t<div class=\"spec--attribute\">Overall width (extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 642
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_owe_ce_metric_"] ?? null), 642, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 644
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 646
        if (($context["attribute_owae"] ?? null)) {
            // line 647
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Operational width (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 648
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_owae"] ?? null), 648, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 650
        echo "\t                        ";
        if (($context["attribute_owae_ansi_metric"] ?? null)) {
            // line 651
            echo "\t                        \t<div class=\"spec--attribute\">Operational width (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 652
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_owae_ansi_metric"] ?? null), 652, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 654
        echo "\t                        ";
        if (($context["attribute_owae_ce_metric"] ?? null)) {
            // line 655
            echo "\t                        \t<div class=\"spec--attribute\">Operational width (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 656
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_owae_ce_metric"] ?? null), 656, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 658
        echo "                        </div>
\t\t\t\t\t\t";
        // line 659
        if (((($context["attribute_transport_width"] ?? null) || ($context["attribute_tr_ansi_metric_"] ?? null)) || ($context["attribute_tr_ce_metric_"] ?? null))) {
            // line 660
            echo "\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t<div class=\"spec--attribute\">Transport Width</div>
\t\t\t\t\t\t\t<div class=\"spec--value\">
\t\t\t\t\t\t\t\t";
            // line 663
            if (($context["attribute_transport_width"] ?? null)) {
                // line 664
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_transport_width"] ?? null), 664, $this->source), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 666
            echo "\t\t\t\t\t\t\t\t";
            if (($context["attribute_tr_ansi_metric_"] ?? null)) {
                // line 667
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tr_ansi_metric_"] ?? null), 667, $this->source), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 669
            echo "\t\t\t\t\t\t\t\t";
            if (($context["attribute_tr_ce_metric_"] ?? null)) {
                // line 670
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tr_ce_metric_"] ?? null), 670, $this->source), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 672
            echo "\t\t\t\t\t\t\t</div>
                        </div>
\t\t\t\t\t\t";
        }
        // line 675
        echo "
\t\t\t\t\t\t";
        // line 676
        if (((($context["attribute_transport_length"] ?? null) || ($context["attribute_tlength_ansi_metric_"] ?? null)) || ($context["attribute_tlength_ce_metric_"] ?? null))) {
            // line 677
            echo "\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t<div class=\"spec--attribute\">Transport Length</div>
\t\t\t\t\t\t\t<div class=\"spec--value\">
\t\t\t\t\t\t\t\t";
            // line 680
            if (($context["attribute_transport_length"] ?? null)) {
                // line 681
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_transport_length"] ?? null), 681, $this->source), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 683
            echo "\t\t\t\t\t\t\t\t";
            if (($context["attribute_tlength_ansi_metric_"] ?? null)) {
                // line 684
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tlength_ansi_metric_"] ?? null), 684, $this->source), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 686
            echo "\t\t\t\t\t\t\t\t";
            if (($context["attribute_tlength_ce_metric_"] ?? null)) {
                // line 687
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tlength_ce_metric_"] ?? null), 687, $this->source), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 689
            echo "\t\t\t\t\t\t\t</div>
                        </div>
\t\t\t\t\t\t";
        }
        // line 692
        echo "
\t\t\t\t\t\t";
        // line 693
        if (((($context["attribute_transport_height"] ?? null) || ($context["attribute_theight_ansi_metric_"] ?? null)) || ($context["attribute_theight_ce_metric_"] ?? null))) {
            // line 694
            echo "\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t<div class=\"spec--attribute\">Transport Height</div>
\t\t\t\t\t\t\t<div class=\"spec--value\">
\t\t\t\t\t\t\t\t";
            // line 697
            if (($context["attribute_transport_height"] ?? null)) {
                // line 698
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_transport_height"] ?? null), 698, $this->source), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 700
            echo "\t\t\t\t\t\t\t\t";
            if (($context["attribute_theight_ansi_metric_"] ?? null)) {
                // line 701
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_theight_ansi_metric_"] ?? null), 701, $this->source), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 703
            echo "\t\t\t\t\t\t\t\t";
            if (($context["attribute_theight_ce_metric_"] ?? null)) {
                // line 704
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_theight_ce_metric_"] ?? null), 704, $this->source), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 706
            echo "\t\t\t\t\t\t\t</div>
                        </div>
\t\t\t\t\t\t";
        }
        // line 709
        echo "
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 711
        if (($context["attribute_min_height_guardrails_"] ?? null)) {
            // line 712
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Min. height (guardrails folded)</div>
\t\t                        <div class=\"spec--value\">";
            // line 713
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_min_height_guardrails_"] ?? null), 713, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 715
        echo "\t                        ";
        if (($context["attribute_mhgf_ansi_metric_"] ?? null)) {
            // line 716
            echo "\t                        \t<div class=\"spec--attribute\">Min. height (guardrails folded)</div>
\t\t                        <div class=\"spec--value\">";
            // line 717
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mhgf_ansi_metric_"] ?? null), 717, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 719
        echo "\t                        ";
        if (($context["attribute_mhgf_ce_metric_"] ?? null)) {
            // line 720
            echo "\t                        \t<div class=\"spec--attribute\">Min. height (guardrails folded)</div>
\t\t                        <div class=\"spec--value\">";
            // line 721
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mhgf_ce_metric_"] ?? null), 721, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 723
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 725
        if (($context["attribute_platform_size_outside_"] ?? null)) {
            // line 726
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform size (outside)</div>
\t\t                        <div class=\"spec--value\">";
            // line 727
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_size_outside_"] ?? null), 727, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 729
        echo "\t                        ";
        if (($context["attribute_pso_ansi_metric"] ?? null)) {
            // line 730
            echo "\t                        \t<div class=\"spec--attribute\">Platform size (outside)</div>
\t\t                        <div class=\"spec--value\">";
            // line 731
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pso_ansi_metric"] ?? null), 731, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 733
        echo "\t                        ";
        if (($context["attribute_pso_ce_metric"] ?? null)) {
            // line 734
            echo "\t                        \t<div class=\"spec--attribute\">Platform size (outside)</div>
\t\t                        <div class=\"spec--value\">";
            // line 735
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pso_ce_metric"] ?? null), 735, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 737
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 739
        if (($context["attribute_stowed_height"] ?? null)) {
            // line 740
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Stowed height</div>
\t\t                        <div class=\"spec--value\">";
            // line 741
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_stowed_height"] ?? null), 741, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 743
        echo "\t                        ";
        if (($context["attribute_stowed_height_ansi_met"] ?? null)) {
            // line 744
            echo "\t                        \t<div class=\"spec--attribute\">Stowed height</div>
\t\t                        <div class=\"spec--value\">";
            // line 745
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_stowed_height_ansi_met"] ?? null), 745, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 747
        echo "\t                        ";
        if (($context["attribute_stowed_height_ce_metri"] ?? null)) {
            // line 748
            echo "\t                        \t<div class=\"spec--attribute\">Stowed height</div>
\t\t                        <div class=\"spec--value\">";
            // line 749
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_stowed_height_ce_metri"] ?? null), 749, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 751
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 753
        if (($context["attribute_axle_ground_clearance"] ?? null)) {
            // line 754
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Axle ground clearance</div>
\t\t                        <div class=\"spec--value\">";
            // line 755
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_axle_ground_clearance"] ?? null), 755, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 757
        echo "\t                        ";
        if (($context["attribute_agc_ansi_metric_"] ?? null)) {
            // line 758
            echo "\t                        \t<div class=\"spec--attribute\">Axle ground clearance</div>
\t\t                        <div class=\"spec--value\">";
            // line 759
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_agc_ansi_metric_"] ?? null), 759, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 761
        echo "\t                        ";
        if (($context["attribute_agc_ce_metric_"] ?? null)) {
            // line 762
            echo "\t                        \t<div class=\"spec--attribute\">Axle ground clearance</div>
\t\t                        <div class=\"spec--value\">";
            // line 763
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_agc_ce_metric_"] ?? null), 763, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 765
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 767
        if (($context["attribute_chassis_ground_clearan"] ?? null)) {
            // line 768
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Chassis ground clearance</div>
\t\t                        <div class=\"spec--value\">";
            // line 769
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_min_height_guardrails_"] ?? null), 769, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 771
        echo "\t                        ";
        if (($context["attribute_cgc_ansi_metric_"] ?? null)) {
            // line 772
            echo "\t                        \t<div class=\"spec--attribute\">Chassis ground clearance</div>
\t\t                        <div class=\"spec--value\">";
            // line 773
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_cgc_ansi_metric_"] ?? null), 773, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 775
        echo "\t                        ";
        if (($context["attribute_cgc_ce_metric_"] ?? null)) {
            // line 776
            echo "\t                        \t<div class=\"spec--attribute\">Chassis ground clearance</div>
\t\t                        <div class=\"spec--value\">";
            // line 777
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_cgc_ce_metric_"] ?? null), 777, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 779
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 781
        if (($context["attribute_ground_clearance"] ?? null)) {
            // line 782
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Ground clearance</div>
\t\t                        <div class=\"spec--value\">";
            // line 783
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ground_clearance"] ?? null), 783, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 785
        echo "\t                        ";
        if (($context["attribute_gc_ansi_metric_"] ?? null)) {
            // line 786
            echo "\t                        \t<div class=\"spec--attribute\">Ground clearance</div>
\t\t                        <div class=\"spec--value\">";
            // line 787
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gc_ansi_metric_"] ?? null), 787, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 789
        echo "\t                        ";
        if (($context["attribute_gc_ce_metric_"] ?? null)) {
            // line 790
            echo "\t                        \t<div class=\"spec--attribute\">Ground clearance</div>
\t\t                        <div class=\"spec--value\">";
            // line 791
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gc_ce_metric_"] ?? null), 791, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 793
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 795
        if (($context["attribute_ground_clearance_stowe"] ?? null)) {
            // line 796
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Ground clearance (stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 797
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ground_clearance_stowe"] ?? null), 797, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 799
        echo "\t                        ";
        if (($context["attribute_gcs_ansi_metric_"] ?? null)) {
            // line 800
            echo "\t                        \t<div class=\"spec--attribute\">Ground clearance (stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 801
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gcs_ansi_metric_"] ?? null), 801, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 803
        echo "\t                        ";
        if (($context["attribute_gcs_ce_metric_"] ?? null)) {
            // line 804
            echo "\t                        \t<div class=\"spec--attribute\">Ground clearance (stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 805
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gcs_ce_metric_"] ?? null), 805, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 807
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 809
        if (($context["attribute_ground_clearance_eleva"] ?? null)) {
            // line 810
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Ground clearance (elevated)</div>
\t\t                        <div class=\"spec--value\">";
            // line 811
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ground_clearance_eleva"] ?? null), 811, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 813
        echo "\t                        ";
        if (($context["attribute_gce_ansi_metric_"] ?? null)) {
            // line 814
            echo "\t                        \t<div class=\"spec--attribute\">Ground clearance (elevated)</div>
\t\t                        <div class=\"spec--value\">";
            // line 815
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gce_ansi_metric_"] ?? null), 815, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 817
        echo "\t                        ";
        if (($context["attribute_gce_ce_metric_"] ?? null)) {
            // line 818
            echo "\t                        \t<div class=\"spec--attribute\">Ground clearance (elevated)</div>
\t\t                        <div class=\"spec--value\">";
            // line 819
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gce_ce_metric_"] ?? null), 819, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 821
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 823
        if (($context["attribute_hydraulic_flow_per_min"] ?? null)) {
            // line 824
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Hydraulic flow (per minute)</div>
\t\t                        <div class=\"spec--value\">";
            // line 825
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hydraulic_flow_per_min"] ?? null), 825, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 827
        echo "\t                        ";
        if (($context["attribute_hfpm_ansi_metric_"] ?? null)) {
            // line 828
            echo "\t                        \t<div class=\"spec--attribute\">Hydraulic flow (per minute)</div>
\t\t                        <div class=\"spec--value\">";
            // line 829
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hfpm_ansi_metric_"] ?? null), 829, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 831
        echo "\t                        ";
        if (($context["attribute_hfpm_ce_metric_"] ?? null)) {
            // line 832
            echo "\t                        \t<div class=\"spec--attribute\">Hydraulic flow (per minute)</div>
\t\t                        <div class=\"spec--value\">";
            // line 833
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hfpm_ce_metric_"] ?? null), 833, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 835
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 837
        if (($context["attribute_hydraulic_pressure"] ?? null)) {
            // line 838
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Hydraulic pressure</div>
\t\t                        <div class=\"spec--value\">";
            // line 839
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hydraulic_pressure"] ?? null), 839, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 841
        echo "\t                        ";
        if (($context["attribute_hydp_ansi_metric_"] ?? null)) {
            // line 842
            echo "\t                        \t<div class=\"spec--attribute\">Hydraulic pressure</div>
\t\t                        <div class=\"spec--value\">";
            // line 843
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hydp_ansi_metric_"] ?? null), 843, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 845
        echo "\t                        ";
        if (($context["attribute_hydp_ce_metric_"] ?? null)) {
            // line 846
            echo "\t                        \t<div class=\"spec--attribute\">Hydraulic pressure</div>
\t\t                        <div class=\"spec--value\">";
            // line 847
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hydp_ce_metric_"] ?? null), 847, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 849
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 851
        if (($context["attribute_hydraulic_oil_capacity"] ?? null)) {
            // line 852
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Hydraulic oil capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 853
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hydraulic_oil_capacity"] ?? null), 853, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 855
        echo "\t                        ";
        if (($context["attribute_hoc_ansi_metric_"] ?? null)) {
            // line 856
            echo "\t                        \t<div class=\"spec--attribute\">Hydraulic oil capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 857
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hoc_ansi_metric_"] ?? null), 857, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 859
        echo "\t                        ";
        if (($context["attribute_hoc_ce_metric_"] ?? null)) {
            // line 860
            echo "\t                        \t<div class=\"spec--attribute\">Hydraulic oil capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 861
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hoc_ce_metric_"] ?? null), 861, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 863
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 865
        if (($context["attribute_fuel_capacity"] ?? null)) {
            // line 866
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Fuel capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 867
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fuel_capacity"] ?? null), 867, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 869
        echo "\t                        ";
        if (($context["attribute_fc_ansi_metric_"] ?? null)) {
            // line 870
            echo "\t                        \t<div class=\"spec--attribute\">Fuel capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 871
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fc_ansi_metric_"] ?? null), 871, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 873
        echo "\t                        ";
        if (($context["attribute_fc_ce_metric_"] ?? null)) {
            // line 874
            echo "\t                        \t<div class=\"spec--attribute\">Fuel capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 875
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_fc_ce_metric_"] ?? null), 875, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 877
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 879
        if (($context["attribute_max_load_capacity_14_i"] ?? null)) {
            // line 880
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. load capacity (14 in. load center)</div>
\t\t                        <div class=\"spec--value\">";
            // line 881
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_load_capacity_14_i"] ?? null), 881, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 883
        echo "\t                        ";
        if (($context["attribute_mlc14_ansi_metric_"] ?? null)) {
            // line 884
            echo "\t                        \t<div class=\"spec--attribute\">Max. load capacity (0.36m load center)</div>
\t\t                        <div class=\"spec--value\">";
            // line 885
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc14_ansi_metric_"] ?? null), 885, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 887
        echo "\t                        ";
        if (($context["attribute_mlc14_ce_metric_"] ?? null)) {
            // line 888
            echo "\t                        \t<div class=\"spec--attribute\">Max. load capacity (0.36m load center)</div>
\t\t                        <div class=\"spec--value\">";
            // line 889
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc14_ce_metric_"] ?? null), 889, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 891
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 893
        if (($context["attribute_max_load_capacity_24_i"] ?? null)) {
            // line 894
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. load capacity (24 in. load center)</div>
\t\t                        <div class=\"spec--value\">";
            // line 895
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_load_capacity_24_i"] ?? null), 895, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 897
        echo "\t                        ";
        if (($context["attribute_mlc24_ansi_metric_"] ?? null)) {
            // line 898
            echo "\t                        \t<div class=\"spec--attribute\">Max. load capacity (0.61m load center)</div>
\t\t                        <div class=\"spec--value\">";
            // line 899
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc24_ansi_metric_"] ?? null), 899, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 901
        echo "\t                        ";
        if (($context["attribute_mlc24_ce_metric_"] ?? null)) {
            // line 902
            echo "\t                        \t<div class=\"spec--attribute\">Max. load capacity (0.61m load center)</div>
\t\t                        <div class=\"spec--value\">";
            // line 903
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc24_ce_metric_"] ?? null), 903, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 905
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 907
        if (($context["attribute_max_load_capacity_42_i"] ?? null)) {
            // line 908
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. load capacity (42 in. load center)</div>
\t\t                        <div class=\"spec--value\">";
            // line 909
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_load_capacity_42_i"] ?? null), 909, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 911
        echo "\t                        ";
        if (($context["attribute_mlc42_ansi_metric_"] ?? null)) {
            // line 912
            echo "\t                        \t<div class=\"spec--attribute\">Max. load capacity (1.07m load center)</div>
\t\t                        <div class=\"spec--value\">";
            // line 913
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc42_ansi_metric_"] ?? null), 913, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 915
        echo "\t                        ";
        if (($context["attribute_mlc42_ce_metric_"] ?? null)) {
            // line 916
            echo "\t                        \t<div class=\"spec--attribute\">Max. load capacity (1.07m load center)</div>
\t\t                        <div class=\"spec--value\">";
            // line 917
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc42_ce_metric_"] ?? null), 917, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 919
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 921
        if (($context["attribute_min_load_height"] ?? null)) {
            // line 922
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Min. load height</div>
\t\t                        <div class=\"spec--value\">";
            // line 923
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_min_load_height"] ?? null), 923, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 925
        echo "\t                        ";
        if (($context["attribute_mloadh_ansi_metric_"] ?? null)) {
            // line 926
            echo "\t                        \t<div class=\"spec--attribute\">Min. load height</div>
\t\t                        <div class=\"spec--value\">";
            // line 927
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mloadh_ansi_metric_"] ?? null), 927, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 929
        echo "\t                        ";
        if (($context["attribute_mloadh_ce_metric_"] ?? null)) {
            // line 930
            echo "\t                        \t<div class=\"spec--attribute\">Min. load height</div>
\t\t                        <div class=\"spec--value\">";
            // line 931
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mloadh_ce_metric_"] ?? null), 931, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 933
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 935
        if (($context["attribute_winch_high_speed_"] ?? null)) {
            // line 936
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Winch (high speed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 937
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_winch_high_speed_"] ?? null), 937, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 939
        echo "\t                        ";
        if (($context["attribute_whs_ansi_metric_"] ?? null)) {
            // line 940
            echo "\t                        \t<div class=\"spec--attribute\">Winch (high speed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 941
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_whs_ansi_metric_"] ?? null), 941, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 943
        echo "\t                        ";
        if (($context["attribute_whs_ce_metric_"] ?? null)) {
            // line 944
            echo "\t                        \t<div class=\"spec--attribute\">Winch (high speed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 945
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_whs_ce_metric_"] ?? null), 945, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 947
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 949
        if (($context["attribute_winch_low_speed_"] ?? null)) {
            // line 950
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Winch (low speed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 951
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_winch_low_speed_"] ?? null), 951, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 953
        echo "\t                        ";
        if (($context["attribute_wls_ansi_metric_"] ?? null)) {
            // line 954
            echo "\t                        \t<div class=\"spec--attribute\">Winch (low speed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 955
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wls_ansi_metric_"] ?? null), 955, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 957
        echo "\t                        ";
        if (($context["attribute_wls_ce_metric_"] ?? null)) {
            // line 958
            echo "\t                        \t<div class=\"spec--attribute\">Winch (low speed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 959
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wls_ce_metric_"] ?? null), 959, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 961
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 963
        if (($context["attribute_platform_capacity_swl_"] ?? null)) {
            // line 964
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform capacity (SWL)</div>
\t\t                        <div class=\"spec--value\">";
            // line 965
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_capacity_swl_"] ?? null), 965, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 967
        echo "\t                        ";
        if (($context["attribute_power_capacity_ansi_me"] ?? null)) {
            // line 968
            echo "\t                        \t<div class=\"spec--attribute\">Platform capacity (SWL)</div>
\t\t                        <div class=\"spec--value\">";
            // line 969
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_power_capacity_ansi_me"] ?? null), 969, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 971
        echo "\t                        ";
        if (($context["attribute_power_capacity_ce_metr"] ?? null)) {
            // line 972
            echo "\t                        \t<div class=\"spec--attribute\">Platform capacity (SWL)</div>
\t\t                        <div class=\"spec--value\">";
            // line 973
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_power_capacity_ce_metr"] ?? null), 973, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 975
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 977
        if (($context["attribute_platform_capacity_unre"] ?? null)) {
            // line 978
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform capacity - unrestricted</div>
\t\t                        <div class=\"spec--value\">";
            // line 979
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_capacity_unre"] ?? null), 979, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 981
        echo "\t                        ";
        if (($context["attribute_pcu_ansi_metric_"] ?? null)) {
            // line 982
            echo "\t                        \t<div class=\"spec--attribute\">Platform capacity - unrestricted</div>
\t\t                        <div class=\"spec--value\">";
            // line 983
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pcu_ansi_metric_"] ?? null), 983, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 985
        echo "\t                        ";
        if (($context["attribute_pcu_ce_metric_"] ?? null)) {
            // line 986
            echo "\t                        \t<div class=\"spec--attribute\">Platform capacity - unrestricted</div>
\t\t                        <div class=\"spec--value\">";
            // line 987
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pcu_ce_metric_"] ?? null), 987, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 989
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 991
        if (($context["attribute_platform_capacity_rest"] ?? null)) {
            // line 992
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform capacity - restricted</div>
\t\t                        <div class=\"spec--value\">";
            // line 993
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_capacity_rest"] ?? null), 993, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 995
        echo "\t                        ";
        if (($context["attribute_pcr_ansi_metric_"] ?? null)) {
            // line 996
            echo "\t                        \t<div class=\"spec--attribute\">Platform capacity - restricted</div>
\t\t                        <div class=\"spec--value\">";
            // line 997
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pcr_ansi_metric_"] ?? null), 997, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 999
        echo "\t                        ";
        if (($context["attribute_pcr_ce_metric_"] ?? null)) {
            // line 1000
            echo "\t                        \t<div class=\"spec--attribute\">Platform capacity - restricted</div>
\t\t                        <div class=\"spec--value\">";
            // line 1001
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pcr_ce_metric_"] ?? null), 1001, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1003
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1005
        if (($context["attribute_max_drive_height"] ?? null)) {
            // line 1006
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. drive height</div>
\t\t                        <div class=\"spec--value\">";
            // line 1007
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_drive_height"] ?? null), 1007, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1009
        echo "\t                        ";
        if (($context["attribute_mdriveh_ansi_metric_"] ?? null)) {
            // line 1010
            echo "\t                        \t<div class=\"spec--attribute\">Max. drive height</div>
\t\t                        <div class=\"spec--value\">";
            // line 1011
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mdriveh_ansi_metric_"] ?? null), 1011, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1013
        echo "\t                        ";
        if (($context["attribute_mdriveh_ce_metric_"] ?? null)) {
            // line 1014
            echo "\t                        \t<div class=\"spec--attribute\">Max. drive height</div>
\t\t                        <div class=\"spec--value\">";
            // line 1015
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mdriveh_ce_metric_"] ?? null), 1015, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1017
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1019
        if (($context["attribute_max_wind_speed"] ?? null)) {
            // line 1020
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. wind speed</div>
\t\t                        <div class=\"spec--value\">";
            // line 1021
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_wind_speed"] ?? null), 1021, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1023
        echo "\t                        ";
        if (($context["attribute_max_wind_speed_ansi_me"] ?? null)) {
            // line 1024
            echo "\t                        \t<div class=\"spec--attribute\">Max. wind speed</div>
\t\t                        <div class=\"spec--value\">";
            // line 1025
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_wind_speed_ansi_me"] ?? null), 1025, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1027
        echo "\t                        ";
        if (($context["attribute_max_wind_speed_ce_metr"] ?? null)) {
            // line 1028
            echo "\t                        \t<div class=\"spec--attribute\">Max. wind speed</div>
\t\t                        <div class=\"spec--value\">";
            // line 1029
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_wind_speed_ce_metr"] ?? null), 1029, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1031
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1033
        if (($context["attribute_max_drive_speed_elevat"] ?? null)) {
            // line 1034
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. drive speed (elevated)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1035
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_drive_speed_elevat"] ?? null), 1035, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1037
        echo "\t                        ";
        if (($context["attribute_mdse_ansi_metric_"] ?? null)) {
            // line 1038
            echo "\t                        \t<div class=\"spec--attribute\">Max. drive speed (elevated)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1039
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mdse_ansi_metric_"] ?? null), 1039, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1041
        echo "\t                        ";
        if (($context["attribute_mdse_ce_metric_"] ?? null)) {
            // line 1042
            echo "\t                        \t<div class=\"spec--attribute\">Max. drive speed (elevated)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1043
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mdse_ce_metric_"] ?? null), 1043, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1045
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1047
        if (($context["attribute_max_drive_speed_stowed"] ?? null)) {
            // line 1048
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. drive speed (stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1049
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_drive_speed_stowed"] ?? null), 1049, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1051
        echo "\t                        ";
        if (($context["attribute_mdss_ansi_metric_"] ?? null)) {
            // line 1052
            echo "\t                        \t<div class=\"spec--attribute\">Max. drive speed (stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1053
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mdss_ansi_metric_"] ?? null), 1053, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1055
        echo "\t                        ";
        if (($context["attribute_mdss_ce_metric_"] ?? null)) {
            // line 1056
            echo "\t                        \t<div class=\"spec--attribute\">Max. drive speed (stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1057
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mdss_ce_metric_"] ?? null), 1057, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1059
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1061
        if (($context["attribute_raise_lower_time"] ?? null)) {
            // line 1062
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Raise / lower time</div>
\t\t                        <div class=\"spec--value\">";
            // line 1063
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_raise_lower_time"] ?? null), 1063, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1065
        echo "\t                        ";
        if (($context["attribute_raise_time_ansi_metric"] ?? null)) {
            // line 1066
            echo "\t                        \t<div class=\"spec--attribute\">Raise / lower time</div>
\t\t                        <div class=\"spec--value\">";
            // line 1067
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_raise_time_ansi_metric"] ?? null), 1067, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1069
        echo "\t                        ";
        if (($context["attribute_raise_time_ce_metric"] ?? null)) {
            // line 1070
            echo "\t                        \t<div class=\"spec--attribute\">Raise / lower time</div>
\t\t                        <div class=\"spec--value\">";
            // line 1071
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_raise_time_ce_metric"] ?? null), 1071, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1073
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1075
        if (($context["attribute_gradeability"] ?? null)) {
            // line 1076
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Gradeability</div>
\t\t                        <div class=\"spec--value\">";
            // line 1077
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gradeability"] ?? null), 1077, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1079
        echo "\t                        ";
        if (($context["attribute_g_ansi_metric_"] ?? null)) {
            // line 1080
            echo "\t                        \t<div class=\"spec--attribute\">Gradeability</div>
\t\t                        <div class=\"spec--value\">";
            // line 1081
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_g_ansi_metric_"] ?? null), 1081, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1083
        echo "\t                        ";
        if (($context["attribute_gradeability_ce_metric"] ?? null)) {
            // line 1084
            echo "\t                        \t<div class=\"spec--attribute\">Gradeability</div>
\t\t                        <div class=\"spec--value\">";
            // line 1085
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gradeability_ce_metric"] ?? null), 1085, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1087
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1089
        if (($context["attribute_gradeability_engine_"] ?? null)) {
            // line 1090
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Gradeability (engine)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1091
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gradeability_engine_"] ?? null), 1091, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1093
        echo "\t                        ";
        if (($context["attribute_ge_ansi_metric_"] ?? null)) {
            // line 1094
            echo "\t                        \t<div class=\"spec--attribute\">Gradeability (engine)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1095
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ge_ansi_metric_"] ?? null), 1095, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1097
        echo "\t                        ";
        if (($context["attribute_ge_ce_metric_"] ?? null)) {
            // line 1098
            echo "\t                        \t<div class=\"spec--attribute\">Gradeability (engine)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1099
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ge_ce_metric_"] ?? null), 1099, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1101
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1103
        if (($context["attribute_gradeability_batteries"] ?? null)) {
            // line 1104
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Gradeability (batteries)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1105
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gradeability_batteries"] ?? null), 1105, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1107
        echo "\t                        ";
        if (($context["attribute_gb_ansi_metric_"] ?? null)) {
            // line 1108
            echo "\t                        \t<div class=\"spec--attribute\">Gradeability (batteries)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1109
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gb_ansi_metric_"] ?? null), 1109, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1111
        echo "\t                        ";
        if (($context["attribute_gb_ce_metric_"] ?? null)) {
            // line 1112
            echo "\t                        \t<div class=\"spec--attribute\">Gradeability (batteries)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1113
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_gb_ce_metric_"] ?? null), 1113, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1115
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1117
        if (($context["attribute_max_stabilizer_levelin"] ?? null)) {
            // line 1118
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. stabilizer leveling (front to rear)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1119
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_stabilizer_levelin"] ?? null), 1119, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1121
        echo "\t                        ";
        if (($context["attribute_mslftr_ansi_metric_"] ?? null)) {
            // line 1122
            echo "\t                        \t<div class=\"spec--attribute\">Max. stabilizer leveling (front to rear)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1123
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mslftr_ansi_metric_"] ?? null), 1123, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1125
        echo "\t                        ";
        if (($context["attribute_mslftr_ce_metric_"] ?? null)) {
            // line 1126
            echo "\t                        \t<div class=\"spec--attribute\">Max. stabilizer leveling (front to rear)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1127
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mslftr_ce_metric_"] ?? null), 1127, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1129
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1131
        if (($context["attribute_max_levelling_side_to_"] ?? null)) {
            // line 1132
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. stabilizer leveling (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1133
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_levelling_side_to_"] ?? null), 1133, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1135
        echo "\t                        ";
        if (($context["attribute_mslsts_ansi_metric_"] ?? null)) {
            // line 1136
            echo "\t                        \t<div class=\"spec--attribute\">Max. stabilizer leveling (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1137
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mslsts_ansi_metric_"] ?? null), 1137, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1139
        echo "\t                        ";
        if (($context["attribute_mslsts_ce_metric_"] ?? null)) {
            // line 1140
            echo "\t                        \t<div class=\"spec--attribute\">Max. stabilizer leveling (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1141
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mslsts_ce_metric_"] ?? null), 1141, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1143
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1145
        if (($context["attribute_max_leveling_front_to_"] ?? null)) {
            // line 1146
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. leveling (front to rear)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1147
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_leveling_front_to_"] ?? null), 1147, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1149
        echo "\t                        ";
        if (($context["attribute_mlrtr_ansi_metric_"] ?? null)) {
            // line 1150
            echo "\t                        \t<div class=\"spec--attribute\">Max. leveling (front to rear)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1151
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlrtr_ansi_metric_"] ?? null), 1151, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1153
        echo "\t                        ";
        if (($context["attribute_mlrtr_ce_metric_"] ?? null)) {
            // line 1154
            echo "\t                        \t<div class=\"spec--attribute\">Max. leveling (front to rear)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1155
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlrtr_ce_metric_"] ?? null), 1155, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1157
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1159
        if (($context["attribute_max_leveling_side_to_s"] ?? null)) {
            // line 1160
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. leveling (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1161
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_leveling_side_to_s"] ?? null), 1161, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1163
        echo "\t                        ";
        if (($context["attribute_mlsts_ansi_metric_"] ?? null)) {
            // line 1164
            echo "\t                        \t<div class=\"spec--attribute\">Max. leveling (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1165
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlsts_ansi_metric_"] ?? null), 1165, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1167
        echo "\t                        ";
        if (($context["attribute_mlsts_ce_metric_"] ?? null)) {
            // line 1168
            echo "\t                        \t<div class=\"spec--attribute\">Max. leveling (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1169
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlsts_ce_metric_"] ?? null), 1169, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1171
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1173
        if (($context["attribute_max_operating_slope_si"] ?? null)) {
            // line 1174
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. operating slope (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1175
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_operating_slope_si"] ?? null), 1175, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1177
        echo "\t                        ";
        if (($context["attribute_mossts_ansi_metric_"] ?? null)) {
            // line 1178
            echo "\t                        \t<div class=\"spec--attribute\">Max. operating slope (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1179
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mossts_ansi_metric_"] ?? null), 1179, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1181
        echo "\t                        ";
        if (($context["attribute_mossts_ce_metric_"] ?? null)) {
            // line 1182
            echo "\t                        \t<div class=\"spec--attribute\">Max. operating slope (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1183
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mossts_ce_metric_"] ?? null), 1183, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1185
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1187
        if (($context["attribute_max_operating_slope_fr"] ?? null)) {
            // line 1188
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. operating slope (front to back)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1189
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_operating_slope_fr"] ?? null), 1189, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1191
        echo "\t                        ";
        if (($context["attribute_mosftf_ansi_metric_"] ?? null)) {
            // line 1192
            echo "\t                        \t<div class=\"spec--attribute\">Max. operating slope (front to back)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1193
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mosftf_ansi_metric_"] ?? null), 1193, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1195
        echo "\t                        ";
        if (($context["attribute_mosftf_ce_metric_"] ?? null)) {
            // line 1196
            echo "\t                        \t<div class=\"spec--attribute\">Max. operating slope (front to back)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1197
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mosftf_ce_metric_"] ?? null), 1197, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1199
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1201
        if (($context["attribute_jib_length"] ?? null)) {
            // line 1202
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Jib length</div>
\t\t                        <div class=\"spec--value\">";
            // line 1203
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_jib_length"] ?? null), 1203, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1205
        echo "\t                        ";
        if (($context["attribute_jl_ansi_metric_"] ?? null)) {
            // line 1206
            echo "\t                        \t<div class=\"spec--attribute\">Jib length</div>
\t\t                        <div class=\"spec--value\">";
            // line 1207
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_jl_ansi_metric_"] ?? null), 1207, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1209
        echo "\t                        ";
        if (($context["attribute_jl_ce_metric_"] ?? null)) {
            // line 1210
            echo "\t                        \t<div class=\"spec--attribute\">Jib length</div>
\t\t                        <div class=\"spec--value\">";
            // line 1211
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_jl_ce_metric_"] ?? null), 1211, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1213
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1215
        if (($context["attribute_jib_rotation"] ?? null)) {
            // line 1216
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Jib rotation</div>
\t\t                        <div class=\"spec--value\">";
            // line 1217
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_jib_rotation"] ?? null), 1217, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1219
        echo "\t                        ";
        if (($context["jr_ansi_metric_"] ?? null)) {
            // line 1220
            echo "\t                        \t<div class=\"spec--attribute\">Jib rotation</div>
\t\t                        <div class=\"spec--attribute\">";
            // line 1221
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["jr_ansi_metric_"] ?? null), 1221, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1223
        echo "\t                        ";
        if (($context["attribute_jr_ce_metric_"] ?? null)) {
            // line 1224
            echo "\t                        \t<div class=\"spec--attribute\">Jib rotation</div>
\t\t                        <div class=\"spec--value\">";
            // line 1225
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_jr_ce_metric_"] ?? null), 1225, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1227
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1229
        if (($context["attribute_jwa"] ?? null)) {
            // line 1230
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Jib working arc</div>
\t\t                        <div class=\"spec--value\">";
            // line 1231
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_jwa"] ?? null), 1231, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1233
        echo "\t                        ";
        if (($context["attribute_jwa_ansi_metric"] ?? null)) {
            // line 1234
            echo "\t                        \t<div class=\"spec--attribute\">Jib working arc</div>
\t\t                        <div class=\"spec--value\">";
            // line 1235
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_jwa_ansi_metric"] ?? null), 1235, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1237
        echo "\t                        ";
        if (($context["attribute_jwa_ce_metric"] ?? null)) {
            // line 1238
            echo "\t                        \t<div class=\"spec--attribute\">Jib working arc</div>
\t\t                        <div class=\"spec--value\">";
            // line 1239
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_jwa_ce_metric"] ?? null), 1239, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1241
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1243
        if (($context["attribute_jib_arc"] ?? null)) {
            // line 1244
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Jib arc</div>
\t\t                        <div class=\"spec--value\">";
            // line 1245
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_jib_arc"] ?? null), 1245, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1247
        echo "\t                        ";
        if (($context["attribute_ja_ansi_metric_"] ?? null)) {
            // line 1248
            echo "\t                        \t<div class=\"spec--attribute\">Jib arc</div>
\t\t                        <div class=\"spec--value\">";
            // line 1249
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ja_ansi_metric_"] ?? null), 1249, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1251
        echo "\t                        ";
        if (($context["attribute_ja_ce_metric_"] ?? null)) {
            // line 1252
            echo "\t                        \t<div class=\"spec--attribute\">Jib arc</div>
\t\t                        <div class=\"spec--value\">";
            // line 1253
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ja_ce_metric_"] ?? null), 1253, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1255
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1257
        if (($context["attribute_platform_rotation"] ?? null)) {
            // line 1258
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Platform rotation</div>
\t\t                        <div class=\"spec--value\">";
            // line 1259
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_rotation"] ?? null), 1259, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1261
        echo "\t                        ";
        if (($context["attribute_pr_ansi_metric_"] ?? null)) {
            // line 1262
            echo "\t                        \t<div class=\"spec--attribute\">Platform rotation</div>
\t\t                        <div class=\"spec--value\">";
            // line 1263
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pr_ansi_metric_"] ?? null), 1263, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1265
        echo "\t                        ";
        if (($context["attribute_pr_ce_metric_"] ?? null)) {
            // line 1266
            echo "\t                        \t<div class=\"spec--attribute\">Platform rotation</div>
\t\t                        <div class=\"spec--value\">";
            // line 1267
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pr_ce_metric_"] ?? null), 1267, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1269
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1271
        if (($context["attribute_superstructure_non_con"] ?? null)) {
            // line 1272
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Superstructure rotation (non-continuous)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1273
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_superstructure_non_con"] ?? null), 1273, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1275
        echo "\t                        ";
        if (($context["attribute_srnc_ansi_metric_"] ?? null)) {
            // line 1276
            echo "\t                        \t<div class=\"spec--attribute\">Superstructure rotation (non-continuous)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1277
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_srnc_ansi_metric_"] ?? null), 1277, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1279
        echo "\t                        ";
        if (($context["attribute_srnc_ce_metric_"] ?? null)) {
            // line 1280
            echo "\t                        \t<div class=\"spec--attribute\">Superstructure rotation (non-continuous)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1281
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_srnc_ce_metric_"] ?? null), 1281, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1283
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1285
        if (($context["attribute_wheels"] ?? null)) {
            // line 1286
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Wheels</div>
\t\t                        <div class=\"spec--value\">";
            // line 1287
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wheels"] ?? null), 1287, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1289
        echo "\t                        ";
        if (($context["attribute_wheels_ansi_metric_"] ?? null)) {
            // line 1290
            echo "\t                        \t<div class=\"spec--attribute\">Wheels</div>
\t\t                        <div class=\"spec--value\">";
            // line 1291
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wheels_ansi_metric_"] ?? null), 1291, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1293
        echo "\t                        ";
        if (($context["attribute_wheels_ce_metric_"] ?? null)) {
            // line 1294
            echo "\t                        \t<div class=\"spec--attribute\">Wheels</div>
\t\t                        <div class=\"spec--value\">";
            // line 1295
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wheels_ce_metric_"] ?? null), 1295, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1297
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1299
        if (($context["attribute_superstructure_rotatio"] ?? null)) {
            // line 1300
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Superstructure rotation</div>
\t\t                        <div class=\"spec--value\">";
            // line 1301
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_superstructure_rotatio"] ?? null), 1301, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1303
        echo "\t                        ";
        if (($context["attribute_sr_ansi_metric_"] ?? null)) {
            // line 1304
            echo "\t                        \t<div class=\"spec--attribute\">Superstructure rotation</div>
\t\t                        <div class=\"spec--value\">";
            // line 1305
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_sr_ansi_metric_"] ?? null), 1305, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1307
        echo "\t                        ";
        if (($context["attribute_sr_ce_metric_"] ?? null)) {
            // line 1308
            echo "\t                        \t<div class=\"spec--attribute\">Superstructure rotation</div>
\t\t                        <div class=\"spec--value\">";
            // line 1309
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_sr_ce_metric_"] ?? null), 1309, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1311
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1313
        if (($context["attribute_tailswing"] ?? null)) {
            // line 1314
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Tailswing</div>
\t\t                        <div class=\"spec--value\">";
            // line 1315
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tailswing"] ?? null), 1315, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1317
        echo "\t                        ";
        if (($context["attribute_ts_ansi_metric_"] ?? null)) {
            // line 1318
            echo "\t                        \t<div class=\"spec--attribute\">Tailswing</div>
\t\t                        <div class=\"spec--value\">";
            // line 1319
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ts_ansi_metric_"] ?? null), 1319, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1321
        echo "\t                        ";
        if (($context["attribute_ts_ce_metric_"] ?? null)) {
            // line 1322
            echo "\t                        \t<div class=\"spec--attribute\">Tailswing</div>
\t\t                        <div class=\"spec--value\">";
            // line 1323
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ts_ce_metric_"] ?? null), 1323, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1325
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1327
        if (($context["attribute_tailswing_axles_retrac"] ?? null)) {
            // line 1328
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Tailswing (axles retracted)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1329
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tailswing_axles_retrac"] ?? null), 1329, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1331
        echo "\t                        ";
        if (($context["attribute_tsar_ansi_metric_"] ?? null)) {
            // line 1332
            echo "\t                        \t<div class=\"spec--attribute\">Tailswing (axles retracted)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1333
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tsar_ansi_metric_"] ?? null), 1333, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1335
        echo "\t                        ";
        if (($context["attribute_tsar_ce_metric_"] ?? null)) {
            // line 1336
            echo "\t                        \t<div class=\"spec--attribute\">Tailswing (axles retracted)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1337
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tsar_ce_metric_"] ?? null), 1337, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1339
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1341
        if (($context["attribute_tailswing_axles_extend"] ?? null)) {
            // line 1342
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Tailswing (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1343
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tailswing_axles_extend"] ?? null), 1343, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1345
        echo "\t                        ";
        if (($context["attribute_tsae_ansi_metric_"] ?? null)) {
            // line 1346
            echo "\t                        \t<div class=\"spec--attribute\">Tailswing (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1347
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tsae_ansi_metric_"] ?? null), 1347, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1349
        echo "\t                        ";
        if (($context["attribute_tsae_ce_metric_"] ?? null)) {
            // line 1350
            echo "\t                        \t<div class=\"spec--attribute\">Tailswing (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1351
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tsae_ce_metric_"] ?? null), 1351, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1353
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1355
        if (($context["attribute_tailswing_riser_boom_e"] ?? null)) {
            // line 1356
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Tailswing (riser boom elevated)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1357
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tailswing_riser_boom_e"] ?? null), 1357, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1359
        echo "\t                        ";
        if (($context["attribute_tsrbe_ansi_metric_"] ?? null)) {
            // line 1360
            echo "\t                        \t<div class=\"spec--attribute\">Tailswing (riser boom elevated)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1361
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tsrbe_ansi_metric_"] ?? null), 1361, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1363
        echo "\t                        ";
        if (($context["attribute_tsrbe_ce_metric_"] ?? null)) {
            // line 1364
            echo "\t                        \t<div class=\"spec--attribute\">Tailswing (riser boom elevated)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1365
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tsrbe_ce_metric_"] ?? null), 1365, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1367
        echo "                        </div>
                         <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1369
        if (($context["attribute_tailswing_riser_boom_s"] ?? null)) {
            // line 1370
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Tailswing (riser boom stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1371
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tailswing_riser_boom_s"] ?? null), 1371, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1373
        echo "\t                        ";
        if (($context["attribute_tsrbs_ansi_metric_"] ?? null)) {
            // line 1374
            echo "\t                        \t<div class=\"spec--attribute\">Tailswing (riser boom stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1375
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tsrbs_ansi_metric_"] ?? null), 1375, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1377
        echo "\t                        ";
        if (($context["attribute_tsrbs_ce_metric_"] ?? null)) {
            // line 1378
            echo "\t                        \t<div class=\"spec--attribute\">Tailswing (riser boom stowed)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1379
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tsrbs_ce_metric_"] ?? null), 1379, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1381
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1383
        if (($context["attribute_foreswing"] ?? null)) {
            // line 1384
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Foreswing </div>
\t\t                        <div class=\"spec--value\">";
            // line 1385
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_foreswing"] ?? null), 1385, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1387
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1389
        if (($context["attribute_max_outrigger_levellin"] ?? null)) {
            // line 1390
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. outrigger levelling (front to rear)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1391
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_outrigger_levellin"] ?? null), 1391, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1393
        echo "\t                        ";
        if (($context["attribute_molftr_ansi_metric_"] ?? null)) {
            // line 1394
            echo "\t                        \t<div class=\"spec--attribute\">Max. outrigger levelling (front to rear)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1395
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_molftr_ansi_metric_"] ?? null), 1395, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1397
        echo "\t                        ";
        if (($context["attribute_molftr_ce_metric_"] ?? null)) {
            // line 1398
            echo "\t                        \t<div class=\"spec--attribute\">Max. outrigger levelling (front to rear)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1399
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_molftr_ce_metric_"] ?? null), 1399, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1401
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1403
        if (($context["attribute_max_outrigger_side_to_"] ?? null)) {
            // line 1404
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. outrigger levelling (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1405
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_outrigger_side_to_"] ?? null), 1405, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1407
        echo "\t                        ";
        if (($context["attribute_molsts_ansi_metric_"] ?? null)) {
            // line 1408
            echo "\t                        \t<div class=\"spec--attribute\">Max. outrigger levelling (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1409
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_molsts_ansi_metric_"] ?? null), 1409, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1411
        echo "\t                        ";
        if (($context["attribute_molsts_ce_metric_"] ?? null)) {
            // line 1412
            echo "\t                        \t<div class=\"spec--attribute\">Max. outrigger levelling (side to side)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1413
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_molsts_ce_metric_"] ?? null), 1413, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1415
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1417
        if (($context["attribute_max_operating_slope"] ?? null)) {
            // line 1418
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. operating slope</div>
\t\t                        <div class=\"spec--value\">";
            // line 1419
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_operating_slope"] ?? null), 1419, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1421
        echo "\t                        ";
        if (($context["attribute_mos_ansi_metric_"] ?? null)) {
            // line 1422
            echo "\t                        \t<div class=\"spec--attribute\">Max. operating slope</div>
\t\t                        <div class=\"spec--value\">";
            // line 1423
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mos_ansi_metric_"] ?? null), 1423, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1425
        echo "\t                        ";
        if (($context["attribute_mos_ce_metric_"] ?? null)) {
            // line 1426
            echo "\t                        \t<div class=\"spec--attribute\">Max. operating slope</div>
\t\t                        <div class=\"spec--value\">";
            // line 1427
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mos_ce_metric_"] ?? null), 1427, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1429
        echo "                        </div>

                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1432
        if (($context["attribute_inside_turning_radius"] ?? null)) {
            // line 1433
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Inside turning radius</div>
\t\t                        <div class=\"spec--value\">";
            // line 1434
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_inside_turning_radius"] ?? null), 1434, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1436
        echo "\t                        ";
        if (($context["attribute_itr_ansi_metric_"] ?? null)) {
            // line 1437
            echo "\t                        \t<div class=\"spec--attribute\">Inside turning radius</div>
\t\t                        <div class=\"spec--value\">";
            // line 1438
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_itr_ansi_metric_"] ?? null), 1438, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1440
        echo "\t                        ";
        if (($context["attribute_itr_ce_metric_"] ?? null)) {
            // line 1441
            echo "\t                        \t<div class=\"spec--attribute\">Inside turning radius</div>
\t\t                        <div class=\"spec--value\">";
            // line 1442
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_itr_ce_metric_"] ?? null), 1442, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1444
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1446
        if (($context["attribute_inside_turning_radius_axels_retracted"] ?? null)) {
            // line 1447
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Inside turning radius (axles retracted) </div>
\t\t                        <div class=\"spec--value\">";
            // line 1448
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_inside_turning_radius_axels_retracted"] ?? null), 1448, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1450
        echo "\t                        ";
        if (($context["attribute_itrar_ansi_metric_"] ?? null)) {
            // line 1451
            echo "\t                        \t<div class=\"spec--attribute\">Inside turning radius (axles retracted) </div>
\t\t                        <div class=\"spec--value\">";
            // line 1452
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_itrar_ansi_metric_"] ?? null), 1452, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1454
        echo "\t                        ";
        if (($context["attribute_itrar_ce_metric_"] ?? null)) {
            // line 1455
            echo "\t                        \t<div class=\"spec--attribute\">Inside turning radius (axles retracted) </div>
\t\t                        <div class=\"spec--value\">";
            // line 1456
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_itrar_ce_metric_"] ?? null), 1456, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1458
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1460
        if (($context["attribute_itrae"] ?? null)) {
            // line 1461
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Inside turning radius (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1462
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_itrae"] ?? null), 1462, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1464
        echo "\t                        ";
        if (($context["attribute_itrae_ansi_metric"] ?? null)) {
            // line 1465
            echo "\t                        \t<div class=\"spec--attribute\">Inside turning radius (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1466
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_itrae_ansi_metric"] ?? null), 1466, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1468
        echo "\t                        ";
        if (($context["attribute_itrae_ce_metric"] ?? null)) {
            // line 1469
            echo "\t                        \t<div class=\"spec--attribute\">Inside turning radius (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1470
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_itrae_ce_metric"] ?? null), 1470, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1472
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1474
        if (($context["attribute_outside_turning_radius"] ?? null)) {
            // line 1475
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Outside turning radius</div>
\t\t                        <div class=\"spec--value\">";
            // line 1476
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_outside_turning_radius"] ?? null), 1476, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1478
        echo "\t                        ";
        if (($context["attribute_otr_ansi_metric_"] ?? null)) {
            // line 1479
            echo "\t                        \t<div class=\"spec--attribute\">Outside turning radius</div>
\t\t                        <div class=\"spec--value\">";
            // line 1480
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_otr_ansi_metric_"] ?? null), 1480, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1482
        echo "\t                        ";
        if (($context["attribute_otr_ce_metric_"] ?? null)) {
            // line 1483
            echo "\t                        \t<div class=\"spec--attribute\">Outside turning radius</div>
\t\t                        <div class=\"spec--value\">";
            // line 1484
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_otr_ce_metric_"] ?? null), 1484, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1486
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1488
        if (($context["attribute_otrar"] ?? null)) {
            // line 1489
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Outside turning radius (axles retracted)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1490
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_otrar"] ?? null), 1490, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1492
        echo "\t                        ";
        if (($context["attribute_otrar_ansi_metric"] ?? null)) {
            // line 1493
            echo "\t                        \t<div class=\"spec--attribute\">Outside turning radius (axles retracted)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1494
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_otrar_ansi_metric"] ?? null), 1494, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1496
        echo "\t                        ";
        if (($context["attribute_otrar_ce_metric"] ?? null)) {
            // line 1497
            echo "\t                        \t<div class=\"spec--attribute\">Outside turning radius (axles retracted)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1498
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_otrar_ce_metric"] ?? null), 1498, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1500
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1502
        if (($context["attribute_otrae"] ?? null)) {
            // line 1503
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Outside turning radius (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1504
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_otrae"] ?? null), 1504, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1506
        echo "\t                        ";
        if (($context["attribute_otrae_ansi_metric"] ?? null)) {
            // line 1507
            echo "\t                        \t<div class=\"spec--attribute\">Outside turning radius (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1508
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_otrae_ansi_metric"] ?? null), 1508, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1510
        echo "\t                        ";
        if (($context["attribute_otrae_ce_metric"] ?? null)) {
            // line 1511
            echo "\t                        \t<div class=\"spec--attribute\">Outside turning radius (axles extended)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1512
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_otrae_ce_metric"] ?? null), 1512, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1514
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1516
        if (($context["attribute_oscillating_axle"] ?? null)) {
            // line 1517
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Oscillating axle</div>
\t\t                        <div class=\"spec--value\">";
            // line 1518
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_oscillating_axle"] ?? null), 1518, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1520
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1522
        if (($context["attribute_exit_entry_angle"] ?? null)) {
            // line 1523
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Exit/entry angle</div>
\t\t                        <div class=\"spec--value\">";
            // line 1524
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_exit_entry_angle"] ?? null), 1524, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1526
        echo "\t                        ";
        if (($context["attribute_eea_ansi_metric_"] ?? null)) {
            // line 1527
            echo "\t                        \t<div class=\"spec--attribute\">Exit/entry angle</div>
\t\t                        <div class=\"spec--value\">";
            // line 1528
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_eea_ansi_metric_"] ?? null), 1528, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1530
        echo "\t                        ";
        if (($context["attribute_eea_ce_metric_"] ?? null)) {
            // line 1531
            echo "\t                        \t<div class=\"spec--attribute\">Exit/entry angle</div>
\t\t                        <div class=\"spec--value\">";
            // line 1532
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_eea_ce_metric_"] ?? null), 1532, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1534
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1536
        if (($context["attribute_tires"] ?? null)) {
            // line 1537
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Tires</div>
\t\t                        <div class=\"spec--value\">";
            // line 1538
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tires"] ?? null), 1538, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1540
        echo "\t                        ";
        if (($context["attribute_tires_ansi_metric_"] ?? null)) {
            // line 1541
            echo "\t                        \t<div class=\"spec--attribute\">Tires</div>
\t\t                        <div class=\"spec--value\">";
            // line 1542
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tires_ansi_metric_"] ?? null), 1542, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1544
        echo "\t                        ";
        if (($context["attribute_tires_ce_metric_"] ?? null)) {
            // line 1545
            echo "\t                        \t<div class=\"spec--attribute\">Tires</div>
\t\t                        <div class=\"spec--value\">";
            // line 1546
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tires_ce_metric_"] ?? null), 1546, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1548
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1550
        if (($context["attribute_controls"] ?? null)) {
            // line 1551
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Controls</div>
\t\t                        <div class=\"spec--value\">";
            // line 1552
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_controls"] ?? null), 1552, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1554
        echo "\t                        ";
        if (($context["attribute_controls_ansi_metric_"] ?? null)) {
            // line 1555
            echo "\t                        \t<div class=\"spec--attribute\">Controls</div>
\t\t                        <div class=\"spec--value\">";
            // line 1556
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_controls_ansi_metric_"] ?? null), 1556, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1558
        echo "\t                        ";
        if (($context["attribute_controls_ce_metric_"] ?? null)) {
            // line 1559
            echo "\t                        \t<div class=\"spec--attribute\">Controls</div>
\t\t                        <div class=\"spec--value\">";
            // line 1560
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_controls_ce_metric_"] ?? null), 1560, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1562
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1564
        if (($context["attribute_wall_access"] ?? null)) {
            // line 1565
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Wall access</div>
\t\t                        <div class=\"spec--value\">";
            // line 1566
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wall_access"] ?? null), 1566, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1568
        echo "\t                        ";
        if (($context["attribute_wa_ansi_metric_"] ?? null)) {
            // line 1569
            echo "\t                        \t<div class=\"spec--attribute\">Wall access</div>
\t\t                        <div class=\"spec--value\">";
            // line 1570
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wa_ansi_metric_"] ?? null), 1570, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1572
        echo "\t                        ";
        if (($context["attribute_wa_ce_metric_"] ?? null)) {
            // line 1573
            echo "\t                        \t<div class=\"spec--attribute\">Wall access</div>
\t\t                        <div class=\"spec--value\">";
            // line 1574
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wa_ce_metric_"] ?? null), 1574, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1576
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1578
        if (($context["attribute_power_source_ac_"] ?? null)) {
            // line 1579
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Power source (AC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1580
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_power_source_ac_"] ?? null), 1580, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1582
        echo "\t                        ";
        if (($context["attribute_psac_ansi_metric_"] ?? null)) {
            // line 1583
            echo "\t                        \t<div class=\"spec--attribute\">Power source (AC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1584
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_psac_ansi_metric_"] ?? null), 1584, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1586
        echo "\t                        ";
        if (($context["attribute_psac_ce_metric_"] ?? null)) {
            // line 1587
            echo "\t                        \t<div class=\"spec--attribute\">Power source (AC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1588
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_psac_ce_metric_"] ?? null), 1588, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1590
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1592
        if (($context["attribute_power_source_dc_"] ?? null)) {
            // line 1593
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Power source (DC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1594
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_power_source_dc_"] ?? null), 1594, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1596
        echo "\t                        ";
        if (($context["attribute_psdc_ansi_metric_"] ?? null)) {
            // line 1597
            echo "\t                        \t<div class=\"spec--attribute\">Power source (DC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1598
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_psdc_ansi_metric_"] ?? null), 1598, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1600
        echo "\t                        ";
        if (($context["attribute_psdc_ce_metric_"] ?? null)) {
            // line 1601
            echo "\t                        \t<div class=\"spec--attribute\">Power source (DC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1602
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_psdc_ce_metric_"] ?? null), 1602, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1604
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1606
        if (($context["attribute_parking_brake"] ?? null)) {
            // line 1607
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Parking brake</div>
\t\t                        <div class=\"spec--value\">";
            // line 1608
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_parking_brake"] ?? null), 1608, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1610
        echo "\t                        ";
        if (($context["attribute_pb_ansi_metric_"] ?? null)) {
            // line 1611
            echo "\t                        \t<div class=\"spec--attribute\">Parking brake</div>
\t\t                        <div class=\"spec--value\">";
            // line 1612
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pb_ansi_metric_"] ?? null), 1612, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1614
        echo "\t                        ";
        if (($context["attribute_pb_ce_metric_"] ?? null)) {
            // line 1615
            echo "\t                        \t<div class=\"spec--attribute\">Parking brake</div>
\t\t                        <div class=\"spec--value\">";
            // line 1616
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pb_ce_metric_"] ?? null), 1616, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1618
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1620
        if (($context["attribute_drive_system"] ?? null)) {
            // line 1621
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Drive system</div>
\t\t                        <div class=\"spec--value\">";
            // line 1622
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_drive_system"] ?? null), 1622, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1624
        echo "\t                        ";
        if (($context["attribute_ds_ansi_metric_"] ?? null)) {
            // line 1625
            echo "\t                        \t<div class=\"spec--attribute\">Drive system</div>
\t\t                        <div class=\"spec--value\">";
            // line 1626
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ds_ansi_metric_"] ?? null), 1626, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1628
        echo "\t                        ";
        if (($context["attribute_ds_ce_metric_"] ?? null)) {
            // line 1629
            echo "\t                        \t<div class=\"spec--attribute\">Drive system</div>
\t\t                        <div class=\"spec--value\">";
            // line 1630
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ds_ce_metric_"] ?? null), 1630, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1632
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1634
        if (($context["attribute_power_source"] ?? null)) {
            // line 1635
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Power source</div>
\t\t                        <div class=\"spec--value\">";
            // line 1636
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_power_source"] ?? null), 1636, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1638
        echo "\t                        ";
        if (($context["attribute_power_source_ansi_metr"] ?? null)) {
            // line 1639
            echo "\t                        \t<div class=\"spec--attribute\">Power source</div>
\t\t                        <div class=\"spec--value\">";
            // line 1640
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_power_source_ansi_metr"] ?? null), 1640, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1642
        echo "\t                        ";
        if (($context["attribute_power_source_ce_metric"] ?? null)) {
            // line 1643
            echo "\t                        \t<div class=\"spec--attribute\">Power source</div>
\t\t                        <div class=\"spec--value\">";
            // line 1644
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_power_source_ce_metric"] ?? null), 1644, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1646
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1648
        if (($context["attribute_power_options"] ?? null)) {
            // line 1649
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Power options</div>
\t\t                        <div class=\"spec--value\">";
            // line 1650
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_power_options"] ?? null), 1650, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1652
        echo "\t                        ";
        if (($context["attribute_po_ansi_metric_"] ?? null)) {
            // line 1653
            echo "\t                        \t<div class=\"spec--attribute\">Power options</div>
\t\t                        <div class=\"spec--value\">";
            // line 1654
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_po_ansi_metric_"] ?? null), 1654, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1656
        echo "\t                        ";
        if (($context["attribute_po_ce_metric_"] ?? null)) {
            // line 1657
            echo "\t                        \t<div class=\"spec--attribute\">Power options</div>
\t\t                        <div class=\"spec--value\">";
            // line 1658
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_po_ce_metric_"] ?? null), 1658, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1660
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1662
        if (($context["attribute_battery"] ?? null)) {
            // line 1663
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Battery</div>
\t\t                        <div class=\"spec--value\">";
            // line 1664
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_battery"] ?? null), 1664, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1666
        echo "\t                        ";
        if (($context["attribute_battery_ansi_metric_"] ?? null)) {
            // line 1667
            echo "\t                        \t<div class=\"spec--attribute\">Battery</div>
\t\t                        <div class=\"spec--value\">";
            // line 1668
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_battery_ansi_metric_"] ?? null), 1668, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1670
        echo "\t                        ";
        if (($context["attribute_battery_ce_metric_"] ?? null)) {
            // line 1671
            echo "\t                        \t<div class=\"spec--attribute\">Battery</div>
\t\t                        <div class=\"spec--value\">";
            // line 1672
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_battery_ce_metric_"] ?? null), 1672, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1674
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1676
        if (($context["attribute_operating_temperature"] ?? null)) {
            // line 1677
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Operating Temperature</div>
\t\t                        <div class=\"spec--value\">";
            // line 1678
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_operating_temperature"] ?? null), 1678, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1680
        echo "\t                        ";
        if (($context["attribute_ot_ansi_metric_"] ?? null)) {
            // line 1681
            echo "\t                        \t<div class=\"spec--attribute\">Operating Temperature</div>
\t\t                        <div class=\"spec--value\">";
            // line 1682
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ot_ansi_metric_"] ?? null), 1682, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1684
        echo "\t                        ";
        if (($context["attribute_ot_ce_metric_"] ?? null)) {
            // line 1685
            echo "\t                        \t<div class=\"spec--attribute\">Operating Temperature</div>
\t\t                        <div class=\"spec--value\">";
            // line 1686
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ot_ce_metric_"] ?? null), 1686, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1688
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1690
        if (($context["attribute_battery_charger"] ?? null)) {
            // line 1691
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Battery charger</div>
\t\t                        <div class=\"spec--value\">";
            // line 1692
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_battery_charger"] ?? null), 1692, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1694
        echo "\t                        ";
        if (($context["attribute_batteryc_ansi_metric_"] ?? null)) {
            // line 1695
            echo "\t                        \t<div class=\"spec--attribute\">Battery charger</div>
\t\t                        <div class=\"spec--value\">";
            // line 1696
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_batteryc_ansi_metric_"] ?? null), 1696, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1698
        echo "\t                        ";
        if (($context["attribute_batteryc_ce_metric_"] ?? null)) {
            // line 1699
            echo "\t                        \t<div class=\"spec--attribute\">Battery charger</div>
\t\t                        <div class=\"spec--value\">";
            // line 1700
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_batteryc_ce_metric_"] ?? null), 1700, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1702
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1704
        if (($context["attribute_charger"] ?? null)) {
            // line 1705
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Charger</div>
\t\t                        <div class=\"spec--value\">";
            // line 1706
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_charger"] ?? null), 1706, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1708
        echo "\t                        ";
        if (($context["attribute_charger_ansi_metric_"] ?? null)) {
            // line 1709
            echo "\t                        \t<div class=\"spec--attribute\">Charger</div>
\t\t                        <div class=\"spec--value\">";
            // line 1710
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_charger_ansi_metric_"] ?? null), 1710, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1712
        echo "\t                        ";
        if (($context["attribute_charger_ce_metric_"] ?? null)) {
            // line 1713
            echo "\t                        \t<div class=\"spec--attribute\">Charger</div>
\t\t                        <div class=\"spec--value\">";
            // line 1714
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_charger_ce_metric_"] ?? null), 1714, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1716
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1718
        if (($context["attribute_motor"] ?? null)) {
            // line 1719
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Motor</div>
\t\t                        <div class=\"spec--value\">";
            // line 1720
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_motor"] ?? null), 1720, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1722
        echo "\t                        ";
        if (($context["attribute_motor_ansi_metric_"] ?? null)) {
            // line 1723
            echo "\t                        \t<div class=\"spec--attribute\">Motor</div>
\t\t                        <div class=\"spec--value\">";
            // line 1724
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_motor_ansi_metric_"] ?? null), 1724, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1726
        echo "\t                        ";
        if (($context["attribute_motor_ce_metric_"] ?? null)) {
            // line 1727
            echo "\t                        \t<div class=\"spec--attribute\">Motor</div>
\t\t                        <div class=\"spec--value\">";
            // line 1728
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_motor_ce_metric_"] ?? null), 1728, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1730
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1732
        if (($context["attribute_auxiliary_power_unit"] ?? null)) {
            // line 1733
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Auxiliary power unit</div>
\t\t                        <div class=\"spec--value\">";
            // line 1734
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_auxiliary_power_unit"] ?? null), 1734, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1736
        echo "\t                        ";
        if (($context["attribute_apu_ansi_metric_"] ?? null)) {
            // line 1737
            echo "\t                        \t<div class=\"spec--attribute\">Auxiliary power unit</div>
\t\t                        <div class=\"spec--value\">";
            // line 1738
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_apu_ansi_metric_"] ?? null), 1738, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1740
        echo "\t                        ";
        if (($context["attribute_apu_ce_metric_"] ?? null)) {
            // line 1741
            echo "\t                        \t<div class=\"spec--attribute\">Auxiliary power unit</div>
\t\t                        <div class=\"spec--value\">";
            // line 1742
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_apu_ce_metric_"] ?? null), 1742, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1744
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1746
        if (($context["attribute_weight"] ?? null)) {
            // line 1747
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Weight</div>
\t\t                        <div class=\"spec--value\">";
            // line 1748
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight"] ?? null), 1748, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1750
        echo "\t                        ";
        if (($context["attribute_weight_ansi_metric_"] ?? null)) {
            // line 1751
            echo "\t                        \t<div class=\"spec--attribute\">Weight</div>
\t\t                        <div class=\"spec--value\">";
            // line 1752
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight_ansi_metric_"] ?? null), 1752, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1754
        echo "\t                        ";
        if (($context["attribute_weight_ce_metric_"] ?? null)) {
            // line 1755
            echo "\t                        \t<div class=\"spec--attribute\">Weight</div>
\t\t                        <div class=\"spec--value\">";
            // line 1756
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight_ce_metric_"] ?? null), 1756, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1758
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1760
        if (($context["attribute_weight_ac_"] ?? null)) {
            // line 1761
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Weight (AC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1762
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight_ac_"] ?? null), 1762, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1764
        echo "\t                        ";
        if (($context["attribute_weightac_ansi_metric_"] ?? null)) {
            // line 1765
            echo "\t                        \t<div class=\"spec--attribute\">Weight (AC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1766
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weightac_ansi_metric_"] ?? null), 1766, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1768
        echo "\t                        ";
        if (($context["attribute_weightac_ce_metric_"] ?? null)) {
            // line 1769
            echo "\t                        \t<div class=\"spec--attribute\">Weight (AC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1770
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weightac_ce_metric_"] ?? null), 1770, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1772
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1774
        if (($context["attribute_weight_without_outrigg"] ?? null)) {
            // line 1775
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Weight (without outriggers) </div>
\t\t                        <div class=\"spec--value\">";
            // line 1776
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight_without_outrigg"] ?? null), 1776, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1778
        echo "\t                        ";
        if (($context["attribute_wwoo_ansi_metric_"] ?? null)) {
            // line 1779
            echo "\t                        \t<div class=\"spec--attribute\">Weight (without outriggers) </div>
\t\t                        <div class=\"spec--value\">";
            // line 1780
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wwoo_ansi_metric_"] ?? null), 1780, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1782
        echo "\t                        ";
        if (($context["attribute_wwoo_ce_metric_"] ?? null)) {
            // line 1783
            echo "\t                        \t<div class=\"spec--attribute\">Weight (without outriggers) </div>
\t\t                        <div class=\"spec--value\">";
            // line 1784
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wwoo_ce_metric_"] ?? null), 1784, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1786
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1788
        if (($context["attribute_weight_with_outriggers"] ?? null)) {
            // line 1789
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Weight (with outriggers) </div>
\t\t                        <div class=\"spec--value\">";
            // line 1790
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight_with_outriggers"] ?? null), 1790, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1792
        echo "\t                        ";
        if (($context["attribute_wwo_ansi_metric_"] ?? null)) {
            // line 1793
            echo "\t                        \t<div class=\"spec--attribute\">Weight (with outriggers) </div>
\t\t                        <div class=\"spec--value\">";
            // line 1794
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wwo_ansi_metric_"] ?? null), 1794, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1796
        echo "\t                        ";
        if (($context["attribute_wwo_ce_metric_"] ?? null)) {
            // line 1797
            echo "\t                        \t<div class=\"spec--attribute\">Weight (with outriggers) </div>
\t\t                        <div class=\"spec--value\">";
            // line 1798
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wwo_ce_metric_"] ?? null), 1798, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1800
        echo "                        </div>
\t\t\t\t\t\t<div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1802
        if (($context["attribute_weight_dc_"] ?? null)) {
            // line 1803
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Weight (DC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1804
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight_dc_"] ?? null), 1804, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1806
        echo "\t                        ";
        if (($context["attribute_weightdc_ansi_metric_"] ?? null)) {
            // line 1807
            echo "\t                        \t<div class=\"spec--attribute\">Weight (DC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1808
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weightdc_ansi_metric_"] ?? null), 1808, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1810
        echo "\t                        ";
        if (($context["attribute_weightdc_ce_metric_"] ?? null)) {
            // line 1811
            echo "\t                        \t<div class=\"spec--attribute\">Weight (DC)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1812
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weightdc_ce_metric_"] ?? null), 1812, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1814
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1816
        if (($context["attribute_floor_load_at_max_capa"] ?? null)) {
            // line 1817
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Floor load at max. capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1818
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_floor_load_at_max_capa"] ?? null), 1818, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1820
        echo "\t                        ";
        if (($context["attribute_flam_ansi_metric_"] ?? null)) {
            // line 1821
            echo "\t                        \t<div class=\"spec--attribute\">Floor load at max. capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1822
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_flam_ansi_metric_"] ?? null), 1822, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1824
        echo "\t                        ";
        if (($context["attribute_flam_ce_metric_"] ?? null)) {
            // line 1825
            echo "\t                        \t<div class=\"spec--attribute\">Floor load at max. capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1826
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_flam_ce_metric_"] ?? null), 1826, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1828
        echo "                        </div>

                        <!-- EZLOADER -->
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1832
        if (($context["attribute_bed_width"] ?? null)) {
            // line 1833
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Bed width</div>
\t\t                        <div class=\"spec--value\">";
            // line 1834
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bed_width"] ?? null), 1834, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1836
        echo "\t                        ";
        if (($context["attribute_bw_ansi_metric_"] ?? null)) {
            // line 1837
            echo "\t                        \t<div class=\"spec--attribute\">Bed width</div>
\t\t                        <div class=\"spec--value\">";
            // line 1838
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bw_ansi_metric_"] ?? null), 1838, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1840
        echo "\t                        ";
        if (($context["attribute_bw_ce_metric_"] ?? null)) {
            // line 1841
            echo "\t                        \t<div class=\"spec--attribute\">Bed width</div>
\t\t                        <div class=\"spec--value\">";
            // line 1842
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bw_ce_metric_"] ?? null), 1842, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1844
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1846
        if (($context["attribute_bed_capacity"] ?? null)) {
            // line 1847
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Bed capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1848
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bed_capacity"] ?? null), 1848, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1850
        echo "\t                        ";
        if (($context["attribute_bc_ansi_metric_"] ?? null)) {
            // line 1851
            echo "\t                        \t<div class=\"spec--attribute\">Bed capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1852
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bc_ansi_metric_"] ?? null), 1852, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1854
        echo "\t                        ";
        if (($context["attribute_bc_ce_metric_"] ?? null)) {
            // line 1855
            echo "\t                        \t<div class=\"spec--attribute\">Bed capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1856
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bc_ce_metric_"] ?? null), 1856, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1858
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1860
        if (($context["attribute_dove_tail_lift_capacit"] ?? null)) {
            // line 1861
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Dove tail lift capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1862
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_dove_tail_lift_capacit"] ?? null), 1862, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1864
        echo "\t                        ";
        if (($context["attribute_dtlc_ansi_metric_"] ?? null)) {
            // line 1865
            echo "\t                        \t<div class=\"spec--attribute\">Dove tail lift capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1866
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_dtlc_ansi_metric_"] ?? null), 1866, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1868
        echo "\t                        ";
        if (($context["attribute_dtlc_ce_metric_"] ?? null)) {
            // line 1869
            echo "\t                        \t<div class=\"spec--attribute\">Dove tail lift capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1870
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_dtlc_ce_metric_"] ?? null), 1870, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1872
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1874
        if (($context["attribute_tow_capacity"] ?? null)) {
            // line 1875
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Tow capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1876
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tow_capacity"] ?? null), 1876, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1878
        echo "\t                        ";
        if (($context["attribute_tc_ansi_metric_"] ?? null)) {
            // line 1879
            echo "\t                        \t<div class=\"spec--attribute\">Tow capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1880
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tc_ansi_metric_"] ?? null), 1880, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1882
        echo "\t                        ";
        if (($context["attribute_tc_ce_metric_"] ?? null)) {
            // line 1883
            echo "\t                        \t<div class=\"spec--attribute\">Tow capacity</div>
\t\t                        <div class=\"spec--value\">";
            // line 1884
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tc_ce_metric_"] ?? null), 1884, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1886
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1888
        if (($context["attribute_approximate_g_v_w_"] ?? null)) {
            // line 1889
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Approximate G.V.W.</div>
\t\t                        <div class=\"spec--value\">";
            // line 1890
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_approximate_g_v_w_"] ?? null), 1890, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1892
        echo "\t                        ";
        if (($context["attribute_agvw_ansi_metric_"] ?? null)) {
            // line 1893
            echo "\t                        \t<div class=\"spec--attribute\">Approximate G.V.W.</div>
\t\t                        <div class=\"spec--value\">";
            // line 1894
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_agvw_ansi_metric_"] ?? null), 1894, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1896
        echo "\t                        ";
        if (($context["attribute_agvw_ce_metric_"] ?? null)) {
            // line 1897
            echo "\t                        \t<div class=\"spec--attribute\">Approximate G.V.W.</div>
\t\t                        <div class=\"spec--value\">";
            // line 1898
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_agvw_ce_metric_"] ?? null), 1898, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1900
        echo "                        </div>
                        <div class=\"spec--container\">

\t\t\t\t\t\t\t";
        // line 1903
        if (($context["attribute_hydraulic_p_t_o_"] ?? null)) {
            // line 1904
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Hydraulic P.T.O.</div>
\t\t                        <div class=\"spec--value\">";
            // line 1905
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hydraulic_p_t_o_"] ?? null), 1905, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1907
        echo "\t                        ";
        if (($context["attribute_hpto_ansi_metric_"] ?? null)) {
            // line 1908
            echo "\t                        \t<div class=\"spec--attribute\">Hydraulic P.T.O.</div>
\t\t                        <div class=\"spec--value\">";
            // line 1909
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hpto_ansi_metric_"] ?? null), 1909, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1911
        echo "\t                        ";
        if (($context["attribute_hpto_ce_metric_"] ?? null)) {
            // line 1912
            echo "\t                        \t<div class=\"spec--attribute\">Hydraulic P.T.O.</div>
\t\t                        <div class=\"spec--value\">";
            // line 1913
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hpto_ce_metric_"] ?? null), 1913, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1915
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1917
        if (($context["attribute_overall_bed_w_x_l_"] ?? null)) {
            // line 1918
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Overall bed (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1919
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_overall_bed_w_x_l_"] ?? null), 1919, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1921
        echo "\t                        ";
        if (($context["attribute_obwl_ansi_metric_"] ?? null)) {
            // line 1922
            echo "\t                        \t<div class=\"spec--attribute\">Overall bed (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1923
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_obwl_ansi_metric_"] ?? null), 1923, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1925
        echo "\t                        ";
        if (($context["attribute_obwl_ce_metric_"] ?? null)) {
            // line 1926
            echo "\t                        \t<div class=\"spec--attribute\">Overall bed (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1927
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_obwl_ce_metric_"] ?? null), 1927, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1929
        echo "                        </div>
                        <div class=\"spec--container\">

\t\t\t\t\t\t\t";
        // line 1932
        if (($context["attribute_main_bed_w_x_l_"] ?? null)) {
            // line 1933
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Main bed (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1934
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_main_bed_w_x_l_"] ?? null), 1934, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1936
        echo "\t                        ";
        if (($context["attribute_main_bed_w_x_ansi_metr"] ?? null)) {
            // line 1937
            echo "\t                        \t<div class=\"spec--attribute\">Main bed (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1938
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_main_bed_w_x_ansi_metr"] ?? null), 1938, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1940
        echo "\t                        ";
        if (($context["attribute_main_bed_w_x_l_ce_me"] ?? null)) {
            // line 1941
            echo "\t                        \t<div class=\"spec--attribute\">Main bed (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1942
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_main_bed_w_x_l_ce_me"] ?? null), 1942, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1944
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1946
        if (($context["attribute_bed_length"] ?? null)) {
            // line 1947
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Bed length</div>
\t\t                        <div class=\"spec--value\">";
            // line 1948
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bed_length"] ?? null), 1948, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1950
        echo "\t                        ";
        if (($context["attribute_bl_ansi_metric_"] ?? null)) {
            // line 1951
            echo "\t                        \t<div class=\"spec--attribute\">Bed length</div>
\t\t                        <div class=\"spec--value\">";
            // line 1952
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bl_ansi_metric__"] ?? null), 1952, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1954
        echo "\t                        ";
        if (($context["attribute_bl_ce_metric_"] ?? null)) {
            // line 1955
            echo "\t                        \t<div class=\"spec--attribute\">Bed length</div>
\t\t                        <div class=\"spec--value\">";
            // line 1956
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bl_ce_metric_"] ?? null), 1956, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1958
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1960
        if (($context["attribute_dove_tail_w_x_l_"] ?? null)) {
            // line 1961
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Dove tail (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1962
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_dove_tail_w_x_l_"] ?? null), 1962, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1964
        echo "\t                        ";
        if (($context["attribute_dtwl_ansi_metric_"] ?? null)) {
            // line 1965
            echo "\t                        \t<div class=\"spec--attribute\">Dove tail (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1966
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_dtwl_ansi_metric_"] ?? null), 1966, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1968
        echo "\t                        ";
        if (($context["attribute_dtwl_ce_metric_"] ?? null)) {
            // line 1969
            echo "\t                        \t<div class=\"spec--attribute\">Dove tail (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1970
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_dtwl_ce_metric_"] ?? null), 1970, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1972
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1974
        if (($context["attribute_flip_tail_w_x_l_"] ?? null)) {
            // line 1975
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Flip tail (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1976
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_flip_tail_w_x_l_"] ?? null), 1976, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1978
        echo "\t                        ";
        if (($context["attribute_ftwl_ansi_metric_"] ?? null)) {
            // line 1979
            echo "\t                        \t<div class=\"spec--attribute\">Flip tail (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1980
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ftwl_ansi_metric_"] ?? null), 1980, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1982
        echo "\t                        ";
        if (($context["attribute_ftwl_ce_metric_"] ?? null)) {
            // line 1983
            echo "\t                        \t<div class=\"spec--attribute\">Flip tail (w x l)</div>
\t\t                        <div class=\"spec--value\">";
            // line 1984
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ftwl_ce_metric_"] ?? null), 1984, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1986
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 1988
        if (($context["attribute_bulk_head_height"] ?? null)) {
            // line 1989
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Bulk head height</div>
\t\t                        <div class=\"spec--value\">";
            // line 1990
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bulk_head_height"] ?? null), 1990, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1992
        echo "\t                        ";
        if (($context["attribute_bhh_ansi_metric_"] ?? null)) {
            // line 1993
            echo "\t                        \t<div class=\"spec--attribute\">Bulk head height</div>
\t\t                        <div class=\"spec--value\">";
            // line 1994
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bhh_ansi_metric_"] ?? null), 1994, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 1996
        echo "\t                        ";
        if (($context["attribute_bhh_ce_metric_"] ?? null)) {
            // line 1997
            echo "\t                        \t<div class=\"spec--attribute\">Bulk head height</div>
\t\t                        <div class=\"spec--value\">";
            // line 1998
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bhh_ce_metric_"] ?? null), 1998, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2000
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 2002
        if (($context["attribute_cab_to_axle_length"] ?? null)) {
            // line 2003
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Cab to axle length</div>
\t\t                        <div class=\"spec--value\">";
            // line 2004
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_cab_to_axle_length"] ?? null), 2004, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2006
        echo "\t                        ";
        if (($context["attribute_ctal_ansi_metric_"] ?? null)) {
            // line 2007
            echo "\t                        \t<div class=\"spec--attribute\">Cab to axle length</div>
\t\t                        <div class=\"spec--value\">";
            // line 2008
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ctal_ansi_metric_"] ?? null), 2008, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2010
        echo "\t                        ";
        if (($context["attribute_ctal_ce_metric_"] ?? null)) {
            // line 2011
            echo "\t                        \t<div class=\"spec--attribute\">Cab to axle length</div>
\t\t                        <div class=\"spec--value\">";
            // line 2012
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ctal_ce_metric_"] ?? null), 2012, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2014
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 2016
        if (($context["attribute_ramp_length"] ?? null)) {
            // line 2017
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Ramp length</div>
\t\t                        <div class=\"spec--value\">";
            // line 2018
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ramp_length"] ?? null), 2018, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2020
        echo "\t                        ";
        if (($context["attribute_rl_ansi_metric_"] ?? null)) {
            // line 2021
            echo "\t                        \t<div class=\"spec--attribute\">Ramp length</div>
\t\t                        <div class=\"spec--value\">";
            // line 2022
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_rl_ansi_metric_"] ?? null), 2022, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2024
        echo "\t                        ";
        if (($context["attribute_rl_ce_metric_"] ?? null)) {
            // line 2025
            echo "\t                        \t<div class=\"spec--attribute\">Ramp length</div>
\t\t                        <div class=\"spec--value\">";
            // line 2026
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_rl_ce_metric_"] ?? null), 2026, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2028
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 2030
        if (($context["attribute_bed_height"] ?? null)) {
            // line 2031
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Bed height</div>
\t\t                        <div class=\"spec--value\">";
            // line 2032
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bed_height"] ?? null), 2032, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2034
        echo "\t                        ";
        if (($context["attribute_bh_ansi_metric_"] ?? null)) {
            // line 2035
            echo "\t                        \t<div class=\"spec--attribute\">Bed height</div>
\t\t                        <div class=\"spec--value\">";
            // line 2036
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bh_ansi_metric_"] ?? null), 2036, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2038
        echo "\t                        ";
        if (($context["attribute_bh_ce_metric_"] ?? null)) {
            // line 2039
            echo "\t                        \t<div class=\"spec--attribute\">Bed height</div>
\t\t                        <div class=\"spec--value\">";
            // line 2040
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bh_ce_metric_"] ?? null), 2040, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2042
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 2044
        if (($context["attribute_max_dock_height"] ?? null)) {
            // line 2045
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Max. dock height</div>
\t\t                        <div class=\"spec--value\">";
            // line 2046
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_dock_height"] ?? null), 2046, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2048
        echo "\t                        ";
        if (($context["attribute_mdockh_ansi_metric_"] ?? null)) {
            // line 2049
            echo "\t                        \t<div class=\"spec--attribute\">Max. dock height</div>
\t\t                        <div class=\"spec--value\">";
            // line 2050
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mdockh_ansi_metric_"] ?? null), 2050, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2052
        echo "\t                        ";
        if (($context["attribute_mdockh_ce_metric_"] ?? null)) {
            // line 2053
            echo "\t                        \t<div class=\"spec--attribute\">Max. dock height</div>
\t\t                        <div class=\"spec--value\">";
            // line 2054
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mdockh_ce_metric_"] ?? null), 2054, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2056
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 2058
        if (($context["attribute_ramp_deg_"] ?? null)) {
            // line 2059
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Ramp ° / %</div>
\t\t                        <div class=\"spec--value\">";
            // line 2060
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_ramp_deg_"] ?? null), 2060, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2062
        echo "\t                        ";
        if (($context["attribute_rdp_ansi_metric_"] ?? null)) {
            // line 2063
            echo "\t                        \t<div class=\"spec--attribute\">Ramp ° / %</div>
\t\t                        <div class=\"spec--value\">";
            // line 2064
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_rdp_ansi_metric_"] ?? null), 2064, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2066
        echo "\t                        ";
        if (($context["attribute_rdp_ce_metric_"] ?? null)) {
            // line 2067
            echo "\t                        \t<div class=\"spec--attribute\">Ramp ° / %</div>
\t\t                        <div class=\"spec--value\">";
            // line 2068
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_rdp_ce_metric_"] ?? null), 2068, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2070
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 2072
        if (($context["attribute_hitch_receiver_tube"] ?? null)) {
            // line 2073
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Hitch receiver tube</div>
\t\t                        <div class=\"spec--value\">";
            // line 2074
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hitch_receiver_tube"] ?? null), 2074, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2076
        echo "\t                        ";
        if (($context["attribute_hrt_ansi_metric_"] ?? null)) {
            // line 2077
            echo "\t                        \t<div class=\"spec--attribute\">Hitch receiver tube</div>
\t\t                        <div class=\"spec--value\">";
            // line 2078
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hrt_ansi_metric_"] ?? null), 2078, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2080
        echo "\t                        ";
        if (($context["attribute_hrt_ce_metric_"] ?? null)) {
            // line 2081
            echo "\t                        \t<div class=\"spec--attribute\">Hitch receiver tube</div>
\t\t                        <div class=\"spec--value\">";
            // line 2082
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_hrt_ce_metric_"] ?? null), 2082, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2084
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 2086
        if (($context["attribute_wood_thickness"] ?? null)) {
            // line 2087
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Wood Thickness</div>
\t\t                        <div class=\"spec--value\">";
            // line 2088
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wood_thickness"] ?? null), 2088, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2090
        echo "\t                        ";
        if (($context["attribute_wt_ansi_metric_"] ?? null)) {
            // line 2091
            echo "\t                        \t<div class=\"spec--attribute\">Wood Thickness</div>
\t\t                        <div class=\"spec--value\">";
            // line 2092
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wt_ansi_metric_"] ?? null), 2092, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2094
        echo "\t                        ";
        if (($context["attribute_wt_ce_metric_"] ?? null)) {
            // line 2095
            echo "\t                        \t<div class=\"spec--attribute\">Wood Thickness</div>
\t\t                        <div class=\"spec--value\">";
            // line 2096
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wt_ce_metric_"] ?? null), 2096, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2098
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 2100
        if (($context["attribute_min_chassis_frame_rail"] ?? null)) {
            // line 2101
            echo "\t\t\t\t\t\t\t\t<div class=\"spec--attribute\">Min. chassis frame rail height</div>
\t\t                        <div class=\"spec--value\">";
            // line 2102
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_min_chassis_frame_rail"] ?? null), 2102, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2104
        echo "\t                        ";
        if (($context["attribute_mcfrh_ansi_metric_"] ?? null)) {
            // line 2105
            echo "\t                        \t<div class=\"spec--attribute\">Min. chassis frame rail height</div>
\t\t                        <div class=\"spec--value\">";
            // line 2106
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mcfrh_ansi_metric_"] ?? null), 2106, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2108
        echo "\t                        ";
        if (($context["attribute_mcfrh_ce_metric_"] ?? null)) {
            // line 2109
            echo "\t                        \t<div class=\"spec--attribute\">Min. chassis frame rail height</div>
\t\t                        <div class=\"spec--value\">";
            // line 2110
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mcfrh_ce_metric_"] ?? null), 2110, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2112
        echo "                        </div>
                        <div class=\"spec--container\">
\t\t\t\t\t\t\t";
        // line 2114
        if (($context["attribute_frame_leveling"] ?? null)) {
            // line 2115
            echo "\t\t\t\t\t\t\t\t<div class=\"spec-attritube\">Frame leveling</div>
\t\t                        <div class=\"spec--value\">";
            // line 2116
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_frame_leveling"] ?? null), 2116, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2118
        echo "\t                        ";
        if (($context["attribute_flvl_ansi_metric_"] ?? null)) {
            // line 2119
            echo "\t                        \t<div class=\"spec--attribute\">Frame leveling</div>
\t\t                        <div class=\"spec--value\">";
            // line 2120
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_flvl_ansi_metric_"] ?? null), 2120, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2122
        echo "\t                        ";
        if (($context["attribute_flvl_ce_metric_"] ?? null)) {
            // line 2123
            echo "\t                        \t<div class=\"spec--attribute\">Frame leveling</div>
\t\t                        <div class=\"spec--value\">";
            // line 2124
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_flvl_ce_metric_"] ?? null), 2124, $this->source), "html", null, true);
            echo "</div>
\t                        ";
        }
        // line 2126
        echo "                        </div>
\t\t\t\t\t\t<p>";
        // line 2127
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 48), "html", null, true);
        echo "</p>
\t\t\t\t\t\t<p><small>";
        // line 2128
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_last_updated", [], "any", false, false, true, 2128), 2128, $this->source), "html", null, true);
        echo "</small></p>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"single-product--accordion-section\">
\t\t\t\t\t<a class=\"single-product--accordion-section-title\" href=\"#accordion-3\"><h3>Standard Features</h3></a>
\t\t\t\t\t<div id=\"accordion-3\" class=\"single-product--accordion-section-content\">
\t\t\t\t\t\t<p>";
        // line 2135
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_standard_features", [], "any", false, false, true, 2135), 2135, $this->source), "html", null, true);
        echo "</p>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"single-product--accordion-section\">
\t\t\t\t\t<a class=\"single-product--accordion-section-title\" href=\"#accordion-4\"><h3>Options</h3></a>
\t\t\t\t\t<div id=\"accordion-4\" class=\"single-product--accordion-section-content\">
\t\t\t\t\t\t<p>";
        // line 2142
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_options", [], "any", false, false, true, 2142), 2142, $this->source), "html", null, true);
        echo "</p>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t";
        // line 2146
        if ( !twig_test_empty((($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_diagram_title", [], "any", false, false, true, 2146)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null))) {
            // line 2147
            echo "\t\t\t\t<div class=\"single-product--accordion-section\">
\t\t\t\t\t<a class=\"single-product--accordion-section-title\" href=\"#accordion-7\"><h3>";
            // line 2148
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_diagram_title", [], "any", false, false, true, 2148), 2148, $this->source), "html", null, true);
            echo "</h3></a>
\t\t\t\t\t<div id=\"accordion-7\" class=\"single-product--accordion-section-content\">
\t\t\t\t\t\t";
            // line 2150
            if (($context["all_else"] ?? null)) {
                // line 2151
                echo "\t\t\t\t\t\t\t<p>";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_diagram_photo_metric_", [], "any", false, false, true, 2151), 2151, $this->source), "html", null, true);
                echo "</p>
\t\t\t\t\t\t";
            }
            // line 2153
            echo "\t\t\t\t\t\t";
            if (($context["us_can_latin"] ?? null)) {
                // line 2154
                echo "\t\t\t\t\t\t\t<p>";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_diagram_photo_s_", [], "any", false, false, true, 2154), 2154, $this->source), "html", null, true);
                echo "</p>
\t\t\t\t\t\t";
            }
            // line 2156
            echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 2159
        echo "
\t\t\t\t";
        // line 2160
        if ( !twig_test_empty((($__internal_compile_1 = twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_packages_available_for", [], "any", false, false, true, 2160)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[0] ?? null) : null))) {
            // line 2161
            echo "\t\t\t\t<div class=\"single-product--accordion-section\">
\t\t\t\t\t<a class=\"single-product--accordion-section-title\" href=\"#accordion-5\"><h3>Accessory Packages</h3></a>
\t\t\t\t\t<div id=\"accordion-5\" class=\"single-product--accordion-section-content\">
\t\t\t\t\t\t<p>";
            // line 2164
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_packages_available_for", [], "any", false, false, true, 2164), 2164, $this->source), "html", null, true);
            echo "</p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 2168
        echo "
\t\t\t\t";
        // line 2169
        if ((((((((((((($context["chinese_pdf_url"] ?? null) || ($context["german_pdf_url"] ?? null)) || ($context["english_pdf_url"] ?? null)) || ($context["french_pdf_url"] ?? null)) || ($context["japanese_pdf_url"] ?? null)) || ($context["spanish_pdf_url"] ?? null)) || ($context["english_ansi_met_pdf_url"] ?? null)) || ($context["french_ansi_met_pdf_url"] ?? null)) || ($context["english_ansi_imp_pdf_url"] ?? null)) || ($context["french_ansi_imp_pdf_url"] ?? null)) || ($context["english_ansi_imp_pdf_url"] ?? null)) || ($context["french_ansi_imp_pdf_url"] ?? null))) {
            // line 2170
            echo "\t\t\t\t\t<div class=\"single-product--accordion-section\">
\t\t\t\t\t\t<a class=\"single-product--accordion-section-title\" href=\"#accordion-6\"><h3>Downloads</h3></a>
\t\t\t\t\t\t<div id=\"accordion-6\" class=\"single-product--accordion-section-content\">
\t\t\t\t\t\t\t";
            // line 2173
            $this->loadTemplate((($context["directory"] ?? null) . "/partials/commerce-pdf-downloads.html.twig"), "themes/sglobal/templates/layout/commerce-product.html.twig", 2173)->display($context);
            // line 2174
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 2177
        echo "
\t\t\t\t<div id=\"snorkel-quote\" class=\"single-product--cta\">
\t\t\t\t\t";
        // line 2180
        echo "\t\t\t\t\t";
        // line 2181
        echo "\t\t\t\t\t";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variations", [], "any", false, false, true, 2181), 2181, $this->source), "html", null, true);
        echo "
\t\t\t\t\t<a href=\"/contact\" class=\"single-product--dealer-link\">Find a Dealer</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"single-product--media\">
\t\t\t\t<div class=\"single-product--video-gallery\">
\t\t\t\t\t";
        // line 2187
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_product_video", [], "any", false, false, true, 2187), 2187, $this->source), "html", null, true);
        echo "
                    ";
        // line 2188
        if (twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_product_vide_spanish", [], "any", false, false, true, 2188)) {
            // line 2189
            echo "                        <p><a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_2 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_product_vide_spanish", [], "any", false, false, true, 2189), 0, [], "any", false, false, true, 2189)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["#url"] ?? null) : null), 2189, $this->source), "html", null, true);
            echo "\">Español</a></p>
                    ";
        }
        // line 2191
        echo "\t\t\t\t</div>

\t\t\t\t<div class=\"single-product--photo-gallery\">
\t\t\t\t\t";
        // line 2194
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_photo_gallery", [], "any", false, false, true, 2194), 2194, $this->source), "html", null, true);
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
        return "themes/sglobal/templates/layout/commerce-product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  5484 => 2194,  5479 => 2191,  5473 => 2189,  5471 => 2188,  5467 => 2187,  5457 => 2181,  5455 => 2180,  5451 => 2177,  5446 => 2174,  5444 => 2173,  5439 => 2170,  5437 => 2169,  5434 => 2168,  5427 => 2164,  5422 => 2161,  5420 => 2160,  5417 => 2159,  5412 => 2156,  5406 => 2154,  5403 => 2153,  5397 => 2151,  5395 => 2150,  5390 => 2148,  5387 => 2147,  5385 => 2146,  5378 => 2142,  5368 => 2135,  5358 => 2128,  5354 => 2127,  5351 => 2126,  5346 => 2124,  5343 => 2123,  5340 => 2122,  5335 => 2120,  5332 => 2119,  5329 => 2118,  5324 => 2116,  5321 => 2115,  5319 => 2114,  5315 => 2112,  5310 => 2110,  5307 => 2109,  5304 => 2108,  5299 => 2106,  5296 => 2105,  5293 => 2104,  5288 => 2102,  5285 => 2101,  5283 => 2100,  5279 => 2098,  5274 => 2096,  5271 => 2095,  5268 => 2094,  5263 => 2092,  5260 => 2091,  5257 => 2090,  5252 => 2088,  5249 => 2087,  5247 => 2086,  5243 => 2084,  5238 => 2082,  5235 => 2081,  5232 => 2080,  5227 => 2078,  5224 => 2077,  5221 => 2076,  5216 => 2074,  5213 => 2073,  5211 => 2072,  5207 => 2070,  5202 => 2068,  5199 => 2067,  5196 => 2066,  5191 => 2064,  5188 => 2063,  5185 => 2062,  5180 => 2060,  5177 => 2059,  5175 => 2058,  5171 => 2056,  5166 => 2054,  5163 => 2053,  5160 => 2052,  5155 => 2050,  5152 => 2049,  5149 => 2048,  5144 => 2046,  5141 => 2045,  5139 => 2044,  5135 => 2042,  5130 => 2040,  5127 => 2039,  5124 => 2038,  5119 => 2036,  5116 => 2035,  5113 => 2034,  5108 => 2032,  5105 => 2031,  5103 => 2030,  5099 => 2028,  5094 => 2026,  5091 => 2025,  5088 => 2024,  5083 => 2022,  5080 => 2021,  5077 => 2020,  5072 => 2018,  5069 => 2017,  5067 => 2016,  5063 => 2014,  5058 => 2012,  5055 => 2011,  5052 => 2010,  5047 => 2008,  5044 => 2007,  5041 => 2006,  5036 => 2004,  5033 => 2003,  5031 => 2002,  5027 => 2000,  5022 => 1998,  5019 => 1997,  5016 => 1996,  5011 => 1994,  5008 => 1993,  5005 => 1992,  5000 => 1990,  4997 => 1989,  4995 => 1988,  4991 => 1986,  4986 => 1984,  4983 => 1983,  4980 => 1982,  4975 => 1980,  4972 => 1979,  4969 => 1978,  4964 => 1976,  4961 => 1975,  4959 => 1974,  4955 => 1972,  4950 => 1970,  4947 => 1969,  4944 => 1968,  4939 => 1966,  4936 => 1965,  4933 => 1964,  4928 => 1962,  4925 => 1961,  4923 => 1960,  4919 => 1958,  4914 => 1956,  4911 => 1955,  4908 => 1954,  4903 => 1952,  4900 => 1951,  4897 => 1950,  4892 => 1948,  4889 => 1947,  4887 => 1946,  4883 => 1944,  4878 => 1942,  4875 => 1941,  4872 => 1940,  4867 => 1938,  4864 => 1937,  4861 => 1936,  4856 => 1934,  4853 => 1933,  4851 => 1932,  4846 => 1929,  4841 => 1927,  4838 => 1926,  4835 => 1925,  4830 => 1923,  4827 => 1922,  4824 => 1921,  4819 => 1919,  4816 => 1918,  4814 => 1917,  4810 => 1915,  4805 => 1913,  4802 => 1912,  4799 => 1911,  4794 => 1909,  4791 => 1908,  4788 => 1907,  4783 => 1905,  4780 => 1904,  4778 => 1903,  4773 => 1900,  4768 => 1898,  4765 => 1897,  4762 => 1896,  4757 => 1894,  4754 => 1893,  4751 => 1892,  4746 => 1890,  4743 => 1889,  4741 => 1888,  4737 => 1886,  4732 => 1884,  4729 => 1883,  4726 => 1882,  4721 => 1880,  4718 => 1879,  4715 => 1878,  4710 => 1876,  4707 => 1875,  4705 => 1874,  4701 => 1872,  4696 => 1870,  4693 => 1869,  4690 => 1868,  4685 => 1866,  4682 => 1865,  4679 => 1864,  4674 => 1862,  4671 => 1861,  4669 => 1860,  4665 => 1858,  4660 => 1856,  4657 => 1855,  4654 => 1854,  4649 => 1852,  4646 => 1851,  4643 => 1850,  4638 => 1848,  4635 => 1847,  4633 => 1846,  4629 => 1844,  4624 => 1842,  4621 => 1841,  4618 => 1840,  4613 => 1838,  4610 => 1837,  4607 => 1836,  4602 => 1834,  4599 => 1833,  4597 => 1832,  4591 => 1828,  4586 => 1826,  4583 => 1825,  4580 => 1824,  4575 => 1822,  4572 => 1821,  4569 => 1820,  4564 => 1818,  4561 => 1817,  4559 => 1816,  4555 => 1814,  4550 => 1812,  4547 => 1811,  4544 => 1810,  4539 => 1808,  4536 => 1807,  4533 => 1806,  4528 => 1804,  4525 => 1803,  4523 => 1802,  4519 => 1800,  4514 => 1798,  4511 => 1797,  4508 => 1796,  4503 => 1794,  4500 => 1793,  4497 => 1792,  4492 => 1790,  4489 => 1789,  4487 => 1788,  4483 => 1786,  4478 => 1784,  4475 => 1783,  4472 => 1782,  4467 => 1780,  4464 => 1779,  4461 => 1778,  4456 => 1776,  4453 => 1775,  4451 => 1774,  4447 => 1772,  4442 => 1770,  4439 => 1769,  4436 => 1768,  4431 => 1766,  4428 => 1765,  4425 => 1764,  4420 => 1762,  4417 => 1761,  4415 => 1760,  4411 => 1758,  4406 => 1756,  4403 => 1755,  4400 => 1754,  4395 => 1752,  4392 => 1751,  4389 => 1750,  4384 => 1748,  4381 => 1747,  4379 => 1746,  4375 => 1744,  4370 => 1742,  4367 => 1741,  4364 => 1740,  4359 => 1738,  4356 => 1737,  4353 => 1736,  4348 => 1734,  4345 => 1733,  4343 => 1732,  4339 => 1730,  4334 => 1728,  4331 => 1727,  4328 => 1726,  4323 => 1724,  4320 => 1723,  4317 => 1722,  4312 => 1720,  4309 => 1719,  4307 => 1718,  4303 => 1716,  4298 => 1714,  4295 => 1713,  4292 => 1712,  4287 => 1710,  4284 => 1709,  4281 => 1708,  4276 => 1706,  4273 => 1705,  4271 => 1704,  4267 => 1702,  4262 => 1700,  4259 => 1699,  4256 => 1698,  4251 => 1696,  4248 => 1695,  4245 => 1694,  4240 => 1692,  4237 => 1691,  4235 => 1690,  4231 => 1688,  4226 => 1686,  4223 => 1685,  4220 => 1684,  4215 => 1682,  4212 => 1681,  4209 => 1680,  4204 => 1678,  4201 => 1677,  4199 => 1676,  4195 => 1674,  4190 => 1672,  4187 => 1671,  4184 => 1670,  4179 => 1668,  4176 => 1667,  4173 => 1666,  4168 => 1664,  4165 => 1663,  4163 => 1662,  4159 => 1660,  4154 => 1658,  4151 => 1657,  4148 => 1656,  4143 => 1654,  4140 => 1653,  4137 => 1652,  4132 => 1650,  4129 => 1649,  4127 => 1648,  4123 => 1646,  4118 => 1644,  4115 => 1643,  4112 => 1642,  4107 => 1640,  4104 => 1639,  4101 => 1638,  4096 => 1636,  4093 => 1635,  4091 => 1634,  4087 => 1632,  4082 => 1630,  4079 => 1629,  4076 => 1628,  4071 => 1626,  4068 => 1625,  4065 => 1624,  4060 => 1622,  4057 => 1621,  4055 => 1620,  4051 => 1618,  4046 => 1616,  4043 => 1615,  4040 => 1614,  4035 => 1612,  4032 => 1611,  4029 => 1610,  4024 => 1608,  4021 => 1607,  4019 => 1606,  4015 => 1604,  4010 => 1602,  4007 => 1601,  4004 => 1600,  3999 => 1598,  3996 => 1597,  3993 => 1596,  3988 => 1594,  3985 => 1593,  3983 => 1592,  3979 => 1590,  3974 => 1588,  3971 => 1587,  3968 => 1586,  3963 => 1584,  3960 => 1583,  3957 => 1582,  3952 => 1580,  3949 => 1579,  3947 => 1578,  3943 => 1576,  3938 => 1574,  3935 => 1573,  3932 => 1572,  3927 => 1570,  3924 => 1569,  3921 => 1568,  3916 => 1566,  3913 => 1565,  3911 => 1564,  3907 => 1562,  3902 => 1560,  3899 => 1559,  3896 => 1558,  3891 => 1556,  3888 => 1555,  3885 => 1554,  3880 => 1552,  3877 => 1551,  3875 => 1550,  3871 => 1548,  3866 => 1546,  3863 => 1545,  3860 => 1544,  3855 => 1542,  3852 => 1541,  3849 => 1540,  3844 => 1538,  3841 => 1537,  3839 => 1536,  3835 => 1534,  3830 => 1532,  3827 => 1531,  3824 => 1530,  3819 => 1528,  3816 => 1527,  3813 => 1526,  3808 => 1524,  3805 => 1523,  3803 => 1522,  3799 => 1520,  3794 => 1518,  3791 => 1517,  3789 => 1516,  3785 => 1514,  3780 => 1512,  3777 => 1511,  3774 => 1510,  3769 => 1508,  3766 => 1507,  3763 => 1506,  3758 => 1504,  3755 => 1503,  3753 => 1502,  3749 => 1500,  3744 => 1498,  3741 => 1497,  3738 => 1496,  3733 => 1494,  3730 => 1493,  3727 => 1492,  3722 => 1490,  3719 => 1489,  3717 => 1488,  3713 => 1486,  3708 => 1484,  3705 => 1483,  3702 => 1482,  3697 => 1480,  3694 => 1479,  3691 => 1478,  3686 => 1476,  3683 => 1475,  3681 => 1474,  3677 => 1472,  3672 => 1470,  3669 => 1469,  3666 => 1468,  3661 => 1466,  3658 => 1465,  3655 => 1464,  3650 => 1462,  3647 => 1461,  3645 => 1460,  3641 => 1458,  3636 => 1456,  3633 => 1455,  3630 => 1454,  3625 => 1452,  3622 => 1451,  3619 => 1450,  3614 => 1448,  3611 => 1447,  3609 => 1446,  3605 => 1444,  3600 => 1442,  3597 => 1441,  3594 => 1440,  3589 => 1438,  3586 => 1437,  3583 => 1436,  3578 => 1434,  3575 => 1433,  3573 => 1432,  3568 => 1429,  3563 => 1427,  3560 => 1426,  3557 => 1425,  3552 => 1423,  3549 => 1422,  3546 => 1421,  3541 => 1419,  3538 => 1418,  3536 => 1417,  3532 => 1415,  3527 => 1413,  3524 => 1412,  3521 => 1411,  3516 => 1409,  3513 => 1408,  3510 => 1407,  3505 => 1405,  3502 => 1404,  3500 => 1403,  3496 => 1401,  3491 => 1399,  3488 => 1398,  3485 => 1397,  3480 => 1395,  3477 => 1394,  3474 => 1393,  3469 => 1391,  3466 => 1390,  3464 => 1389,  3460 => 1387,  3455 => 1385,  3452 => 1384,  3450 => 1383,  3446 => 1381,  3441 => 1379,  3438 => 1378,  3435 => 1377,  3430 => 1375,  3427 => 1374,  3424 => 1373,  3419 => 1371,  3416 => 1370,  3414 => 1369,  3410 => 1367,  3405 => 1365,  3402 => 1364,  3399 => 1363,  3394 => 1361,  3391 => 1360,  3388 => 1359,  3383 => 1357,  3380 => 1356,  3378 => 1355,  3374 => 1353,  3369 => 1351,  3366 => 1350,  3363 => 1349,  3358 => 1347,  3355 => 1346,  3352 => 1345,  3347 => 1343,  3344 => 1342,  3342 => 1341,  3338 => 1339,  3333 => 1337,  3330 => 1336,  3327 => 1335,  3322 => 1333,  3319 => 1332,  3316 => 1331,  3311 => 1329,  3308 => 1328,  3306 => 1327,  3302 => 1325,  3297 => 1323,  3294 => 1322,  3291 => 1321,  3286 => 1319,  3283 => 1318,  3280 => 1317,  3275 => 1315,  3272 => 1314,  3270 => 1313,  3266 => 1311,  3261 => 1309,  3258 => 1308,  3255 => 1307,  3250 => 1305,  3247 => 1304,  3244 => 1303,  3239 => 1301,  3236 => 1300,  3234 => 1299,  3230 => 1297,  3225 => 1295,  3222 => 1294,  3219 => 1293,  3214 => 1291,  3211 => 1290,  3208 => 1289,  3203 => 1287,  3200 => 1286,  3198 => 1285,  3194 => 1283,  3189 => 1281,  3186 => 1280,  3183 => 1279,  3178 => 1277,  3175 => 1276,  3172 => 1275,  3167 => 1273,  3164 => 1272,  3162 => 1271,  3158 => 1269,  3153 => 1267,  3150 => 1266,  3147 => 1265,  3142 => 1263,  3139 => 1262,  3136 => 1261,  3131 => 1259,  3128 => 1258,  3126 => 1257,  3122 => 1255,  3117 => 1253,  3114 => 1252,  3111 => 1251,  3106 => 1249,  3103 => 1248,  3100 => 1247,  3095 => 1245,  3092 => 1244,  3090 => 1243,  3086 => 1241,  3081 => 1239,  3078 => 1238,  3075 => 1237,  3070 => 1235,  3067 => 1234,  3064 => 1233,  3059 => 1231,  3056 => 1230,  3054 => 1229,  3050 => 1227,  3045 => 1225,  3042 => 1224,  3039 => 1223,  3034 => 1221,  3031 => 1220,  3028 => 1219,  3023 => 1217,  3020 => 1216,  3018 => 1215,  3014 => 1213,  3009 => 1211,  3006 => 1210,  3003 => 1209,  2998 => 1207,  2995 => 1206,  2992 => 1205,  2987 => 1203,  2984 => 1202,  2982 => 1201,  2978 => 1199,  2973 => 1197,  2970 => 1196,  2967 => 1195,  2962 => 1193,  2959 => 1192,  2956 => 1191,  2951 => 1189,  2948 => 1188,  2946 => 1187,  2942 => 1185,  2937 => 1183,  2934 => 1182,  2931 => 1181,  2926 => 1179,  2923 => 1178,  2920 => 1177,  2915 => 1175,  2912 => 1174,  2910 => 1173,  2906 => 1171,  2901 => 1169,  2898 => 1168,  2895 => 1167,  2890 => 1165,  2887 => 1164,  2884 => 1163,  2879 => 1161,  2876 => 1160,  2874 => 1159,  2870 => 1157,  2865 => 1155,  2862 => 1154,  2859 => 1153,  2854 => 1151,  2851 => 1150,  2848 => 1149,  2843 => 1147,  2840 => 1146,  2838 => 1145,  2834 => 1143,  2829 => 1141,  2826 => 1140,  2823 => 1139,  2818 => 1137,  2815 => 1136,  2812 => 1135,  2807 => 1133,  2804 => 1132,  2802 => 1131,  2798 => 1129,  2793 => 1127,  2790 => 1126,  2787 => 1125,  2782 => 1123,  2779 => 1122,  2776 => 1121,  2771 => 1119,  2768 => 1118,  2766 => 1117,  2762 => 1115,  2757 => 1113,  2754 => 1112,  2751 => 1111,  2746 => 1109,  2743 => 1108,  2740 => 1107,  2735 => 1105,  2732 => 1104,  2730 => 1103,  2726 => 1101,  2721 => 1099,  2718 => 1098,  2715 => 1097,  2710 => 1095,  2707 => 1094,  2704 => 1093,  2699 => 1091,  2696 => 1090,  2694 => 1089,  2690 => 1087,  2685 => 1085,  2682 => 1084,  2679 => 1083,  2674 => 1081,  2671 => 1080,  2668 => 1079,  2663 => 1077,  2660 => 1076,  2658 => 1075,  2654 => 1073,  2649 => 1071,  2646 => 1070,  2643 => 1069,  2638 => 1067,  2635 => 1066,  2632 => 1065,  2627 => 1063,  2624 => 1062,  2622 => 1061,  2618 => 1059,  2613 => 1057,  2610 => 1056,  2607 => 1055,  2602 => 1053,  2599 => 1052,  2596 => 1051,  2591 => 1049,  2588 => 1048,  2586 => 1047,  2582 => 1045,  2577 => 1043,  2574 => 1042,  2571 => 1041,  2566 => 1039,  2563 => 1038,  2560 => 1037,  2555 => 1035,  2552 => 1034,  2550 => 1033,  2546 => 1031,  2541 => 1029,  2538 => 1028,  2535 => 1027,  2530 => 1025,  2527 => 1024,  2524 => 1023,  2519 => 1021,  2516 => 1020,  2514 => 1019,  2510 => 1017,  2505 => 1015,  2502 => 1014,  2499 => 1013,  2494 => 1011,  2491 => 1010,  2488 => 1009,  2483 => 1007,  2480 => 1006,  2478 => 1005,  2474 => 1003,  2469 => 1001,  2466 => 1000,  2463 => 999,  2458 => 997,  2455 => 996,  2452 => 995,  2447 => 993,  2444 => 992,  2442 => 991,  2438 => 989,  2433 => 987,  2430 => 986,  2427 => 985,  2422 => 983,  2419 => 982,  2416 => 981,  2411 => 979,  2408 => 978,  2406 => 977,  2402 => 975,  2397 => 973,  2394 => 972,  2391 => 971,  2386 => 969,  2383 => 968,  2380 => 967,  2375 => 965,  2372 => 964,  2370 => 963,  2366 => 961,  2361 => 959,  2358 => 958,  2355 => 957,  2350 => 955,  2347 => 954,  2344 => 953,  2339 => 951,  2336 => 950,  2334 => 949,  2330 => 947,  2325 => 945,  2322 => 944,  2319 => 943,  2314 => 941,  2311 => 940,  2308 => 939,  2303 => 937,  2300 => 936,  2298 => 935,  2294 => 933,  2289 => 931,  2286 => 930,  2283 => 929,  2278 => 927,  2275 => 926,  2272 => 925,  2267 => 923,  2264 => 922,  2262 => 921,  2258 => 919,  2253 => 917,  2250 => 916,  2247 => 915,  2242 => 913,  2239 => 912,  2236 => 911,  2231 => 909,  2228 => 908,  2226 => 907,  2222 => 905,  2217 => 903,  2214 => 902,  2211 => 901,  2206 => 899,  2203 => 898,  2200 => 897,  2195 => 895,  2192 => 894,  2190 => 893,  2186 => 891,  2181 => 889,  2178 => 888,  2175 => 887,  2170 => 885,  2167 => 884,  2164 => 883,  2159 => 881,  2156 => 880,  2154 => 879,  2150 => 877,  2145 => 875,  2142 => 874,  2139 => 873,  2134 => 871,  2131 => 870,  2128 => 869,  2123 => 867,  2120 => 866,  2118 => 865,  2114 => 863,  2109 => 861,  2106 => 860,  2103 => 859,  2098 => 857,  2095 => 856,  2092 => 855,  2087 => 853,  2084 => 852,  2082 => 851,  2078 => 849,  2073 => 847,  2070 => 846,  2067 => 845,  2062 => 843,  2059 => 842,  2056 => 841,  2051 => 839,  2048 => 838,  2046 => 837,  2042 => 835,  2037 => 833,  2034 => 832,  2031 => 831,  2026 => 829,  2023 => 828,  2020 => 827,  2015 => 825,  2012 => 824,  2010 => 823,  2006 => 821,  2001 => 819,  1998 => 818,  1995 => 817,  1990 => 815,  1987 => 814,  1984 => 813,  1979 => 811,  1976 => 810,  1974 => 809,  1970 => 807,  1965 => 805,  1962 => 804,  1959 => 803,  1954 => 801,  1951 => 800,  1948 => 799,  1943 => 797,  1940 => 796,  1938 => 795,  1934 => 793,  1929 => 791,  1926 => 790,  1923 => 789,  1918 => 787,  1915 => 786,  1912 => 785,  1907 => 783,  1904 => 782,  1902 => 781,  1898 => 779,  1893 => 777,  1890 => 776,  1887 => 775,  1882 => 773,  1879 => 772,  1876 => 771,  1871 => 769,  1868 => 768,  1866 => 767,  1862 => 765,  1857 => 763,  1854 => 762,  1851 => 761,  1846 => 759,  1843 => 758,  1840 => 757,  1835 => 755,  1832 => 754,  1830 => 753,  1826 => 751,  1821 => 749,  1818 => 748,  1815 => 747,  1810 => 745,  1807 => 744,  1804 => 743,  1799 => 741,  1796 => 740,  1794 => 739,  1790 => 737,  1785 => 735,  1782 => 734,  1779 => 733,  1774 => 731,  1771 => 730,  1768 => 729,  1763 => 727,  1760 => 726,  1758 => 725,  1754 => 723,  1749 => 721,  1746 => 720,  1743 => 719,  1738 => 717,  1735 => 716,  1732 => 715,  1727 => 713,  1724 => 712,  1722 => 711,  1718 => 709,  1713 => 706,  1707 => 704,  1704 => 703,  1698 => 701,  1695 => 700,  1689 => 698,  1687 => 697,  1682 => 694,  1680 => 693,  1677 => 692,  1672 => 689,  1666 => 687,  1663 => 686,  1657 => 684,  1654 => 683,  1648 => 681,  1646 => 680,  1641 => 677,  1639 => 676,  1636 => 675,  1631 => 672,  1625 => 670,  1622 => 669,  1616 => 667,  1613 => 666,  1607 => 664,  1605 => 663,  1600 => 660,  1598 => 659,  1595 => 658,  1590 => 656,  1587 => 655,  1584 => 654,  1579 => 652,  1576 => 651,  1573 => 650,  1568 => 648,  1565 => 647,  1563 => 646,  1559 => 644,  1554 => 642,  1551 => 641,  1548 => 640,  1543 => 638,  1540 => 637,  1537 => 636,  1532 => 634,  1529 => 633,  1527 => 632,  1523 => 630,  1518 => 628,  1515 => 627,  1512 => 626,  1507 => 624,  1504 => 623,  1501 => 622,  1496 => 620,  1493 => 619,  1491 => 618,  1487 => 616,  1482 => 614,  1479 => 613,  1476 => 612,  1471 => 610,  1468 => 609,  1465 => 608,  1460 => 606,  1457 => 605,  1455 => 604,  1451 => 602,  1446 => 600,  1443 => 599,  1440 => 598,  1435 => 596,  1432 => 595,  1429 => 594,  1424 => 592,  1421 => 591,  1419 => 590,  1415 => 588,  1410 => 586,  1407 => 585,  1404 => 584,  1399 => 582,  1396 => 581,  1393 => 580,  1388 => 578,  1385 => 577,  1383 => 576,  1379 => 574,  1374 => 572,  1371 => 571,  1368 => 570,  1363 => 568,  1360 => 567,  1357 => 566,  1352 => 564,  1349 => 563,  1347 => 562,  1343 => 560,  1338 => 558,  1335 => 557,  1332 => 556,  1327 => 554,  1324 => 553,  1321 => 552,  1316 => 550,  1313 => 549,  1311 => 548,  1307 => 546,  1302 => 544,  1299 => 543,  1296 => 542,  1291 => 540,  1288 => 539,  1285 => 538,  1280 => 536,  1277 => 535,  1275 => 534,  1271 => 532,  1266 => 530,  1263 => 529,  1260 => 528,  1255 => 526,  1252 => 525,  1249 => 524,  1244 => 522,  1241 => 521,  1239 => 520,  1235 => 518,  1230 => 516,  1227 => 515,  1224 => 514,  1219 => 512,  1216 => 511,  1213 => 510,  1208 => 508,  1205 => 507,  1203 => 506,  1199 => 504,  1194 => 502,  1191 => 501,  1188 => 500,  1183 => 498,  1180 => 497,  1177 => 496,  1172 => 494,  1169 => 493,  1167 => 492,  1163 => 490,  1158 => 488,  1155 => 487,  1152 => 486,  1147 => 484,  1144 => 483,  1141 => 482,  1136 => 480,  1133 => 479,  1131 => 478,  1127 => 476,  1122 => 474,  1119 => 473,  1116 => 472,  1111 => 470,  1108 => 469,  1105 => 468,  1100 => 466,  1097 => 465,  1095 => 464,  1091 => 462,  1086 => 460,  1083 => 459,  1080 => 458,  1075 => 456,  1072 => 455,  1069 => 454,  1064 => 452,  1061 => 451,  1059 => 450,  1055 => 448,  1050 => 446,  1047 => 445,  1044 => 444,  1039 => 442,  1036 => 441,  1033 => 440,  1028 => 438,  1025 => 437,  1023 => 436,  1019 => 434,  1014 => 432,  1011 => 431,  1008 => 430,  1003 => 428,  1000 => 427,  997 => 426,  992 => 424,  989 => 423,  987 => 422,  983 => 420,  978 => 418,  975 => 417,  972 => 416,  967 => 414,  964 => 413,  961 => 412,  956 => 410,  953 => 409,  951 => 408,  947 => 406,  942 => 404,  939 => 403,  936 => 402,  931 => 400,  928 => 399,  925 => 398,  920 => 396,  917 => 395,  915 => 394,  911 => 392,  906 => 390,  903 => 389,  900 => 388,  895 => 386,  892 => 385,  889 => 384,  884 => 382,  881 => 381,  879 => 380,  875 => 378,  870 => 376,  867 => 375,  864 => 374,  859 => 372,  856 => 371,  853 => 370,  848 => 368,  845 => 367,  843 => 366,  839 => 364,  834 => 362,  831 => 361,  828 => 360,  823 => 358,  820 => 357,  817 => 356,  812 => 354,  809 => 353,  807 => 352,  803 => 350,  798 => 348,  795 => 347,  792 => 346,  787 => 344,  784 => 343,  781 => 342,  776 => 340,  773 => 339,  771 => 338,  767 => 336,  762 => 334,  759 => 333,  756 => 332,  751 => 330,  748 => 329,  745 => 328,  740 => 326,  737 => 325,  735 => 324,  731 => 322,  726 => 320,  723 => 319,  720 => 318,  715 => 316,  712 => 315,  709 => 314,  704 => 312,  701 => 311,  699 => 310,  695 => 308,  690 => 306,  687 => 305,  684 => 304,  679 => 302,  676 => 301,  673 => 300,  668 => 298,  665 => 297,  663 => 296,  659 => 294,  654 => 292,  651 => 291,  648 => 290,  643 => 288,  640 => 287,  637 => 286,  632 => 284,  629 => 283,  627 => 282,  623 => 280,  618 => 278,  615 => 277,  612 => 276,  607 => 274,  604 => 273,  601 => 272,  596 => 270,  593 => 269,  591 => 268,  587 => 266,  582 => 264,  579 => 263,  576 => 262,  571 => 260,  568 => 259,  565 => 258,  560 => 256,  557 => 255,  555 => 254,  551 => 252,  546 => 250,  543 => 249,  540 => 248,  535 => 246,  532 => 245,  529 => 244,  524 => 242,  521 => 241,  519 => 240,  515 => 238,  510 => 236,  507 => 235,  504 => 234,  499 => 232,  496 => 231,  493 => 230,  488 => 228,  485 => 227,  483 => 226,  479 => 224,  474 => 222,  471 => 221,  468 => 220,  463 => 218,  460 => 217,  457 => 216,  452 => 214,  449 => 213,  447 => 212,  443 => 210,  438 => 208,  435 => 207,  432 => 206,  427 => 204,  424 => 203,  421 => 202,  416 => 200,  413 => 199,  411 => 198,  407 => 196,  402 => 194,  399 => 193,  396 => 192,  391 => 190,  388 => 189,  385 => 188,  380 => 186,  377 => 185,  375 => 184,  371 => 182,  366 => 180,  363 => 179,  360 => 178,  355 => 176,  352 => 175,  349 => 174,  344 => 172,  341 => 171,  339 => 170,  335 => 168,  330 => 166,  327 => 165,  324 => 164,  319 => 162,  316 => 161,  313 => 160,  308 => 158,  305 => 157,  303 => 156,  299 => 154,  294 => 152,  291 => 151,  288 => 150,  283 => 148,  280 => 147,  277 => 146,  272 => 144,  269 => 143,  267 => 142,  263 => 140,  258 => 138,  255 => 137,  252 => 136,  247 => 134,  244 => 133,  241 => 132,  236 => 130,  233 => 129,  231 => 128,  227 => 126,  222 => 124,  219 => 123,  216 => 122,  211 => 120,  208 => 119,  205 => 118,  200 => 116,  197 => 115,  195 => 114,  191 => 112,  186 => 110,  183 => 109,  180 => 108,  175 => 106,  172 => 105,  169 => 104,  164 => 102,  161 => 101,  159 => 100,  155 => 98,  150 => 96,  147 => 95,  144 => 94,  139 => 92,  136 => 91,  133 => 90,  128 => 88,  125 => 87,  122 => 86,  117 => 83,  107 => 76,  102 => 74,  92 => 66,  90 => 65,  82 => 60,  77 => 58,  39 => 22,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/layout/commerce-product.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/layout/commerce-product.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 65, "if" => 86);
        static $filters = array("escape" => 58);
        static $functions = array("drupal_entity" => 2127);

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
