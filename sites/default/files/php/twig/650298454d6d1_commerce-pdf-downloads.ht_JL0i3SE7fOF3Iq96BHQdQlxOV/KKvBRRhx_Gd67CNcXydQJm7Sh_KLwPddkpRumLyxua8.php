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

/* themes/sglobal/partials/commerce-pdf-downloads.html.twig */
class __TwigTemplate_fd5e08546e205b1522a80eef73241224 extends \Twig\Template
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
        // line 2
        echo "
";
        // line 4
        if (($context["all_else"] ?? null)) {
            // line 5
            echo "\t";
            $context["dual_capacity_products"] = [0 => "400S", 1 => "460SJ", 2 => "600S", 3 => "660SJ", 4 => "600S All Terrain", 5 => "660SJ All Terrain"];
            // line 6
            echo "\t";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["product_entity"] ?? null), "title", [], "any", false, false, true, 6), "value", [], "any", false, false, true, 6), ($context["dual_capacity_products"] ?? null))) {
                // line 7
                echo "\t\t<p><strong>Dual Capacity Comparison Flyer</strong></p>
\t\t<p class=\"single-product--downloads\">
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/dual-capacity/english-met.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 9
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 9, $this->source), "html", null, true);
                echo "/images/flags/flag-gb.png\"> English</a>
\t\t</p>
\t";
            }
            // line 12
            echo "
\t";
            // line 13
            if ((((((($context["chinese_pdf_url"] ?? null) || ($context["german_pdf_url"] ?? null)) || ($context["english_pdf_url"] ?? null)) || ($context["french_pdf_url"] ?? null)) || ($context["japanese_pdf_url"] ?? null)) || ($context["spanish_pdf_url"] ?? null))) {
                // line 14
                echo "\t\t<p><strong>Specification Sheet (Metric)</strong></p>
\t\t<p class=\"single-product--downloads\">
\t\t\t";
                // line 16
                if (($context["chinese_pdf_url"] ?? null)) {
                    // line 17
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["chinese_pdf_url"] ?? null), 17, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 17, $this->source), "html", null, true);
                    echo "/images/flags/flag-cn.png\"> 中文</a>
\t\t\t";
                }
                // line 19
                echo "\t\t\t";
                if (($context["german_pdf_url"] ?? null)) {
                    // line 20
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["german_pdf_url"] ?? null), 20, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 20, $this->source), "html", null, true);
                    echo "/images/flags/flag-de.png\"> Deutsch</a>
\t\t\t";
                }
                // line 22
                echo "\t\t\t";
                if (($context["english_pdf_url"] ?? null)) {
                    // line 23
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["english_pdf_url"] ?? null), 23, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 23, $this->source), "html", null, true);
                    echo "/images/flags/flag-gb.png\"> English</a>
\t\t\t";
                }
                // line 25
                echo "\t\t\t";
                if (($context["french_pdf_url"] ?? null)) {
                    // line 26
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["french_pdf_url"] ?? null), 26, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 26, $this->source), "html", null, true);
                    echo "/images/flags/flag-fr.png\"> Français</a>
\t\t\t";
                }
                // line 28
                echo "\t\t\t";
                if (($context["japanese_pdf_url"] ?? null)) {
                    // line 29
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["japanese_pdf_url"] ?? null), 29, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 29, $this->source), "html", null, true);
                    echo "/images/flags/flag-ja.png\"> 日本語</a>
\t\t\t";
                }
                // line 31
                echo "\t\t\t";
                if (($context["spanish_pdf_url"] ?? null)) {
                    // line 32
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["spanish_pdf_url"] ?? null), 32, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 32, $this->source), "html", null, true);
                    echo "/images/flags/flag-es.png\"> Español</a>
\t\t\t";
                }
                // line 34
                echo "\t\t</p>
\t";
            }
            // line 36
            echo "
\t";
            // line 37
            if ((((((($context["chinese_pdf_url"] ?? null) || ($context["german_pdf_url"] ?? null)) || ($context["english_pdf_url"] ?? null)) || ($context["french_pdf_url"] ?? null)) || ($context["japanese_pdf_url"] ?? null)) || ($context["spanish_pdf_url"] ?? null))) {
                // line 38
                echo "\t\t<p><strong>Product Range Brochure</strong></p>
\t\t<p class=\"single-product--downloads\">
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_Chinese_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 40
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 40, $this->source), "html", null, true);
                echo "/images/flags/flag-cn.png\"> 中文</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_Danish_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 41
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 41, $this->source), "html", null, true);
                echo "/images/flags/flag-dk.png\"> Dansk</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_German_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 42
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 42, $this->source), "html", null, true);
                echo "/images/flags/flag-de.png\"> Deutsch</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_Finnish_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 43
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 43, $this->source), "html", null, true);
                echo "/images/flags/flag-fi.png\"> Suomalainen</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_French_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 44
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 44, $this->source), "html", null, true);
                echo "/images/flags/flag-fr.png\"> Français</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_English_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 45
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 45, $this->source), "html", null, true);
                echo "/images/flags/flag-gb.png\"> English</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_Japanese_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 46
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 46, $this->source), "html", null, true);
                echo "/images/flags/flag-ja.png\"> 日本語</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_Norwegian_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 47
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 47, $this->source), "html", null, true);
                echo "/images/flags/flag-no.png\"> Norsk</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_Polish_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 48
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 48, $this->source), "html", null, true);
                echo "/images/flags/flag-pl.png\"> Polskie</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_Portuguese_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 49
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 49, $this->source), "html", null, true);
                echo "/images/flags/flag-po.png\"> Portuguese</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_Russian_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 50
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 50, $this->source), "html", null, true);
                echo "/images/flags/flag-ru.png\"> русский</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_Spanish_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 51
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 51, $this->source), "html", null, true);
                echo "/images/flags/flag-es.png\"> Español</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/overview/Snorkel Overview Brochure_Swedish_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 52
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 52, $this->source), "html", null, true);
                echo "/images/flags/flag-se.png\"> Svenska</a>
\t\t</p>
\t";
            }
        }
        // line 56
        echo "
";
        // line 58
        if (($context["us_can_latin"] ?? null)) {
            // line 59
            echo "\t";
            $context["dual_capacity_products"] = [0 => "400S", 1 => "460SJ", 2 => "600S", 3 => "660SJ", 4 => "600S All Terrain", 5 => "660SJ All Terrain"];
            // line 60
            echo "\t";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["product_entity"] ?? null), "title", [], "any", false, false, true, 60), "value", [], "any", false, false, true, 60), ($context["dual_capacity_products"] ?? null))) {
                // line 61
                echo "\t\t<p><strong>Dual Capacity Comparison Flyer</strong></p>
\t\t<p class=\"single-product--downloads\">
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/dual-capacity/english-ansi.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 63
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 63, $this->source), "html", null, true);
                echo "/images/flags/flag-gb.png\"> English</a>
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/dual-capacity/spanish.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 64
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 64, $this->source), "html", null, true);
                echo "/images/flags/flag-es.png\"> Español</a>
\t\t</p>
\t";
            }
            // line 67
            echo "
\t";
            // line 68
            if (((($context["english_ansi_met_pdf_url"] ?? null) || ($context["french_ansi_met_pdf_url"] ?? null)) || ($context["spanish_pdf_url"] ?? null))) {
                // line 69
                echo "\t\t<p><strong>Specification Sheet (Metric)</strong></p>
\t\t<p class=\"single-product--downloads\">
\t\t\t";
                // line 71
                if (($context["english_ansi_met_pdf_url"] ?? null)) {
                    // line 72
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["english_ansi_met_pdf_url"] ?? null), 72, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 72, $this->source), "html", null, true);
                    echo "/images/flags/flag-gb.png\"> English</a>
\t\t\t";
                }
                // line 74
                echo "\t\t\t";
                if (($context["french_ansi_met_pdf_url"] ?? null)) {
                    // line 75
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["french_ansi_met_pdf_url"] ?? null), 75, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 75, $this->source), "html", null, true);
                    echo "/images/flags/flag-fr.png\"> Français</a>
\t\t\t";
                }
                // line 77
                echo "\t\t\t";
                if (($context["spanish_pdf_url"] ?? null)) {
                    // line 78
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["spanish_pdf_url"] ?? null), 78, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 78, $this->source), "html", null, true);
                    echo "/images/flags/flag-es.png\"> Español</a>
\t\t\t";
                }
                // line 80
                echo "\t\t</p>
\t";
            }
            // line 82
            echo "
\t";
            // line 83
            if (($context["english_ansi_imp_pdf_url"] ?? null)) {
                // line 84
                echo "\t\t<p><strong>Specification Sheet (Imperial)</strong></p>
\t\t<p class=\"single-product--downloads\">
\t\t\t";
                // line 86
                if (($context["english_ansi_imp_pdf_url"] ?? null)) {
                    // line 87
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["english_ansi_imp_pdf_url"] ?? null), 87, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 87, $this->source), "html", null, true);
                    echo "/images/flags/flag-gb.png\"> English</a>
\t\t\t";
                }
                // line 89
                echo "\t\t</p>
\t";
            }
            // line 91
            echo "
\t";
            // line 92
            if (($context["english_ansi_imp_pdf_url"] ?? null)) {
                // line 93
                echo "\t\t<p><strong>Product Range Multifold</strong></p>
\t\t<p class=\"single-product--downloads\">
\t\t\t<a target=\"_blank\" href=\"/sites/default/files/pdf/multifold/Snorkel Multifold_English_Lowres.pdf\" class=\"single-product--downloads-pdf\"><img src=\"/";
                // line 95
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 95, $this->source), "html", null, true);
                echo "/images/flags/flag-gb.png\"> English</a>
\t\t</p>
\t";
            }
            // line 98
            echo "
\t";
            // line 99
            if (($context["english_emergency_descent_pdf_url"] ?? null)) {
                // line 100
                echo "\t\t<p><strong>Emergency Descent Procedure</strong></p>
\t\t<p class=\"single-product--downloads\">
\t\t\t";
                // line 102
                if (($context["english_emergency_descent_pdf_url"] ?? null)) {
                    // line 103
                    echo "\t\t\t\t<a target=\"_blank\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["english_emergency_descent_pdf_url"] ?? null), 103, $this->source), "html", null, true);
                    echo "\" class=\"single-product--downloads-pdf\"><img src=\"/";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null), 103, $this->source), "html", null, true);
                    echo "/images/flags/flag-gb.png\"> English</a>
\t\t\t";
                }
                // line 105
                echo "\t\t</p>
\t";
            }
        }
    }

    public function getTemplateName()
    {
        return "themes/sglobal/partials/commerce-pdf-downloads.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  329 => 105,  321 => 103,  319 => 102,  315 => 100,  313 => 99,  310 => 98,  304 => 95,  300 => 93,  298 => 92,  295 => 91,  291 => 89,  283 => 87,  281 => 86,  277 => 84,  275 => 83,  272 => 82,  268 => 80,  260 => 78,  257 => 77,  249 => 75,  246 => 74,  238 => 72,  236 => 71,  232 => 69,  230 => 68,  227 => 67,  221 => 64,  217 => 63,  213 => 61,  210 => 60,  207 => 59,  205 => 58,  202 => 56,  195 => 52,  191 => 51,  187 => 50,  183 => 49,  179 => 48,  175 => 47,  171 => 46,  167 => 45,  163 => 44,  159 => 43,  155 => 42,  151 => 41,  147 => 40,  143 => 38,  141 => 37,  138 => 36,  134 => 34,  126 => 32,  123 => 31,  115 => 29,  112 => 28,  104 => 26,  101 => 25,  93 => 23,  90 => 22,  82 => 20,  79 => 19,  71 => 17,  69 => 16,  65 => 14,  63 => 13,  60 => 12,  54 => 9,  50 => 7,  47 => 6,  44 => 5,  42 => 4,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/partials/commerce-pdf-downloads.html.twig", "/var/www/snorkellifts/web/themes/sglobal/partials/commerce-pdf-downloads.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 4, "set" => 5);
        static $filters = array("escape" => 9);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
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
