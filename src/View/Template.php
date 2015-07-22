<?php
namespace Strata\View;

use Strata\Strata;

class Template {

    /**
     * Parses a template file and declares view variables in this scope for the
     * template to have access to them.
     * @param string The name of the template to load
     * @param array an associative array of values to assign in the template
     * @param string The file extension of the template to be loaded
     * @return  string The parsed html.
     */
    public static function parse($name, $variables = array(), $extension = '.php')
    {
        $templateFilePath = implode(DIRECTORY_SEPARATOR, array(get_template_directory(), 'templates', $name . $extension));
        return Template::parseFile($templateFilePath, $variables);
    }

    public static function parseFile($templateFilePath, $variables = array())
    {
        $app = Strata::app();
        $vars = array_keys($variables);
        $app->log(sprintf("Parsing template file '%s' with variables: %s", $templateFilePath, implode(", ", $vars)), "[Strata::Template]");

        ob_start();
        extract($variables);
        include($templateFilePath);
        return ob_get_clean();
    }

}
