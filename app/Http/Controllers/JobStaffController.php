<?php

namespace App\Http\Controllers;

use App\Models\JobModel;
use App\Services\JobStaffService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JobStaffController extends Controller
{
    protected $jobservice;

    function __construct()
    {
        $this->jobservice = new JobStaffService;
    }

    public function index() : View
    {
        $data = $this->jobservice->getData();
        return view('StaffView.Index', ['data'=>$data]);
    }

    public function Edit($id):View
    {
        // $id = decryption($id);
        $data = $this->jobservice->getSpecificData($id);
        return View('StaffView.Edit');
    }

    public function create($id) : View
    {
        // $id = decryption($id);
        return View('StaffView.Form', ['data' => $id]);
    }

    public function Store(Request $request){
        // $id = decryption($id);
        $request->validate([
            'keterangan' => 'required',
            'photo' => 'required'
        ]);
        $result = $this->jobservice->store($request->report_id, $request);

        if($result){
            return redirect('/staffBoard');
        }else{
            // Tambahkan route jika error
            return redirect('/staffBoard');
        }
    }

    public function Update(Request $request){
        // $id = decryption($id)
        $request->validate([
            'keterangan' => 'required'
        ]);

        $result = $this->jobservice->update($request);

        if($result){
            return redirect('staffBoard.index');
        }else{
            // Taro Route jika tidak berhasil update
            return redirect('staffBoard.index');
        }
    }

    public function destroy($id){
        // $id = decryption($id);
        $result = $this->jobservice->destroy($id);

        if($result){
            return redirect('staffBoard.index');
        }else{
            // Taro Route jika tidak berhasil update
            return redirect('staffBoard.index');
        }
    }
}
