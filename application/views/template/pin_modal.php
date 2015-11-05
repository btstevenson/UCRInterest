<script >
function Big(i) {
    var count = i-2;
//    alert(i);
    //====SETTING UP THE PICTURE===
    var imag = document.getElementById("preview");
    var new_src = 'imgsource';
    new_src = new_src.concat(i);
    var new_img = document.getElementById(new_src).src;
    imag.setAttribute("src", new_img);
    
//    alert(new_img);
    
    //====SETTING UP THE TITLE =====
    var title = document.getElementById("myPinLabel");
    var new_title = 'imgtitle';
    new_title = new_title.concat(i);
    var img_t = document.getElementById(new_title).innerHTML;
//    alert(title.innerHTML);
    title.innerHTML = img_t;
//    alert(img_t);
    
    //====SETTING UP THE CONTENT =====
    var cont = document.getElementById("img_contents");
    var new_cont = 'imgcont';
    new_cont = new_cont.concat(i);
    var img_c = document.getElementById(new_cont).innerHTML;
//    alert(title.innerHTML);
    cont.innerHTML = img_c;
//    alert(img_t);

   $('#pin_modal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
}
</script>

<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="pin_modal" tabindex="-1" role="dialog" aria-labelledby="myPinLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
<!--        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
        <h4 class="modal-title" id="myPinLabel"></h4>
      </div>
      <div class="modal-body">
<!--        <img src="" id="preview" style="width: 400px; height: 264px;" >-->
        <img src="" id="preview" >
      </div>
        <div>
            <p id="img_contents">
                
            </p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>