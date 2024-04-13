<?php

use App\Models\ReportModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;

if(!function_exists("encryption")) {
    function encryption($id){
        return Crypt::encrypt(strval($id));
    }
}

if(!function_exists("decryption")){
    function decryption($id){
        return Crypt::decrypt(strval($id));
    }
}

if(!function_exists('check_reporting_edit')){
    function check_reporting_edit($id_data){
        $data = ReportModel::find($id_data);
        if($data['user_id'] != Auth::id()){
            return redirect('keluhan.home');
        }
    }
}
