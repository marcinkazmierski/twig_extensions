<?php

namespace Drupal\twig_extensions\TwigExtension;

use Drupal\image\Entity\ImageStyle;

/**
 * Class DefaultService.
 *
 * @package Drupal\RenderImage
 */
class RenderImage extends \Twig_Extension
{

    /**
     * {@inheritdoc}
     * This function must return the name of the extension. It must be unique.
     */
    public function getName()
    {
        return 'render_image';
    }

    /**
     * In this function we can declare the extension function
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('render_image',
                array($this, 'render_image'),
                array('is_safe' => array('html')
                )));
    }

    /**
     * The php function to load a given block
     */
    public function render_image($node, $field_name, $image_style = 'thumbnail')
    {
        $image_uri = $node->{$field_name}->entity->getFileUri();
        $url = ImageStyle::load($image_style)->buildUrl($image_uri);
        return $url;
    }

}