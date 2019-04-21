<?php
includeView('boiler-plate/html-header');
includeView('errors/errors')
?>
<div class="card">
    <div class="card-header">Register</div>
    <div class="card-body">
        <form method="post" action="/register">
            <?php csrf() ?>

            <input name="first_name" class="form-control" type="text" placeholder="John" required>
            <input name="surname" class="form-control" type="text" placeholder="Smith" required>
            <input name="phone_number" class="form-control" type="text" placeholder="01924123456" required>

            <input name="email" class="form-control" type="email" placeholder="example@example.com" required>
            <input name="password" class="form-control" type="password" placeholder="password123" required>
            <button type="submit" class="btn btn-block">Register</button>
        </form>
    </div>
</div>
<?php includeView('boiler-plate/html-footer') ?>
