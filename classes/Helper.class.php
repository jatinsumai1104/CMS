<?php 

class Helper{
	public static function get_help($page){
		include_once(LAYOUT."{$page}.php");
	}
	public static function redirect($url){
		header("Location: {$url}");
	}
}

?>