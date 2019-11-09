<?php $this->loadViews($this->baseTemplates['header']); ?>
<header>
    <h2>Welcome To booking!</h2>
    <nav>
        <?php $this->setNav(); ?>
    </nav>
</header>
<?php $this->loadViews($this->templates['approved']); ?>
<?php $this->loadViews($this->baseTemplates['footer']); ?>
