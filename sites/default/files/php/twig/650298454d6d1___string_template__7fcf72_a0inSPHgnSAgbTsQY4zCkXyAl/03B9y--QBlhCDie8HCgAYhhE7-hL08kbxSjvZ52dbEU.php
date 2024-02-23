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

/* __string_template__7fcf729cb9c3dab6a8821b930dfb5f8f */
class __TwigTemplate_b495ec0e9ea90e3314d4f4d567cf39a7 extends \Twig\Template
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
        echo "<table border=\"0\" cellpadding=\"30\" cellspacing=\"30\" bgcolor=\"#ffffff\">
\t<tr>
\t\t<td style=\"color:#000000; font-family:'Open Sans', sans-serif; font-size:14px; font-weight:400; line-height:21px;\">
\t\t\t<p><strong>";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\webform\Twig\WebformTwigExtension']->webformToken("[webform_submission:values:company:value:webform_token_options_html:webform_token_options_email]", $this->sandbox->ensureToStringAllowed(($context["webform_submission"] ?? null), 4, $this->source)), "html", null, true);
        echo "</strong> has submitted a ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\webform\Twig\WebformTwigExtension']->webformToken("[webform_submission:values:enquiry_type:value:webform_token_options_html:webform_token_options_email]", $this->sandbox->ensureToStringAllowed(($context["webform_submission"] ?? null), 4, $this->source)), "html", null, true);
        echo " inquiry.</p>

\t\t\t<p style=\"margin-bottom:0;\">A copy of their submission is attached below in this e-mail for your records.</p>
\t\t</td>
\t</tr>
\t<tr>
\t\t<td bgcolor=\"#e7e7e7\">
\t\t\t<table width=\"100%\" cellpadding=\"20\" cellspacing=\"20\">
\t\t\t\t<tr>
\t\t\t\t\t<td style=\"color:#6d6e71; font-family:'Open Sans', sans-serif; font-size:14px; font-weight:400; line-height:21px;\">
\t\t\t\t\t\t<p style=\"margin-top:0;\"><strong>Submitted on ";
        // line 14
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\webform\Twig\WebformTwigExtension']->webformToken("[webform_submission:created]", $this->sandbox->ensureToStringAllowed(($context["webform_submission"] ?? null), 14, $this->source)), "html", null, true);
        echo ".</strong></p>
\t\t\t\t\t\t<p>";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\webform\Twig\WebformTwigExtension']->webformToken("[webform_submission:values:webform_token_options_html:webform_token_options_email]", $this->sandbox->ensureToStringAllowed(($context["webform_submission"] ?? null), 15, $this->source)), "html", null, true);
        echo "</p>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</td>
\t</tr>
\t<tr>
\t\t<td style=\"color:#000000; font-family:'Open Sans', sans-serif; font-size:12px; font-weight:400; line-height:18px;\" align=\"center\">
\t\t\t<a href=\"https://www.snorkellifts.com\" style=\"color:#000000; font-weight:bold; text-align:center\"><img src=\"https://convertkit.s3.amazonaws.com/assets/pictures/65158/1292561/content_6ac4cd270738d501646c8f26328c1b93.gif\" style=\"display:inline-block; border:0;\" alt=\"Snorkel\" title=\"Snorkel\" height=\"44\" width=\"172\"></a><br><br>
\t\t\tVigo Centre, Birtley Road, Washington, Tyne & Wear, NE38 9DA, U.K.<br><br>
\t\t\tT: <a href=\"tel:4401914616810\" style=\"color:#000000; text-decoration:none;\">+44 (0)191 461 6810</a><br>
\t\t\tF: <a href=\"tel:4408451557756\" style=\"color:#000000; text-decoration:none;\">+44 (0)845 155 7756</a><br>
\t\t</td>
\t</tr>
</table>";
    }

    public function getTemplateName()
    {
        return "__string_template__7fcf729cb9c3dab6a8821b930dfb5f8f";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 15,  59 => 14,  44 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__7fcf729cb9c3dab6a8821b930dfb5f8f", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 4);
        static $functions = array("webform_token" => 4);

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['webform_token']
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
