<?php
includeView('boiler-plate/html-header');
includeView('errors/errors') ?>
<form method="post" action="/login">
    <?php csrf() ?>
    <input name="email" class="form-control" type="email" placeholder="example@example.com" required>
    <input name="password" class="form-control" type="password" placeholder="password123" required>
    <button type="submit">Login</button>
</form>
<?php includeView('boiler-plate/html-footer') ?>
