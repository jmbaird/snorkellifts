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

/* themes/sglobal/templates/misc/commerce-checkout-completion-message.html.twig */
class __TwigTemplate_26ed84252e32417c8ad4b915c32ca9c9 extends \Twig\Template
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
        // line 13
        echo "<div class=\"checkout-complete\">
  ";
        // line 14
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Thank you for requesting a quote from Snorkel."));
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Your quote number is @number.", ["@number" => twig_get_attribute($this->env, $this->source, ($context["order_entity"] ?? null), "getOrderNumber", [], "any", false, false, true, 14)]));
        echo " <br>
  ";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("One of our representatives will contact you within 1 business day to assist further with your request."));
        echo " 

  ";
        // line 17
        if (($context["payment_instructions"] ?? null)) {
            // line 18
            echo "    <div class=\"checkout-complete__payment-instructions\">
      <h2>";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Payment instructions"));
            echo "</h2>
      ";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["payment_instructions"] ?? null), 20, $this->source), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 23
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/misc/commerce-checkout-completion-message.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 23,  62 => 20,  58 => 19,  55 => 18,  53 => 17,  48 => 15,  42 => 14,  39 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/misc/commerce-checkout-completion-message.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/misc/commerce-checkout-completion-message.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 17);
        static $filters = array("t" => 14, "escape" => 20);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t', 'escape'],
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
