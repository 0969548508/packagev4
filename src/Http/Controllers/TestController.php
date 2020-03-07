<?php 

namespace nnbao\Press\Http\Controllers;

use Illuminate\Routing\Controller;	

use nnbao\Press\Models\Post;

use nnbao\Press\Traits\LoadDataTrait;

class TestController extends Controller{
	use LoadDataTrait;
	public function index(){
		// $res = example_helper_func();
		// echo config('press.name');
		// $post = Post::all();
		// echo $res;
		// echo config('press.name');
		// echo "<br>";
		// echo config('nnbao.ten');
		// exit;
		// dd($post);
		// echo "in controller";
		// echo "<br/>";
		// echo trans('press::home.hello');
		$this->DemoTrait();
	}

	public function TestView(){

		// return view('press::master');
	}
}