<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        Tag::create($request->all());
        return redirect('/');
    }
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'nome' => 'required'
        ]);
        $tag->update($request->all());
        return redirect('/');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
    }
}
