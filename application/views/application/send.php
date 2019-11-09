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
    <form action="/application/send" method="POST" enctype="multipart/form-data">
        <div>
            <textarea rows="10" cols="50" name="text"></textarea>
        </div>
        <span> OR </span>
        <div>
            <input type="file" name="image" accept=".jpg, .png, .jpeg">
        </div>
        <button type="submit">Send</button>
    </form>
</section>
<?php $this->loadViews($this->baseTemplates['footer']); ?>
