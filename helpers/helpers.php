<?php 


if(!function_exists('example_helper_func')){
	function example_helper_func(){
		return 'demo function helper in package';
	} 
}

if(!function_exists('split_files_with_basename')){
	function split_files_with_basename(array $file, $suffix = '.php'){
		$result = [];
		foreach($file as $row){
			$basename = basename($row, $suffix);
			$result[$basename] = $row;

		}
		return $result;
	}
}