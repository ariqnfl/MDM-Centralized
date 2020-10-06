<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class monitoring extends Controller
{
    public function monitor()
    {
        $data = DB::select("SELECT   a.id_lookup as ProcessLookup, b.table_name as ApplicationName, c.month as Times, a.total_notMatch, a.total_match FROM dim_fact_mdms a, dim_applications b, dim_times c WHERE b.id_app = a.id_app AND c.id_time = a.id_time");

        return response()->json($data);
    }

    public function showData()
    {
        $showData = DB::select("SELECT   a.id_lookup as ProcessLookup, b.table_name as ApplicationName, c.month as Times, a.total_notMatch, a.total_match FROM dim_fact_mdms a, dim_applications b, dim_times c WHERE b.id_app = a.id_app AND c.id_time = a.id_time");

        return view('chart')->with('data', json_encode($showData));
    }

    public function monitor_bmd()
    {
        $data_bmd = DB::select("SELECT   a.id_lookup as ProcessLookup, b.table_name as ApplicationName, c.month as Times, a.total_notMatch, a.total_match FROM dim_fact_mdms a, dim_applications b, dim_times c WHERE b.id_app = a.id_app AND c.id_time = a.id_time and b.table_name = 'ereg'");

        return response()->json($data_bmd);
    }

    public function showData_bmd()
    {
        $showData_bmd = DB::select("SELECT   a.id_lookup as ProcessLookup, b.table_name as ApplicationName, c.month as Times, a.total_notMatch, a.total_match FROM dim_fact_mdms a, dim_applications b, dim_times c WHERE b.id_app = a.id_app AND c.id_time = a.id_time and b.table_name = 'ereg'");

        return view('bmdtp.chart')->with('data', json_encode($showData_bmd));
    }

    public function monitor_ijepa()
    {
        $data_ijepa = DB::select("SELECT   a.id_lookup as ProcessLookup, b.table_name as ApplicationName, c.month as Times, a.total_notMatch, a.total_match FROM dim_fact_mdms a, dim_applications b, dim_times c WHERE b.id_app = a.id_app AND c.id_time = a.id_time and b.table_name = 'asrot'");

        return response()->json($data_ijepa);
    }

    public function monitor_lcgc()
    {
        $data_lcgc = DB::select("SELECT  a.id_lookup as ProcessLookup, b.table_name as ApplicationName, c.month as Times, a.total_notMatch, a.total_match FROM dim_fact_mdms a, dim_applications b, dim_times c WHERE b.id_app = a.id_app AND c.id_time = a.id_time and NOT b.table_name = 'ereg' and NOT b.table_name = 'asrot'");

        return response()->json($data_lcgc);
    }
}
