<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Followup\StoreRequest;
use App\Models\FollowUp;
use App\Models\User;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $follow_ups = FollowUp::paginate(10);

        return view('user.follow-ups.list',compact('follow_ups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereNot('id',auth()->id())->get();
    
        return view('user.follow-ups.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
       
        $validatedData['sender_user_id'] = auth()->id();

        FollowUp::create($validatedData);   

        return redirect()->route('user.follow-ups.index')->with('success', 'Follow-up created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $follow_up = FollowUp::find($id);

        $users = User::whereNot('id',auth()->id())->get();

        return view('user.follow-ups.edit', compact('follow_up', 'users')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $validatedData = $request->validated();

        FollowUp::find($id)->update($validatedData);

        return redirect()->route('user.follow-ups.index')->with('success', 'Follow-up updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $follow_up = FollowUp::find($id);

        $follow_up->delete();

        return redirect()->route('user.follow-ups.index')->with('success', 'Follow-up deleted successfully.');
    }
}
