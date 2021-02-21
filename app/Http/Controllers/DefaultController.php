<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Client\Client;
use Session;

class DefaultController extends Controller
{
    /**
     * Load Default View
     * First Page of APP
     * OR
     * Render the post data
     * Process Ita
     */
    public function index(Request $request){

        if ($request->isMethod('post')){

            /** 
            * Validate request 
            */
            $request->validate([
                'csv' => 'required',
            ]);

            if($this->customValidate($request->csv)){
                /**
                * Process post data
                */
                if($output = $this->render($request)){
                    Session::flash('table', $output); 
                }
            }

            return redirect('/');
        }

        return view('default');
    }

    /**
     * Render csv data
     */
    public function render($request){
        $client = new Client('csv_process', $request->csv);
        return $client->process();
    }

    /**
    * Check csv format
    */
    public function customValidate($csv){
        return count(explode(',',$csv)) > 1? (count(explode(PHP_EOL,$csv)) > 1? true:false):false;
    }
}
