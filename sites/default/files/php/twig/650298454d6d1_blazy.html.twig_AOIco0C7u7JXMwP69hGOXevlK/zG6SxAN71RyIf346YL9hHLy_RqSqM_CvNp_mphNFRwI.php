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

/* modules/contrib/blazy/templates/blazy.html.twig */
class __TwigTemplate_3dae52447d7550c2d9e512db5a428406 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'blazy_player' => [$this, 'block_blazy_player'],
            'blazy_media' => [$this, 'block_blazy_media'],
            'blazy_content' => [$this, 'block_blazy_content'],
            'blazy_caption' => [$this, 'block_blazy_caption'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 53
        $context["classes"] = [0 => ((        // line 54
($context["content"] ?? null)) ? ("media--rendered") : ("")), 1 => ((twig_get_attribute($this->env, $this->source,         // line 55
($context["settings"] ?? null), "namespace", [], "any", false, false, true, 55)) ? (("media--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "namespace", [], "any", false, false, true, 55), 55, $this->source))) : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 56
($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 56)) ? (("media--switch media--switch--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 56), 56, $this->source)))) : ("")), 3 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 57
($context["blazies"] ?? null), "is", [], "any", false, false, true, 57), "player", [], "any", false, false, true, 57)) ? ("media--player") : ("")), 4 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 58
($context["blazies"] ?? null), "media", [], "any", false, false, true, 58), "bundle", [], "any", false, false, true, 58)) ? (("media--bundle--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["blazies"] ?? null), "media", [], "any", false, false, true, 58), "bundle", [], "any", false, false, true, 58), 58, $this->source)))) : ("")), 5 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 59
($context["blazies"] ?? null), "media", [], "any", false, false, true, 59), "type", [], "any", false, false, true, 59)) ? (("media--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["blazies"] ?? null), "media", [], "any", false, false, true, 59), "type", [], "any", false, false, true, 59), 59, $this->source))) : ("")), 6 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 60
($context["blazies"] ?? null), "resimage", [], "any", false, false, true, 60), "id", [], "any", false, false, true, 60)) ? ("media--responsive") : ("")), 7 => ((twig_get_attribute($this->env, $this->source,         // line 61
($context["settings"] ?? null), "ratio", [], "any", false, false, true, 61)) ? (("media--ratio media--ratio--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "ratio", [], "any", false, false, true, 61), 61, $this->source))) : ("")), 8 => (((twig_get_attribute($this->env, $this->source,         // line 62
($context["settings"] ?? null), "use_loading", [], "any", false, false, true, 62) || twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["blazies"] ?? null), "use", [], "any", false, false, true, 62), "loader", [], "any", false, false, true, 62))) ? ("is-b-loading") : ("")), 9 => ((twig_get_attribute($this->env, $this->source,         // line 63
($context["settings"] ?? null), "classes", [], "any", false, false, true, 63)) ? (\Drupal\Component\Utility\Html::getClass(twig_join_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "classes", [], "any", false, false, true, 63), 63, $this->source), " "))) : (""))];
        // line 66
        echo "
";
        // line 67
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["blazies"] ?? null), "is", [], "any", false, false, true, 67), "player", [], "any", false, false, true, 67)) {
            // line 68
            echo "  ";
            $context["attributes"] = twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "setAttribute", [0 => "aria-live", 1 => "polite"], "method", false, false, true, 68);
            // line 69
            echo "
  ";
            // line 70
            $context["label"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["blazies"] ?? null), "media", [], "any", false, false, true, 70), "label", [], "any", false, false, true, 70);
            // line 71
            echo "  ";
            $context["play_title"] = t("Load and play video.");
            // line 72
            echo "  ";
            $context["close_title"] = t("Stop and close video.");
            // line 73
            echo "
  ";
            // line 74
            if (($context["label"] ?? null)) {
                // line 75
                echo "    ";
                $context["play_title"] = t("Load and play the video \"@label\".", ["@label" => ($context["label"] ?? null)]);
                // line 76
                echo "    ";
                $context["close_title"] = t("Stop and close the video \"@label\".", ["@label" => ($context["label"] ?? null)]);
                // line 77
                echo "  ";
            }
            // line 78
            echo "
  ";
            // line 79
            $context["play_button_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-label" =>             // line 80
($context["play_title"] ?? null), "class" => [0 => "media__icon", 1 => "media__icon--play"], "data-url" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 82
($context["blazies"] ?? null), "media", [], "any", false, false, true, 82), "embed_url", [], "any", false, false, true, 82), "data-iframe-title" =>             // line 83
($context["label"] ?? null), "title" =>             // line 84
($context["play_title"] ?? null), "type" => "button"]);
            // line 87
            echo "
  ";
            // line 88
            $context["close_button_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-label" =>             // line 89
($context["close_title"] ?? null), "class" => [0 => "media__icon", 1 => "media__icon--close"], "title" =>             // line 91
($context["close_title"] ?? null), "type" => "button"]);
        }
        // line 95
        echo "
";
        // line 96
        ob_start(function () { return ''; });
        // line 97
        echo "  ";
        $this->displayBlock('blazy_player', $context, $blocks);
        $context["player"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 106
        echo "
";
        // line 107
        ob_start(function () { return ''; });
        // line 108
        echo "  ";
        $this->displayBlock('blazy_media', $context, $blocks);
        $context["media"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 124
        echo "
";
        // line 125
        ob_start(function () { return ''; });
        // line 126
        echo "  ";
        $this->displayBlock('blazy_content', $context, $blocks);
        // line 143
        echo "
  ";
        // line 144
        if ((($context["captions"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "inline", [], "any", true, true, true, 144))) {
            // line 145
            echo "    ";
            $this->displayBlock('blazy_caption', $context, $blocks);
            // line 155
            echo "  ";
        }
        // line 157
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["postscript"] ?? null), 157, $this->source), "html", null, true);
        $context["blazy"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 160
        echo "
";
        // line 161
        if (($context["wrapper_attributes"] ?? null)) {
            // line 162
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapper_attributes"] ?? null), 162, $this->source), "html", null, true);
            echo ">";
            // line 163
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blazy"] ?? null), 163, $this->source), "html", null, true);
            // line 164
            echo "</div>
";
        } else {
            // line 166
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blazy"] ?? null), 166, $this->source), "html", null, true);
            echo "
";
        }
    }

    // line 97
    public function block_blazy_player($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 98
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["blazies"] ?? null), "is", [], "any", false, false, true, 98), "player", [], "any", false, false, true, 98)) {
            // line 99
            echo "      <button";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["close_button_attributes"] ?? null), 99, $this->source), "html", null, true);
            echo "></button>
      <button";
            // line 100
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["play_button_attributes"] ?? null), 100, $this->source), "html", null, true);
            echo "></button>
    ";
        } else {
            // line 102
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["iframe"] ?? null), 102, $this->source), "html", null, true);
        }
        // line 104
        echo "  ";
    }

    // line 108
    public function block_blazy_media($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 109
        echo "    <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 109), 109, $this->source), "html", null, true);
        echo ">";
        // line 110
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["preface"] ?? null), 110, $this->source), "html", null, true);
        // line 111
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 111, $this->source), "html", null, true);
        // line 112
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image"] ?? null), 112, $this->source), "html", null, true);
        // line 114
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["noscript"] ?? null), 114, $this->source), "html", null, true);
        // line 115
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["overlay"] ?? null), 115, $this->source), "html", null, true);
        // line 116
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["player"] ?? null), 116, $this->source), "html", null, true);
        // line 119
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "icon", [], "any", false, false, true, 119), 119, $this->source), "html", null, true);
        // line 120
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["icon"] ?? null), 120, $this->source), "html", null, true);
        // line 121
        echo "</div>
  ";
    }

    // line 126
    public function block_blazy_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 127
        echo "    ";
        if (($context["media_attributes"] ?? null)) {
            echo "<div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media_attributes"] ?? null), 127, $this->source), "html", null, true);
            echo ">";
        }
        // line 128
        echo "      ";
        if ((($context["url"] ?? null) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["blazies"] ?? null), "is", [], "any", false, false, true, 128), "player", [], "any", false, false, true, 128))) {
            // line 129
            echo "        <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 129, $this->source), "html", null, true);
            echo "\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url_attributes"] ?? null), 129, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media"] ?? null), 129, $this->source), "html", null, true);
            echo "</a>

        ";
            // line 132
            echo "        ";
            if ((($context["captions"] ?? null) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "lightbox", [], "any", false, false, true, 132)))) {
                // line 133
                echo "          <div class=\"litebox-caption visually-hidden\">";
                // line 134
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "lightbox", [], "any", false, false, true, 134), 134, $this->source), "html", null, true);
                // line 135
                echo "</div>
        ";
            }
            // line 137
            echo "
      ";
        } else {
            // line 139
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media"] ?? null), 139, $this->source), "html", null, true);
        }
        // line 141
        echo "    ";
        if (($context["media_attributes"] ?? null)) {
            echo "</div>";
        }
        // line 142
        echo "  ";
    }

    // line 145
    public function block_blazy_caption($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 146
        echo "      ";
        $context["caption_tag"] = twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "tag", [], "any", false, false, true, 146);
        // line 147
        echo "      <";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption_tag"] ?? null), 147, $this->source), "html", null, true);
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption_attributes"] ?? null), 147, $this->source), "html", null, true);
        echo ">
        ";
        // line 148
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "inline", [], "any", false, false, true, 148));
        foreach ($context['_seq'] as $context["_key"] => $context["caption"]) {
            // line 149
            echo "          ";
            if (twig_get_attribute($this->env, $this->source, $context["caption"], "content", [], "any", false, false, true, 149)) {
                // line 150
                echo "            <";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "tag", [], "any", false, false, true, 150), 150, $this->source), "html", null, true);
                echo " ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "attributes", [], "any", false, false, true, 150), 150, $this->source), "html", null, true);
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "content", [], "any", false, false, true, 150), 150, $this->source), "html", null, true);
                echo "</";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "tag", [], "any", false, false, true, 150), 150, $this->source), "html", null, true);
                echo ">
          ";
            }
            // line 152
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['caption'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 153
        echo "      </";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption_tag"] ?? null), 153, $this->source), "html", null, true);
        echo ">
    ";
    }

    public function getTemplateName()
    {
        return "modules/contrib/blazy/templates/blazy.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  309 => 153,  303 => 152,  291 => 150,  288 => 149,  284 => 148,  278 => 147,  275 => 146,  271 => 145,  267 => 142,  262 => 141,  259 => 139,  255 => 137,  251 => 135,  249 => 134,  247 => 133,  244 => 132,  234 => 129,  231 => 128,  224 => 127,  220 => 126,  215 => 121,  213 => 120,  211 => 119,  209 => 116,  207 => 115,  205 => 114,  203 => 112,  201 => 111,  199 => 110,  195 => 109,  191 => 108,  187 => 104,  184 => 102,  179 => 100,  174 => 99,  171 => 98,  167 => 97,  160 => 166,  156 => 164,  154 => 163,  150 => 162,  148 => 161,  145 => 160,  142 => 157,  139 => 155,  136 => 145,  134 => 144,  131 => 143,  128 => 126,  126 => 125,  123 => 124,  119 => 108,  117 => 107,  114 => 106,  110 => 97,  108 => 96,  105 => 95,  102 => 91,  101 => 89,  100 => 88,  97 => 87,  95 => 84,  94 => 83,  93 => 82,  92 => 80,  91 => 79,  88 => 78,  85 => 77,  82 => 76,  79 => 75,  77 => 74,  74 => 73,  71 => 72,  68 => 71,  66 => 70,  63 => 69,  60 => 68,  58 => 67,  55 => 66,  53 => 63,  52 => 62,  51 => 61,  50 => 60,  49 => 59,  48 => 58,  47 => 57,  46 => 56,  45 => 55,  44 => 54,  43 => 53,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/blazy/templates/blazy.html.twig", "/var/www/snorkellifts/web/modules/contrib/blazy/templates/blazy.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 53, "if" => 67, "block" => 97, "for" => 148);
        static $filters = array("clean_class" => 56, "join" => 63, "t" => 71, "escape" => 157);
        static $functions = array("create_attribute" => 79);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block', 'for'],
                ['clean_class', 'join', 't', 'escape'],
                ['create_attribute']
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
