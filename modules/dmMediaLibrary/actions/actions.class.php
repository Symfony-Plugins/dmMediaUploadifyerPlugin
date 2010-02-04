<?php

require_once(dmOs::join(sfConfig::get('dm_admin_dir').'/modules/dmMediaLibrary/lib/BasedmMediaLibraryActions.class.php'));

class dmMediaLibraryActions extends BasedmMediaLibraryActions
{
  
  /**
  * Allows the upload of multiple files 
  * 
  * @param sfWebRequest $request
  */
  public function executeNewMultipleFile(dmWebRequest $request)
  {
    // create new media

    $media = null;

    $this->forward404Unless($folder = dmDb::table('DmMediaFolder')->find($request->getParameter('folder_id')));

    if (!$folder->isWritable())
    {
      $this->getUser()->logAlert($this->getI18n()->__('Folder %1% is not writable', array('%1%' => $folder->fullPath)));
    }
    
    $form = new dmMediaUploadifyForm();
    $form->setDefault('dm_media_folder_id', $folder->id);
    
    if ($request->isMethod('post') && $form->bindAndValid($request))
    {
      $media = $form->save();                                        
      
      return $this->renderAsync('success');
    }

    $action = 'dmMediaLibrary/newMultipleFile?folder_id='.$folder->id;
    
    $uploadify_widget = new sfWidgetFormDmUploadify();
    
    return $this->renderText(
      $form->render('.dm_form.list.little action="'.$action.'"') .
      $this->getHelper()->tag('div.dm_encoded_assets.none', json_encode(array(
        'css' => $uploadify_widget->getStylesheets(),
        'js'  => $uploadify_widget->getJavascripts(),
      ))) . '<script type="text/javascript">__uploadify_widget_init()</script>'
      
    );
  }
  
  
  public function executeUploadifyTest(dmWebRequest $request)
  {
    $out = 'test';
    
    $out = print_r($request->getPostParameters(), true);
    return $this->renderText($out);
  }
  
}