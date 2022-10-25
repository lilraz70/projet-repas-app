etats ds
$datas = DB::table('region')->select(DB::raw('count(*) as region_count, idregion')) ->groupBy('idregion')->get();
        // dd($datas);
