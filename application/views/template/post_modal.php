<div id="post_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Post</h3>
  </div>
  <div class="modal-body">
  <style> .errors {color: red;} </style>

<div class="modal-body">
    <form action="<?php echo site_url('Post/upload_file'); ?>" method="post" enctype="multipart/form-data" id="postform">
      <table class="table">
        <tr>
          <td>Title</td>
          <td>:</td>
          <td> <input type="text" name="title"> </td>
        </tr>

        <tr>
          <td>Picture <i class="icon-upload"></i></td>
          <td>:</td>
          <td> <input type="file" name="pic_dir"> </td>
        </tr>
        <tr>
          <td>Content</td>
          <td>:</td>
          <td> <textarea name="content" form="postform"> </textarea> </td>
        </tr>
      </table>
</div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
     <input type="submit"  class= "btn btn-primary" value="Upload Image...">
  </div>
</div> 