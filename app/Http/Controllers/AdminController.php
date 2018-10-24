<?php

namespace App\Http\Controllers;

use App\Model\Ad;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $user = Auth::user();
        $ads=Ad::where('admin_id',$user->id)->get();
        return view('Ads.all')->with(["ads" => $ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('Ads.add');
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
        $validator = Validator::make($request->all(), [
            'body' => 'required|max:255',
            'video' => 'required|max:80000|mimes:mp4,mov,ogg',
        ]);

        if ($validator->fails()) {

            return redirect('/admin/add')
                ->withErrors($validator)
                ->withInput();
        }

        $user=Auth::user();
        $ad = new Ad();
        $ad->Admin()->associate($user);
        $upload_video=$request->file('video');
        $video = time().'.'.$upload_video->getClientOriginalExtension();
        $ad->body = $request->body;


        $ad->viedo = $video;
        $upload_video->move(public_path('video'), $video);

        $ad->save();

        return redirect()->route('admin' , [
                "message" => "Add Successfully",
                "class" => "success"
            ]
        );

    }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ad= Ad::findOrFail($id);
        return View('Ads.edit')->with('ad',$ad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Merchant\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validator = Validator::make($request->all(), [
            'body' => 'required|max:255',
        ]);

        if ($validator->fails()) {

            return redirect('/admin/add')
                ->withErrors($validator)
                ->withInput();
        }

        $ad = Ad::findOrFail($id);
        if ($request->hasFile('video')) {


            $upload_video = $request->file('video');

            $video = time() . '.' . $upload_video->getClientOriginalExtension();

            $ad->viedo = $video;
            $upload_video->move(public_path('video'), $video);
        }
        $ad->body = $request->body;
        $ad->save();

        return redirect()->route('admin' , [
                "message" => "Updated Successfully",
                "class" => "warning"
            ]
        );

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
        $ad= Ad::findOrFail($id);

        $video=$ad->viedo;
        File::delete(public_path('video'). '\\' . $video);

        $ad->delete();
        return response()->json([
            'error' => 'false'
        ],200);
    }
}
