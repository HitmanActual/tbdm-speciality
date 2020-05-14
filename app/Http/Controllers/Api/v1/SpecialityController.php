<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Speciality;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class SpecialityController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of Specialities
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $specialities = Speciality::all();
        
        return $this->successResponse($specialities);
      
    }

    /**
     * Create one new Speciality
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

            'speciality'=>'required',
         
        ]);
       
        $speciality = Speciality::create($request->all());          
        return $this->successResponse($speciality,Response::HTTP_CREATED);
       
    }

    /**
     * get one Speciality
     *
     * @return Illuminate\Http\Response
     */
    public function show($speciality)
    {
        //

        $speciality = Speciality::findOrFail($speciality);
        return $this->successResponse($speciality);
        
    }

    /**
     * update an existing one Speciality
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$speciality)
    {

        $this->validate($request,[
            'speciality'=>'required',
        ]);
        $speciality = Speciality::findOrFail($speciality);
        $speciality->fill($request->all());

        
        if($speciality->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $speciality->save();
        return $this->successResponse($speciality);
    }

     /**
     * remove an existing one Speciality
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($speciality)
    {
        $speciality = Speciality::findOrFail($speciality);
        $speciality->delete();
        return $this->successResponse($speciality);
      
    }

}
