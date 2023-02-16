<?php

namespace App\Http\Controllers;

use App\Models\StudentImage;
use Illuminate\Http\Request;
use Storage;
class StudentImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $img = $request->image;
        $folderPath = "uploads/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        
        $data = new StudentImage();
        $data->student_name = $request->student_name;
        $data->student_image = $fileName;
        $data->save();

        dd('Image uploaded successfully: '.$fileName);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentImage  $studentImage
     * @return \Illuminate\Http\Response
     */
    public function show(StudentImage $studentImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentImage  $studentImage
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentImage $studentImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentImage  $studentImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentImage $studentImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentImage  $studentImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentImage $studentImage)
    {
        //
    }
}
