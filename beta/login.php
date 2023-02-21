<?php
include __DIR__ . '/app.php';
$page_title = 'Login';
include_once __DIR__ . '/_components/header.php';
?>
<br>
<br>
<div class="container sign-in">
  <div>
    <h2>Sign in to your account</h2>

  </div>

  <div>
    <div>
      <form action="<?php echo site_url() . '/_includes/process-users.php' ?>" method="POST">
        <div>
          <label for="username">Username</label>
          <div>
            <input id="username" name="username" type="text" required>
          </div>
        </div>
        
        <br>

        <div>
          <label for="phone">Phone Number</label>
          <div>
            <input id="phone" name="phone" type="text" required>
          </div>
        </div>
        
        <br>

        <div>
          <label for="pass">Password</label>
          <div class="mt-1">
            <input id="pass" name="pass" type="password" required>
          </div>
        </div>

        <div>
          <button class="button" type="submit">
            Sign in
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<br>
<br>