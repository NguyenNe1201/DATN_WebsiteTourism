<?php

namespace App\Http\Services;

class Upload_imgService
{
    public function index($request)
    {   
        // add img blog main
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/';
                $request->file('file')->storeAs('public/' . $pathFull, $name);
                return '/storage/' . $pathFull . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
        // add img tour
        if ($request->hasFile('filetour')) {
            try {
                $name = $request->file('filetour')->getClientOriginalName();
                $pathFull = 'uploads/';
                $request->file('filetour')->storeAs('public/' . $pathFull, $name);
                return '/storage/' . $pathFull . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
         // add img avatar profile
         if ($request->hasFile('file_profile')) {
            try {
                $name = $request->file('file_profile')->getClientOriginalName();
                $pathFull = 'uploads/';
                $request->file('file_profile')->storeAs('public/' . $pathFull, $name);
                return '/storage/' . $pathFull . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
         // add img avatar add customer 
         if ($request->hasFile('file_avt_cus')) {
            try {
                $name = $request->file('file_avt_cus')->getClientOriginalName();
                $pathFull = 'uploads/';
                $request->file('file_avt_cus')->storeAs('public/' . $pathFull, $name);
                return '/storage/' . $pathFull . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
    }
}
