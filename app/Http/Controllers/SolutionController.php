<?php

namespace App\Http\Controllers;

use App\Models\JobModel;
use App\Services\SolutionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SolutionController extends Controller
{
    protected $solutionservice;

    function __construct()
    {
        $this->solutionservice = new SolutionService;
    }

    public function index() : View
    {
        $data = $this->solutionservice->getData();
        return view('StaffView.Index', ['data'=>$data]);
    }

    public function Edit($id):View
    {
        // $id = decryption($id);
        $data = $this->solutionservice->getSpecificData($id);
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
        $result = $this->solutionservice->store($request->report_id, $request);

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

        $result = $this->solutionservice->update($request);

        if($result){
            return redirect('/staffBoard');
        }else{
            // Taro Route jika tidak berhasil update
            return redirect('/staffBoard');
        }
    }

    public function destroy($id){
        // $id = decryption($id);
        $result = $this->solutionservice->destroy($id);

        if($result){
            return redirect('/staffBoard');
        }else{
            // Taro Route jika tidak berhasil update
            return redirect('/staffBoard');
        }
    }
}
