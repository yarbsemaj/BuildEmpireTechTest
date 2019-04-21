<?php
if (isset($_GET['errors'])) {
    print "<div class='alert alert-danger'>";
    foreach ($_GET['errors'] as $field => $errors) {
        print "<b>$field</b>";
        print "<ul>";
        foreach ($errors as $error) {
            print "<li>$error</li>";
        }
        print"</ul>";
    }
    print "</div>";
}
