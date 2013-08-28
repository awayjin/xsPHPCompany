<?php
header("Content-type:text/html; charset=utf-8");


/*
 *1.0 异常处理
 */

$f = 2; 
 
try{
	if($f == 1){
		echo "不会产生异常!";	
	}else if($f == 2){
		$error2 = "Always throw this error 222.";
		throw new Exception($error2);
		echo 'Never executed!'; //这里不会执行
	}else if($f == 3){
		$error3 = "test throw error 3";
		throw new Exception($error3);
	}
}catch(Exception $e2){
	echo "Caught Exception:".$e2->getMessage();
}


echo "<br> Hello Word!";

?>
<script>
/*
try{
  throw new Error('cc');
}catch(ex){
   console.log(ex.message);
}
*/
</script>