<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            // Authentication passed

            return redirect()->intended(route('dashboard'));
        } else {
            // Authentication failed
            // return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
            return redirect()->intended(route('dashboard'));
        }
        // $client = new Client();
        // $url = "http://10.10.20.135/forsa/api/sso";
        // $options = [
        //     'form_params' => [
        //         'username' => $request->username,
        //         'password' => $request->password
        //     ],
        //     'headers' => [
        //         'Accept' => 'application/json',
        //     ],
        //     'verify' => false
        // ];

        // $response = $client->request('POST', $url, $options);
        // dd($response);
        // $body = $response->getBody()->getContents();
        // $data = json_decode($body);


        // $finduser = User::where('username', $request->username)->first();

        // if ($finduser == true && $data->status == "sukses") {
        //     $request->session()->regenerate();
        //     Auth::login($finduser);
        //     return redirect()->intended(route('home'));
        // } elseif ($data->status == "sukses") {
        //     if ($request->username == "Rian Chris Sesario Sinaga") {
        //         $newuser = User::create([
        //             'username' => $request->username,
        //             'role' => 'admin',
        //             'name' => $data->data->nama
        //         ]);
        //     } else {
        //         $newuser = User::create([
        //             'username' => $request->username,
        //             'role' => 'author',
        //             'name' => $data->data->nama
        //         ]);
        //     }
        //     Auth::login($newuser);
        //     return redirect()->intended(route('home'));
        // } else {
        //     return back()->with('loginError', 'Login failed');
        // }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
