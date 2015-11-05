<div class ="profile_view">
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
         <table id="menu">
            <tr>
            <td><?php echo anchor('profile/board', 'Board'); ?></td>
            <td><?php echo anchor('profile/pins', 'Pins'); ?></td>
            </tr>
        </table>
    </div>
</div>


