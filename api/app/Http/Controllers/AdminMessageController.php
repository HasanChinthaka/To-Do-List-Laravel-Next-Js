<?php

namespace App\Http\Controllers;

use App\Models\Admin_Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMessageController extends Controller
{
    public function index()
    {
        $users = User::where('user_role', 'user')->get();
        return view('adminmessages', compact('users'));
    }

    public function send_message(Request $request)
    {
        // dd($request);        

        // dd($user_ids);
        if ($request->is_users == 'on') {
            $user_ids = User::where('user_role', 'user')->pluck('id')->toArray();
        } else {
            $user_ids = $request->user_ids;
        }
        // dd($user_ids);
        foreach ($user_ids as $user_id) {
            $msg = new Admin_Message();
            $msg->admin_id = Auth::id();
            $msg->user_id = $user_id;
            $msg->title =  $request->msg_title;
            $msg->description =  $request->msg_description;
            // dd($msg);
            $msg->save();
        }

        return redirect()->route('dashboard')->with('success',  'Messages sent successfully');
        // dd($msg);
    }

    public function show_messages()
    {
        $messages = Admin_Message::where('user_id', Auth::id())->get();
        return  view('messages', compact('messages'));
    }

    public function read_message($id)
    {
        $message = Admin_Message::find($id);
        $message->is_read = 1;
        $message->save();
        return view('readmessage', compact('message'));
    }

    public function mark_as_all_read()
    {
        $messages = Admin_Message::where('user_id',Auth::id())->get();
        foreach ($messages as $message) {
            $message->is_read = 1;
            $message->save();
        }
        return redirect()->route('show_msgs');
    }
}
