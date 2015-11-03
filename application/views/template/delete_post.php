<div id="delete_post" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Post</h3>
  </div>
<style> 
    .errors 
    {
        color: red;
        visibility: hidden;
    } 
</style>
<div class="delete-body">
  <div class="errors"> <?php echo validation_errors(); ?> </div>
<!--    <div id="log"></div>-->
    <?php echo form_open("post/delete", 'id=delete_form'); ?>
    <table class="table">
      <tr>
        <td>Post</td>
        <td>
          <?php echo form_input('title','', 'id=title'); ?>
        </td>
      </tr>
    </table>
</div>
<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <?php echo form_submit('submit', 'Delete', 'class="btn btn-primary" id="delete_submit"    '); ?>
  <?php echo form_close(); ?>
</div>
</div>