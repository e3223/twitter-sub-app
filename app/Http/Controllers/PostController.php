<?php

namespace App\Http\Controllers;

use Twitter;
//use File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postListCreateAll(Request $request)
	{
	if (isset($_POST['create'])){
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
        elseif (isset($_POST['delete'])){
            $list_id = $request->arr;
            Twitter::destroyList(['list_id' => $list_id]);
            $request->session()->flash('alert-success', 'List was successfully deleted ');
            return redirect('user-lists');  
        }
        }
        
        public function create_list(Request $request) {
            $list_name = $request->name;
            $list_mode = $request->public;
            $list_desc = $request->desc;
            Twitter::postList(['name' => $list_name, 'mode' => $list_mode, 'description'=> $list_desc]);
            $request->session()->flash('alert-success', 'New list was successfully created. ');
            return redirect('user-lists');
            
        }
    
}
