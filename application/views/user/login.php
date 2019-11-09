<?php $this->loadViews($this->baseTemplates['header']); ?>
<header>
    <h2>Welcome To booking!</h2>
    <nav>
        <?php $this->setNav(); ?>
    </nav>
</header>
<section id="login">
    <?php $this->getNotifications();  ?>
    <form action="" method="POST">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <button type="submit">Login</button>
    </form>
</section>

<?php $this->loadViews($this->baseTemplates['footer']); ?>
