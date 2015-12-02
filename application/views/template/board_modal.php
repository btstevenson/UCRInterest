<div id="board_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Create Board</h3>
  </div>

<div class="modal-body">
  <div class="errors_boards"> <?php echo validation_errors(); ?> </div>
    <?php echo form_open_multipart("profile/create_board", 'id=board_form'); ?>
    <table class="table">
      <tr>
        <td>Name</td>
        <td>
          <?php echo form_input('name', set_value('name'), 'id=name'); ?>
        </td>
      </tr>

      <tr>
        <td>Description</td>
        <td>
          <?php
            $data = array(
                  'name'          => 'description',
                  'id'            => 'description',
                  'class'     => 'text ui-widget-content ui-corner-all',
                  'rows'        => '7',
                  'cols'          => '50',
                  'placeholder' => 'Description'
                );
            
            echo form_textarea($data);
          ?>
        </td>
      </tr>
        <td>Privacy</td>
        <td> <input type="checkbox", id="privacy", name="privacy" value="1"/>
        </td>
      <tr>
    </table>
</div>

<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <?php echo form_submit('submit', 'Create Board', 'class="btn btn-primary"'); ?>
  <?php echo form_close(); ?>
</div>
</div>