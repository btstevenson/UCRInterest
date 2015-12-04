<div id="pin_board_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Pin to Board</h3>
  </div>

<div class="modal-body">
  <div class="errors_boards"> <?php echo validation_errors(); ?> </div>
    <?php echo form_open_multipart("feed/pin_to_board", 'id=board_form'); ?>
    <table class="table">
      <tr>
        <td>Select Board</td>
        <td>
          <?php
            $array = array(); 
            foreach($boards as $row)
            {
                $array[$row['name']] = $row['name'];
            }
            echo form_dropdown('board_record',  $array) 
          ?>
        </td>
      </tr>
      <tr>
        <input type="hidden" id="pid" name="pid" value="<?php $pid ?>;" />
      </tr>
    </table>
</div>

<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <a href="<?php echo base_url('index.php/profile/board'); ?>" role="button" class="btn btn-danger">Create Board</a>
  <?php echo form_submit('submit', 'Pin to Board', 'class="btn btn-primary"'); ?>
  <?php echo form_close(); ?>
</div>
</div>