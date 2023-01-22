<?php

namespace App\Repositories;

use App\Models\Newslater;

class NewslaterRepository
{
    public function index()
    {
        return Newslater::select('id', 'email')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }
    public function store($request)
    {
        $newslater = new Newslater();

        $newslater->email = $request->email;
        $newslater->save();
    }
    public function destroy($id)
    {
        $newslater = Newslater::find($id);
        $newslater->delete();
    }
}
