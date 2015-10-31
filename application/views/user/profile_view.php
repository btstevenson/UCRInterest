
    <style>
    #name {
    	background-color: blue;
    	color: white;
    	text-align: center;
    	padding: 50px;
    }

    #tabs{
    	background-color: grey;
    	text-align: center;
    }

</style>

    <div id="name">
	<?php if(isset($user_record)) : foreach($user_record as $row) : ?>
		<?php echo $row['first_name']; ?>
		<?php echo $row['last_name']; ?>
	<?php endforeach; ?>
	<?php else : ?>
		Not found
	<?php endif; ?>

	</div>

	<div id = "tabs">
        place holder for likes and such menu
	</div>

    

   <div class="row-fluid">
        <div class="span4 element"><h2>Board 1</h2><p>A board of a board of a board</p></div>
        <!--/span-->
        <div class="span4 element"><h2>Board 2</h2><p>A board that move before</p></div>
        <!--/span-->
        <div class="span4 element"><h2>Board 3</h2><p>A board that moves</p></div>
        <!--/span-->
    </div>

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


