<?php

namespace Strata\Emails;

use Strata;
use Strata\View\Template;

class EmailLoader {

    /**
     * @param string The name of the template to load (.php will be added to it)
     * @param array an associative array of values to assign in the template
     */
    public static function loadTemplate($name, $values = array())
    {
        return Template::parse($name, $values);
    }

    /**
     * Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
     * @return bool
     */
    public static function enableHTML()
    {
        return add_filter( 'wp_mail_content_type', 'Strata\Emails\EmailLoader::setContentType' );
    }

    /**
     * Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
     * @return bool
     */
    public static function disableHTML()
    {
        return remove_filter( 'wp_mail_content_type', 'Strata\Emails\EmailLoader::setContentType' );
    }

    /**
     * Set the content type on the email
     * @param string $contentType
     */
    public static function setContentType($contentType = 'text/html')
    {
        return $contentType;
    }
}
