<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;

class DeviceController extends Controller
{
    //Get Method 
    function list($id = null)
    {
        return $id ? Device::find($id) : Device::all();
    }

    function add(REQUEST $req)
    {

        $device = new Device;
        //add name request
        $device->name = $req->name;
        $result = $device->save();
        if ($result) {
            return ["Result" => "Data has been Saved"];
        } else {
            return ["Result" => "Operation Failed"];
        }
    }

    // Put Method

    public function update(Request $req)
    {
        $device = Device::find($req->id);
        $device->name = $req->name;
        $result = $device->save();
        if ($result) {
            return ["result" => "Data is Updated"];
        } else {
            return ["result" => "Data is Not Updated"];
        }
    }

    ///Search Method

    public function search($name)
    {

        return Device::where("name","like","%".$name."%")->get();

    }

    public function delete($id)
    {

        $device = Device::find($id);
        $result=$device->delete();
if ($result) {
    return ["result"=>"Record Has been deleted = " . $id ];
}else{
    return ["result"=>"Record Has been Not Deleted  "] ;
}
    }
}
