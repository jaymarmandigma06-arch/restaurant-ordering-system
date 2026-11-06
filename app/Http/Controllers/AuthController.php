<?php
namespace App\Http\Controllers;
use App\Models\Cart; use App\Models\User; use Illuminate\Http\Request; use Illuminate\Support\Facades\Auth; use Illuminate\Support\Facades\Hash;
class AuthController extends Controller {
 public function showLogin(){return view('auth.login');} public function showRegister(){return view('auth.register');}
 public function login(Request $r){$data=$r->validate(['email'=>'required|email','password'=>'required']); if(!Auth::attempt($data,$r->boolean('remember'))) return back()->withErrors(['email'=>'Invalid credentials.'])->onlyInput('email'); $r->session()->regenerate(); abort_unless($r->user()->is_active,403,'Account inactive.'); return redirect()->intended($r->user()->isAdmin()?route('admin.dashboard'):route('home'));}
 public function register(Request $r){$d=$r->validate(['name'=>'required|string|max:120','email'=>'required|email|unique:users','phone'=>'required|string|max:30','password'=>'required|confirmed|min:8']);$d['password']=Hash::make($d['password']);$d['role']='customer';$u=User::create($d);Cart::create(['user_id'=>$u->id]);Auth::login($u);return redirect()->route('home')->with('success','Welcome! Your account is ready.');}
 public function logout(Request $r){Auth::logout();$r->session()->invalidate();$r->session()->regenerateToken();return redirect()->route('home');}
}
