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

/* themes/sglobal/templates/block/block--thetoolboxemailsignup.html.twig */
class __TwigTemplate_81f202913991dcb2a03a3a6ef88078fd extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "
<div";
        // line 29
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 29, $this->source), "html", null, true);
        echo ">
  ";
        // line 30
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 30, $this->source), "html", null, true);
        echo "
  ";
        // line 31
        if (($context["label"] ?? null)) {
            // line 32
            echo "    <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 32, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 32, $this->source), "html", null, true);
            echo "</h2>
  ";
        }
        // line 34
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 34, $this->source), "html", null, true);
        echo "
  ";
        // line 35
        $this->displayBlock('content', $context, $blocks);
        // line 63
        echo "</div>
";
    }

    // line 35
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 36
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 36, $this->source), "html", null, true);
        echo "
\t<div id=\"block-views-block-the-toolbox-email-signup\">
\t\t<h4>The Toolbox™ Sign Up</h4>
\t\t<p>Get expert advice on equipment service and safety, parts, care and maintenance, and more. Subscribe to The Toolbox&trade; for emailed updates.</p>
\t\t<script src=\"https://f.convertkit.com/ckjs/ck.5.js\"></script>
\t\t<form action=\"https://app.convertkit.com/forms/808407/subscriptions\" class=\"seva-form formkit-form\" method=\"post\" data-sv-form=\"808407\" data-uid=\"235430fe7b\" data-format=\"inline\" data-version=\"5\" data-options=\"{&quot;settings&quot;:{&quot;after_subscribe&quot;:{&quot;action&quot;:&quot;message&quot;,&quot;success_message&quot;:&quot;Success! Please check your email to confirm your subscription.&quot;,&quot;redirect_url&quot;:&quot;&quot;},&quot;analytics&quot;:{&quot;google&quot;:null,&quot;facebook&quot;:null,&quot;segment&quot;:null,&quot;pinterest&quot;:null,&quot;sparkloop&quot;:null,&quot;googletagmanager&quot;:null},&quot;modal&quot;:{&quot;trigger&quot;:null,&quot;scroll_percentage&quot;:null,&quot;timer&quot;:null,&quot;devices&quot;:null,&quot;show_once_every&quot;:null},&quot;powered_by&quot;:{&quot;show&quot;:false,&quot;url&quot;:&quot;https://convertkit.com/?utm_campaign=poweredby&amp;utm_content=form&amp;utm_medium=referral&amp;utm_source=dynamic&quot;},&quot;recaptcha&quot;:{&quot;enabled&quot;:true},&quot;return_visitor&quot;:{&quot;action&quot;:&quot;show&quot;,&quot;custom_content&quot;:&quot;&quot;},&quot;slide_in&quot;:{&quot;display_in&quot;:null,&quot;trigger&quot;:null,&quot;scroll_percentage&quot;:null,&quot;timer&quot;:null,&quot;devices&quot;:null,&quot;show_once_every&quot;:null},&quot;sticky_bar&quot;:{&quot;display_in&quot;:&quot;top&quot;,&quot;trigger&quot;:&quot;timer&quot;,&quot;scroll_percentage&quot;:null,&quot;timer&quot;:5,&quot;devices&quot;:&quot;all&quot;,&quot;show_once_every&quot;:15}},&quot;version&quot;:&quot;5&quot;}\" min-width=\"400 500 600 700 800\">
\t\t\t<div data-style=\"clean\">
\t\t\t\t<ul class=\"formkit-alert formkit-alert-error\" data-element=\"errors\" data-group=\"alert\"></ul>
\t\t\t\t<div data-element=\"fields\" data-stacked=\"false\" class=\"seva-fields formkit-fields\">
\t\t\t\t\t<div class=\"formkit-field\">
\t\t\t\t\t\t<input class=\"formkit-input\" aria-label=\"First Name\" name=\"fields[first_name]\" placeholder=\"First Name\" type=\"text\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"formkit-field\">
\t\t\t\t\t\t<input class=\"formkit-input\" aria-label=\"Company\" name=\"fields[company]\" placeholder=\"Company\" type=\"text\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"formkit-field\">
\t\t\t\t\t\t<input class=\"formkit-input\" name=\"email_address\" aria-label=\"Email Address\" placeholder=\"Email Address\" required=\"\" type=\"email\">
\t\t\t\t\t</div>
\t\t\t\t\t<button data-element=\"submit\" class=\"formkit-submit\">
\t\t\t\t\t\t<span class=\"\">Subscribe</span>
\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t</div>
    
  ";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/block/block--thetoolboxemailsignup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 36,  73 => 35,  68 => 63,  66 => 35,  61 => 34,  53 => 32,  51 => 31,  47 => 30,  43 => 29,  40 => 28,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/block/block--thetoolboxemailsignup.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/block/block--thetoolboxemailsignup.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 31, "block" => 35);
        static $filters = array("escape" => 29);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'block'],
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
