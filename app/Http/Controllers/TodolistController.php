<?php

namespace App\Http\Controllers;

use App\Events\NotifySent;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pusher-socket-io');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = $request->input('message');

        event(new NotifySent($message));

        return response()->json(['status' => 'Message sent!']);
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');

        event(new NotifySent($message));

        return response()->json(['status' => 'Message sent!']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
