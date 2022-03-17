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
        $token = Resolver::getClientProviderToken($request);
        $redirect = $request->redirect ?: $request->r ?: route(config('sso.redirect'));

        if ($user = auth()->user()) {
            $callback = Resolver::callback($token, $user, $redirect) ?: route(config('sso.redirect'));
            return view('sso::identifier', compact('user', 'token', 'callback', 'redirect'));
        }

        return redirect()->route(config('sso.route-group.as') . 'login', [
            'token' => $token,
            'redirect' => $redirect,
        ]);
    }

    public function login($token = null)
    {
        $redirect = request('redirect') ?: route(config('sso.redirect'));
        return view('sso::login', compact('token', 'redirect'));
    }

    public function sign(Request $request, $token = null)
    {
        $inputs = config('sso.validation.sign');
        $this->validate($request, $inputs);

        $remember = $request->has('remember') ? 31556926 : 1800;

        if (auth()->attempt($request->only(array_keys($inputs)), $remember)) {
            $callback = Resolver::callback($token, auth()->user(), $request->redirect ?: $request->r ?: route(config('sso.redirect'))) ?: route(config('sso.redirect'));
            return redirect($callback);
        }

        return back()->withErrors('E-mail ou senha não conferem.');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        if ($client = Resolver::resolveClientProvider($request)) {
            return redirect($client->host);
        }

        return redirect('/');
    }

    public function register(Request $request, $token = null)
    {
        $redirect = $request->redirect ?: $request->r ?: route(config('sso.redirect'));

        if (!$token and $token = Resolver::getClientProviderToken($request)) {
            return redirect()->route(config('sso.route-group.as') . 'register', [
                'token' => $token,
                'redirect' => $redirect,
            ]);
        }

        return view('sso::register', compact('token', 'redirect'));
    }

    public function signup(Request $request, $token = null)
    {
        $inputs = config('sso.validation.signup');
        $this->validate($request, $inputs);

        $user = new User($request->only(array_keys($inputs)));

        $user->forceFill([
            'password' => encrypt($request->input('password')),
        ]);

        if ($user->save()) {
            auth()->fromUser($user, 31556926);
            $callback = Resolver::callback($token, auth()->user(), $request->redirect ?: $request->r ?: route(config('sso.redirect'))) ?: route(config('sso.redirect'));
            flash("Seja bem-vindo, {$user->name}!");

            return redirect($callback);
        }

        return back()->withErrors('Occorreu um erro ao efetuar o cadastro.');
    }
}
