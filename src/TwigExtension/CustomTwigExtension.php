<?php

namespace Drupal\twig_extensions\TwigExtension;


/**
 * Custom Twig extension that adds a custom function and a custom filter.
 */
class CustomTwigExtension extends \Twig_Extension
{

    /**
     * Gets a unique identifier for this Twig extension.
     * Used in services file for module.
     */
    public function getName()
    {
        return 'custom_twig_extension.test_extension';
    }

    /**
     * Generates a list of all Twig filters that this extension defines.
     *
     * @example usage [use filter like any other twig filter]:
     *   {{ node.body.value|customtwigfilter }}
     *
     */
    public function getFilters()
    {
        return array(
            'customtwigfilter' => new \Twig_Filter_Function(array($this, 'customTwigFilter')),
        );
    }

    /**
     * Test filter example function. Replaces original text w/ return value.
     *
     * This is our function that processes the string.
     *
     */
    public static function customTwigFilter($string)
    {
        return 'Im a filter!';
    }

}
