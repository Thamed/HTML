<?php

namespace Gallery\Http\Controllers;

use Gallery\Models\Status;
use Gallery\Models\User;
use Illuminate\Http\Request;
use Auth;
use Validator;

class StatusController extends Controller
{
    public function postStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        


        if ( $validator->fails() ) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        }else{
            dd('nope');
        }
        Auth::user()->statuses()->create([
            'body' => $request->input('status'),
            'image' => $imageName,
        ]);

        return redirect()
            ->route('home')
            ->with('info', 'Status posted.');
    }

    public function postReply(Request $request, $statusId)
    {
        $this->validate($request, [
            "reply-{$statusId}" => 'required|max:1000',
        ],[
            'required' => 'The reply body is required.'
        ]);

        $status= Status::notReply()->find($statusId);

        if(!$status){
            return redirect()->route('home');
        }

        if(!Auth::user()->isFriendsWith($status->user) && Auth::user()->id !== $status->user->id){
            return redirect()->route('home');
        }

        $reply = Status::create([
            'body' => $request->input("reply-{$statusId}")
        ])->user()->associate(Auth::user());

        $status->replies()->save($reply);

        return redirect()->back();
    }

    public function getLike($statusId)
    {
        $status = Status::find($statusId);

        if ( !$status ) {
            return redirect()->route('home');
        }

        if ( !Auth::user()->isFriendsWith($status->user) ) {
            return redirect()->route('home');
        }

        if ( Auth::user()->hasLikedStatus($status) ) {
            return redirect()->back();
        }

        $like = $status->likes()->create([]);
        Auth::user()->likes()->save($like);

        return redirect()->back();
    }
}
