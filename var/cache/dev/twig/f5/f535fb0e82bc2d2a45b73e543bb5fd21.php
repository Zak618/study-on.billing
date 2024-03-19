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

/* @DoctrineMigrations/Collector/migrations.html.twig */
class __TwigTemplate_98e827f1904c0ff27e39e70cf7f95f4f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'toolbar' => [$this, 'block_toolbar'],
            'menu' => [$this, 'block_menu'],
            'panel' => [$this, 'block_panel'],
        ];
        $macros["_self"] = $this->macros["_self"] = $this;
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@DoctrineMigrations/Collector/migrations.html.twig"));

        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@DoctrineMigrations/Collector/migrations.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, true, false, 4), "unavailable_migrations_count", [], "any", true, true, false, 4)) {
            // line 5
            echo "        ";
            $context["unavailable_migrations"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 5, $this->source); })()), "data", [], "any", false, false, false, 5), "unavailable_migrations_count", [], "any", false, false, false, 5);
            // line 6
            echo "        ";
            $context["new_migrations"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 6, $this->source); })()), "data", [], "any", false, false, false, 6), "new_migrations", [], "any", false, false, false, 6));
            // line 7
            echo "        ";
            if ((((isset($context["unavailable_migrations"]) || array_key_exists("unavailable_migrations", $context) ? $context["unavailable_migrations"] : (function () { throw new RuntimeError('Variable "unavailable_migrations" does not exist.', 7, $this->source); })()) > 0) || ((isset($context["new_migrations"]) || array_key_exists("new_migrations", $context) ? $context["new_migrations"] : (function () { throw new RuntimeError('Variable "new_migrations" does not exist.', 7, $this->source); })()) > 0))) {
                // line 8
                echo "            ";
                $context["executed_migrations"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 8, $this->source); })()), "data", [], "any", false, false, false, 8), "executed_migrations", [], "any", false, false, false, 8));
                // line 9
                echo "            ";
                $context["available_migrations"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 9, $this->source); })()), "data", [], "any", false, false, false, 9), "available_migrations_count", [], "any", false, false, false, 9);
                // line 10
                echo "            ";
                $context["status_color"] = ((((isset($context["unavailable_migrations"]) || array_key_exists("unavailable_migrations", $context) ? $context["unavailable_migrations"] : (function () { throw new RuntimeError('Variable "unavailable_migrations" does not exist.', 10, $this->source); })()) > 0)) ? ("yellow") : (""));
                // line 11
                echo "            ";
                $context["status_color"] = ((((isset($context["new_migrations"]) || array_key_exists("new_migrations", $context) ? $context["new_migrations"] : (function () { throw new RuntimeError('Variable "new_migrations" does not exist.', 11, $this->source); })()) > 0)) ? ("red") : ((isset($context["status_color"]) || array_key_exists("status_color", $context) ? $context["status_color"] : (function () { throw new RuntimeError('Variable "status_color" does not exist.', 11, $this->source); })())));
                // line 12
                echo "
            ";
                // line 13
                ob_start();
                // line 14
                echo "                ";
                if (((isset($context["profiler_markup_version"]) || array_key_exists("profiler_markup_version", $context) ? $context["profiler_markup_version"] : (function () { throw new RuntimeError('Variable "profiler_markup_version" does not exist.', 14, $this->source); })()) < 3)) {
                    // line 15
                    echo "                    ";
                    echo twig_include($this->env, $context, "@DoctrineMigrations/Collector/icon.svg");
                    echo "
                ";
                } else {
                    // line 17
                    echo "                    ";
                    echo twig_include($this->env, $context, "@DoctrineMigrations/Collector/icon-v3.svg");
                    echo "
                ";
                }
                // line 19
                echo "
                <span class=\"sf-toolbar-value\">";
                // line 20
                echo twig_escape_filter($this->env, ((isset($context["new_migrations"]) || array_key_exists("new_migrations", $context) ? $context["new_migrations"] : (function () { throw new RuntimeError('Variable "new_migrations" does not exist.', 20, $this->source); })()) + (isset($context["unavailable_migrations"]) || array_key_exists("unavailable_migrations", $context) ? $context["unavailable_migrations"] : (function () { throw new RuntimeError('Variable "unavailable_migrations" does not exist.', 20, $this->source); })())), "html", null, true);
                echo "</span>
            ";
                $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 22
                echo "
            ";
                // line 23
                ob_start();
                // line 24
                echo "                <div class=\"sf-toolbar-info-group\">
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Current Migration</b>
                        <span>";
                // line 27
                ((((isset($context["executed_migrations"]) || array_key_exists("executed_migrations", $context) ? $context["executed_migrations"] : (function () { throw new RuntimeError('Variable "executed_migrations" does not exist.', 27, $this->source); })()) > 0)) ? (print (twig_escape_filter($this->env, twig_last($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, twig_last($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 27, $this->source); })()), "data", [], "any", false, false, false, 27), "executed_migrations", [], "any", false, false, false, 27)), "version", [], "any", false, false, false, 27), "\\")), "html", null, true))) : (print ("n/a")));
                echo "</span>
                    </div>
                </div>

                <div class=\"sf-toolbar-info-group\">
                    <div class=\"sf-toolbar-info-piece\">
                        <span class=\"sf-toolbar-header\">
                            <b>Database Migrations</b>
                        </span>
                    </div>
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Executed</b>
                        <span class=\"sf-toolbar-status\">";
                // line 39
                echo twig_escape_filter($this->env, (isset($context["executed_migrations"]) || array_key_exists("executed_migrations", $context) ? $context["executed_migrations"] : (function () { throw new RuntimeError('Variable "executed_migrations" does not exist.', 39, $this->source); })()), "html", null, true);
                echo "</span>
                    </div>
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Unavailable</b>
                        <span class=\"sf-toolbar-status ";
                // line 43
                echo ((((isset($context["unavailable_migrations"]) || array_key_exists("unavailable_migrations", $context) ? $context["unavailable_migrations"] : (function () { throw new RuntimeError('Variable "unavailable_migrations" does not exist.', 43, $this->source); })()) > 0)) ? ("sf-toolbar-status-yellow") : (""));
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["unavailable_migrations"]) || array_key_exists("unavailable_migrations", $context) ? $context["unavailable_migrations"] : (function () { throw new RuntimeError('Variable "unavailable_migrations" does not exist.', 43, $this->source); })()), "html", null, true);
                echo "</span>
                    </div>
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Available</b>
                        <span class=\"sf-toolbar-status\">";
                // line 47
                echo twig_escape_filter($this->env, (isset($context["available_migrations"]) || array_key_exists("available_migrations", $context) ? $context["available_migrations"] : (function () { throw new RuntimeError('Variable "available_migrations" does not exist.', 47, $this->source); })()), "html", null, true);
                echo "</span>
                    </div>
                    <div class=\"sf-toolbar-info-piece\">
                        <b>New</b>
                        <span class=\"sf-toolbar-status ";
                // line 51
                echo ((((isset($context["new_migrations"]) || array_key_exists("new_migrations", $context) ? $context["new_migrations"] : (function () { throw new RuntimeError('Variable "new_migrations" does not exist.', 51, $this->source); })()) > 0)) ? ("sf-toolbar-status-red") : (""));
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["new_migrations"]) || array_key_exists("new_migrations", $context) ? $context["new_migrations"] : (function () { throw new RuntimeError('Variable "new_migrations" does not exist.', 51, $this->source); })()), "html", null, true);
                echo "</span>
                    </div>
                </div>
            ";
                $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 55
                echo "
            ";
                // line 56
                echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => (isset($context["profiler_url"]) || array_key_exists("profiler_url", $context) ? $context["profiler_url"] : (function () { throw new RuntimeError('Variable "profiler_url" does not exist.', 56, $this->source); })()), "status" => (isset($context["status_color"]) || array_key_exists("status_color", $context) ? $context["status_color"] : (function () { throw new RuntimeError('Variable "status_color" does not exist.', 56, $this->source); })())]);
                echo "
        ";
            }
            // line 58
            echo "    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 61
    public function block_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 62
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, true, false, 62), "unavailable_migrations_count", [], "any", true, true, false, 62)) {
            // line 63
            echo "        ";
            $context["unavailable_migrations"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 63, $this->source); })()), "data", [], "any", false, false, false, 63), "unavailable_migrations_count", [], "any", false, false, false, 63);
            // line 64
            echo "        ";
            $context["new_migrations"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 64, $this->source); })()), "data", [], "any", false, false, false, 64), "new_migrations", [], "any", false, false, false, 64));
            // line 65
            echo "        ";
            $context["label"] = ((((isset($context["unavailable_migrations"]) || array_key_exists("unavailable_migrations", $context) ? $context["unavailable_migrations"] : (function () { throw new RuntimeError('Variable "unavailable_migrations" does not exist.', 65, $this->source); })()) > 0)) ? ("label-status-warning") : (""));
            // line 66
            echo "        ";
            $context["label"] = ((((isset($context["new_migrations"]) || array_key_exists("new_migrations", $context) ? $context["new_migrations"] : (function () { throw new RuntimeError('Variable "new_migrations" does not exist.', 66, $this->source); })()) > 0)) ? ("label-status-error") : ((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 66, $this->source); })())));
            // line 67
            echo "        <span class=\"label ";
            echo twig_escape_filter($this->env, (isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 67, $this->source); })()), "html", null, true);
            echo "\">
            <span class=\"icon\">
                ";
            // line 69
            if (((isset($context["profiler_markup_version"]) || array_key_exists("profiler_markup_version", $context) ? $context["profiler_markup_version"] : (function () { throw new RuntimeError('Variable "profiler_markup_version" does not exist.', 69, $this->source); })()) < 3)) {
                // line 70
                echo "                    ";
                echo twig_include($this->env, $context, "@DoctrineMigrations/Collector/icon.svg");
                echo "
                ";
            } else {
                // line 72
                echo "                    ";
                echo twig_include($this->env, $context, "@DoctrineMigrations/Collector/icon-v3.svg");
                echo "
                ";
            }
            // line 74
            echo "            </span>

            <strong>Migrations</strong>
            ";
            // line 77
            if ((((isset($context["unavailable_migrations"]) || array_key_exists("unavailable_migrations", $context) ? $context["unavailable_migrations"] : (function () { throw new RuntimeError('Variable "unavailable_migrations" does not exist.', 77, $this->source); })()) > 0) || ((isset($context["new_migrations"]) || array_key_exists("new_migrations", $context) ? $context["new_migrations"] : (function () { throw new RuntimeError('Variable "new_migrations" does not exist.', 77, $this->source); })()) > 0))) {
                // line 78
                echo "                <span class=\"count\">
                    <span>";
                // line 79
                echo twig_escape_filter($this->env, ((isset($context["new_migrations"]) || array_key_exists("new_migrations", $context) ? $context["new_migrations"] : (function () { throw new RuntimeError('Variable "new_migrations" does not exist.', 79, $this->source); })()) + (isset($context["unavailable_migrations"]) || array_key_exists("unavailable_migrations", $context) ? $context["unavailable_migrations"] : (function () { throw new RuntimeError('Variable "unavailable_migrations" does not exist.', 79, $this->source); })())), "html", null, true);
                echo "</span>
                </span>
            ";
            }
            // line 82
            echo "        </span>
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 86
    public function block_panel($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 87
        echo "    ";
        $context["num_executed_migrations"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 87, $this->source); })()), "data", [], "any", false, false, false, 87), "executed_migrations", [], "any", false, false, false, 87));
        // line 88
        echo "    ";
        $context["num_unavailable_migrations"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 88, $this->source); })()), "data", [], "any", false, false, false, 88), "unavailable_migrations_count", [], "any", false, false, false, 88);
        // line 89
        echo "    ";
        $context["num_available_migrations"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 89, $this->source); })()), "data", [], "any", false, false, false, 89), "available_migrations_count", [], "any", false, false, false, 89);
        // line 90
        echo "    ";
        $context["num_new_migrations"] = twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 90, $this->source); })()), "data", [], "any", false, false, false, 90), "new_migrations", [], "any", false, false, false, 90));
        // line 91
        echo "
    <h2>Doctrine Migrations</h2>
    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">";
        // line 95
        echo twig_escape_filter($this->env, (isset($context["num_executed_migrations"]) || array_key_exists("num_executed_migrations", $context) ? $context["num_executed_migrations"] : (function () { throw new RuntimeError('Variable "num_executed_migrations" does not exist.', 95, $this->source); })()), "html", null, true);
        echo "</span>
            <span class=\"label\">Executed</span>
        </div>

        ";
        // line 99
        if (((isset($context["profiler_markup_version"]) || array_key_exists("profiler_markup_version", $context) ? $context["profiler_markup_version"] : (function () { throw new RuntimeError('Variable "profiler_markup_version" does not exist.', 99, $this->source); })()) >= 3)) {
            // line 100
            echo "            <div class=\"metric-group\">
        ";
        }
        // line 102
        echo "
        <div class=\"metric\">
            <span class=\"value\">";
        // line 104
        echo twig_escape_filter($this->env, (isset($context["num_unavailable_migrations"]) || array_key_exists("num_unavailable_migrations", $context) ? $context["num_unavailable_migrations"] : (function () { throw new RuntimeError('Variable "num_unavailable_migrations" does not exist.', 104, $this->source); })()), "html", null, true);
        echo "</span>
            <span class=\"label\">Unavailable</span>
        </div>
        <div class=\"metric\">
            <span class=\"value\">";
        // line 108
        echo twig_escape_filter($this->env, (isset($context["num_available_migrations"]) || array_key_exists("num_available_migrations", $context) ? $context["num_available_migrations"] : (function () { throw new RuntimeError('Variable "num_available_migrations" does not exist.', 108, $this->source); })()), "html", null, true);
        echo "</span>
            <span class=\"label\">Available</span>
        </div>
        <div class=\"metric\">
            <span class=\"value\">";
        // line 112
        echo twig_escape_filter($this->env, (isset($context["num_new_migrations"]) || array_key_exists("num_new_migrations", $context) ? $context["num_new_migrations"] : (function () { throw new RuntimeError('Variable "num_new_migrations" does not exist.', 112, $this->source); })()), "html", null, true);
        echo "</span>
            <span class=\"label\">New</span>
        </div>

        ";
        // line 116
        if (((isset($context["profiler_markup_version"]) || array_key_exists("profiler_markup_version", $context) ? $context["profiler_markup_version"] : (function () { throw new RuntimeError('Variable "profiler_markup_version" does not exist.', 116, $this->source); })()) >= 3)) {
            // line 117
            echo "            </div> ";
            // line 118
            echo "        ";
        }
        // line 119
        echo "    </div>

    <div class=\"sf-tabs\">
        <div class=\"tab\">
            <h3 class=\"tab-title\">
                Migrations
                <span class=\"badge ";
        // line 125
        echo ((((isset($context["num_new_migrations"]) || array_key_exists("num_new_migrations", $context) ? $context["num_new_migrations"] : (function () { throw new RuntimeError('Variable "num_new_migrations" does not exist.', 125, $this->source); })()) > 0)) ? ("status-error") : (((((isset($context["num_unavailable_migrations"]) || array_key_exists("num_unavailable_migrations", $context) ? $context["num_unavailable_migrations"] : (function () { throw new RuntimeError('Variable "num_unavailable_migrations" does not exist.', 125, $this->source); })()) > 0)) ? ("status-warning") : (""))));
        echo "\">
                    ";
        // line 126
        echo twig_escape_filter($this->env, ((((isset($context["num_new_migrations"]) || array_key_exists("num_new_migrations", $context) ? $context["num_new_migrations"] : (function () { throw new RuntimeError('Variable "num_new_migrations" does not exist.', 126, $this->source); })()) > 0)) ? ((isset($context["num_new_migrations"]) || array_key_exists("num_new_migrations", $context) ? $context["num_new_migrations"] : (function () { throw new RuntimeError('Variable "num_new_migrations" does not exist.', 126, $this->source); })())) : (((((isset($context["num_unavailable_migrations"]) || array_key_exists("num_unavailable_migrations", $context) ? $context["num_unavailable_migrations"] : (function () { throw new RuntimeError('Variable "num_unavailable_migrations" does not exist.', 126, $this->source); })()) > 0)) ? ((isset($context["num_unavailable_migrations"]) || array_key_exists("num_unavailable_migrations", $context) ? $context["num_unavailable_migrations"] : (function () { throw new RuntimeError('Variable "num_unavailable_migrations" does not exist.', 126, $this->source); })())) : ((isset($context["num_executed_migrations"]) || array_key_exists("num_executed_migrations", $context) ? $context["num_executed_migrations"] : (function () { throw new RuntimeError('Variable "num_executed_migrations" does not exist.', 126, $this->source); })()))))), "html", null, true);
        echo "
                </span>
            </h3>

            <div class=\"tab-content\">
                ";
        // line 131
        echo twig_call_macro($macros["_self"], "macro_render_migration_details", [(isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 131, $this->source); })()), (isset($context["profiler_markup_version"]) || array_key_exists("profiler_markup_version", $context) ? $context["profiler_markup_version"] : (function () { throw new RuntimeError('Variable "profiler_markup_version" does not exist.', 131, $this->source); })())], 131, $context, $this->getSourceContext());
        echo "
            </div>
        </div>

        <div class=\"tab\">
            <h3 class=\"tab-title\">Configuration</h3>

            <div class=\"tab-content\">
                ";
        // line 139
        echo twig_call_macro($macros["_self"], "macro_render_configuration_details", [(isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 139, $this->source); })()), (isset($context["profiler_markup_version"]) || array_key_exists("profiler_markup_version", $context) ? $context["profiler_markup_version"] : (function () { throw new RuntimeError('Variable "profiler_markup_version" does not exist.', 139, $this->source); })())], 139, $context, $this->getSourceContext());
        echo "
            </div>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 145
    public function macro_render_migration_details($__collector__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "collector" => $__collector__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_migration_details"));

            // line 146
            echo "    <table>
        <thead>
        <tr>
            <th class=\"colored font-normal\">Version</th>
            <th class=\"colored font-normal\">Description</th>
            <th class=\"colored font-normal\">Status</th>
            <th class=\"colored font-normal\">Executed at</th>
            <th class=\"colored font-normal text-right\">Execution time</th>
        </tr>
        </thead>
        ";
            // line 156
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 156, $this->source); })()), "data", [], "any", false, false, false, 156), "new_migrations", [], "any", false, false, false, 156));
            foreach ($context['_seq'] as $context["_key"] => $context["migration"]) {
                // line 157
                echo "            ";
                echo twig_call_macro($macros["_self"], "macro_render_migration", [$context["migration"]], 157, $context, $this->getSourceContext());
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['migration'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 159
            echo "
        ";
            // line 160
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 160, $this->source); })()), "data", [], "any", false, false, false, 160), "executed_migrations", [], "any", false, false, false, 160)));
            foreach ($context['_seq'] as $context["_key"] => $context["migration"]) {
                // line 161
                echo "            ";
                echo twig_call_macro($macros["_self"], "macro_render_migration", [$context["migration"]], 161, $context, $this->getSourceContext());
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['migration'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 163
            echo "    </table>
";
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 166
    public function macro_render_configuration_details($__collector__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "collector" => $__collector__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_configuration_details"));

            // line 167
            echo "    <table>
        <thead>
        <tr>
            <th colspan=\"2\" class=\"colored font-normal\">Storage</th>
        </tr>
        </thead>
        <tr>
            <td class=\"font-normal\">Type</td>
            <td class=\"font-normal\">";
            // line 175
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 175, $this->source); })()), "data", [], "any", false, false, false, 175), "storage", [], "any", false, false, false, 175), "html", null, true);
            echo "</td>
        </tr>
        ";
            // line 177
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, true, false, 177), "table", [], "any", true, true, false, 177)) {
                // line 178
                echo "            <tr>
                <td class=\"font-normal\">Table Name</td>
                <td class=\"font-normal\">";
                // line 180
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 180, $this->source); })()), "data", [], "any", false, false, false, 180), "table", [], "any", false, false, false, 180), "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            // line 183
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "data", [], "any", false, true, false, 183), "column", [], "any", true, true, false, 183)) {
                // line 184
                echo "            <tr>
                <td class=\"font-normal\">Column Name</td>
                <td class=\"font-normal\">";
                // line 186
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 186, $this->source); })()), "data", [], "any", false, false, false, 186), "column", [], "any", false, false, false, 186), "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            // line 189
            echo "    </table>

    <table>
        <thead>
        <tr>
            <th colspan=\"2\" class=\"colored font-normal\">Database</th>
        </tr>
        </thead>
        <tr>
            <td class=\"font-normal\">Driver</td>
            <td class=\"font-normal\">";
            // line 199
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 199, $this->source); })()), "data", [], "any", false, false, false, 199), "driver", [], "any", false, false, false, 199), "html", null, true);
            echo "</td>
        </tr>
        <tr>
            <td class=\"font-normal\">Name</td>
            <td class=\"font-normal\">";
            // line 203
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 203, $this->source); })()), "data", [], "any", false, false, false, 203), "name", [], "any", false, false, false, 203), "html", null, true);
            echo "</td>
        </tr>
    </table>

    <table>
        <thead>
        <tr>
            <th colspan=\"2\" class=\"colored font-normal\">Migration Namespaces</th>
        </tr>
        </thead>
        ";
            // line 213
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 213, $this->source); })()), "data", [], "any", false, false, false, 213), "namespaces", [], "any", false, false, false, 213));
            foreach ($context['_seq'] as $context["namespace"] => $context["directory"]) {
                // line 214
                echo "            <tr>
                <td class=\"font-normal\">";
                // line 215
                echo twig_escape_filter($this->env, $context["namespace"], "html", null, true);
                echo "</td>
                <td class=\"font-normal\">";
                // line 216
                echo twig_escape_filter($this->env, $context["directory"], "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['namespace'], $context['directory'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 219
            echo "    </table>
";
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 222
    public function macro_render_migration($__migration__ = null, $__profiler_markup_version__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "migration" => $__migration__,
            "profiler_markup_version" => $__profiler_markup_version__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render_migration"));

            // line 223
            echo "    <tr>
        <td class=\"font-normal\">
            ";
            // line 225
            if (twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 225, $this->source); })()), "file", [], "any", false, false, false, 225)) {
                // line 226
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->getFileLink(twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 226, $this->source); })()), "file", [], "any", false, false, false, 226), 1), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 226, $this->source); })()), "file", [], "any", false, false, false, 226), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 226, $this->source); })()), "version", [], "any", false, false, false, 226), "html", null, true);
                echo "</a>
            ";
            } else {
                // line 228
                echo "                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 228, $this->source); })()), "version", [], "any", false, false, false, 228), "html", null, true);
                echo "
            ";
            }
            // line 230
            echo "        </td>
        <td class=\"font-normal\">";
            // line 231
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 231, $this->source); })()), "description", [], "any", false, false, false, 231), "html", null, true);
            echo "</td>
        <td class=\"font-normal align-right\">
            ";
            // line 233
            if (twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 233, $this->source); })()), "is_new", [], "any", false, false, false, 233)) {
                // line 234
                echo "                <span class=\"";
                echo ((((isset($context["profiler_markup_version"]) || array_key_exists("profiler_markup_version", $context) ? $context["profiler_markup_version"] : (function () { throw new RuntimeError('Variable "profiler_markup_version" does not exist.', 234, $this->source); })()) >= 3)) ? ("badge badge-error") : ("label status-error"));
                echo "\">NOT EXECUTED</span>
            ";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 235
(isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 235, $this->source); })()), "is_unavailable", [], "any", false, false, false, 235)) {
                // line 236
                echo "                <span class=\"";
                echo ((((isset($context["profiler_markup_version"]) || array_key_exists("profiler_markup_version", $context) ? $context["profiler_markup_version"] : (function () { throw new RuntimeError('Variable "profiler_markup_version" does not exist.', 236, $this->source); })()) >= 3)) ? ("badge badge-warning") : ("label status-warning"));
                echo "\">UNAVAILABLE</span>
            ";
            } else {
                // line 238
                echo "                <span class=\"";
                echo ((((isset($context["profiler_markup_version"]) || array_key_exists("profiler_markup_version", $context) ? $context["profiler_markup_version"] : (function () { throw new RuntimeError('Variable "profiler_markup_version" does not exist.', 238, $this->source); })()) >= 3)) ? ("badge badge-success") : ("label status-success"));
                echo "\">EXECUTED</span>
            ";
            }
            // line 240
            echo "        </td>
        <td class=\"font-normal\">";
            // line 241
            ((twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 241, $this->source); })()), "executed_at", [], "any", false, false, false, 241)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 241, $this->source); })()), "executed_at", [], "any", false, false, false, 241), "M j, Y H:i"), "html", null, true))) : (print ("n/a")));
            echo "</td>
        <td class=\"font-normal text-right\">
            ";
            // line 243
            if ((null === twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 243, $this->source); })()), "execution_time", [], "any", false, false, false, 243))) {
                // line 244
                echo "                n/a
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 245
(isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 245, $this->source); })()), "execution_time", [], "any", false, false, false, 245) < 1)) {
                // line 246
                echo "                ";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 246, $this->source); })()), "execution_time", [], "any", false, false, false, 246) * 1000), 0), "html", null, true);
                echo " ms
            ";
            } else {
                // line 248
                echo "                ";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["migration"]) || array_key_exists("migration", $context) ? $context["migration"] : (function () { throw new RuntimeError('Variable "migration" does not exist.', 248, $this->source); })()), "execution_time", [], "any", false, false, false, 248), 2), "html", null, true);
                echo " seconds
            ";
            }
            // line 250
            echo "        </td>
    </tr>
";
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@DoctrineMigrations/Collector/migrations.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  653 => 250,  647 => 248,  641 => 246,  639 => 245,  636 => 244,  634 => 243,  629 => 241,  626 => 240,  620 => 238,  614 => 236,  612 => 235,  607 => 234,  605 => 233,  600 => 231,  597 => 230,  591 => 228,  581 => 226,  579 => 225,  575 => 223,  558 => 222,  545 => 219,  536 => 216,  532 => 215,  529 => 214,  525 => 213,  512 => 203,  505 => 199,  493 => 189,  487 => 186,  483 => 184,  480 => 183,  474 => 180,  470 => 178,  468 => 177,  463 => 175,  453 => 167,  437 => 166,  424 => 163,  415 => 161,  411 => 160,  408 => 159,  399 => 157,  395 => 156,  383 => 146,  367 => 145,  355 => 139,  344 => 131,  336 => 126,  332 => 125,  324 => 119,  321 => 118,  319 => 117,  317 => 116,  310 => 112,  303 => 108,  296 => 104,  292 => 102,  288 => 100,  286 => 99,  279 => 95,  273 => 91,  270 => 90,  267 => 89,  264 => 88,  261 => 87,  254 => 86,  245 => 82,  239 => 79,  236 => 78,  234 => 77,  229 => 74,  223 => 72,  217 => 70,  215 => 69,  209 => 67,  206 => 66,  203 => 65,  200 => 64,  197 => 63,  194 => 62,  187 => 61,  179 => 58,  174 => 56,  171 => 55,  162 => 51,  155 => 47,  146 => 43,  139 => 39,  124 => 27,  119 => 24,  117 => 23,  114 => 22,  109 => 20,  106 => 19,  100 => 17,  94 => 15,  91 => 14,  89 => 13,  86 => 12,  83 => 11,  80 => 10,  77 => 9,  74 => 8,  71 => 7,  68 => 6,  65 => 5,  62 => 4,  55 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    {% if collector.data.unavailable_migrations_count is defined %}
        {% set unavailable_migrations = collector.data.unavailable_migrations_count %}
        {% set new_migrations = collector.data.new_migrations|length %}
        {% if unavailable_migrations > 0 or new_migrations > 0 %}
            {% set executed_migrations = collector.data.executed_migrations|length %}
            {% set available_migrations = collector.data.available_migrations_count %}
            {% set status_color = unavailable_migrations > 0 ? 'yellow' : '' %}
            {% set status_color = new_migrations > 0 ? 'red' : status_color %}

            {% set icon %}
                {% if profiler_markup_version < 3 %}
                    {{ include('@DoctrineMigrations/Collector/icon.svg') }}
                {% else %}
                    {{ include('@DoctrineMigrations/Collector/icon-v3.svg') }}
                {% endif %}

                <span class=\"sf-toolbar-value\">{{ new_migrations + unavailable_migrations }}</span>
            {% endset %}

            {% set text %}
                <div class=\"sf-toolbar-info-group\">
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Current Migration</b>
                        <span>{{ executed_migrations > 0 ? collector.data.executed_migrations|last.version|split('\\\\')|last : 'n/a' }}</span>
                    </div>
                </div>

                <div class=\"sf-toolbar-info-group\">
                    <div class=\"sf-toolbar-info-piece\">
                        <span class=\"sf-toolbar-header\">
                            <b>Database Migrations</b>
                        </span>
                    </div>
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Executed</b>
                        <span class=\"sf-toolbar-status\">{{ executed_migrations }}</span>
                    </div>
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Unavailable</b>
                        <span class=\"sf-toolbar-status {{ unavailable_migrations > 0 ? 'sf-toolbar-status-yellow' }}\">{{ unavailable_migrations }}</span>
                    </div>
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Available</b>
                        <span class=\"sf-toolbar-status\">{{ available_migrations }}</span>
                    </div>
                    <div class=\"sf-toolbar-info-piece\">
                        <b>New</b>
                        <span class=\"sf-toolbar-status {{ new_migrations > 0 ? 'sf-toolbar-status-red' }}\">{{ new_migrations }}</span>
                    </div>
                </div>
            {% endset %}

            {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { link: profiler_url, status: status_color }) }}
        {% endif %}
    {% endif %}
{% endblock %}

{% block menu %}
    {% if collector.data.unavailable_migrations_count is defined %}
        {% set unavailable_migrations = collector.data.unavailable_migrations_count %}
        {% set new_migrations = collector.data.new_migrations|length %}
        {% set label = unavailable_migrations > 0 ? 'label-status-warning' : '' %}
        {% set label = new_migrations > 0 ? 'label-status-error' : label %}
        <span class=\"label {{ label }}\">
            <span class=\"icon\">
                {% if profiler_markup_version < 3 %}
                    {{ include('@DoctrineMigrations/Collector/icon.svg') }}
                {% else %}
                    {{ include('@DoctrineMigrations/Collector/icon-v3.svg') }}
                {% endif %}
            </span>

            <strong>Migrations</strong>
            {% if unavailable_migrations > 0 or new_migrations > 0 %}
                <span class=\"count\">
                    <span>{{ new_migrations + unavailable_migrations }}</span>
                </span>
            {% endif %}
        </span>
    {% endif %}
{% endblock %}

{% block panel %}
    {% set num_executed_migrations = collector.data.executed_migrations|length %}
    {% set num_unavailable_migrations = collector.data.unavailable_migrations_count %}
    {% set num_available_migrations = collector.data.available_migrations_count %}
    {% set num_new_migrations = collector.data.new_migrations|length %}

    <h2>Doctrine Migrations</h2>
    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">{{ num_executed_migrations }}</span>
            <span class=\"label\">Executed</span>
        </div>

        {% if profiler_markup_version >= 3 %}
            <div class=\"metric-group\">
        {% endif %}

        <div class=\"metric\">
            <span class=\"value\">{{ num_unavailable_migrations }}</span>
            <span class=\"label\">Unavailable</span>
        </div>
        <div class=\"metric\">
            <span class=\"value\">{{ num_available_migrations }}</span>
            <span class=\"label\">Available</span>
        </div>
        <div class=\"metric\">
            <span class=\"value\">{{ num_new_migrations }}</span>
            <span class=\"label\">New</span>
        </div>

        {% if profiler_markup_version >= 3 %}
            </div> {# closes the <div class=\"metric-group\"> #}
        {% endif %}
    </div>

    <div class=\"sf-tabs\">
        <div class=\"tab\">
            <h3 class=\"tab-title\">
                Migrations
                <span class=\"badge {{ num_new_migrations > 0 ? 'status-error' : num_unavailable_migrations > 0 ? 'status-warning' }}\">
                    {{ num_new_migrations > 0 ? num_new_migrations : num_unavailable_migrations > 0 ? num_unavailable_migrations : num_executed_migrations }}
                </span>
            </h3>

            <div class=\"tab-content\">
                {{ _self.render_migration_details(collector, profiler_markup_version) }}
            </div>
        </div>

        <div class=\"tab\">
            <h3 class=\"tab-title\">Configuration</h3>

            <div class=\"tab-content\">
                {{ _self.render_configuration_details(collector, profiler_markup_version) }}
            </div>
        </div>
    </div>
{% endblock %}

{% macro render_migration_details(collector) %}
    <table>
        <thead>
        <tr>
            <th class=\"colored font-normal\">Version</th>
            <th class=\"colored font-normal\">Description</th>
            <th class=\"colored font-normal\">Status</th>
            <th class=\"colored font-normal\">Executed at</th>
            <th class=\"colored font-normal text-right\">Execution time</th>
        </tr>
        </thead>
        {% for migration in collector.data.new_migrations %}
            {{ _self.render_migration(migration) }}
        {% endfor %}

        {% for migration in collector.data.executed_migrations|reverse %}
            {{ _self.render_migration(migration) }}
        {% endfor %}
    </table>
{% endmacro %}

{% macro render_configuration_details(collector) %}
    <table>
        <thead>
        <tr>
            <th colspan=\"2\" class=\"colored font-normal\">Storage</th>
        </tr>
        </thead>
        <tr>
            <td class=\"font-normal\">Type</td>
            <td class=\"font-normal\">{{ collector.data.storage }}</td>
        </tr>
        {% if collector.data.table is defined %}
            <tr>
                <td class=\"font-normal\">Table Name</td>
                <td class=\"font-normal\">{{ collector.data.table }}</td>
            </tr>
        {% endif %}
        {% if collector.data.column is defined %}
            <tr>
                <td class=\"font-normal\">Column Name</td>
                <td class=\"font-normal\">{{ collector.data.column }}</td>
            </tr>
        {% endif %}
    </table>

    <table>
        <thead>
        <tr>
            <th colspan=\"2\" class=\"colored font-normal\">Database</th>
        </tr>
        </thead>
        <tr>
            <td class=\"font-normal\">Driver</td>
            <td class=\"font-normal\">{{ collector.data.driver }}</td>
        </tr>
        <tr>
            <td class=\"font-normal\">Name</td>
            <td class=\"font-normal\">{{ collector.data.name }}</td>
        </tr>
    </table>

    <table>
        <thead>
        <tr>
            <th colspan=\"2\" class=\"colored font-normal\">Migration Namespaces</th>
        </tr>
        </thead>
        {% for namespace, directory in collector.data.namespaces %}
            <tr>
                <td class=\"font-normal\">{{ namespace }}</td>
                <td class=\"font-normal\">{{ directory }}</td>
            </tr>
        {% endfor %}
    </table>
{% endmacro %}

{% macro render_migration(migration, profiler_markup_version) %}
    <tr>
        <td class=\"font-normal\">
            {% if migration.file %}
                <a href=\"{{ migration.file|file_link(1) }}\" title=\"{{ migration.file }}\">{{ migration.version }}</a>
            {% else %}
                {{ migration.version }}
            {% endif %}
        </td>
        <td class=\"font-normal\">{{ migration.description }}</td>
        <td class=\"font-normal align-right\">
            {% if migration.is_new %}
                <span class=\"{{ profiler_markup_version >= 3 ? 'badge badge-error' : 'label status-error' }}\">NOT EXECUTED</span>
            {% elseif migration.is_unavailable %}
                <span class=\"{{ profiler_markup_version >= 3 ? 'badge badge-warning' : 'label status-warning' }}\">UNAVAILABLE</span>
            {% else %}
                <span class=\"{{ profiler_markup_version >= 3 ? 'badge badge-success' : 'label status-success' }}\">EXECUTED</span>
            {% endif %}
        </td>
        <td class=\"font-normal\">{{ migration.executed_at ? migration.executed_at|date('M j, Y H:i') : 'n/a' }}</td>
        <td class=\"font-normal text-right\">
            {% if migration.execution_time is null %}
                n/a
            {% elseif migration.execution_time < 1 %}
                {{ (migration.execution_time * 1000)|number_format(0) }} ms
            {% else %}
                {{ migration.execution_time|number_format(2) }} seconds
            {% endif %}
        </td>
    </tr>
{% endmacro %}
", "@DoctrineMigrations/Collector/migrations.html.twig", "/Users/rolanzakirov/Desktop/work/study-on.billing/vendor/doctrine/doctrine-migrations-bundle/Resources/views/Collector/migrations.html.twig");
    }
}
