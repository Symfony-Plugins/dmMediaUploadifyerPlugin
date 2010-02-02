<?php

/**
 * sfWidgetFormDmUploadify
 *
 * @package    widget
 * @subpackage DmMedia
 * @version    SVN: $Id$
 * 
 * @see        sfWidgetFormInputFile
 */
class sfWidgetFormDmUploadify extends sfWidgetFormDmInputFile
{
  
  /**
   * Constructor.
   * 
   * Available options:
   * 
   *  ** Options **
   * 
   *  ** Attributes **
   * 
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
                     
  }
  
  
  /**
   * We want this to gracefully degrade to a normal file field if JS is not available 
   * 
   * @param  string $name        The element name
   * @param  string $value       The value selected in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    
  }
}