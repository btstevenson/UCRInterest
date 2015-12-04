<div class = "vPad">
    <div class ="row-fluid"><div class = "vPad">
    <div class ="row-fluid">
        <div class = "hPad">
        </div>

        <?php if(isset($board_record)) : foreach($board_record as $row) : ?>
            <div class="span3 element">
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
</div></div>

