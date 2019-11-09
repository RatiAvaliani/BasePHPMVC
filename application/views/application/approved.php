<?php $applications= $this->model->getActiveApplications(); ?>
<section>
    <div class="approved-list">
        <h2>Approved List</h2>
        <?php foreach ($applications as $application) { ?>
            <div class="approved-list-item">
             <?php if ($application['image']) { ?>
                    <div>
                        <img src="<?php echo PUBLIC_PATH . 'uploads' . DS . $application['image']; ?>" alt="">
                    </div>
                <?php } else { ?>
                    <div>
                        <p><?php echo $application['text']; ?></p>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>