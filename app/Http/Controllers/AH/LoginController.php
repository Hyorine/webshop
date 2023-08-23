<?php

namespace App\Http\Controllers\AH;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Auth;

class LoginController extends Controller
{
	
	public function Registration(Request $request)
	{
        $request->validate([
            'email' => 'required|email|unique:useres,u_email',
            'password' => 'required|min:8|max:16',
        ], [
            'email.required' => __('messages.ErrorEmailRequired'),
            'email.email' => __('messages.ErrorEmailEmail'),
            'email.unique' =>  __('messages.ErrorEmailUnique'),
            'password.required' =>  __('messages.ErrorPasswordRequired'),
            'password.min' =>  __('messages.ErrorPasswordMin'),
            'password.max' =>  __('messages.ErrorPasswordMax'),
        ]);

         // Save the user to the database
         Users::create([
            'u_email' => $request->email,
            'u_password' =>Hash::make($request->password),
            'u_registration' => date("Y-m-d H:i:s"),
            'u_active' => null,
            'u_jog' => 4,
        ]);
        return response()->json(['message' => 'success']);
	}
    public function login(Request $request){
       
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = Users::where('u_email', $request->email)->first();
        if ($user && password_verify($request->password, $user->u_password)) {
            $remember = $request->has('remember'); // Check if "Remember Me" is checked
            $request->session()->regenerate();
            $request->session()->put('u_ID', $user->u_ID);

            // Create a long-lived cookie that holds the user's ID
            $cookie = cookie('remember_me', $remember, 525600); // Expires in 1 year
            Auth::login($user);
            return redirect('');
        }
        // Authentication failed
        throw ValidationException::withMessages([
            'email' => [__('messages.ErrorLoginFaild')],
        ]);
        
    }
	public function logout(Request $request){		
		Auth::logout();
		return redirect('');
	}
}