<?php

namespace Attla\SSO\Controllers;

use App\Models\User;
use Attla\SSO\Resolver;
use Attla\Flash\Facade as Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function identifier(Request $request)
    {
        $state = Resolver::getClientProviderToken($request);
        $redirect = Resolver::getRedirectFromRequest($request);

        if ($user = Auth::user()) {
            $callback = Resolver::callback($state, $user, $redirect) ?: Resolver::redirect();

            return view('sso::identifier', compact(
                'user',
                'state',
                'callback',
                'redirect'
            ));
        }

        return to_route(Resolver::getConfig('sso.route-group.as') . 'login', [
            'state' => $state,
            'redirect' => $redirect,
        ]);
    }

    public function login(Request $request)
    {
        $state = Resolver::getClientProviderToken($request);
        $redirect = Resolver::getRedirectFromRequest($request);

        return view('sso::login', compact('state', 'redirect'));
    }

    public function sign(Request $request)
    {
        $this->validate($request, $inputs = Resolver::getConfig('sso.validation.sign'));

        if (
            Auth::attempt(
                $request->only(array_keys($inputs)),
                $request->has('remember')
            )
        ) {
            return redirect(Resolver::callback(
                Resolver::getClientProviderToken($request),
                Auth::user(),
                Resolver::getRedirectFromRequest($request)
            ) ?: Resolver::redirect());
        }

        return back()->withErrors('E-mail ou senha não conferem.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        if ($client = Resolver::resolveClientProvider($request)) {
            return redirect($client->host);
        }

        return redirect('/');
    }

    public function register(Request $request)
    {
        $state = Resolver::getClientProviderToken($request);
        $redirect = Resolver::getRedirectFromRequest($request);

        if (!$state and $state = Resolver::getClientProviderToken($request)) {
            return to_route(Resolver::getConfig('sso.route-group.as') . 'register', [
                'state' => $state,
                'redirect' => $redirect,
            ]);
        }

        return view('sso::register', compact('state', 'redirect'));
    }

    public function signup(Request $request)
    {
        $inputs = Resolver::getConfig('sso.validation.signup');
        $this->validate($request, $inputs);

        $user = new User($request->only(array_keys($inputs)));

        $user->forceFill([
            'password' => encrypt($request->input('password')),
        ]);

        if ($user->save()) {
            Auth::login($user, true);

            $callback = Resolver::callback(
                Resolver::getClientProviderToken($request),
                Auth::user(),
                Resolver::getRedirectFromRequest($request)
            ) ?: Resolver::redirect();

            Flash::info("Seja bem-vindo, {$user->name}!")->timeout(5);

            return redirect($callback);
        }

        return back()->withErrors('Occorreu um erro ao efetuar o cadastro.');
    }
}
