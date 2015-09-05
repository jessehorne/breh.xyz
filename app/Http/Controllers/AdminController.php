<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class AdminController extends Controller {
  public function index() {
    return view('admin.index');
  }

  public function login(Request $request) {
    $details = ['username' => $request->username, 'password' => $request->password];
    if (Auth::attempt($details)) {
      return redirect('/dashboard');
    } else {
      return redirect('/admin')->withErrors('Login failed.');
    }
  }

  public function dashboard() {
    return view('dashboard.index');
  }

  public function logout() {
    Auth::logout();
    return redirect('/admin');
  }
}
