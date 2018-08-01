<?php
include 'inc/func.php';
if(class_exists($app[0])){
	$load = new $app[0]();
	if(method_exists($load,$app[1])){
		if(sym::allow_access()){
			if(!$app[2]){
				$load->$app[1]();
			}else{
				if(!$app[3]){
					$load->$app[1]($app[2]);
				}else{
					$load->$app[1]($app[2],$app[3]);
				}
			}
			include'inc/end.php'; 
		}else sym::dis_allow();
	}else{
		if(is_numeric($app[1])){
			$load->index($app[1]);
			include'inc/end.php'; 
		}else sym::notfound();
	}
}else sym::notfound();
?>
