<?php

/**
 * PluginDmMedia form.
 *
 * @package    form
 * @subpackage DmMedia
 * @version    SVN: $Id$
 */
class dmMediaUploadifyForm extends PluginDmMediaForm
{
  public function configure()
  {
    $this->widgetSchema['file'] = new sfWidgetFormDmUploadify(array('add_sessionid' => true));
  }
}