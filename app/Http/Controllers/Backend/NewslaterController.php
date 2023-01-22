<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\NewslaterRepository;

class NewslaterController extends Controller
{
    protected $newslater;

    public function __construct(NewslaterRepository $newslater)
    {
        $this->middleware('auth:admin');
        $this->newslater = $newslater;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newslaters = $this->newslater->index();
        return view('backend.newslaters.index', compact('newslaters'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->newslater->destroy($id);

        $notification = array(
            'message' => 'Mail Deleted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
