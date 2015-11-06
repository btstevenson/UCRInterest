<div id="delete_board_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Board</h3>
  </div>

<div class="modal-body">
  <div class="errors_boards"> <?php echo validation_errors(); ?> </div>
    <?php echo form_open_multipart("profile/delete_board", 'id=board_form'); ?>
    <table class="table">
      <tr>
        <td>Select Board</td>
        <td>
          <?php
            $array = array(); 
            foreach($board_record as $row)
            {
                $array[$row['name']] = $row['name'];
            }
            echo form_dropdown('boards',  $array) 
          ?>
        </td>
      </tr>
    </table>
</div>

<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <?php echo form_submit('submit', 'Delete Board', 'class="btn btn-primary"'); ?>
  <?php echo form_close(); ?>
</div>
</div>