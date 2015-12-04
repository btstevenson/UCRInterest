<script >
function Big(i, u) {
	
	$.post( 
		'record_history/run',
		 { pid: i,
		   uid: u},
		 function(response) {  
			//alert(response);
			//no response needed. the function called just adds rows to the browse_history table.
		 }  
	);
	
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
//    alert(img_t)
    
	    //====SETTING UP THE LABEL =====
    var label = document.getElementById("img_label");
    var new_label = 'imglabel';
    new_label = new_label.concat(i);
    var img_l = document.getElementById(new_label).innerHTML;
//    alert(title.innerHTML);
    label.innerHTML = img_l;
//    alert(img_t)
    
        //====SETTING UP THE COMMENTS =====
    var comm = document.getElementById("img_comments");
    var new_comm = 'imgcomm';
    new_comm = new_comm.concat(i);
    var img_com = document.getElementById(new_comm).innerHTML;
//    alert(title.innerHTML);
    comm.innerHTML = img_com;
//    alert(img_t)
    
	
    var pin_b = document.getElementById("insideB");
    var text = "feed/makepin/";
    text = text.concat(i);
//    alert(text);
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
      <div>
      	<p id="img_comments">
                
      	</p>
      </div>
      <div class="modal-footer">
      	<div>
	      	<p id="img_label">
        
	        </p>
	    </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--        <a href="" class="btn btn-danger btn-default" role="button" id="insideB">Pin!</a>-->

      </div>
    </div>
  </div>
</div>
