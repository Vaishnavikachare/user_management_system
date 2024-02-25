<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Notifications\RegistrationNotification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // \Log::info($request);
       
       $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'date_of_birth' => ['required' ,'date'],
            'gender' => ['required'],
            'country' => ['required'], 
            'state' => ['required'], 
            'city' => ['required'], 
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'country_id' => $request->country, 
            'state_id' => $request->state, 
            'city_id' => $request->city,
        ]);

        event(new Registered($user));

        $notification = new RegistrationNotification;
        // Send the notification
        $notificationSent = $user->notify($notification);
    
        if ($notificationSent) {
            // Notification sent successfully, proceed with login
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } else {
            return back()->withError('Failed to send registration notification.');
        }

        // Auth::login($user);
        // $user->notify(new RegistrationNotification);
        // return redirect(RouteServiceProvider::HOME);
    }

    public function showRegistrationFields()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        return view('auth.register', [
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
        ]);
    }

    public function getStates($countryId)
    {
        // Fetch states based on the $countryId
        $states = State::where('country_id', $countryId)->get();

        // Return states as JSON
        return response()->json($states);
    }

    public function getCities($stateId)
    {
        // Fetch cities based on the $stateId
        $cities = City::where('state_id', $stateId)->get();

        // Return cities as JSON
        return response()->json($cities);
    }


}
