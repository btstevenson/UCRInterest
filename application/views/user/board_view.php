        <div id = "board_button">
            <a href="#board_modal" role="button" class="btn btn-danger" data-toggle="modal" id="post_btn">Create Board</a>
            <?php $this->load->view('template/board_modal'); ?>    
        </div>
    <div class = "vPad">
        <div class ="row-fluid">
            <?php if(isset($board_record)) : foreach($board_record as $row) : ?>
                <div class="span4 element"><h2><?php echo $row['name']; ?></h2><p><?php echo $row['description']; ?></p></div>
            <?php endforeach; ?>
            <?php else: ?>
                Please create a board
            <?php endif; ?>
        </div>
    </div>
<!--
   <div class="row-fluid">
        <div class="span4 element"><h2>Board 1</h2><p>A board of a board of a board</p></div>
        <div class="span4 element"><h2>Board 2</h2><p>A board that move before</p></div>
        <div class="span4 element"><h2>Board 3</h2><p>A board that moves</p></div>
    </div>
-->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script>
    <script type = "text/javascript">
        $(".row-fluid").sortable({
    placeholder: 'span4 placeholder',
    helper: 'clone',
    appendTo: 'body',
    forcePlaceholderSize: true,
    start: function(event, ui) {
        $('.row-fluid > div.span4:visible:first').addClass('real-first-child');
    }, 
    stop: function(event, ui) {
        $('.row-fluid > div.real-first-child').removeClass('real-first-child');
    },
    change: function(event, ui) {
        $('.row-fluid > div.real-first-child').removeClass('real-first-child');
        $('.row-fluid > div.span4:visible:first').addClass('real-first-child');
    },
});
        </script>



