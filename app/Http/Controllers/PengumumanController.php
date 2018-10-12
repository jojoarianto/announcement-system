<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class PengumumanController extends Controller
{

    /**
     * [getData description]
     * @return [type] [description]
     */
    public function getData()
    {
        $file_n =  base_path() . '/public/csv/data.csv';

    	$file = fopen($file_n, "r");
    	$users = new Collection;
    	while ( ($data = fgetcsv($file, 2000, ";")) !==FALSE ){

    		/**
    		 * 	Nomer 0
            	Nama Peserta 1
            	Nomer Peserta 2
            	Sekolah 3
            	Region 4
            	Nilai 5
            	Status 6
    		 */

		    $users->push([
		    	str_replace(" ", "", trim($data[0])),
		    	$data[1],
		    	$data[2],
		    	$data[3],
		    	$data[4],
		    	$data[5],
		    	($data[6] == 1 ? "LOLOS" : "TIDAK LOLOS"),
		    ]);
		    
    	}
    	fclose($file);
    	
    	return Datatables::of($users)->make(true);
    }

}
