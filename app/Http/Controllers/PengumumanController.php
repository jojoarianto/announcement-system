<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class PengumumanController extends Controller
{

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $data['title'] = "OMVN 2018 Cabang SD";
        return view('index', $data);
    }

    /**
     * [getData description]
     * @return [type] [description]
     */
    public function getData()
    {
        $file_n =  base_path() . '/public/csv/data.csv';

    	$file = fopen($file_n, "r");
    	$users = new Collection;
        $ct = 1;
    	while ( ($data = fgetcsv($file, 2000, ";")) !==FALSE ){

    		/**
            No
            Nomer Peserta
            Nama Peserta
            Sekolah
            Region
            Nilai
            Status
    		 */
            
            $status = "TIDAK LOLOS";

            switch ($data[6]) {
                case 1:
                    $status = "LOLOS NASIONAL";
                    break;
                case 2:
                    $status = "LOLOS NASIONAL & JUARA REGION";
                    break;
                case 3:
                    $status = "JUARA REGION";
                    break;
                default:
                   $status = "TIDAK LOLOS";
            };

		    $users->push([
		    	$ct,
		    	$data[1],
		    	$data[2],
		    	$data[3],
		    	$data[4],
		    	$data[5],
		    	// ($data[6] == 1 ? "LOLOS" : "TIDAK LOLOS"),
                $status,
		    ]);

            $ct++;
		    
    	}
    	fclose($file);
    	
    	return Datatables::of($users)->make(true);
    }

}
