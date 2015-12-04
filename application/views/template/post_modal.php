<div id="post_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myPostLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myPostLabel">Post</h3>
  </div>
<style> 
    .errors 
    {
        color: red;
        visibility: hidden;
    } 
</style>

<script type="text/javascript">
function Validate()
{
    var errtitle = document.getElementById("errtitle");
    var title = document.getElementById("p_title");
    var errpic = document.getElementById("errpic");
    var pic = document.getElementById("pic");
    errtitle.setAttribute("style", "visibility:hidden");
    errpic.setAttribute("style", "visibility:hidden");

    //============ IF TITLE IS EMPTY ERROR
    var is_error = false;
    if(title.value === "")
    {
        errtitle.setAttribute("style", "visibility:visible");
        is_error = true;
    }
    //========= FINDING IF FILE UPLOADED IS AN ACCEPTABLE FORMAT
    var regex =/\.(jpe?g|png|gif|bmp)$/i;
    //alert(pic.value);
    if (!(pic.value.match(regex)))
    {
        errpic.setAttribute("style", "visibility:visible");
        is_error = true;
    }
    //============ IF THERE IS AN ERROR DONT SUBMIT FILE
    if (is_error)
    {
        if(event.preventDefault)
        {
            event.preventDefault();
//================ DEBUGGING PURPOSES ===================================
//             $( "<div>" )
//                .append( "default " + event.type + " prevented" )
//                .appendTo( "#log" );
//====================================================================
        }
        else
        {
            event.returnValue = false; // for IE as dont support preventDefault;
        }   
        is_error = false;
    }
}
</script>

<div class="modal-body">
  <div class="errors"> <?php echo validation_errors(); ?> </div>
<!--    <div id="log"></div>-->
    <?php echo form_open_multipart("post/save", 'id=post_form'); ?>
    <table class="table">
      <tr>
        <td>Title</td>
        <td>
          <?php echo form_input('title','', 'id=p_title'); ?>
        </td>
        <td id="errtitle" class="errors">
            Please enter title
        </td>
      </tr>

      <tr>
        <td>Picture <i class="icon-upload"></i></td>
        <td>
          <?php echo form_upload('pic_dir', '', 'id=pic'); ?>
          <?php echo $this->input->post('pic_dir'); ?>
        </td>
        <td id="errpic" class="errors">
            Enter picture
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
      
      <tr>
      	<td>Label</td>
        <td>
        <?php
			$interestLabels = array("Popular" => "Popular","Everything" => "Everything","Gifts" => "Gifts","Videos" => "Videos","Animals and pets" => "Animals and pets","Architecture" => "Architecture","Art" => "Art","Cars and motorcycles" => "Cars and motorcycles","Celebrities" => "Celebrities","Design" => "Design","DIY and crafts" => "DIY and crafts","Education" => "Education","Film, music and books" => "Film, music and books","Food and drink" => "Food and drink","Gardening" => "Gardening","Geek" => "Geek","Hair and beauty" => "Hair and beauty","Health and fitness" => "Health and fitness","History" => "History","Holidays and events" => "Holidays and events","Home decor" => "Home decor","Humor" => "Humor","Illustrations and posters" => "Illustrations and posters","Kids and parenting" => "Kids and parenting", "Outdoors" => "Outdoors","Photography" => "Photography","Products" => "Products","Quotes" => "Quotes","Science and nature" => "Science and nature","Sports" => "Sports","Tattoos" => "Tattoos","Technology" => "Technology","Travel" => "Travel","Weddings" => "Weddings");
		
			$data = array(
                  'id'            => 'label'
                );
            
            //echo form_textarea($data);
			echo form_dropdown("label", $interestLabels);//, $data);
		?>
        </td>
    </table>
</div>
<div class="modal-footer">
  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  <?php echo form_submit('submit', 'Post', 'class="btn btn-primary" id="post_submit"  onclick="Validate();"'); ?>
  <?php echo form_close(); ?>
</div>
</div>