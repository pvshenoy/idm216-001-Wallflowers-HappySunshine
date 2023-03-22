<?php
include __DIR__ . '/app.php';
$page_title = 'Login';
include_once __DIR__ . '/_components/header.php';
include_once __DIR__ . '/_components/headers/login-header.php';
$site_url = site_url();
?>

<body>
    <img src="{<?php echo site_url() ?>}/dist/images/preeti-img/background-elements/top-right.png" alt="" class="top-right">
    <img src="<?php echo site_url() ?>/dist/images/preeti-img/background-elements/top-left.png" alt="" class="top-left">
    <img src="<?php echo site_url() ?>/dist/images/preeti-img/background-elements/bottom-right.png" alt="" class="bottom-right">
    <img src="<?php echo site_url() ?>/dist/images/preeti-img/background-elements/bottom-left.png" alt="" class="bottom-left">
  <section class="login">
    <img src="<?php site_url() ?>/dist/images/logo.png" alt="" class="logo logo-login" style="margin-top: 3rem;">
    <h4 class="login-warning">
        Please sign in to your Happy Sunshine account to complete your purchase!
    </h4>
    <form class="user-login" action="<?php echo site_url() . '/_includes/process-users.php' ?>" method="POST">
        <input type="text" class="search-bar login-bar" placeholder="username" name="username">
        <input type="number" class="search-bar login-bar" placeholder="(xxx)-xxx-xxxx" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" name="phone">
        <input type="password" class="search-bar login-bar" placeholder="password" name="pass">
        <input type="submit" class="submit-login" value="SUBMIT">
    </form>
    </section>
</body>

<?php
include_once __DIR__ . '/_includes/mobile-footer.php';
?>
