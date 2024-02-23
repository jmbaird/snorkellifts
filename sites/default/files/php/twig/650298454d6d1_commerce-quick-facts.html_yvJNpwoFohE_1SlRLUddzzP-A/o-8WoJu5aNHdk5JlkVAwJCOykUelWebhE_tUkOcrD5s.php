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

/* themes/sglobal/partials/commerce-quick-facts.html.twig */
class __TwigTemplate_88aaa3c82a4e1ba4c20a569c553ed564 extends \Twig\Template
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
        // line 1
        echo "<!-- MAX. WORKING HEIGHT -->
";
        // line 2
        if (((($context["attribute_max_working_height"] ?? null) || ($context["attribute_max_work_height_ansi_m"] ?? null)) || ($context["attribute_max_work_height_ce_met"] ?? null))) {
            // line 3
            echo "\t<div>
\t\t<svg xmlns=\"htts://www.w3.org/2000/svg\" viewBox=\"0 0 35.47 39.05\">
\t\t\t<polygon class=\"54e9c2a7-753c-454e-95cb-007a441a89ab\" points=\"4.94 1.3 4.94 0 1.3 0 0 0 0 1.3 0 37.76 0 39.05 0 39.05 4.94 39.05 4.94 37.76 1.3 37.76 1.3 34.24 4.28 34.24 4.28 33.81 1.3 33.81 1.3 29.44 4.28 29.44 4.28 29 1.3 29 1.3 24.63 4.28 24.63 4.28 24.2 1.3 24.2 1.3 19.83 4.28 19.83 4.28 19.4 1.3 19.4 1.3 15.03 4.28 15.03 4.28 14.59 1.3 14.59 1.3 10.22 4.28 10.22 4.28 9.79 1.3 9.79 1.3 5.42 4.28 5.42 4.28 4.98 1.3 4.98 1.3 1.3 4.94 1.3\"/>
\t\t\t<g>
\t\t\t\t<path class=\"54e9c2a7-753c-454e-95cb-007a441a89ab\" d=\"M31.2,12.51h-3l-2.9-3.87A2.2,2.2,0,0,0,23.1,7.21H18.76a3,3,0,0,0-1.57.52h0l-.05.07a2,2,0,0,0-.57.77l-2.91,3.94H10.46a4.12,4.12,0,0,0-4.27,4.27v18a4.12,4.12,0,0,0,4.27,4.27H31.2a4.12,4.12,0,0,0,4.27-4.27v-18A4.12,4.12,0,0,0,31.2,12.51ZM20.46,32.59V23.68h.93v8.91Zm-4.17,0H7.41V23.68h8.88Zm9.28,0V23.68h8.68v8.91ZM10.47,13.73H12.7L9.79,17.67,12.17,19l3.57-5.23h.58v3.7a2.39,2.39,0,0,0,2.44,2.44H23.1a2.39,2.39,0,0,0,2.44-2.44v-3.7h.61L29.71,19l2.38-1.29-3-3.94H31.2a2.93,2.93,0,0,1,3.05,3v5.68H25.57V21.18a1,1,0,0,0-1-1H22.39a1,1,0,0,0-1,1v1.28h-.93V21.18a1,1,0,0,0-1-1H17.29a1,1,0,0,0-1,1v1.28H7.41V16.78A2.93,2.93,0,0,1,10.47,13.73Z\"/>
\t\t\t\t<ellipse class=\"54e9c2a7-753c-454e-95cb-007a441a89ab\" cx=\"20.93\" cy=\"3.06\" rx=\"3.02\" ry=\"3.06\"/>
\t\t\t</g>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 13
            if (($context["attribute_max_working_height"] ?? null)) {
                // line 14
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_working_height"] ?? null), 14, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 16
            echo "\t\t\t\t";
            if (($context["attribute_max_work_height_ansi_m"] ?? null)) {
                // line 17
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_work_height_ansi_m"] ?? null), 17, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 19
            echo "\t\t\t\t";
            if (($context["attribute_max_work_height_ce_met"] ?? null)) {
                // line 20
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_work_height_ce_met"] ?? null), 20, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 22
            echo "\t\t\t</span>
\t\t\tWorking Height
\t\t</div>
\t</div>
";
        }
        // line 27
        echo "
<!-- PLATFORM CAPACITY -->
";
        // line 29
        if ((((((($context["attribute_platform_capacity_swl_"] ?? null) || ($context["attribute_power_capacity_ansi_me"] ?? null)) || ($context["attribute_power_capacity_ce_metr"] ?? null)) || ($context["attribute_platform_capacity_unre"] ?? null)) || ($context["attribute_pcu_ansi_metric_"] ?? null)) || ($context["attribute_pcu_ce_metric_"] ?? null))) {
            // line 30
            echo "\t<div>
\t\t<svg id=\"08e8dd98-c047-47e2-834c-3ec38aca522d\" data-name=\"Layer 1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 49.28 26.54\">
\t\t\t<path class=\"8a560f45-d30a-4211-842e-cd2472393cc3\" d=\"M45,0H4.27A4.12,4.12,0,0,0,0,4.27v18a4.12,4.12,0,0,0,4.27,4.27H45a4.12,4.12,0,0,0,4.27-4.27v-18A4.12,4.12,0,0,0,45,0ZM23.46,4.73a1.18,1.18,0,1,1,1.47,1.14h-.58A1.18,1.18,0,0,1,23.46,4.73Zm9.7,1.14H27a2.59,2.59,0,1,0-4.65,0H16.12L15.63,10H11.58V1.22H37.7V10H33.65Zm-17.67,5.3-.93,7.64H34.72l-.93-7.64h3.9v10H11.58v-10Zm-5.06,10H1.22v-10h9.2Zm28.43,0v-10h9.2v10Zm9.2-16.89V10h-9.2V1.22H45A2.93,2.93,0,0,1,48.06,4.27Zm-43.78-3h6.15V10H1.22V4.27A2.93,2.93,0,0,1,4.27,1.22Z\" transform=\"translate(0 0)\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 36
            if (($context["attribute_platform_capacity_swl_"] ?? null)) {
                // line 37
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_capacity_swl_"] ?? null), 37, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 39
            echo "\t\t\t\t";
            if (($context["attribute_power_capacity_ansi_me"] ?? null)) {
                // line 40
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_power_capacity_ansi_me"] ?? null), 40, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 42
            echo "\t\t\t\t";
            if (($context["attribute_power_capacity_ce_metr"] ?? null)) {
                // line 43
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_power_capacity_ce_metr"] ?? null), 43, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 45
            echo "\t\t\t\t";
            if (($context["attribute_platform_capacity_unre"] ?? null)) {
                // line 46
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_platform_capacity_unre"] ?? null), 46, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 48
            echo "\t\t\t\t";
            if (($context["attribute_pcu_ansi_metric_"] ?? null)) {
                // line 49
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pcu_ansi_metric_"] ?? null), 49, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 51
            echo "\t\t\t\t";
            if (($context["attribute_pcu_ce_metric_"] ?? null)) {
                // line 52
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_pcu_ce_metric_"] ?? null), 52, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 54
            echo "\t\t\t</span>
\t\t\tPlatform Capacity
\t\t</div>
\t</div>
";
        }
        // line 59
        echo "
<!-- MAX LIFT CAPACITY -->
";
        // line 61
        if (((($context["attribute_max_lift_capacity"] ?? null) || ($context["attribute_mlc_ansi_metric_"] ?? null)) || ($context["attribute_mlc_ce_metric_"] ?? null))) {
            // line 62
            echo "\t<div>
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 63.16 46.13\">
\t\t\t<path class=\"388a794d-26b8-4ea9-981c-1d1b3375b1f4\" d=\"M43.47,7.19a2.61,2.61,0,0,1-2,2.53H40.22a2.61,2.61,0,1,1,3.25-2.53M59.69,9.72H46a5.73,5.73,0,1,0-10.29,0H22L18.57,38.33H63.16Z\"/>
\t\t\t<path class=\"388a794d-26b8-4ea9-981c-1d1b3375b1f4\" d=\"M8.92,40.68a3.47,3.47,0,1,1-3.47-3.47,3.47,3.47,0,0,1,3.47,3.47m2.39,1.86L16.76,0H9.9L7.23,35.56a5.41,5.41,0,0,0-1.78-.32,5.45,5.45,0,0,0,0,10.9,5.37,5.37,0,0,0,1.43-.21h49l3.45-3.38Z\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 69
            if (($context["attribute_max_lift_capacity"] ?? null)) {
                // line 70
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_lift_capacity"] ?? null), 70, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 72
            echo "\t\t\t\t";
            if (($context["attribute_mlc_ansi_metric_"] ?? null)) {
                // line 73
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc_ansi_metric_"] ?? null), 73, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 75
            echo "\t\t\t\t";
            if (($context["attribute_mlc_ce_metric_"] ?? null)) {
                // line 76
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc_ce_metric_"] ?? null), 76, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 78
            echo "\t\t\t</span>
\t\t\tLift Capacity
\t\t</div>
\t</div>
";
        }
        // line 83
        echo "
<!-- MAX LIFT HEIGHT -->
";
        // line 85
        if (((($context["attribute_max_lift_height"] ?? null) || ($context["attribute_mlh_ansi_metric_"] ?? null)) || ($context["attribute_mlh_ce_metric_"] ?? null))) {
            // line 86
            echo "\t<div>
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 52.35 46.13\">
\t\t\t<polygon class=\"bc00c25a-d397-4cdb-b1da-229d972bb77b\" points=\"5.79 1.89 5.79 0.37 0 0.37 0 0.37 0 0.37 0 46.13 0 46.13 0 46.13 5.79 46.13 5.79 44.61 1.52 44.61 1.52 40.49 5.01 40.49 5.01 39.98 1.52 39.98 1.52 34.86 5.01 34.86 5.01 34.36 1.52 34.36 1.52 29.23 5.01 29.23 5.01 28.73 1.52 28.73 1.52 23.6 5.01 23.6 5.01 23.1 1.52 23.1 1.52 17.97 5.01 17.97 5.01 17.47 1.52 17.47 1.52 12.34 5.01 12.34 5.01 11.84 1.52 11.84 1.52 6.71 5.01 6.71 5.01 6.21 1.52 6.21 1.52 1.89 5.79 1.89\"/>
\t\t\t<path class=\"bc00c25a-d397-4cdb-b1da-229d972bb77b\" d=\"M52.28,36.7l0-.11v0l-.17-.8-.08-.13,0-.08v0l-.33-.74-.21-.18v-.11l0,0a4.42,4.42,0,0,0-.47-.49A2.66,2.66,0,0,0,50,33.34l-.13-.07a3.19,3.19,0,0,0-.79-.23L49,32s0-.15-.39-.21h0l.29-.29,0-1.12-.58-1.67h-.21l-.19-1.1s-.1-.41-.39-.41h-.32l-1.16-3.82A2.16,2.16,0,0,0,44.32,22l-1.76-.11-.07-.09a15.08,15.08,0,0,0-2,0L32,8.88l-.4.07-.21-.27a.44.44,0,0,0,0-.34L29.84,6.11a.52.52,0,0,0-.62-.18l-.93.55S28,6.42,28,6.5L26,7.69l-.32-1.83a.88.88,0,0,0-.09-1l-1.07-1,0-.41-.44-1.19-.19,0h0L23,.11,22.17,0l-4.4,3.27a.45.45,0,0,0-.12.23L17.28,6l-.16,0,.11,2.45.35,1.33,0,1.58L13.22,11l-4.39-.38-1.34,0-.14.14,0,.14,1.32.3,3.78.5,1.09.11,2.78.23,1.32.12v.47L9,12l-3-.14-.18.11,0,.14,1.81.3,4.59.53,5.47.34,0,.18,1,0v-.14l.26,0,.44-.21.6,0a.42.42,0,0,0,.18-.29l.34-.14a.89.89,0,0,0,1.12.27s.42.52.46-.16a2.21,2.21,0,0,1,.28-.11c0,.09.36.41.42-.11l1.67-.32.28-.14.49-.09a.48.48,0,0,0,.16-.73l.39,0,.42-.14a.92.92,0,0,0,.74-1l.26-.25.46-.45h0a.72.72,0,0,1,.68.48l-.21.14,0,.21,5.63,8.15-.21.21-.09,1.21.3.39.14,0,0,.09.74,0,.88,1.51a14.53,14.53,0,0,0-3.29.57l.12.27h-.3l-.07.11-.25.07-.19.16a.9.9,0,0,0,0,.55c.1.19.15.22.24.23l.37,0,.39-.09.11-.07.12-.12.16.12a10.52,10.52,0,0,0-3.15,4.67,16.54,16.54,0,0,0-7.16,3.41l.09.23,0,.09.7,1.51-.72.34a1.78,1.78,0,0,0-.26.14A1.9,1.9,0,0,0,22,34l-.12-.06a3.08,3.08,0,0,0-1-.24h-.15l-.08,0h0l-.79,0v.22h-.05l-.07-.12,0-.06-.72.22v.27L18.84,34,18.79,34l-.64.47,0,.31L18,34.67l-.06,0-.55.57.06.33h0l-.11,0h-.06l-.38.76.06.3h-.18l-.16,1,.07.16h-.08l0,.88.16.34,0,0,.2.56.25.48.53.77h0A3.82,3.82,0,0,0,20.1,42h0l.67.08h0L20.9,42l.07,0,0,0,.73-.16.09-.09H22l.65-.4.1-.19h.11l.56-.62v-.18l.11,0h0l0-.08,0,.07.14,0,0,.06h-.11l0,1.12.22.45,0,0,.26.71.34.62.71,1h0A5.1,5.1,0,0,0,28.25,46h0c.2,0,.89.1.89.1h0l.13-.11.11.08,0,0,1-.21.13-.13h.18l.86-.51.14-.25h.15l.73-.79V44l.16-.06h0l.49-1,0-.25.13,0h.05l.31-1.14-.09-.26.11,0,0,0,0-1.12-.09-.31.05-.14v0l-.07-.33,1.88.55a2.64,2.64,0,0,0,1.71.28L43.92,39s.44-.14.69-.25a2.5,2.5,0,0,0,1-1.07l.22-.24h0v0l.1-.45h0l.06-.12.24-.13-.15.84-.27.14,0,.05.27-.14.3.12-.47.28-.26-.11,0,.06.22.09-.07,0,0,.15-.13.17h0l.24.62.24-.05h0l.38-.12h0l-.53.52.06.13-.17.16,0,0,.44.48-.08.07-.3.26h0l-.09-.11,0,0h0l-.4-.6v-.18l.26.2.33-.22,0-.05-.29.19-.33-.25v.21l-.07-.1L45,39.07l-.05-.14.51.63.06-.19h.11l.29-.26,0,0-.27.24h-.13l0,.13-.44-.55,0-.38-.07.07,0,.3-.07-.2a.33.33,0,0,1-.16.08l.14.39.26.51.54.81A3.88,3.88,0,0,0,48,41.79h0l.68.08h0l.1-.09.07,0,0,0,.74-.17.1-.1h.14l.67-.41.11-.2h.11l.57-.65v-.19l.11,0h0l.38-.81,0-.19.08,0H52l.24-.94-.07-.2.07,0,0,0,0-.92Z\" transform=\"translate(0)\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 93
            if (($context["attribute_max_lift_height"] ?? null)) {
                // line 94
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_lift_height"] ?? null), 94, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 96
            echo "\t\t\t\t";
            if (($context["attribute_mlh_ansi_metric_"] ?? null)) {
                // line 97
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlh_ansi_metric_"] ?? null), 97, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 99
            echo "\t\t\t\t";
            if (($context["attribute_mlh_ce_metric_"] ?? null)) {
                // line 100
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlh_ce_metric_"] ?? null), 100, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 102
            echo "\t\t\t</span>
\t\t\tLift Height
\t\t</div>
\t</div>
";
        }
        // line 107
        echo "
<!-- LIFT HEIGHT FORKS UP -->
";
        // line 109
        if (((($context["attribute_lift_height_forks_up_"] ?? null) || ($context["attribute_lhfu_ansi_metric_"] ?? null)) || ($context["attribute_lhfu_ce_metric_"] ?? null))) {
            // line 110
            echo "\t<div>
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 36.28 30.53\">
\t\t\t<polygon class=\"a56bad11-106e-47f4-9c3e-1a54a186cae8\" points=\"36.28 17.55 18.14 0 0 17.55 10.29 17.55 10.29 30.53 25.99 30.53 25.99 17.55 36.28 17.55\"/>
\t\t\t<polygon class=\"a56bad11-106e-47f4-9c3e-1a54a186cae8\" points=\"30.6 30.53 30.67 23.69 36.28 22.61 36.28 19.8 27.88 19.8 27.88 23.93 27.88 30.53 30.6 30.53\"/>
\t\t\t<polygon class=\"a56bad11-106e-47f4-9c3e-1a54a186cae8\" points=\"5.68 30.53 5.61 23.69 0 22.61 0 19.8 8.4 19.8 8.4 23.93 8.4 30.53 5.68 30.53\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 118
            if (($context["attribute_lift_height_forks_up_"] ?? null)) {
                // line 119
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_lift_height_forks_up_"] ?? null), 119, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 121
            echo "\t\t\t\t";
            if (($context["attribute_lhfu_ansi_metric_"] ?? null)) {
                // line 122
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_lhfu_ansi_metric_"] ?? null), 122, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 124
            echo "\t\t\t\t";
            if (($context["attribute_lhfu_ce_metric_"] ?? null)) {
                // line 125
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_lhfu_ce_metric_"] ?? null), 125, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 127
            echo "\t\t\t</span>
\t\t\tLift Height (Forks Up)
\t\t</div>
\t</div>
";
        }
        // line 132
        echo "
<!-- MAX LOAD CAPACITY 14 IN -->
";
        // line 134
        if (((($context["attribute_max_load_capacity_14_i"] ?? null) || ($context["attribute_mlc14_ansi_metric_"] ?? null)) || ($context["attribute_mlc14_ce_metric_"] ?? null))) {
            // line 135
            echo "\t<div>
\t\t<svg id=\"3da20bb3-4a21-4ed7-808e-59e0c2895a72\" data-name=\"Layer 1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 38.84 18.4\">
\t\t\t<polygon class=\"463e6639-9086-4493-967e-c6e88922558a\" points=\"37.18 15.68 3.89 14.61 2.81 0 0 0 0 18.4 4.13 18.4 38.84 18.4 37.18 15.68\"/>
\t\t\t<path class=\"463e6639-9086-4493-967e-c6e88922558a\" d=\"M36,12.34,32.7,7.27l2.94-4.55H32.87l-1.6,2.74L29.62,2.72H26.84l3,4.5-3.37,5.12h2.74l2-3.4,2.08,3.4ZM22.41,9h-2l1-3.29h0Zm3.78,3.34L22.37,2.72H20.43l-3.86,9.62h2.64l.51-1.39h3.34l.47,1.39Zm-10.61,0V2.72H12.41L10.53,9.05h0L8.59,2.72H5.43v9.62H7.69l-.08-7.2,0,0,2.06,7.23h1.63l2.05-7.23,0,0-.08,7.2Z\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 142
            if (($context["attribute_max_load_capacity_14_i"] ?? null)) {
                // line 143
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_max_load_capacity_14_i"] ?? null), 143, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 145
            echo "\t\t\t\t";
            if (($context["attribute_mlc14_ansi_metric_"] ?? null)) {
                // line 146
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc14_ansi_metric_"] ?? null), 146, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 148
            echo "\t\t\t\t";
            if (($context["attribute_mlc14_ce_metric_"] ?? null)) {
                // line 149
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_mlc14_ce_metric_"] ?? null), 149, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 151
            echo "\t\t\t</span>
\t\t\tMax. Load Capacity (14 in. load center)
\t\t</div>
\t</div>
";
        }
        // line 156
        echo "
<!-- WEIGHT -->
";
        // line 158
        if (((($context["attribute_weight"] ?? null) || ($context["attribute_weight_ansi_metric_"] ?? null)) || ($context["attribute_weight_ce_metric_"] ?? null))) {
            // line 159
            echo "\t<div>
\t\t<svg id=\"9d5b70e0-031c-466b-a46a-aa6976708dd8\" data-name=\"Layer 1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 44.59 36.87\">
\t\t\t<path class=\"5d3c0573-6657-4227-99de-54128ee42340\" d=\"M24.91,5.73a2.61,2.61,0,0,1-2,2.53H21.65a2.61,2.61,0,1,1,3.25-2.53M41.13,8.26H27.44a5.73,5.73,0,1,0-10.29,0H3.47L0,36.87H44.59Z\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 165
            if (($context["attribute_weight"] ?? null)) {
                // line 166
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight"] ?? null), 166, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 168
            echo "\t\t\t\t";
            if (($context["attribute_weight_ansi_metric_"] ?? null)) {
                // line 169
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight_ansi_metric_"] ?? null), 169, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 171
            echo "\t\t\t\t";
            if (($context["attribute_weight_ce_metric_"] ?? null)) {
                // line 172
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight_ce_metric_"] ?? null), 172, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 174
            echo "\t\t\t</span>
\t\t\tWeight
\t\t</div>
\t</div>
";
        }
        // line 179
        echo "
<!-- WEIGHT AC -->
";
        // line 181
        if (((($context["attribute_weight_ac_"] ?? null) || ($context["attribute_weightac_ansi_metric_"] ?? null)) || ($context["attribute_weightac_ansi_metric_"] ?? null))) {
            // line 182
            echo "\t<div>
\t\t<svg id=\"9d5b70e0-031c-466b-a46a-aa6976708dd8\" data-name=\"Layer 1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 44.59 36.87\">
\t\t\t<path class=\"5d3c0573-6657-4227-99de-54128ee42340\" d=\"M24.91,5.73a2.61,2.61,0,0,1-2,2.53H21.65a2.61,2.61,0,1,1,3.25-2.53M41.13,8.26H27.44a5.73,5.73,0,1,0-10.29,0H3.47L0,36.87H44.59Z\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 188
            if (($context["attribute_weight_ac_"] ?? null)) {
                // line 189
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight_ac_"] ?? null), 189, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 191
            echo "\t\t\t\t";
            if (($context["attribute_weightac_ansi_metric_"] ?? null)) {
                // line 192
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weightac_ansi_metric_"] ?? null), 192, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 194
            echo "\t\t\t\t";
            if (($context["attribute_weightac_ansi_metric_"] ?? null)) {
                // line 195
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weightac_ansi_metric_"] ?? null), 195, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 197
            echo "\t\t\t</span>
\t\t\tWeight (AC)
\t\t</div>
\t</div>
";
        }
        // line 202
        echo "
<!-- WEIGHT W OUTRIGGERS -->
";
        // line 204
        if (((($context["attribute_weight_with_outriggers"] ?? null) || ($context["attribute_wwo_ansi_metric_"] ?? null)) || ($context["attribute_wwo_ce_metric_"] ?? null))) {
            // line 205
            echo "\t<div>
\t\t<svg id=\"9d5b70e0-031c-466b-a46a-aa6976708dd8\" data-name=\"Layer 1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 44.59 36.87\">
\t\t\t<path class=\"5d3c0573-6657-4227-99de-54128ee42340\" d=\"M24.91,5.73a2.61,2.61,0,0,1-2,2.53H21.65a2.61,2.61,0,1,1,3.25-2.53M41.13,8.26H27.44a5.73,5.73,0,1,0-10.29,0H3.47L0,36.87H44.59Z\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 211
            if (($context["attribute_weight_with_outriggers"] ?? null)) {
                // line 212
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_weight_with_outriggers"] ?? null), 212, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 214
            echo "\t\t\t\t";
            if (($context["attribute_wwo_ansi_metric_"] ?? null)) {
                // line 215
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wwo_ansi_metric_"] ?? null), 215, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 217
            echo "\t\t\t\t";
            if (($context["attribute_wwo_ce_metric_"] ?? null)) {
                // line 218
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_wwo_ce_metric_"] ?? null), 218, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 220
            echo "\t\t\t</span>
\t\t\tWeight (with outriggers)
\t\t</div>
\t</div>
";
        }
        // line 225
        echo "
<!-- BED CAPACITY -->
";
        // line 227
        if (((($context["attribute_bed_capacity"] ?? null) || ($context["attribute_bl_ansi_metric_"] ?? null)) || ($context["attribute_bl_ce_metric_"] ?? null))) {
            // line 228
            echo "\t<div>
\t\t<svg id=\"6f88ebdd-ff96-4a47-a726-adfc23b0b1d6\" data-name=\"Layer 1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 90.09 49.87\">
\t\t\t<rect class=\"3d4bacf2-a10e-4de5-ad86-3bdf4ed82156\" y=\"36.24\" width=\"41.16\" height=\"3.89\"/>
\t\t\t<rect class=\"3d4bacf2-a10e-4de5-ad86-3bdf4ed82156\" x=\"57.89\" y=\"36.24\" width=\"15.32\" height=\"3.89\"/>
\t\t\t<polygon class=\"3d4bacf2-a10e-4de5-ad86-3bdf4ed82156\" points=\"74.76 40.24 74.76 36.36 90.09 27.28 90.09 31.16 74.76 40.24\"/>
\t\t\t<path class=\"3d4bacf2-a10e-4de5-ad86-3bdf4ed82156\" d=\"M52.38,43.06a2.85,2.85,0,1,1-2.85-2.85,2.85,2.85,0,0,1,2.85,2.85m4,0a6.81,6.81,0,1,0-6.81,6.81,6.81,6.81,0,0,0,6.81-6.81\"/>
\t\t\t<path class=\"3d4bacf2-a10e-4de5-ad86-3bdf4ed82156\" d=\"M40.48,5.09a2.32,2.32,0,0,1-1.74,2.24H37.59a2.32,2.32,0,1,1,2.89-2.24m14.4,2.24H42.73a5.09,5.09,0,1,0-9.13,0H21.44L18.36,32.74H58Z\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 238
            if (($context["attribute_bed_capacity"] ?? null)) {
                // line 239
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bed_capacity"] ?? null), 239, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 241
            echo "\t\t\t\t";
            if (($context["attribute_bl_ansi_metric_"] ?? null)) {
                // line 242
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bl_ansi_metric_"] ?? null), 242, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 244
            echo "\t\t\t\t";
            if (($context["attribute_bl_ce_metric_"] ?? null)) {
                // line 245
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bl_ce_metric_"] ?? null), 245, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 247
            echo "\t\t\t</span>
\t\t\tBed Capacity
\t\t</div>
\t</div>
";
        }
        // line 252
        echo "
<!-- TOW CAPACITY -->
";
        // line 254
        if (((($context["attribute_tow_capacity"] ?? null) || ($context["attribute_tc_ansi_metric_"] ?? null)) || ($context["attribute_tc_ce_metric_"] ?? null))) {
            // line 255
            echo "\t<div>
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 30.65 28.68\">
\t\t\t<g>
\t\t\t\t<polygon class=\"d8f8dcf5-72d1-46f5-837f-02178494b9fe\" points=\"0 14.4 15.32 23.48 15.32 15.6 0 6.52 0 14.4\"/>
\t\t\t\t<rect class=\"d8f8dcf5-72d1-46f5-837f-02178494b9fe\" x=\"15.32\" y=\"15.6\" width=\"15.32\" height=\"7.89\"/>
\t\t\t</g>
\t\t\t<polygon class=\"d8f8dcf5-72d1-46f5-837f-02178494b9fe\" points=\"19.17 26.58 21.62 26.58 21.62 28.68 24.35 28.68 24.35 26.58 26.8 26.58 26.8 24.47 19.17 24.47 19.17 26.58\"/>
\t\t\t<path class=\"d8f8dcf5-72d1-46f5-837f-02178494b9fe\" d=\"M21.73,11.7l-2.56,2.91H26.8L24.24,11.7a5.92,5.92,0,1,0-2.5,0Z\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 266
            if (($context["attribute_tow_capacity"] ?? null)) {
                // line 267
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tow_capacity"] ?? null), 267, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 269
            echo "\t\t\t\t";
            if (($context["attribute_tc_ansi_metric_"] ?? null)) {
                // line 270
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tc_ansi_metric_"] ?? null), 270, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 272
            echo "\t\t\t\t";
            if (($context["attribute_tc_ce_metric_"] ?? null)) {
                // line 273
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_tc_ce_metric_"] ?? null), 273, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 275
            echo "\t\t\t</span>
\t\t\tTow Capacity
\t\t</div>
\t</div>
";
        }
        // line 280
        echo "
<!-- BED LENGTH -->
";
        // line 282
        if (((($context["attribute_bed_length"] ?? null) || ($context["attribute_bl_ansi_metric_"] ?? null)) || ($context["attribute_bl_ce_metric_"] ?? null))) {
            // line 283
            echo "\t<div>
\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 90.09 22.63\">
\t\t\t<polygon class=\"95e45021-5f94-435e-9f86-2eba548d2728\" points=\"90.09 16.84 88.56 16.84 88.56 21.11 84.45 21.11 84.45 17.62 83.94 17.62 83.94 21.11 78.82 21.11 78.82 17.62 78.31 17.62 78.31 21.11 73.19 21.11 73.19 17.62 72.68 17.62 72.68 21.11 67.56 21.11 67.56 17.62 67.05 17.62 67.05 21.11 61.93 21.11 61.93 17.62 61.42 17.62 61.42 21.11 56.3 21.11 56.3 17.62 55.79 17.62 55.79 21.11 50.67 21.11 50.67 17.62 50.16 17.62 50.16 21.11 45.84 21.11 45.84 16.84 45.76 16.84 44.32 16.84 44.24 16.84 44.24 21.11 40.13 21.11 40.13 17.62 39.62 17.62 39.62 21.11 34.5 21.11 34.5 17.62 33.99 17.62 33.99 21.11 28.87 21.11 28.87 17.62 28.36 17.62 28.36 21.11 23.24 21.11 23.24 17.62 22.73 17.62 22.73 21.11 17.61 21.11 17.61 17.62 17.1 17.62 17.1 21.11 11.98 21.11 11.98 17.62 11.47 17.62 11.47 21.11 6.35 21.11 6.35 17.62 5.84 17.62 5.84 21.11 1.52 21.11 1.52 16.84 0 16.84 0 22.63 0 22.63 0 22.63 44.32 22.63 45.76 22.63 90.09 22.63 90.09 22.63 90.09 22.63 90.09 16.84\"/>
\t\t\t<rect class=\"95e45021-5f94-435e-9f86-2eba548d2728\" width=\"41.16\" height=\"3.89\"/>
\t\t\t<rect class=\"95e45021-5f94-435e-9f86-2eba548d2728\" x=\"57.89\" width=\"15.32\" height=\"3.89\"/>
\t\t\t<polygon class=\"95e45021-5f94-435e-9f86-2eba548d2728\" points=\"74.76 0 74.76 3.88 90.09 12.96 90.09 9.08 74.76 0\"/>
\t\t\t<path class=\"95e45021-5f94-435e-9f86-2eba548d2728\" d=\"M52.38,6.81A2.85,2.85,0,1,1,49.52,4a2.85,2.85,0,0,1,2.85,2.85m4,0a6.81,6.81,0,1,0-6.81,6.81,6.81,6.81,0,0,0,6.81-6.81\"/>
\t\t</svg>
\t\t<div>
\t\t\t<span>
\t\t\t\t";
            // line 293
            if (($context["attribute_bed_length"] ?? null)) {
                // line 294
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bed_length"] ?? null), 294, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 296
            echo "\t\t\t\t";
            if (($context["attribute_bl_ansi_metric_"] ?? null)) {
                // line 297
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bl_ansi_metric_"] ?? null), 297, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 299
            echo "\t\t\t\t";
            if (($context["attribute_bl_ce_metric_"] ?? null)) {
                // line 300
                echo "\t\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attribute_bl_ce_metric_"] ?? null), 300, $this->source), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 302
            echo "\t\t\t</span>
\t\t\tBed Length
\t\t</div>
\t</div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/sglobal/partials/commerce-quick-facts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  644 => 302,  638 => 300,  635 => 299,  629 => 297,  626 => 296,  620 => 294,  618 => 293,  606 => 283,  604 => 282,  600 => 280,  593 => 275,  587 => 273,  584 => 272,  578 => 270,  575 => 269,  569 => 267,  567 => 266,  554 => 255,  552 => 254,  548 => 252,  541 => 247,  535 => 245,  532 => 244,  526 => 242,  523 => 241,  517 => 239,  515 => 238,  503 => 228,  501 => 227,  497 => 225,  490 => 220,  484 => 218,  481 => 217,  475 => 215,  472 => 214,  466 => 212,  464 => 211,  456 => 205,  454 => 204,  450 => 202,  443 => 197,  437 => 195,  434 => 194,  428 => 192,  425 => 191,  419 => 189,  417 => 188,  409 => 182,  407 => 181,  403 => 179,  396 => 174,  390 => 172,  387 => 171,  381 => 169,  378 => 168,  372 => 166,  370 => 165,  362 => 159,  360 => 158,  356 => 156,  349 => 151,  343 => 149,  340 => 148,  334 => 146,  331 => 145,  325 => 143,  323 => 142,  314 => 135,  312 => 134,  308 => 132,  301 => 127,  295 => 125,  292 => 124,  286 => 122,  283 => 121,  277 => 119,  275 => 118,  265 => 110,  263 => 109,  259 => 107,  252 => 102,  246 => 100,  243 => 99,  237 => 97,  234 => 96,  228 => 94,  226 => 93,  217 => 86,  215 => 85,  211 => 83,  204 => 78,  198 => 76,  195 => 75,  189 => 73,  186 => 72,  180 => 70,  178 => 69,  169 => 62,  167 => 61,  163 => 59,  156 => 54,  150 => 52,  147 => 51,  141 => 49,  138 => 48,  132 => 46,  129 => 45,  123 => 43,  120 => 42,  114 => 40,  111 => 39,  105 => 37,  103 => 36,  95 => 30,  93 => 29,  89 => 27,  82 => 22,  76 => 20,  73 => 19,  67 => 17,  64 => 16,  58 => 14,  56 => 13,  44 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/partials/commerce-quick-facts.html.twig", "/var/www/snorkellifts/web/themes/sglobal/partials/commerce-quick-facts.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2);
        static $filters = array("escape" => 14);
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
