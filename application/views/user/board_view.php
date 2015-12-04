<div id = "delete_board_button">
    <a href="#delete_board_modal" role="button" class="btn btn-danger" data-toggle="modal" id="post_btn" data-id="$board_record">Delete Board</a>
    <?php $this->load->view('template/delete_board_modal'); ?>
</div>
<div id = "edit_board_button">
    <a href="#edit_board_modal" role="button" class="btn btn-danger" data-toggle="modal" id="post_btn" data-id="$board_record">Edit Board</a>
    <?php $this->load->view('template/edit_board_modal'); ?>
</div>
<div id = "board_button">
    <a href="#board_modal" role="button" class="btn btn-danger" data-toggle="modal" id="post_btn">Create Board</a>
    <?php $this->load->view('template/board_modal'); ?>    
</div>

<div class = "vPad">
    <div class ="row-fluid">
        <div class = "hPad">
        </div>

        <?php if(isset($board_record)) : foreach($board_record as $row) : ?>
            <div class="span3 element" id= "<?php echo $row['name'] ?>">
                <a href = "pins/<?php echo $row['name'] ?>" role = "button"<>
                <h2 id= "name <?php echo $row['name']?>">
                    <?php echo $row['name']; ?>
                </h2>
                <p>
                    <?php echo $row['description']; ?>
                </p>
                </a>
            </div>
        <?php endforeach; ?>
        <?php else: ?>
            Please create a board
        <?php endif; ?>
    </div>
</div>

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script>
<script type = "text/javascript">
$(".row-fluid").sortable({
    stop: function(e, ui) {
                var stuff = $.map($(this).find("div"), function(el) {
                    return $(el).attr('id') + ' = ' + $(el).index();
                });
                $.post('/index.php/profile',{name: stuff}, function(response){
                });
            }
            
});
</script>
