<?php

namespace App\Http\Controllers;

use App\User;
use Twitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{

    public function postListCreateAll(Request $request)
    {
        if (isset($_POST['create'])) {
            $user = new User();
            $data = $request->all();
            if ($user->validate($data, User::$rulesOnUpload, User::$messages)){
            $screen_name = $request->file('users');
            $list_id     = $request->arr;
            $handle      = fopen($screen_name, 'r');
            $row         = 0;
            $col         = 0;
            if ($handle) {
                while (($row = fgetcsv($handle, 1000)) !== false) {
                    foreach ($row as $k => $value) {
                        $results[$col] = $value;
                    }
                    $col++;
                    unset($row);
                }
                fclose($handle);
            }
            $trim   = array_map('trim', $results);
            $result = array_values( array_filter($trim) );
            $data   = array_chunk($result, 100);
            $i      = 0;

            while ($i < count($data)) {
                $new = $data[$i];
                Twitter::postListCreateAll(['list_id' => $list_id, 'screen_name' => $new]);
                $i++;
            }
            
            $request->session()->flash('alert-success', 'Users successfully added. ');
            return redirect('user-lists');
         }else{
          $errors = $user->errors();
            return Redirect::back()
              ->withErrors($errors)
              ->withInput();
         }
         
         
            
         } elseif (isset($_POST['delete'])) {
            $list_id = $request->arr;
            Twitter::destroyList(['list_id' => $list_id]);
            $request->session()->flash('alert-success', 'List was successfully deleted ');
            return redirect('user-lists');
        }
    }

    public function create_list(Request $request)
    {
        $list_name = $request->name;
        $list_mode = $request->public;
        $list_desc = $request->desc;
        $data = $request->all();
        $user = new User();
        if ($user->validate($data, User::$rulesCreate, User::$messages)){
        Twitter::postList(['name' => $list_name, 'mode' => $list_mode, 'description' => $list_desc]);
        $request->session()->flash('alert-success', 'New list was successfully created. ');
            return redirect('user-lists');
            }
        else{
          $errors = $user->errors();
            return Redirect::back()
              ->withErrors($errors)
              ->withInput();
      }
    }
}