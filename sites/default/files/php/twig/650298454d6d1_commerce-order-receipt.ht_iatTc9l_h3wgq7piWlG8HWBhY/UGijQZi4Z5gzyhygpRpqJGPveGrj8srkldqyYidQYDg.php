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

/* themes/sglobal/templates/misc/commerce-order-receipt.html.twig */
class __TwigTemplate_36bd7b1c65503907e7e36bec3270fa20 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'order_items' => [$this, 'block_order_items'],
            'additional_information' => [$this, 'block_additional_information'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 23
        echo "
<link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600\" rel=\"stylesheet\">
<style type=\"text/css\">
  body {font-family: 'Open Sans', Calibri, Arial, Helvetica, sans-serif; font-weight:400; width:100%!important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
  a[x-apple-data-detectors] {color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important;}

  @media screen and (max-width: 600px) {
    table.content_wrap {width:98% !important;}
  }

  @media screen and (max-width: 420px) {
    img.full_width {width:100% !important; height:auto !important;}
  }
</style>

<!--[if mso]>
<style type=\"text/css\">
  body, table, td, p {font-family: Calibri, Arial, Helvetica, sans-serif !important; font-size:16px !important;}
  .snorkel-header-logo {font-size:35px !important;}
  .title {font-size:28px !important;}
  .footer {font-size: 12px !important;}
</style>
<![endif]-->

<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
  <tr>
    <td align=\"center\">
      <table class=\"content_wrap\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
        <tr><td bgcolor=\"#f7f7f7\" height=\"25\"></td></tr>
        <tr>
          <td bgcolor=\"#f7f7f7\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; font-weight:300; line-height:24px; padding-left:25px; padding-right:25px;\">
            <!-- CONTENT STARTS HERE -->

            <table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
              <tr><td bgcolor=\"#000000\" height=\"30\"></td></tr>
              <tr>
                <td align=\"center\" bgcolor=\"#000000\" style=\"color:#ffffff; font-family:'Open Sans', arial, sans-serif; font-size:36px; font-weight:400; line-height:40px; padding-left:25px; padding-right:25px;\" class=\"snorkel-header-logo\">
                  <a href=\"";
        // line 60
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        echo "\" style=\"color:#ffffff;\"><img src=\"/sites/default/files/email/commerce/snorkel-reverse-logo.png\" width=\"284\" height=\"53\" alt=\"Snorkel&trade;\" style=\"border:0; display:inline-block;\" class=\"full_width\"/></a>
                </td>
              </tr>
              <tr><td bgcolor=\"#000000\" height=\"25\"></td></tr>
              <tr><td height=\"20\"></td></tr>
              <tr>
                <td align=\"left\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:25px; font-weight:600; line-height:30px;\" class=\"title\">
                  We have received your request for a quote.
                </td>
              </tr>
              <tr><td height=\"15\"></td></tr>
              <tr>
                <td align=\"left\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; font-weight:400; line-height:24px;\">
                  Below is a summary of your request. One of our sales representatives will contact you soon.
                </td>
              </tr>
              <tr><td height=\"30\"></td></tr>
              <tr>
                <td align=\"left\" style=\"border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:3px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:18px; font-weight:600; line-height:24px; padding-bottom:5px; text-transform:uppercase;\">
                  ";
        // line 79
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Quote #@number", ["@number" => twig_get_attribute($this->env, $this->source, ($context["order_entity"] ?? null), "getOrderNumber", [], "any", false, false, true, 79)]));
        echo "
                </td>
              </tr>
              <tr>
                <td align=\"left\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; font-weight:400; line-height:24px;\">
                  ";
        // line 84
        $this->displayBlock('order_items', $context, $blocks);
        // line 122
        echo "                </td>
              </tr>
\t\t\t  <tr><td height=\"30\"></td></tr>
\t\t\t  <tr>
                <td align=\"left\" style=\"border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:3px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:18px; font-weight:600; line-height:24px; padding-bottom:5px; text-transform:uppercase;\">
                  Notes
                </td>
              </tr>
              <tr>
                <td align=\"left\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; font-weight:400; line-height:24px;\">
\t\t\t\t  ";
        // line 132
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["quote_notes"] ?? null), 132, $this->source), "html", null, true);
        echo "
                </td>
              </tr>
              <tr><td height=\"30\"></td></tr>
\t\t\t  <tr>
                <td align=\"left\" style=\"border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:3px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:18px; font-weight:600; line-height:24px; padding-bottom:5px; text-transform:uppercase;\">
                  Contact Details
                </td>
              </tr>
              <tr>
                <td align=\"left\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; font-weight:400; line-height:24px;\">
\t\t\t\t\t<strong>";
        // line 143
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_first"] ?? null), 143, $this->source), "html", null, true);
        echo " ";
        if (($context["cust_middle"] ?? null)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_middle"] ?? null), 143, $this->source), "html", null, true);
        }
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_last"] ?? null), 143, $this->source), "html", null, true);
        echo "</strong><br>
\t\t\t\t\t";
        // line 144
        if (($context["cust_company"] ?? null)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_company"] ?? null), 144, $this->source), "html", null, true);
            echo "<br>";
        }
        // line 145
        echo "\t\t\t\t\t";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_addr1"] ?? null), 145, $this->source), "html", null, true);
        echo "<br>
\t\t\t\t\t";
        // line 146
        if (($context["cust_addr2"] ?? null)) {
            // line 147
            echo "\t\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_addr2"] ?? null), 147, $this->source), "html", null, true);
            echo "<br>
\t\t\t\t\t";
        }
        // line 149
        echo "                    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_city"] ?? null), 149, $this->source), "html", null, true);
        echo ", ";
        if (($context["cust_city_dependent"] ?? null)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_city_dependent"] ?? null), 149, $this->source), "html", null, true);
            echo ", ";
        }
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_state"] ?? null), 149, $this->source), "html", null, true);
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_zip"] ?? null), 149, $this->source), "html", null, true);
        echo " ";
        if (($context["cust_sorting_code"] ?? null)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_sorting_code"] ?? null), 149, $this->source), "html", null, true);
        }
        echo "<br>
                    ";
        // line 150
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_country_code"] ?? null), 150, $this->source), "html", null, true);
        echo "<br><br>
                    ";
        // line 151
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_phone"] ?? null), 151, $this->source), "html", null, true);
        echo "<br>
                    ";
        // line 152
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cust_email"] ?? null), 152, $this->source), "html", null, true);
        echo "
                </td>
              </tr>
              <tr><td height=\"30\" style=\"border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:1px;\"></td></tr>
\t\t\t  <tr><td height=\"20\"></td></tr>
              <tr>
                <td align=\"left\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; font-weight:400; line-height:24px;\">
                  ";
        // line 159
        $this->displayBlock('additional_information', $context, $blocks);
        // line 162
        echo "                </td>
              </tr>
            </table>
            <!-- CONTENT ENDS HERE -->
          </td>
        </tr>
        <tr><td bgcolor=\"#f7f7f7\" height=\"25\"></td></tr>
        <tr>
          <td bgcolor=\"#f7f7f7\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; font-weight:400; line-height:20px; padding-left:25px; padding-right:25px;\">
            <table bgcolor=\"#ffffff\" border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-top:1px; border-top-color:#dddddd; border-top-style:solid; border-right:1px; border-right-color:#dddddd; border-right-style:solid; border-bottom:1px; border-bottom-color:#dddddd; border-bottom-style:solid; border-left:1px; border-left-color:#dddddd; border-left-style:solid;\">
              <tr>
                <td align=\"center\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; font-weight:600; line-height:20px; text-transform:uppercase; padding-top:20px; padding-right:20px; padding-left:20px;\">
                  Follow us on social media<br><br>
                </td>
              </tr>
              <tr>
                <td align=\"center\" style=\"padding-right:20px; padding-bottom:20px; padding-left:20px;\">
                  <a href=\"https://www.facebook.com/snorkellifts/\" target=\"_blank\"><img src=\"/sites/default/files/email/commerce/content_sns-facebook.png\" alt=\"Facebook\" style=\"border:0; display:inline-block; height:40px; width:40px;\"></a>&emsp;<a href=\"https://twitter.com/snorkellifts\" target=\"_blank\"><img src=\"/sites/default/files/email/commerce/content_sns-twitter.png\" alt=\"Twitter\" style=\"border:0; display:inline-block; height:40px; width:40px;\"></a>&emsp;<a href=\"https://www.linkedin.com/company/snorkel-lifts/\" target=\"_blank\"><img src=\"/sites/default/files/email/commerce/content_sns-linkedin.png\" alt=\"LinkedIn\" style=\"border:0; display:inline-block; height:40px; width:40px;\"></a>&emsp;<a href=\"https://www.youtube.com/user/Snorkellifts1\" target=\"_blank\"><img src=\"/sites/default/files/email/commerce/content_sns-youtube.png\" alt=\"YouTube\" style=\"border:0; display:inline-block; height:40px; width:40px;\"></a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr><td bgcolor=\"#f7f7f7\" height=\"25\"></td></tr>
        <tr><td height=\"20\"></td></tr>
        <tr>
          <td align=\"center\">
            <a href=\"";
        // line 189
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        echo "\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-weight:600; text-align:center\"><img src=\"/sites/default/files/logo.png\" alt=\"Snorkel\" style=\"display:inline-block;\"></a>
          </td>
        </tr>
        <tr><td height=\"20\"></td></tr>
        <tr>
          <td align=\"center\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; font-weight:400; line-height:20px;\">
            <a href=\"";
        // line 195
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        echo "/\" style=\"color:#F68933; text-decoration:none;\">www.snorkellifts.com</a>
          </td>
        </tr>
        <tr>
          <td align=\"center\" style=\"color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:12px; font-weight:400; line-height:18px;\" class=\"footer\">
            <a style=\"color:#000000; text-decoration:none\">";
        // line 200
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["street_address"] ?? null), 200, $this->source), "html", null, true);
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["region_address"] ?? null), 200, $this->source), "html", null, true);
        echo " ";
        if (($context["region_address_extra"] ?? null)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["region_address_extra"] ?? null), 200, $this->source), "html", null, true);
            echo " ";
        }
        echo "</a><br>
            ";
        // line 201
        if ((twig_lower_filter($this->env, ($context["symbols"] ?? null)) == "china")) {
            // line 202
            echo "              <strong>销售:</strong> <a href=\"tel:";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["snorkel_phone"] ?? null), 202, $this->source), "html", null, true);
            echo "\" style=\"color:#000000; text-decoration:none;\"><u>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["snorkel_formatted_phone"] ?? null), 202, $this->source), "html", null, true);
            echo "</u></a>
              &emsp;<strong>电子邮件</strong>: <a href=\"mailto:";
            // line 203
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["snorkel_email"] ?? null), 203, $this->source), "html", null, true);
            echo "\" style=\"color:#000000; text-decoration:none;\"><u>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["snorkel_email"] ?? null), 203, $this->source), "html", null, true);
            echo "</u></a>
            ";
        } else {
            // line 205
            echo "              <strong>Phone:</strong> <a href=\"tel:";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["snorkel_phone"] ?? null), 205, $this->source), "html", null, true);
            echo "\" style=\"color:#000000; text-decoration:none;\"><u>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["snorkel_formatted_phone"] ?? null), 205, $this->source), "html", null, true);
            echo "</u></a>
              &emsp;<strong>Email:</strong> <a href=\"mailto:";
            // line 206
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["snorkel_email"] ?? null), 206, $this->source), "html", null, true);
            echo "\" style=\"color:#000000; text-decoration:none;\"><u>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["snorkel_email"] ?? null), 206, $this->source), "html", null, true);
            echo "</u></a>
            ";
        }
        // line 208
        echo "          </td>
        </tr>
        <tr><td height=\"15\"></td></tr>
      </table>
    </td>
  </tr>
</table>
";
    }

    // line 84
    public function block_order_items($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 85
        echo "                    <table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
                      <tr>
                        <td width=\"30%\" style=\"border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:2px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:13px; font-weight:600; line-height:24px; padding-bottom:5px; padding-top:5px; text-transform:uppercase;\">&nbsp;

                        </td>
\t\t\t\t\t\t<td width=\"3%\" style=\"border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:2px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:13px; font-weight:600; line-height:24px; padding-bottom:5px; padding-top:5px; text-transform:uppercase;\">&nbsp;

                        </td>
                        <td width=\"32%\" style=\"border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:2px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:13px; font-weight:600; line-height:24px; padding-bottom:5px; padding-top:5px; text-transform:uppercase;\">
                          Equipment
                        </td>
\t\t\t\t\t\t<td align=\"right\" width=\"30%\" style=\"border-bottom-color:#000000; border-bottom-style:solid; border-bottom-width:2px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:13px; font-weight:600; line-height:24px; padding-bottom:5px; padding-top:5px; text-transform:uppercase;\">
                          Qty
                        </td>
                      </tr>
                      ";
        // line 100
        $context["cat_index"] = 0;
        // line 101
        echo "                      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["order_entity"] ?? null), "getItems", [], "any", false, false, true, 101));
        foreach ($context['_seq'] as $context["_key"] => $context["order_item"]) {
            // line 102
            echo "                        <tr>
                          <td width=\"35%\" style=\"border-bottom-color:#dddddd; border-bottom-style:solid; border-bottom-width:1px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; line-height:24px; padding-bottom:5px; padding-top:5px;\">
                            <a href=\"";
            // line 104
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_0 = (($__internal_compile_1 = ($context["image_link"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[($context["cat_index"] ?? null)] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), 104, $this->source), "html", null, true);
            echo "\">
                              <img src=\"https:";
            // line 105
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_2 = (($__internal_compile_3 = ($context["catalog_image"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[($context["cat_index"] ?? null)] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[0] ?? null) : null), 105, $this->source), "html", null, true);
            echo "\" alt=\"Catalog Image\" title=\"Catalog Image\" style=\"border:0; display:inline-block; height:100px; width:175px;\" />
                            </a>
                          </td>
\t\t\t\t\t\t  <td width=\"3%\" style=\"border-bottom-color:#dddddd; border-bottom-style:solid; border-bottom-width:1px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; line-height:24px; padding-bottom:5px; padding-top:5px;\">&nbsp;

                          </td>
                          <td width=\"32%\" style=\"border-bottom-color:#dddddd; border-bottom-style:solid; border-bottom-width:1px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; line-height:24px; padding-bottom:5px; padding-top:5px;\">
                            ";
            // line 112
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["order_item"], "label", [], "any", false, false, true, 112), 112, $this->source), "html", null, true);
            echo "
                          </td>
\t\t\t\t\t\t  <td align=\"right\" width=\"30%\" style=\"border-bottom-color:#dddddd; border-bottom-style:solid; border-bottom-width:1px; color:#000000; font-family:'Open Sans', arial, sans-serif; font-size:15px; line-height:24px; padding-bottom:5px; padding-top:5px;\">
                            ";
            // line 115
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_number_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["order_item"], "getQuantity", [], "any", false, false, true, 115), 115, $this->source)), "html", null, true);
            echo "
                          </td>
                        </tr>
                        ";
            // line 118
            $context["cat_index"] = (($context["cat_index"] ?? null) + 1);
            // line 119
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        echo "                    </table>
                  ";
    }

    // line 159
    public function block_additional_information($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 160
        echo "                    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Thank you for your request!"));
        echo "
                  ";
    }

    public function getTemplateName()
    {
        return "themes/sglobal/templates/misc/commerce-order-receipt.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  376 => 160,  372 => 159,  367 => 120,  361 => 119,  359 => 118,  353 => 115,  347 => 112,  337 => 105,  333 => 104,  329 => 102,  324 => 101,  322 => 100,  305 => 85,  301 => 84,  290 => 208,  283 => 206,  276 => 205,  269 => 203,  262 => 202,  260 => 201,  249 => 200,  241 => 195,  232 => 189,  203 => 162,  201 => 159,  191 => 152,  187 => 151,  183 => 150,  166 => 149,  160 => 147,  158 => 146,  153 => 145,  148 => 144,  138 => 143,  124 => 132,  112 => 122,  110 => 84,  102 => 79,  80 => 60,  41 => 23,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/sglobal/templates/misc/commerce-order-receipt.html.twig", "/var/www/snorkellifts/web/themes/sglobal/templates/misc/commerce-order-receipt.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 84, "if" => 143, "set" => 100, "for" => 101);
        static $filters = array("t" => 79, "escape" => 132, "lower" => 201, "number_format" => 115);
        static $functions = array("url" => 60);

        try {
            $this->sandbox->checkSecurity(
                ['block', 'if', 'set', 'for'],
                ['t', 'escape', 'lower', 'number_format'],
                ['url']
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
