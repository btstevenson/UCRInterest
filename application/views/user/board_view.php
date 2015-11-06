<div id = "board_button">
    <a href="#board_modal" role="button" class="btn btn-danger" data-toggle="modal" id="post_btn">Create Board</a>
    <?php $this->load->view('template/board_modal'); ?>    
</div>
<div id = "edit_board_button">
    <a href="#edit_board_modal" role="button" class="btn btn-danger" data-toggle="modal" id="post_btn" data-id="$board_record">Edit Board</a>
    <?php $this->load->view('template/edit_board_modal'); ?>
</div>

<div id = "delete_board_button">
    <a href="#delete_board_modal" role="button" class="btn btn-danger" data-toggle="modal" id="post_btn" data-id="$board_record">Delete Board</a>
    <?php $this->load->view('template/delete_board_modal'); ?>
</div>

<div class = "vPad">
    <div class ="row-fluid">
        <div class = "hPad">
        </div>

        <?php if(isset($board_record)) : foreach($board_record as $row) : ?>
            <a href = "pins" role = "button"</a>
            <div class="span3 element">
                <h2 id= "name <?php echo $row['name']?>">
                    <?php echo $row['name']; ?>
                </h2>
                <p>
                    <?php echo $row['description']; ?>
                </p>
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
    placeholder: 'span3 placeholder',
    helper: 'clone',
    appendTo: 'body',
    forcePlaceholderSize: true,
    start: function(event, ui) {
        $('.row-fluid > div.span3:visible:first').addClass('real-first-child');
    }, 
    stop: function(event, ui) {
        $('.row-fluid > div.real-first-child').removeClass('real-first-child');
    },
    change: function(event, ui) {
        $('.row-fluid > div.real-first-child').removeClass('real-first-child');
        $('.row-fluid > div.span3:visible:first').addClass('real-first-child');
    },
});
</script>
