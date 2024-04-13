<?php

namespace App\Http\Controllers;

use App\Models\LokasiModels;
use App\Models\ReportModel;
use App\Models\TagModels;
use App\Services\ReportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ReportingController extends Controller
{
    protected $reportservice;

    function __construct()
    {
        $this->reportservice = new ReportService;
    }

    public function index() : View
    {
        $data = $this->reportservice->getAll();
        return View('ReportView.Index', ['data' => $data]);
    }

    public function myReport() : View
    {
        $data = $this->reportservice->getSpecific(Auth::id());
        return View('ReportView.MyReport', ['data' => $data]);
    }

    public function create() : View
    {
        $lokasi = LokasiModels::all();
        $caption = TagModels::all();
        $data = [
            'lokasi' => $lokasi,
            'caption' => $caption,
        ];
        return View('ReportView.Form', ['data' => $data]);
    }

    public function voteReport($id)
    {
        // $id = decryption($id);
        $result = $this->reportservice->voteReport($id);

        if($result){
            return redirect()->route('report.home')->with('message', 'Vote terus ya biar bisa diliat sama petugas!');
        }else{
            return redirect()->route('report.home')->with('message', 'kesalahan saat vote');
        }

    }

    public function unvoteReport($id)
    {
        // $id = decryption($id);
        $result = $this->reportservice->unvoteReport($id);
        if($result){
            return redirect()->route('report.home')->with('message', 'Vote terus ya biar bisa diliat sama petugas!');
        }else{
            return redirect()->route('report.home')->with('message', 'kesalahan saat vote');
        }
    }

    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'photo' => 'required',
            'keterangan' => 'required',
            'lokasi_id' => 'required',
            'tag_id' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $check = $this->reportservice->checksame($request);

        if($check){
            return redirect()->back()->withInput()->with('showsame', 'true');
        }

        $result = $this->reportservice->store($request);
        // Buat route khusus handle error!!!!
        if($result){
            return redirect('/report');
        }else{
            return redirect('/report');
        }
    }

    public function edit($id) : View
    {
        // nanti tolong buat enkripsi nya, BIAR NGGA KECOLONGAN!
        // $id = decrypt($id);

        $data = ReportModel::find($id);
        if($data->status != 1){
            return redirect('/report');
        }

        $lokasi = LokasiModels::all();
        $caption = TagModels::all();
        return View('ReportView.Edit', ['data'=>$data, 'lokasis' => $lokasi, 'captions' => $caption]);
    }

    public function update(Request $request) : RedirectResponse
    {
        // $id = decryption($request->data_id);
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'photo' => 'required',
            'keterangan' => 'required',
            'lokasi_id' => 'required',
            'tag_id' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $result = $this->reportservice->update($request->data_id, $request);
        if($result){
            return redirect('/report');
        }else{
            return redirect('/report');
        }
    }

    public function destroy($id) : RedirectResponse
    {
        // $id = decrypt($id);
        $delete = $this->reportservice->destroy($id);
        try{
            $ReportModel = ReportModel::find($id);
            $ReportModel->delete();
            return redirect('/report');
        }catch(\Exception $e){
            // Tambahin error route disini!!!!
            return redirect('/report');
        }
    }
}
