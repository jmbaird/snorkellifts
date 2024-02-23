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

/* themes/sglobal/partials/footer.html.twig */
class __TwigTemplate_4b9c2fe21c1bba794746d3d712611546 extends \Twig\Template
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
        echo "<footer role=\"contentinfo\">
\t";
        // line 2
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_documoto", [], "any", false, false, true, 2)) {
            // line 3
            echo "\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_documoto", [], "any", false, false, true, 3), 3, $this->source), "html", null, true);
            echo "
\t";
        }
        // line 5
        echo "\t
\t";
        // line 6
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_quick_links", [], "any", false, false, true, 6)) {
            // line 7
            echo "\t<div class=\"footer-quick-links\">
\t\t";
            // line 8
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_quick_links", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "
\t</div>
\t";
        }
        // line 11
        echo "
\t";
        // line 12
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_sitemap", [], "any", false, false, true, 12)) {
            // line 13
            echo "\t<div class=\"footer-sitemap\">
\t\t";
            // line 14
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_sitemap", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "
\t</div>
\t";
        }
        // line 17
        echo "
\t<div class=\"footer-newsletter\" id=\"footer-newsletter\">
\t\t";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_newsletter", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
        echo "
\t</div>
\t
\t<div class=\"footer-copyright\">
\t\t<div class=\"to-top\">
\t\t\t<i class=\"fa fa-chevron-up\"></i><br>
\t\t\t<span>Back to Top</span>
\t\t</div>
\t
\t\t";
        // line 28
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 28)) {
            // line 29
            echo "\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
            echo "
\t\t";
        }
        // line 31
        echo "\t\t
\t\t<p class=\"footer-copyright--logo\">
\t\t\t<a href=\"";
        // line 33
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
        echo "\">
\t\t\t<?xml version=\"1.0\" encoding=\"UTF-8\"?>
\t\t\t<svg enable-background=\"new 0 0 125.1 23.4\" version=\"1.1\" viewBox=\"0 0 125.1 23.4\" xml:space=\"preserve\" xmlns=\"https://www.w3.org/2000/svg\" width=\"170\" height=\"32\">
\t\t\t\t<polygon points=\"122.3 1.1 121.8 1.1 121.8 0.8 123.1 0.8 123.1 1.1 122.7 1.1 122.7 2.4 122.3 2.4\" fill=\"#fff\"/>
\t\t\t\t<path d=\"m124.7 1.8v-0.7c-0.1 0.2-0.1 0.4-0.2 0.6l-0.2 0.6h-0.3l-0.2-0.6c-0.1-0.2-0.1-0.4-0.1-0.6v0.7 0.6h-0.3l0.1-1.6h0.5l0.2 0.5c0.1 0.2 0.1 0.4 0.1 0.6 0-0.2 0.1-0.4 0.2-0.6l0.2-0.5h0.5l0.1 1.6h-0.4l-0.2-0.6z\" fill=\"#fff\"/>
\t\t\t\t<path d=\"m53.4 20h-4v-8.8c0-3.7-1.6-4.2-3.1-4.2-2 0-3.3 0.9-3.3 5.4v7.6h-4v-16.6h3.9v0.9c1-0.8 2.2-1.2 3.7-1.2 4.4 0 6.9 2.7 6.9 7.5v9.4z\" fill=\"#fff\"/>
\t\t\t\t<path d=\"m69.9 5.5c-1.7-1.7-3.7-2.6-6.2-2.6-2.3 0-4.4 1-6.1 2.8-1.5 1.6-2.4 3.7-2.4 6.1 0 2.2 0.9 4.5 2.5 6.1 1.6 1.7 3.7 2.6 6.1 2.6s4.5-1 6.2-2.8c1.5-1.6 2.3-3.9 2.3-6.1 0.1-2.3-0.8-4.5-2.4-6.1zm-6 11c-2.6 0-4.5-2.1-4.5-4.8 0-2.8 1.9-4.8 4.5-4.8s4.5 2 4.5 4.8c0 2.7-2 4.8-4.5 4.8z\" fill=\"#fff\"/>
\t\t\t\t<path d=\"m78.3 20h-4v-16.6h3.8v0.8c0.8-0.7 1.8-1 3-1.1h0.6v4.1h-0.6c-2.2 0.2-2.9 1.1-2.9 3.6v9.2z\" fill=\"#fff\"/>
\t\t\t\t<polygon points=\"98.4 20 93.2 20 87.9 13.3 87.9 20 83.9 20 83.9 0.8 87.9 0.8 87.9 9.4 92.5 3.4 97.3 3.4 91.2 11.3\" fill=\"#fff\"/>
\t\t\t\t<path d=\"m112.6 6.8c-1.6-2.5-4.2-3.9-7.2-3.9-2.5 0-4.5 0.9-6.2 2.7-1.6 1.7-2.3 3.7-2.3 6 0 2.2 0.9 4.5 2.5 6.1 1.6 1.7 3.7 2.6 6.1 2.6 3.6 0 6.5-2 8-5.7h-4.6c-0.8 1.1-2 1.7-3.4 1.7-2 0-3.7-1.2-4.3-3.1h12.8v-1c0-2.2-0.5-3.9-1.4-5.4zm-11.3 2.8c0.7-1.7 2.3-2.8 4.2-2.8s3.3 1 4 2.8h-8.2z\" fill=\"#fff\"/>
\t\t\t\t<rect x=\"116\" y=\".8\" width=\"4\" height=\"19.3\" fill=\"#fff\"/>
\t\t\t\t<path d=\"m35 11.7c-1.1-0.8-5.5-2.9-6.4-3.4-0.2-0.1-0.2-0.2-0.3-0.4s0-0.4 0.1-0.5c0 0 0.1-0.1 0.2-0.1s0.3-0.1 0.5-0.1h7.3v-4h-6.4c-3.4 0-5.7 1.9-5.7 4.7 0 1.2 0.4 2.2 1.5 3.1 1.4 1.1 6.3 3.4 7 3.9 0.2 0.1 0.3 0.2 0.3 0.4 0.1 0.2 0 0.4-0.1 0.5 0 0-0.1 0.1-0.2 0.1-0.1 0.1-0.3 0.1-0.5 0.1h-8v4h7.2c3.4 0 5.7-1.9 5.7-4.7-0.1-0.8-0.3-2.2-2.2-3.6\" fill=\"#fff\"/>
\t\t\t\t<path d=\"M8.1,0C3.7,0,0,3.7,0,8.1v15.3h13c4.5,0,8.1-3.7,8.1-8.1V0H8.1z M20.3,15.3c0,4.1-3.3,7.4-7.4,7.4H0.8V8.1   c0-4.1,3.3-7.4,7.4-7.4h12.2V15.3z\" fill=\"#fff\"/>
\t\t\t\t<path d=\"M4.1,16.1v4h7.2c3.1,0,5.3-1.6,5.6-4H4.1z\" fill=\"#FF6C0C\"/>
\t\t\t\t<path d=\"m14.9 11.7c-1.1-0.7-5.5-2.8-6.4-3.3-0.2-0.1-0.3-0.3-0.3-0.4-0.1-0.2 0-0.4 0.1-0.5 0 0 0.1-0.1 0.2-0.1s0.3-0.1 0.5-0.1h7.3v-4h-6.5c-3.4 0-5.7 1.9-5.7 4.7 0 1.2 0.4 2.2 1.5 3.1 1.4 1.1 6.3 3.4 7 3.9 0.1 0.1 0.2 0.1 0.2 0.2h4.2c0-0.8-0.2-2.2-2.1-3.5\" fill=\"#fff\"/>
\t\t\t</svg>
\t\t\t</a>
\t\t</p>
\t\t";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 56), "html", null, true);
        echo "
\t\t<p>&copy; ";
        // line 52
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "published_at", [], "any", false, false, true, 52), 52, $this->source), "Y"), "html", null, true);
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 52, $this->source), "html", null, true);
        echo "</p>
\t\t
\t\t<small class=\"footer-notice\">";
        // line 54
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\twig_tweak\TwigExtension']->drupalEntity("block_content", 55), "html", null, true);
        echo "</small>
\t</div>
</footer>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/partials/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 54,  131 => 52,  127 => 51,  106 => 33,  102 => 31,  96 => 29,  94 => 28,  82 => 19,  78 => 17,  72 => 14,  69 => 13,  67 => 12,  64 => 11,  58 => 8,  55 => 7,  53 => 6,  50 => 5,  44 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/partials/footer.html.twig", "/var/www/snorkellifts/web/themes/sglobal/partials/footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2);
        static $filters = array("escape" => 3, "date" => 52);
        static $functions = array("path" => 33, "drupal_entity" => 51);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'date'],
                ['path', 'drupal_entity']
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
