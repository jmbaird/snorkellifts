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

/* __string_template__444d40d3feff4eae77a798e5cb7faa9c */
class __TwigTemplate_651d09940a246cf9199221432bdffe67 extends \Twig\Template
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
        echo "<table border=\"0\" cellpadding=\"15\" cellspacing=\"15\" bgcolor=\"#ffffff\">
\t<tr>
\t\t<td style=\"color:#000000; font-family:'Open Sans', sans-serif; font-size:14px; font-weight:400; line-height:21px;\">
\t\t\t<p>Dear Valued Customer,</p>

\t\t\t<p>Thank you for submitting your online warranty product registration to Snorkel&trade;. A copy of your submission is attached below in this e-mail for your records.</p>

\t\t\t<p>Our warranty team will process your warranty registration within 5 business days.</p>

\t\t\t<p>If you have any questions relating to this submission, please contact <a href=\"mailto:warranty.usa@snorkellifts.com\" style=\"color:#f68933;\">warranty.usa@snorkellifts.com</a></b>.

\t\t\t<p style=\"margin-bottom:0;\">Best Regards<br>The Snorkel Warranty Team</p>
\t\t</td>
\t</tr>
\t<tr>
\t\t<td bgcolor=\"#e7e7e7\">
\t\t\t<table width=\"100%\" cellpadding=\"10\" cellspacing=\"10\">
\t\t\t\t<tr>
\t\t\t\t\t<td style=\"color:#6d6e71; font-family:'Open Sans', sans-serif; font-size:14px; font-weight:400; line-height:21px;\">
\t\t\t\t\t\t<p style=\"margin-top:0;\"><strong>Submitted on ";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\webform\Twig\WebformTwigExtension']->webformToken("[webform_submission:created]", $this->sandbox->ensureToStringAllowed(($context["webform_submission"] ?? null), 20, $this->source)), "html", null, true);
        echo ".</strong></p>
\t\t\t\t\t\t<p>";
        // line 21
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\webform\Twig\WebformTwigExtension']->webformToken("[webform_submission:values:webform_token_options_html:webform_token_options_email]", $this->sandbox->ensureToStringAllowed(($context["webform_submission"] ?? null), 21, $this->source)), "html", null, true);
        echo "</p>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</td>
\t</tr>
\t<tr>
\t\t<td style=\"color:#000000; font-family:'Open Sans', sans-serif; font-size:12px; font-weight:400; line-height:18px;\" align=\"center\">
\t\t\t<a href=\"https://www.snorkellifts.com\" style=\"color:#000000; font-weight:bold; text-align:center\"><img src=\"https://convertkit.s3.amazonaws.com/assets/pictures/65158/1292561/content_6ac4cd270738d501646c8f26328c1b93.gif\" style=\"display:inline-block; border:0;\" alt=\"Snorkel\" title=\"Snorkel\" height=\"44\" width=\"172\"></a><br><br>
\t\t\t<strong>Mailing Address</strong><br>P.O. Box 1160, St. Joseph, MO, 64502-1160<br><br>
\t\t\t<strong>Shipping Address:</strong><br>2009 Roseport Rd., Elwood, KS 66024<br><br>
\t\t\tT: <a href=\"tel:18002550317\" style=\"color:#000000; text-decoration:none;\">+1 (800) 255-0317</a><br>
\t\t\tF: <a href=\"tel:17859893075\" style=\"color:#000000; text-decoration:none;\">+1 (785) 989-3075</a><br>
\t\t</td>
\t</tr>
</table>";
    }

    public function getTemplateName()
    {
        return "__string_template__444d40d3feff4eae77a798e5cb7faa9c";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 21,  60 => 20,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__444d40d3feff4eae77a798e5cb7faa9c", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 20);
        static $functions = array("webform_token" => 20);

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
