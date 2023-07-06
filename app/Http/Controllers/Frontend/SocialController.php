<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Social;
use App\Models\Customers;
class SocialController extends Controller
{
    public function redirectToSocial($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleSocialCallback($social)
    {
    $user = Socialite::driver($social)->user();
    $authId = $this->checkCustomer($user, $social);
    $authCustomer = Social::where('user_id', "=",$authId)->first();
    $account = Customers::where("id", '=', $authCustomer->user)->first();
        if (isset($account)) {
            session()->put("customer_email", $account->email);
            session()->put("customer_id", $account->id);
            session()->put("customer_name", $account->name);
            Alert::toast('Đăng nhập thành công', 'success')->position('top-end')->autoClose(2000);
            return redirect(url("/"));
        } else {
            Alert::toast('Đăng nhập that bai', 'error')->position('top-end')->autoClose(2000);
            return redirect(url("/login"));
        }

    } 
    public function checkCustomer($user, $social) {
        $authCustomer = Social::where("provider_user_id", $user->id)->first();
        if(!empty($authCustomer)) {
            return $authCustomer->user_id;
        } else {
            $email = Customers::where("email", '=', $user->email)->first();
            if(empty($email)) {
                $authId = Social::insertGetId([
                    'provider_user_id'=> $user->id,
                    "provider"=>$social,
                    'user'=>null,
                ]);
                $id = Customers::insertGetId([
                    "name"=>$user->name, 
                    "email"=> $user->email,
                    "password"=>"",
                ]);
                Social::where("user_id", '=', $authId)->update(["user"=>$id]);  
            }
            return $authId;
        }
    }
}