<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Templates;
use Illuminate\Http\Request;

class TemplatesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $mac = substr(exec('getmac'),0,17);
        $template = Templates::where('mac',$mac)->first();
        if(empty($template)){
            $new =new Templates();
            $new->mac = $mac;
            $new->editorassets = "";
            $new->editorcomponents = "";
            $new->editorcss = "";
            $new->editorhtml  = "";
            $new->editorstyles = "";
            $new->save();
            return $new;
        }
        return $template;
    }

    public function store(Request $request){

        $mac = substr(exec('getmac'),0,17);
        $check = Templates::where('mac',$mac)->first();
        if(!empty($check)){    
            $check->editorassets = $request->editorassets;
            $check->editorcomponents = $request->editorcomponents;
            $check->editorcss = $request->editorcss;
            $check->editorhtml  = $request->editorhtml;
            $check->editorstyles = $request->editorstyles;
            $check->save(); 
            return "Updated saved succesfully !!";

        }
        
        $new =new Templates();
        $new->mac = $mac;
        $new->editorassets = $request->editorassets;
        $new->editorcomponents = $request->editorcomponents;
        $new->editorcss = $request->editorcss;
        $new->editorhtml  = $request->editorhtml;
        $new->editorstyles = $request->editorstyles;
        $new->save();

        return "Data saved succesfully !!";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
