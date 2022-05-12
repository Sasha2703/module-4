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

/* modules/custom/sasha_cat/templates/cats.html.twig */
class __TwigTemplate_b36c40af0df5c85e380121e4cf53df96626a0a2a112fbf427ee4af2a00bfaed4 extends \Twig\Template
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
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("sasha_cat/sasha_cat_library"), "html", null, true);
        echo "
";
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 2, $this->source), "html", null, true);
        echo "
   ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 4
            echo "     <div class=\"cat-table\">
       <h5 class=\"cat-date\">";
            // line 5
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "date", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
            echo "</h5>
       <div class=\"cat-tb\">
         <h3 class=\"cat-name\">";
            // line 7
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "name", [], "any", false, false, true, 7), 7, $this->source), "html", null, true);
            echo "</h3>
         <h3 class=\"cat-email\">";
            // line 8
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "email", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "</h3>
         <div class=\"cat-photo\"><a href=\"";
            // line 9
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed((($__internal_compile_0 = twig_get_attribute($this->env, $this->source, $context["cat"], "image", [], "any", false, false, true, 9)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#uri"] ?? null) : null), 9, $this->source)), "html", null, true);
            echo "\" target=\"_blank\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["cat"], "image", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
            echo "</a></div>
         ";
            // line 10
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "administer nodes"], "method", false, false, true, 10)) {
                // line 11
                echo "           <div class=\"cat-admin-buttons\">
             <div class=\"cat-button admin-cat-edit\"><a href=\"";
                // line 12
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("sasha_cat.edit", ["id" => twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 12)]), "html", null, true);
                echo "\" class=\"use-ajax cat-edit-btn\" data-dialog-type=\"modal\">Edit</a></div>
             <div class=\"cat-button admin-cat-delete\"><a href=\"";
                // line 13
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("sasha_cat.delete", ["id" => twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, true, 13)]), "html", null, true);
                echo "\" class=\"use-ajax cat-delete-btn\" data-dialog-type=\"modal\">Delete</a></div>
           </div>
         ";
            }
            // line 16
            echo "       </div>
     </div>
   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "modules/custom/sasha_cat/templates/cats.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 16,  82 => 13,  78 => 12,  75 => 11,  73 => 10,  67 => 9,  63 => 8,  59 => 7,  54 => 5,  51 => 4,  47 => 3,  43 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/sasha_cat/templates/cats.html.twig", "/var/www/web/modules/custom/sasha_cat/templates/cats.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 3, "if" => 10);
        static $filters = array("escape" => 1);
        static $functions = array("attach_library" => 1, "file_url" => 9, "path" => 12);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
                ['escape'],
                ['attach_library', 'file_url', 'path']
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
