<div class = "vPad">
    <div class ="row-fluid">
        <div class = "hPad">
        </div>

        <?php if(isset($board_record)) : foreach($board_record as $row) : ?>
            <a href = "pins" role = "button"<></a>
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

