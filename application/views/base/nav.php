<ul>
    <?php foreach ($this->navLinks as $name => $link) { ?>
        <li><a href="<?php echo DOMEIN . $link; ?>"><?php echo $name ?></a></li>
    <?php } ?>
</ul>
