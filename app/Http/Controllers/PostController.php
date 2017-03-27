<?php

namespace App\Http\Controllers;

use Twitter;
//use File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postListCreateAll(Request $request)
	{
	
        $screen_name = $request->file('users');
        $list_id = $request->arr;
        
        $open_csv = fopen($screen_name,'r'); // file with users names
        $get_csv = fgetcsv($open_csv);
        $users = implode(",", $get_csv);
        
        Twitter::postListCreateAll(['list_id' => $list_id, 'screen_name'=> $users ]);
    	//$twitter = Twitter::postTweet($newTwitte);
        $request->session()->flash('alert-success', 'Users successfully added. ');
    	return redirect('user-lists');         
        }

}
