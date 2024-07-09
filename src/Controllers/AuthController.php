<?php
namespace Aman5537jains\AbnCmsAdminTheme\Controllers;

use App\Models\User;
use Aman5537jains\AbnCmsCRUD\AbnCmsBackendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;


class AuthController extends AbnCmsBackendController{


    public function getModel()
    {
        return User::class;
    }


    public function postAdminLogin(Request $request){

        try{

           $validator = Validator::make($request->all(), [
                   'email' => 'required|email',
                   'password' => 'required',
           ]);

           if($validator->fails()){
              return response()->json(['status'=>false,'message'=>$validator->errors()]);
           }else{

              $data = ['email' => $request->email, 'password' => $request->password];
              if(Auth::attempt($data)){
                $request->session()->regenerate();

                return redirect()->intended(route("AbnCmsAdminTheme-dashboard"));
              }else{
                $this->flash("Invalid Credentails","danger");
                return redirect()->back()->with("error","Invalid credentials");
              }

           }

        }catch(\Exception $e){
         dd($e);

            return redirect()->back()->with("error","Invalid credentials");

        }
     }


     public function getAdminLogout(){

        Auth::logout();
        return redirect()->route('admin-login');
     }

     public function changePassword(){
        $this->theme ="AbnCmsAdminTheme::";
        $this->view ="";
        return $this->view("change-password");
     }
     public function updatePassword(Request $request){
        try{

           $validator = Validator::make($request->all(), [
                   'old_password' => 'required',
                   'new_password' => 'required|min:5|max:15',
                   'confirm_password' => 'required|same:new_password|',
           ]);

           if($validator->fails()){
              return redirect()->back()->withErrors($validator->errors());
           }else{

                $admin_id = Auth::guard('web')->user()->id;

                $user =  User::whereId($admin_id)->first();


                if (Hash::check($request->get('old_password'), $user->password))
                {

                    $user->password = Hash::make($request->get('new_password'));
                    $user->save();
                    Session::flash('success', 'Password updated successfully');
                    return redirect()->route('dashboard');
                }
                else
                {
                    Session::flash('warning', 'Wrong old password');
                    return redirect()->back();
                }



           }

        }catch(\Exception $e){
             $msg = $e->getMessage();

            dd($msg);
            return redirect()->back()->with("error",$msg );

        }
     }
}
