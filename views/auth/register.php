<?php
includeView('boiler-plate/html-header');
includeView('errors/errors')
?>
<div class="card">
    <div class="card-header">Register</div>
    <div class="card-body">
        <form method="post" action="/register">
            <?php csrf() ?>
            <label>First Name</label>
            <input name="first_name" class="form-control" type="text" placeholder="John" required>
            <label>Surname</label>
            <input name="surname" class="form-control" type="text" placeholder="Smith" required>
            <label>Phone number</label>
            <input name="phone_number" class="form-control" type="text" placeholder="01924123456" required>
            <label>Email address</label>
            <input name="email" class="form-control" type="email" placeholder="example@example.com" required>
            <label>Password</label>
            <input name="password" class="form-control" type="password" placeholder="password123" required>
            <br>
            <button type="submit" class="btn btn-block">Register</button>
            <br>
            <div class="text-center">
                Already a member?<br><a href="/login">Login.</a>
            </div>
        </form>
    </div>
</div>
<?php includeView('boiler-plate/html-footer') ?>
