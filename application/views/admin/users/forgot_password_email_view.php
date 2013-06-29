<h2>Greetings <?php echo $user['first_name'] ?>!</h2>

<p>You requested to have your password reset.</p>
<p>Please visit this <a href="<?php echo site_url('admin/users/reset_password/' . $user['hash']); ?>">link</a> to reset your password.</p>
<p>If you didn't do this, you can ignore this message.</p>
<p>Thanks!</p>