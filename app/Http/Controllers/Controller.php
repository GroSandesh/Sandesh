<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function writeFile($message){
        $user = Auth::user();
        if(empty($user['fname'])){
            $user = 'Admin';
        }else {
            $user = $user['fname'];
        }

        $message=date('H:i A').' ('.$user.')'."\t\t".$message;
        $date=date('Y-m-d');
        if (is_file(public_path('assets/logfiles/'.$date.'.txt'))) {
            $myfile = fopen(public_path('assets/logfiles/'.$date.'.txt'), 'a');
            fwrite($myfile, $message."\n");
            fclose($myfile);
        }else{
            $myfile = fopen(public_path('assets/logfiles/'.$date.'.txt'), "w");
            fwrite($myfile, $message."\n");
            fclose($myfile);
        }
    }

}
