<?php

namespace Drupal\twig_extensions\TwigExtension;


class RemoveHtmlComments extends \Twig_Extension
{

    /**
     * Gets a unique identifier for this Twig extension.
     * Used in services file for module.
     */
    public function getName()
    {
        return 'remove_html_comments';
    }

    /**
     * Generates a list of all Twig filters that this extension defines.
     *
     * @example usage [use filter like any other twig filter]:
     *   {{ node.body.value|remove_html_comments }}
     *
     */
    public function getFilters()
    {
        return array(
            'remove_html_comments' => new \Twig_Filter_Function(array($this, 'removeHtmlComments')),
        );
    }

    /**
     *  Removes html comments from string.
     */
    public function removeHtmlComments($string)
    {
        $output = preg_replace('/<!--(.|\s)*?-->/', '', $string);
        return $output;
    }
}