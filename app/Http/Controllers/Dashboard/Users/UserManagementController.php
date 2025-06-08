<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\User;
use App\Models\Role;
use App\Models\Address;
use App\Models\Roleuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Mail\AuthMailController;

class UserManagementController extends Controller
{
    public function index()
    {
        $dashboardusers = [1, 2, 3, 5];
        $role = Roleuser::whereIn('role_id', $dashboardusers)->select('user_id')->get();
        $users = User::whereIn('id', $role)->get();
        return view('Backend.userManagement.index', compact('users'));
    }
    public function custindex()
    {
        $dashboardusers = [4];
        $role = Roleuser::whereIn('role_id', $dashboardusers)->select('user_id')->get();
        $users = User::whereIn('id', $role)->get();
        return view('Backend.userManagement.customer', compact('users'));
    }

    public function suplierindex()
    {
        $dashboardusers = [6];
        $role = Roleuser::whereIn('role_id', $dashboardusers)->select('user_id')->get();
        $users = User::whereIn('id', $role)->get();
        return view('Backend.userManagement.suplier', compact('users'));
    }
    public function roleindex()
    {
        $roles = Role::get();
        return view('Backend.roleManagement.index', compact('roles'));
    }

    public function create()
    {
        /*    if (Gate::denies('manage-user')) {
            return redirect(route('dashboard.index'))
                ->with('danger', 'You have no permission to edit users');
        } */
        $roles = Role::all();
        return view('Backend.userManagement.create', compact('roles'));
    }

    public function store(Request $request)
    {
        //dd($request->roles);


        $validatedData = $request->validate([
            'userName' => 'required|min:5',
            'Fname' => 'required|min:8',
            'Lname' => 'required|min:8',
            'email'    => 'required|email|max:255',
            'Fname' => 'required|min:8',
            // 'password' => 'required|min:8',
        ]);
        $user = new User();

        if ($request->file('image')) {
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/user'), $my_image);
            $user->image = $my_image;
        }
        if ($request->gender == '1') {
            $gender = 1;
        } elseif ($request->gender == '0') {
            $gender = 0;
        }
        $user->userName = $request->userName;
        $user->gender = $gender;
        $user->Fname = $request->Fname;
        $user->Lname = $request->Lname;
        $user->email = $request->email;
        $user->bday = $request->bday;



        $user->password = Hash::make($request->password);
        $user->save();

        $user->roles()->sync($request->roles);

        $address = new Address();
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->city = $request->city;
        $address->district = $request->district;
        $address->province = $request->province;
        $address->postal_code = $request->postal_code;
        $address->mobile = $request->mobile;
        $address->user()->associate($user);

        //assign Default Role
        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);

        /* AuthMailController::SendDashRegisterMail($user->userName, $user->email); */

        return redirect()->route('dashboard.user.index')
            ->with('success', 'User Created successfully');
    }

    public function edit(User $user)
    {
        //dd($user);
        $roles = Role::all();

        return view('Backend.userManagement.update', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // dd($request->roles);
        $validatedData = $request->validate([
            'userName' => 'required|min:5',
            'Fname' => 'required|min:8',
            'Lname' => 'required|min:8',
            'email'    => 'required|email|max:255',
            'Fname' => 'required|min:8',
            // 'password' => 'required|min:8',
        ]);

        $user->roles()->sync($request->roles);

        if ($request->file('image')) {
            File::delete('upload/user' . $user->image);
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/user'), $my_image);
            // dd($my_image);
            $user->image = $my_image;
        }
        if ($request->gender == '1') {
            $gender = 1;
        } elseif ($request->gender == '0') {
            $gender = 0;
        }
        $user->gender = $gender;
        $user->userName = $request->userName;
        $user->Fname = $request->Fname;
        $user->Lname = $request->Lname;
        $user->email = $request->email;
        $user->bday = $request->bday;
        if (Hash::check($request->cpassword, $user->password)) {
            // The passwords match...
            if ($request->comfirm_password == $request->npassword) {
                $user->password = Hash::make($request->npassword);
            }
        }
        $user->save();


        $billingaddress = Address::where('user_id', $user->id)->first();
        //dd($billingaddress);
        if ($billingaddress) {
            $billingaddress->billing_address_line_1 = $request->billing_address_line_1;
            $billingaddress->billing_address_line_2 = $request->billing_address_line_2;
            $billingaddress->billing_city = $request->billing_city;
            $billingaddress->billing_state = $request->billing_state;
            $billingaddress->billing_postal_code = $request->billing_postal_code;
            $billingaddress->billing_mobile = $request->billing_mobile;
            $billingaddress->billing_Cname = $request->billing_Cname;
            $billingaddress->user()->associate($user);
        }

        if ($user->save()) {
            $request->session()->flash('success', 'User Has Been Updated Successfully');
        } else {
            $request->session()->flash('danger', 'User Has not Been Updated Successfully');
        }

        /*  AuthMailController::SendAuthupdateMail($user->userName, $user->email); */

        return redirect()->back();
    }
    public function profile(User $user)
    {
        //dd($user);
        return view('Backend.userManagement.myProfile', compact('user'));
    }
    public function destroy($user)
    {
        $user = User::find($user);
        if (Gate::denies('keymaster-user')) {
            return redirect(route('dashboard.user.index'))
                ->with('danger', 'You have no permission to delete users');
        }
        if (($user->image)) {
            File::delete('upload/firmware' . $user->image);
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('dashboard.user.index')
            ->with('danger', 'User Deleted Successfully');
    }
}
