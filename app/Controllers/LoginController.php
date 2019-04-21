<?php


namespace Controllers;


use AccessControl\Auth;
use Bcrypt\Bcrypt;
use Controller;
use Models\User;
use UserRepository;
use Validators\Email;
use Validators\NotUnique;
use Validators\PasswordMatch;
use Validators\Required;
use Validators\StrongPassword;
use Validators\Unique;
use Views\HTML;
use Views\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return new HTML('/auth/login');
    }

    public function registrationForm()
    {
        return new HTML('/auth/register');
    }

    public function register()
    {
        validate(
            [
                'first_name' => [new Required()],
                'surname' => [new Required()],
                'phone_number' => [new Required()],
                'email' => [new Required(), new Email(), new Unique('User', 'email')],
                'password' => [new Required(), new StrongPassword()]
            ]);

        $password = Bcrypt::encrypt($_POST['password']);

        $user = new User();
        $user->first_name = $_POST['first_name'];
        $user->surname = $_POST['surname'];
        $user->phone_number = $_POST['phone_number'];
        $user->email = $_POST['email'];
        $user->password = $password;

        $user->save();

        Auth::authorise($user);

        return new Redirect('/');
    }

    public function login()
    {
        validate(
            [
                'email' => [new Required(), new NotUnique('User', 'email')],
                'password' => [new Required()]
            ]);

        $user = UserRepository::getUserByEmail($_POST['email']);

        validate(['password' => [new PasswordMatch($user->password)]]);

        Auth::authorise($user);

        return new Redirect('/');
    }

    public function logout()
    {
        Auth::deauthorise();

        return new Redirect('/');
    }
}