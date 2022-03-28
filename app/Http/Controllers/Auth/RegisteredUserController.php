<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','min:2'], 
            'prenom' => ['required', 'string', 'max:255','min:2'], 
            'adresse' => ['required', 'string', 'max:255','min:2'], 
            'nomEpoux' => [ 'string', 'max:255','min:2'], 
            'telephone' => ['required', 'string', 'max:255','min:9'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'role'=>"etudiant",
            'prenom'=>$request->prenom,
            'slug'=>$this->slugify($request->name . '-'. $request->prenom . time()),
            'password' => Hash::make($request->password),
        ]);
        $etudiant = Etudiant::create([
            "adresse"=>$request->adresse,
            "nomEpoux"=>$request->nomEpoux,
            "telephone"=>$request->telephone,
        ]);
        $etudiant->user()->save($user);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
