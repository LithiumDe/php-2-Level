<?php

/* main.html */
class __TwigTemplate_c8935f416a66e3b982a42dccd8206926 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<html>
    <head>
        <title> </title>
        
    </head>
    <body>
        <div id=\"content\">
               <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "smallPath"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "Name"), "html", null, true);
        echo "\" >  
            
        </div>
         <form action=\"index.php\" method = \"post\" enctype = \"multipart/form-data\">
            <p> Select a file </p>
            <input type = \"file\" name = \"photo\"><br>
            <br>
            <input type=\"submit\" >
        </form>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 9,  19 => 1,);
    }
}
