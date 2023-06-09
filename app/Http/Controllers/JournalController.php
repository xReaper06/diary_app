<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $journals = $user->journals;
        return view('journal.index',compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('journal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'journaltitle' => 'required|string',
            'eventhappen' => 'required|date',
            'discriptions' => 'required|string'
        ]);
        $user = Auth::user();
        $user->journals()->create($validatedData);
        return back()->with('success','Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $journal = Journal::find($id);

        return view('journal.show', compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $journal = Journal::find($id);

        return view('journal.edit', compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'journaltitle' => 'required|string',
            'evenhappen' => 'required|date',
            'discriptions' => 'required|string'
        ]);

        $journal = Journal::find($id);
        $journal->update($request);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $journal = Journal::find($id);

    }
}
