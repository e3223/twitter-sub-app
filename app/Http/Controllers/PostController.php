<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postListCreateAll($parameters = [])
	{
		if (!array_key_exists('list_id', $parameters) && !array_key_exists('slug', $parameters))
		{
			throw new Exception('Parameter required missing : list_id or slug');
		}

		return $this->post('lists/members/create_all', $parameters);
	}
}
