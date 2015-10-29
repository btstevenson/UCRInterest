$(function()
{
	$(#post_form).submit(function(e)
		{
			$form = $(this);

			$.post('post/upload_file', $(this).serialize(), function(data)
				{
					$feedback = $("<dev>").html(data).find(".form-feedback");

					if($feedback)
					{
						$form.prepend($feedback);
					}
					else
					{
						$('#post_submit').on('click', function(){
					      return true;
					    });
					}
				});
		});
})