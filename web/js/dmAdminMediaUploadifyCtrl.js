(function($) {  

var $library = $("div.dm_media_library");   

$library.find("div.control a.uploadify_dialog_me").bind('click', function()
{
  var $dialog = $.dm.ctrl.ajaxDialog({
    modal:  true,
    title:  $(this).html(),
    url:    $(this).attr("href"),
    width:  380
  }).bind('dmAjaxResponse', function()
  {
    $dialog.prepare();
    __uploadify_widget_init();
    /*
    $("form", $dialog).dmAjaxForm({
      beforeSubmit: function()
      {
        $dialog.block();
      },
      success:  function(data)
      {
        if (!data.match(/</))
        {
          $library.block();
          location.href = data;
        }
        else
        {
          $dialog.unblock().html(data).trigger('dmAjaxResponse');
        }
      }
    });
    */
  });

  return false;
});

  
})(jQuery);