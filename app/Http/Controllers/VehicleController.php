<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Vehicle;
use Illuminate\Http\Request;
use PDF;


use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class VehicleController extends Controller
{
    public function pdf_index() {
        $data = [ ];
        $pdf = PDF::loadView('test_pdf',$data);
        return $pdf->stream('test.pdf'); //แบบนี้จะ stream มา preview
        //return $pdf->download('test.pdf'); //แบบนี้จะดาวโหลดเลย
    }

    public function testmail($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        //$email = "chavalit.kow@gmail.com";
        $email = $vehicle->user->email;
        //หรือ ใช้ relationship เรียกจากตาราง user
        //$email = $article->user->email; 
         
        Mail::to($email)->send(new TestMail($vehicle));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $vehicle = Vehicle::where('brand', 'LIKE', "%$keyword%")
                ->orWhere('serie', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('year', 'LIKE', "%$keyword%")
                ->orWhere('mileage', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vehicle = Vehicle::latest()->paginate($perPage);
        }

        return view('vehicle.index', compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Vehicle::create($requestData);

        return redirect('vehicle')->with('flash_message', 'Vehicle added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return view('vehicle.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($requestData);
        
        //ส่งเมล์ไปหาเจ้าของรถเมื่อมีการอัพเดทข้อมูล
        $this->testmail($id);

        return redirect('vehicle')->with('flash_message', 'Vehicle updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Vehicle::destroy($id);

        return redirect('vehicle')->with('flash_message', 'Vehicle deleted!');
    }
}
