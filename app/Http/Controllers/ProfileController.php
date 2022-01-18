<?php

namespace App\Http\Controllers;

use App\Facades\UtilityFacades;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use File;
use Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        if (!UtilityFacades::getsettings('2fa')) {
            $user = auth()->user();
            $role = $user->roles->first();
            $tenant_id = tenant('id');
            return view('profile.index', [
                'user' => $user,
                'role' => $role,
                'tenant_id' => $tenant_id
            ]);
        }
        return $this->activeTwoFactor();
    }

    private function activeTwoFactor()
    {
        $user = Auth::user();
        $google2fa_url = "";
        $secret_key = "";
        if ($user->loginSecurity()->exists()) {
            $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());
            $google2fa_url = $google2fa->getQRCodeInline(
                @UtilityFacades::getsettings('app_name'),
                $user->name,
                $user->loginSecurity->google2fa_secret
            );
            $secret_key = $user->loginSecurity->google2fa_secret;
        }
        $user = auth()->user();
        $role = $user->roles->first();
        $tenant_id = tenant('id');
        $data = array(
            'user' => $user,
            'secret' => $secret_key,
            'google2fa_url' => $google2fa_url,
            'tenant_id' => $tenant_id
        );
        return view('profile.index', [
            'user' => $user,
            'role' => $role,
            'secret' => $secret_key,
            'google2fa_url' => $google2fa_url,
            'tenant_id' => $tenant_id
        ]);
    }

    public function updateLogin(Request $request)
    {
        $userDetail = Auth::user();
        $user       = User::findOrFail($userDetail['id']);
        $validator = \Validator::make(
            $request->all(),
            [
                'email' => 'required|email|unique:users,email,' . $userDetail['id'],
                'avatar' => 'image|mimes:jpeg,png,jpg,svg|max:3072',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('avatar/');
            $image_path      = $dir . $userDetail['avatar'];

            if (File::exists($image_path)) {
                //File::delete($image_path);
            }
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('avatar')->storeAs('avatar/', $fileNameToStore);
        }
        if (!empty($request->avatar)) {
            $user['avatar'] = 'avatar/' . $fileNameToStore;
        }
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user['email'] = $request['email'];
        $user->save();
        return redirect()->back()->with('success', __('avatar successfully updated.'));
    }

    private function generateCode()
    {
        $google2fa = app('pragmarx.google2fa');
        $generated = $google2fa->getQRCodeInline(
            config('app.name'),
            auth()->user()->name,
            auth()->user()->google2fa->google2fa_secret
        );
        return $generated;
    }

    public function activate()
    {
        $user = Auth::user();
        $google2fa = app('pragmarx.google2fa');
        $google2fa = $google2fa->generateSecretKey();
        TwoFactor::create([
            'user_id' => $user->id,
            'google2fa_enable' => 0,
            'google2fa_secret' => $google2fa
        ]);
        return redirect()->back()->with('success', __('2-Factor Activated'));
    }

    public function enable(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);
        $user = Auth::user();
        $google2fa = app('pragmarx.google2fa');
        $verified = $google2fa->verifyKey($user->google2fa->google2fa_secret, $request->code);
        if ($verified) {
            $user->google2fa->google2fa_enable = 1;
            $user->google2fa->save();
            return redirect()->back()->with('success', __('2-Factor Enabled'));
        }
        return redirect()->back()->with('fail', __('Verification Code is Invalid'));
    }

    public function disable(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'password' => 'required',
        ]);
        $user = Auth::user();
        $google2fa = app('pragmarx.google2fa');
        if (Hash::check($request->password, $user->password)) {
            $verified = $google2fa->verifyKey($user->google2fa->google2fa_secret, $request->code);
            if ($verified) {
                $user->google2fa->delete();
                return redirect()->back()->with('success', '2-Factor Disabled');
            }
            return redirect()->back()->with('fail', __('Verification Code is Invalid'));
        } else {
            return redirect()->back()->with('fail', __('Invalid Password! Check Password and try again'));
        }
    }

    public function verify()
    {
        return redirect(URL()->previous());
    }

    public function instruction()
    {
        return view('google2fa.instruction');
    }
}
