<?php

namespace App\Services;

use App\Models\JobModel;
use App\Models\ReportModel;
use App\Models\SolutionModel;

class JobStaffService{
    public function getData(){
        $data = ReportModel::where('status', 2)->get();
        return $data;
    }

    public function getSpecificData($id_solution){
        $data = SolutionModel::find($id_solution);
        return $data;
    }

    public function store($id_report, $data){
        try{
            SolutionModel::create([
                'keterangan' => $data->keterangan,
                'photo' => $data->photo,
                'report_id' => $id_report,
            ]);

            $report = ReportModel::find($id_report);
            $report->update([
                'status' => 3
            ]);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function update($data){
        try{
            $solution = SolutionModel::find($data->id_report);
            $solution->update([
                'keterangan' => $data->keterangan,
                'photo' => $data->photo
            ]);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function destroy($id_report){
        try{
            $solution = SolutionModel::find($id_report);
            $solution->delete();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
}
