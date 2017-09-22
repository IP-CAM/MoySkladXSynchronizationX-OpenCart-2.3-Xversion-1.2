<?php echo $header; ?><?php echo $column_left;
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

?>
 
<div id="content" style="margin-left:50px;">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-category" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
      </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo "Настройка модуля"; ?></h3>
        </div>
        <div class="panel-body">
            <div id="tabs" class="htabs">
              <a href="#tab-setting"><?php echo $text_tab_setting; ?></a>  
              <a href="#tab-import"><?php echo $text_tab_import; ?></a>
              <a href="#tab-lot"><?php echo $text_tab_lot; ?></a>
              <a href="#tab-author"><?php echo $text_tab_author; ?></a>
            </div>
        </div>
        <div id="tab-setting">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
               <table class="form">
                    <tr>
                      <td><?php echo $entry_username; ?></td>
                      <td><input name="moyskladOC23Synch12_username" type="text" value="<?php echo $moyskladOC23Synch12_username; ?>" /></td>
                    </tr>
                    <tr>
                      <td><?php echo $entry_password; ?></td>
                      <td><input name="moyskladOC23Synch12_password" type="password" value="<?php echo $moyskladOC23Synch12_password; ?>" /></td>
                    </tr>
               </table>   
            </form>
            
        </div>
        <div id="tab-import">
            <table>
                 <tr>
                   <td><span style="margin-left:20px; color: black;"><?php echo $import_text; ?></span></td>
                   <td><a class="button importProduct" style="margin-left: 30px;"><?php echo $import_button; ?></a></td>
                 </tr>
            </table> 
            
            
        </div>
        <div id="tab-lot">
            
            
        </div>
        <div id="tab-author">
            <table>
                 <tr>
                   <td><span style="color: black;margin-left: 30px;font-size: 25px;">
                           <a href="http://isyms.ru/">created by Artur Legusha</a>
                       </span></td>
                  </tr>
            </table>    
        </div>
    </div>
  </div>
</div>

<script type="text/javascript"><!--
    $('#tabs a').tabs();
 //--></script>

 <script>
     $('a.importProduct').click(function(e){
     e.preventDefault();
      $.ajax({
               url : "index.php?route=extension/module/moyskladOC23Synch12/getAllProduct&token=<?=$_GET['token']?>",
               type : 'POST',
               dataType:'text',
               data :{
                start: 'start'
            },
             success:function(data){
                 alert(data);
                 
             },
             error:function (xhr, ajaxOptions, thrownError){
                console.log(thrownError); //выводим ошибку
            }
              
           });
     
    });
 </script>


<?php echo $footer; ?>