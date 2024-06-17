<?php /** @noinspection DuplicatedCode */

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('website.index');
    }
    public function register(){
        return view('website.register');
    }
    public function registeruserform(Request $request) {

        $niceNames = array(
            'fname'         => "First Name",
            'lname'         => "Surname",
            'email' 		=> "Email address",
            'password'		=> "Password",
            'mobile'        => "Mobile Number",
            'adhaar_file'   => "Adhaar File",
            'adhaar'        => "Adhaar",
            'dob'           => "Date of Birth",
        );

        $requiredvalidation = [
            'fname'         => "required|min:4|max:50|regex:/^[\pL\s\']+$/u",
            'lname'         => "required|min:4|max:50|regex:/^[\pL\s\']+$/u",
            'password'		=> 'required|min:8|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'mobile'        => 'required|numeric|digits_between:8,11|unique:users,mobile',
            'adhaar_file'   => 'required|nullable|mimes:jpg,png,pdf|max:5120',
            'adhaar'        => 'required|numeric|digits:16|regex:/[0-9]{16}/',
            'dob'           => 'required|before:' . now()->toDateString(),
            'address'       => "required|min:4|max:250",
        ];

        if($request->email) {
            $requiredvalidation += array('email' => 'required|unique:users,email|min:4|max:50|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^');
        }

        $validationmessages = array(
            'adhaar_file.max' => 'The Adhaar File should not be greater than 5 MB'
        );

        $validatedData = Validator::make($request->all(), $requiredvalidation, $validationmessages)->setAttributeNames($niceNames);

        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }

        $tempUser = new User();
        $tempUser->fill($request->except(['_token']));

        if($request->file('adhaar_file')) {
            $fileName = time().'_'.$request->file('adhaar_file')->getClientOriginalName();
            $request->file('adhaar_file')->storeAs('uploads', $fileName, 'public');
            $tempUser->adhaar_file = time().'_'.$request->file('adhaar_file')->getClientOriginalName();
        }

        $request->session()->put('tempUser', $tempUser);
        $tempotp = rand(111111,999999);
        $request->session()->put('tempotp', $tempotp);
        $request->session()->put('showOtpModal', 1);

        return redirect()->back();
    }
    public function registeruserotp(Request $request) {
        if($request->otp == Session::get('tempotp')) {
            $userarray = Session::get('tempUser');
            $user = User::create([
                'fname'         => $userarray->fname,
                'lname'         => $userarray->lname,
                'email' 		=> $userarray->email,
                'mobile'        => $userarray->mobile,
                'password'      => Hash::make($userarray->password),
                'adhaar'        => $userarray->adhaar,
                'adhaar_file'   => $userarray->adhaar_file,
                'lat'           => $userarray->lat,
                'long'          => $userarray->long,
                'address'       => $userarray->address,
                'dob'           => $userarray->dob,
                'acc_id'        => strtoupper(substr($userarray->fname, 0, 2)."-".rand(1111,9999)),
            ]);

            if($user['id']){
                UserRole::create([
                    'user_id'       => $user['id'],
                    'role_id' 		=> 2,
                ]);
            }
            Session::forget(['tempUser', 'tempotp', 'showOtpModal']);

            return redirect()->route('sitehome')->with('Success', 'User Registered Successfully');
        }

        return redirect()->back()->with('FailedModal', 'Wrong OTP Entered ');
    }

    public function resetuserform(Request $request) {
        if(Storage::disk('public')->exists('uploads/'.Session::get('tempUser')->adhaar_file))
        {
            Storage::disk('public')->delete('uploads/'.Session::get('tempUser')->adhaar_file);
        }
        Session::forget(['tempUser', 'tempotp', 'showOtpModal']);
        return redirect()->route('registeruser');
    }

    public function resendotp(Request $request) {
        $tempotp = rand(111111,999999);
        $request->session()->put('tempotp', $tempotp);

        return redirect()->back();
    }

    public function myprofileUpdate(Request $request) {
        $niceNames = array(
            'fname'         => "First Name",
            'lname'         => "Surname",
            'email' 		=> "Email address",
            'adhaar'        => "Adhaar",
            'dob'           => "Date of Birth",
            'address'       => "Address",
        );

        $requiredvalidation = [
            'fname'         => "required|min:4|max:50|regex:/^[\pL\s\']+$/u",
            'lname'         => "required|min:4|max:50|regex:/^[\pL\s\']+$/u",
            'adhaar'        => 'required|numeric|digits:16|regex:/[0-9]{16}/',
            'dob'           => 'required|before:' . now()->toDateString(),
            'address'       => "required|min:4|max:250",
        ];

        if($request->email && $request->email != Auth::user()->email) {
            $requiredvalidation += array('email' => 'required|unique:users,email|min:4|max:50|regex:^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^');
        }

        $validatedData = Validator::make($request->all(), $requiredvalidation)->setAttributeNames($niceNames);
        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput()
                ->with('openprofilemodal', 'true');
        }

        $user = User::where('id', Auth::user()->id)->update([
            'fname'         => $request->fname,
            'lname' 		=> $request->lname,
            'email' 		=> $request->email,
            'adhaar'        => $request->adhaar,
            'dob'           => $request->dob,
            'address'       => $request->address,
            'lat'           => $request->lat,
            'long'          => $request->long,
        ]);

        return redirect()->back()
            ->with(['Succcessprofile'=> 'Profile Updated Successfully',
                    'openprofilemodal'=> 'true']);
    }

    public function passwordupdate(Request $request) {
        $user = Auth::user();
        $validatedData = Validator::make($request->all(), [
            'current_password'      => 'required|min:8|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'password'              => 'required|confirmed|min:8|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ])->after(function ($validator) use ($user, $request) {
            if (! isset($request->current_password) || ! Hash::check($request->current_password, $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        });

        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput()
                ->with('openpasswordmodal', 'true');
        }

        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        return redirect()->back()->with(['openpasswordmodal' => 'true',
            'Succcesspassword' => 'Password Updated Successfully']);
    }

    public function viewaddmypost() {
        return view('website.addpost');
    }
}
