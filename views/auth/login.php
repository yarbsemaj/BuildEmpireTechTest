<?php
includeView('boiler-plate/html-header');
includeView('errors/errors') ?>
<div class="card">
    <div class="card-header">Login</div>
    <div class="card-body">
        <form method="post" action="/login">
            <?php csrf() ?>
            <input name="email" class="form-control" type="email" placeholder="example@example.com" required>
            <input name="password" class="form-control" type="password" placeholder="password123" required>
            <button type="submit" class="btn btn-block">Login</button>
        </form>
    </div>
</div>
<?php includeView('boiler-plate/html-footer') ?>
