<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use App\Http\Services\ProfileService;
use App\Http\Requests\Profile\EditProfileRequest;
class MyProfileController extends Controller
{
    protected $ProfileServices;
    public function __construct(ProfileService $ProfileServices)
    {
        $this->ProfileServices = $ProfileServices;
    }
    public function my_profile(){
        return view('admin.main_adm.MyProfile.profile_adm', ['title' => 'My Profile']);
    }
    public function postedit_profile(Request $request){
        $result = $this->ProfileServices->update_profile($request);
        return redirect()->back();
    }
}
