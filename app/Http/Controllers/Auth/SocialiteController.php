<?php namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Factory;

class SocialiteController extends Controller
{

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Factory
     */
    private $socialite;

    /**
     * @var Guard
     */
    private $auth;

    /**
     * SocialiteController constructor.
     *
     * @param Request $request
     * @param Factory $socialite
     * @param Guard   $auth
     */
    public function __construct(Request $request, Factory $socialite, Guard $auth)
    {
        $this->request = $request;
        $this->socialite = $socialite;
        $this->auth = $auth;
    }

    public function redirectToProvider()
    {
        $this->validate($this->request, [
          'provider' => 'required|in:github,facebook',
        ]);

        $provider = $this->request->get('provider');

        return $this->socialite->driver($provider)->redirect();
    }

    public function logout()
    {
        $this->auth->logout();

        return redirect('/');
    }

    public function github()
    {
        return $this->authenticateForProvider('github');
    }

    public function facebook()
    {
        return $this->authenticateForProvider('facebook');
    }

    protected function authenticateForProvider($provider, $dd = false)
    {
        $socialiteUser = $this->socialite->driver($provider)->user();

        if($dd) dd($socialiteUser);

        $user = User::socialite($socialiteUser, $provider);

        $this->auth->login($user, true);

        return redirect('/');
    }

}