<?php

namespace Attla\SSO\Controllers;

use App\Models\User;
use Attla\Controller;
use Attla\SSO\Resolver;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function identifier(Request $request)
    {
        [$clientCallback, $clientSecret, $token] = Resolver::resolveClientProvider($request);

        if ($user = auth()->user()) {
            $url = Resolver::callback($token, $user);
            return view('sso::identifier', compact('user', 'token', 'url'));
        }

        return redirect()->route('sso.login', [
            'token' => $token,
        ]);
    }

    public function login($token = null)
    {
        return view('sso::login', compact('token'));
    }

    public function sign(Request $request, $token = null)
    {
        $inputs = config('sso.validation.sign');
        $this->validate($request, $inputs);

        $remember = $request->has('remember') ? 31556926 : 1800;

        if (auth()->attempt($request->only(array_keys($inputs)), $remember)) {
            $callback = Resolver::callback($token, auth()->user()) ?: route(config('sso.redirect'));
            return redirect($callback);
        }

        return back()->withErrors('E-mail ou senha não conferem.');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        [$clientCallback] = Resolver::resolveClientProvider($request);
        return redirect($clientCallback ?? '/');
    }

    public function register(Request $request)
    {
        [$clientCallback, $clientSecret, $token] = Resolver::resolveClientProvider($request);
        return view('sso::register', compact('token'));
    }

    public function signup(Request $request, $token = null)
    {
        $inputs = config('sso.validation.signup');
        $this->validate($request, $inputs);

        $user = new User($request->only(array_keys($inputs)));

        if ($user->save()) {
            auth()->fromUser($user, 31556926);
            $callback = Resolver::callback($token, auth()->user()) ?: route(config('sso.redirect'));
            flash("Seja bem-vindo, {$user->name}!");

            return redirect($callback);
        }

        return back()->withErrors('Occorreu um erro ao efetuar o cadastro.');
    }
}
