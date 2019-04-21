<?php
includeView('boiler-plate/html-header');
includeView('errors/errors')
?>
<form method="post" action="/register">
    <?php csrf() ?>

    <input name="first_name" class="form-control" type="text" placeholder="John" required>
    <input name="surname" class="form-control" type="text" placeholder="Smith" required>
    <input name="phone_number" class="form-control" type="text" placeholder="01924123456" required>

    <input name="email" class="form-control" type="email" placeholder="example@example.com" required>
    <input name="password" class="form-control" type="password" placeholder="password123" required>
    <button type="submit">Login</button>
</form>
<?php includeView('boiler-plate/html-footer') ?>
