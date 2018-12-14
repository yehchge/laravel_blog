<?php

namespace App\Http\Controllers;

use App\Dict;
use Illuminate\Http\Request;

class DictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dicts = Dict::latest()->paginate(5);

        return view('dicts.index', compact('dicts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dicts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'eng' => 'required',
            'zhtw' => 'required',
        ]);

        Dict::create($request->all());

        return redirect()->route('dicts.index')
            ->with('success', 'Dict created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dict  $dict
     * @return \Illuminate\Http\Response
     */
    public function show(Dict $dict)
    {
        return view('dicts.show', compact('dict'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dict  $dict
     * @return \Illuminate\Http\Response
     */
    public function edit(Dict $dict)
    {
        return view('dicts.edit', compact('dict'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dict  $dict
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dict $dict)
    {
        $request->validate([
            'eng' => 'required',
            'zhtw' => 'required',
        ]);

        $dict->update($request->all());

        return redirect()->route('dicts.index')
            ->with('success', 'Dict updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dict  $dict
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dict $dict)
    {
        $dict->delete();

        return redirect()->route('dicts.index')
            ->with('success', 'Dict deleted successfully.');
    }
}
