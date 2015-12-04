
    <ui class = "thumbnails">
        <div class = "container-fluid">
           <?php if(isset($pin_record)) : foreach($pin_record as $row) : ?>
                <div class = "row-fluid">
                    <li class = "span4" display:block>
                        <div class = "thumbnail">
                            <div class = "caption">
                                <a href="#" class="thumbnail"> <img src= "<?php echo base_url($row[0]['pic_dir']); ?>"  alt="" > </a>
                                <h3><?php echo $row[0]['title'] ?></h3>
                                <p><?php echo substr($row[0]['content'], 0, 100)."..."; ?></p>
                            </div>
                        </div>
                    </li>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </ui>
