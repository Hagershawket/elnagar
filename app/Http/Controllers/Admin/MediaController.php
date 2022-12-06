<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Auth;
use App\Models\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::active()->get();
        return view('admin.settings.Media.media',compact('medias'));
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
        try
        {
            $media = '';
            if ($request->has('media')) {
                $media = uploadImage('media', $request->media);
            }

            $video_link = '';
            if($request->video_link)
            {
                preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $request->video_link, $video_link);
            }
            Media::create([
                'media'       => $media,
                'video_link'  => $video_link[1],
                'type'        => 1,
                'user_id'     => Auth::user()->id,
                'is_active'   => 1,

            ]);

            Alert::success(' تم الاضافة بنجاح ');
            return redirect()->route('media.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('media.index');
        }
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
        try
        {
            $media = Media::where('id',$id)->first();

            if ($request->has('media')) {
                $media = uploadImage('media', $request->media);
                $media->update([
                    'media'       => $request->media,
                ]);
            }

            if($request->video_link)
            {
                preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $request->video_link, $video_link);
                $media->update([
                    'video_link'  => $video_link[1],
                ]);
            }

            Alert::success(' تم التعديل بنجاح ');
            return redirect()->route('media.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('media.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $media = Media::where('id',$id)->first();
            $media->update([
                'is_active'       => false,
            ]);

            Alert::success(' تم الحذف بنجاح ');
            return redirect()->route('media.index');
        } catch(\Exception $ex){
            Alert::error('حدث مشكلة ما برجاء المحاولة مرة اخرى');
            return redirect()->route('media.index');
        }
    }
}
