<?php $this->loadViews($this->baseTemplates['header']); ?>
<header>
    <h2>Welcome To booking!</h2>
    <nav>
        <?php $this->setNav(); ?>
    </nav>
</header>
<?php $applications= $this->model->getAllApplications(); ?>
<section>
    <div class="approved-list">
        <h2>Application List</h2>
        <?php foreach ($applications as $application) { ?>
            <div class="approved-list-item">
                <ul>
                   <li><a href="edit&id=<?php echo $application['id']; ?>">edit</a></li>
                    <?php if ($application['status'] != 1) { ?>
                        <li><a href="approve&id=<?php echo $application['id']; ?>">approve</a></li>
                    <?php } ?>
                    <li><a href="delete&id=<?php echo $application['id']; ?>">delete</a></li>
                </ul>
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
<?php $this->loadViews($this->baseTemplates['footer']); ?>
