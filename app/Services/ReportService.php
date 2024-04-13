<?php

namespace App\Services;

use App\Models\FotoReportModel;
use App\Models\ReportModel;
use Illuminate\Support\Facades\Auth;

class ReportService{
    public function getAll(){
        $data = ReportModel::orderBy('vote', 'desc')->get();
        return $data;
    }

    public function getSpecific($id_user){
        $data = ReportModel::where('user_id', $id_user)->get();

        return $data;
    }

    public function checksame($data){
        $check = ReportModel::where('lokasi_id', $data->lokasi_id)->where('tag_id', $data->tag_id)->count();
        if($check > 0) {
            return true;
        }
        return false;
    }

    public function store($data){
        try{
            $result = ReportModel::create([
                'judul' => $data->judul,
                'keterangan' => $data->keterangan,
                'lokasi_id' => $data->lokasi_id,
                'tag_id' => $data->tag_id,
                'user_id' => Auth::id(),
                'photo' => $data->photo,
                'status' => 1,
                'vote' => 0
            ]);

            $photo = FotoReportModel::create([
                'nama' => $data->photo,
                'report_id' => $result->id
            ]);

            return true;
        }catch(\Exception $e){
            return false;
        }

    }

    public function update($id_data, $data){
        $ReportModel = ReportModel::find($id_data);
        // $find = FotoReportModel::where('report_id', $id_data)->get();
        // $id = $find->id;
        if($data->photo == '' || $data->photo == null){
            $data->photo = $ReportModel->photo;
        }

        $ReportModel->update([
            'judul' => $data->judul,
            'keterangan' => $data->keterangan,
            'lokasi_id' => $data->lokasi_id,
            'tag_id' => $data->tag_id,
            'photo' => $data->photo
        ]);

        return true;
        try{
        }catch(\Exception $e){
            return false;
        }
    }

    public function destroy($id_data){
        try{
            $ReportModel = ReportModel::find($id_data);
            $ReportModel->delete();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function VoteReport($id){
        try{
            $report = ReportModel::find($id);
            $report->like();

            $report->update([
                'vote' => $report->likeCount
            ]);

            $report->save();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function UnvoteReport($id){
        try{
            $report = ReportModel::find($id);
            $report->unlike();

            $report->update([
                'vote' => $report->likeCount
            ]);

            $report->save();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
}
