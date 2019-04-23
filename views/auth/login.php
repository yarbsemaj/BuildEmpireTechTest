<?php
includeView('boiler-plate/html-header');
includeView('errors/errors') ?>
<div class="card">
    <div class="card-header">Login</div>
    <div class="card-body">
        <form method="post" action="/login">
            <?php csrf() ?>
            <input name="email" class="form-control" type="email" placeholder="example@example.com" required>
            <br>
            <input name="password" class="form-control" type="password" placeholder="password123" required>
            <br>
            <button type="submit" class="btn btn-block">Login</button>
        </form>
        <br>
        <div class="text-center">
            Not already register?<br><a href="/register">Create an account.</a>
        </div>
    </div>
</div>
<?php includeView('boiler-plate/html-footer') ?>
