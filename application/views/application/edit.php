<?php $this->loadViews($this->baseTemplates['header']); ?>
<header>
    <h2>Welcome To booking!</h2>
    <nav>
        <?php $this->setNav(); ?>
    </nav>
</header>
<section id="sendApplication">
    <h2>Send Us Your Application</h2>
    <?php $this->getNotifications();  ?>
    <form action="/application/edit" method="POST" enctype="multipart/form-data">
        <div>
            <span>(This webpage only receives  image or text, not both. To add an image you need to remove text.)</span>
            <textarea rows="10" cols="50" name="text"><?php echo $this->model->application['text']; ?></textarea>
        </div>
        <span> OR </span>
        <div>
            <?php
                if ($this->model->application['image']) {
                    ?>
                        <a href="/application/deleteImage&id=<?php echo $this->model->application['id']; ?>">remove Image</a>
                        <img src="<?php echo PUBLIC_PATH . 'uploads' . DS . $this->model->application['image']; ?>" alt="">
                    <?php
                }
             ?>
            <input type="hidden" name="applicationID" value="<?php echo $this->model->application['id']; ?>">
            <input type="file" name="image" accept=".jpg, .png, .jpeg">
        </div>
        <button type="submit">Save</button>
    </form>
</section>
<?php $this->loadViews($this->baseTemplates['footer']); ?>
