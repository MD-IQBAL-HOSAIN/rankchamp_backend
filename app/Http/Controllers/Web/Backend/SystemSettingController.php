<?php

namespace App\Http\Controllers\Web\Backend;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class SystemSettingController extends Controller
{
    public function index()
    {
        $setting = SystemSetting::latest('id')->first();
        return view('backend.layout.system_setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'system_name' => 'nullable',
            'description' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Adding image validation
            'favicon' => 'nullable|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',  // Adding image validation
            'copyright' => 'nullable',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $setting = SystemSetting::firstOrNew();
            $setting->system_name = $request->system_name;
            $setting->description = $request->description;
            $setting->copyright = $request->copyright;

            // Handle logo upload
            if ($request->hasFile('logo')) {
                $image = $request['logo']->getClientOriginalName();
                $imagePath = '/system/logo/' . time() . '_' . $image;  // Unique image path with timestamp
                $request['logo']->move(public_path('/system/logo/'), $imagePath);
                $setting->logo = $imagePath;
            }

            // Handle favicon upload
            if ($request->hasFile('favicon')) {
                // Delete the old favicon if it exists
                if ($setting->favicon && Storage::disk('public')->exists($setting->favicon)) {
                    Storage::disk('public')->delete($setting->favicon);
                }

                // Store the new favicon in 'setting/favicon'
                $faviconPath = $request->file('favicon')->store('setting/favicon', 'public');
                $setting->favicon = $faviconPath;
            }


            $setting->save();
            return back()->with('t-success', 'Updated successfully');
        } catch (Exception $e) {
            return back()->with('t-error', 'Failed to update');
        }
    }


    // admin profile update start
    public function profileindex()
    {

        return view('backend.layout.system_setting.profile_setting');
    }

    public function profileupdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('t-success', 'Profile Update Successfully!');
    }

    public function passwordupdate(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',
                Password::defaults(),
                'confirmed'
            ],
        ]);

        // Update the user's password
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('t-success', 'Password updated successfully!');
    }

    //admin profile update end


    // Mail setting start
    public function mailSetting()
    {
        return view('backend.layout.system_setting.mailsetting');
    }

    public function mailSettingUpdate(Request $request)
    {
        $request->validate([
            'mail_mailer' => 'required|string',
            'mail_host' => 'required|string',
            'mail_port' => 'required|string',
            'mail_username' => 'nullable|string',
            'mail_password' => 'nullable|string',
            'mail_encryption' => 'nullable|string',
            'mail_from_address' => 'required|string',
        ]);
        try {
            $envContent = File::get(base_path('.env'));
            $lineBreak = "\n";
            $envContent = preg_replace([
                '/MAIL_MAILER=(.*)\s/',
                '/MAIL_HOST=(.*)\s/',
                '/MAIL_PORT=(.*)\s/',
                '/MAIL_USERNAME=(.*)\s/',
                '/MAIL_PASSWORD=(.*)\s/',
                '/MAIL_ENCRYPTION=(.*)\s/',
                '/MAIL_FROM_ADDRESS=(.*)\s/',
            ], [
                'MAIL_MAILER=' . $request->mail_mailer . $lineBreak,
                'MAIL_HOST=' . $request->mail_host . $lineBreak,
                'MAIL_PORT=' . $request->mail_port . $lineBreak,
                'MAIL_USERNAME=' . $request->mail_username . $lineBreak,
                'MAIL_PASSWORD=' . $request->mail_password . $lineBreak,
                'MAIL_ENCRYPTION=' . $request->mail_encryption . $lineBreak,
                'MAIL_FROM_ADDRESS=' . '"' . $request->mail_from_address . '"' . $lineBreak,
            ], $envContent);

            if ($envContent !== null) {
                File::put(base_path('.env'), $envContent);
            }
            return back()->with('t-success', 'Updated successfully');
        } catch (Exception $e) {
            return back()->with('t-error', 'Failed to update');
        }

        return redirect()->back();
    }
    // Mail setting end


    // stripe setting start
    public function stripeindex()
    {
        return view('backend.layout.system_setting.stripe');
    }

    public function stripestore(Request $request)
    {
        $request->validate([
            'stripe_key'    => 'required|string',
            'stripe_secret' => 'required|string',
        ]);
        try {
            $envContent = File::get(base_path('.env'));
            $lineBreak = "\n";
            $envContent = preg_replace([
                '/STRIPE_KEY=(.*)\s/',
                '/STRIPE_SECRET=(.*)\s/',
            ], [
                'STRIPE_KEY=' . $request->stripe_key . $lineBreak,
                'STRIPE_SECRET=' . $request->stripe_secret . $lineBreak,
            ], $envContent);

            if ($envContent !== null) {
                File::put(base_path('.env'), $envContent);
            }
            return redirect()->back()->with('t-success', 'Stripe Setting Update successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('t-error', 'Stripe Setting Update Failed');
        }
        return redirect()->back();
    }

    // stripe setting end
}
