<div id="post_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Post</h3>
  </div>
<style> .errors {color: red;} </style>

<div class="modal-body">
  <div class="errors"> <?php echo validation_errors(); ?> </div>
    <?php echo form_open_multipart("post/save"); ?>
    <table class="table">
      <tr>
        <td>Title</td>
        <td>
          <?php echo form_input('title'); ?>
        </td>
      </tr>

      <tr>
        <td>Picture <i class="icon-upload"></i></td>
        <td>
          <?php echo form_upload('pic_dir'); ?>
          <?php echo $this->input->post('pic_dir'); ?>
        </td>
      </tr>

      <tr>
        <td>Content</td>
        <td>
          <?php
            $data = array(
                  'name'          => 'content',
                  'id'            => 'content',
                  'class'     => 'text ui-widget-content ui-corner-all',
                  'rows'        => '7',
                  'cols'          => '50',
                  'placeholder' => 'Content'
                );
            echo form_textarea($data);
          ?>
        </td>
      </tr>
    </table>
</div>
<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <?php echo form_submit('submit', 'Post', 'class="btn btn-primary" id="post_submit"'); ?>
  <?php echo form_close(); ?>
</div>
</div>