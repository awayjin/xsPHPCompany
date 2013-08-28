<?php
class Form{
	private $formName;
	private $request;
	private $action;
	private $method;
	private $target;
	
	//构造方法赋初值
	function __construct($formName, $request, $action='index.php', $method='get', $target='_self'){
		$this->formName = $formName;
		$this->request = $request;
		$this->action = $action;
		$this->method = $method;
		$this->target = $target;
	}
	
	//__toString类中的通用方法
	function __toString(){
		$str = '<table border="0" align="center" width="500">';
		$str .= '<caption>'.$this->formName.'</caption>';
		$str .='<form action='.$this->action.' method="'.$this->method.'" target="'.$this->target.'">';
			switch ($this->request['action']){
				case 1:
				  $str .= '<tr><th>矩形宽度</th>'; 
				  $str .= '<td><input type="text" name="width" value='.$this->request['width'].'>';
				  $str .='</td></tr>';	
				  $str .= '<tr><th>矩形高度</th> <td><input type="text" name="height" value='.$this->request['height'].'></td></tr>';	
				  break;
			}
		
		$str.='<tr><td align=center colspan=2><input type="submit" value="计算"></td></tr>';
		$str.='<input type="hidden" name="act" value='.$this->request["action"].'>';    //隐藏表单
		$str.='<input type="hidden" name="action" value='.$this->request["action"].'>';  //隐藏表单
		$str .='</form>';
		$str .= '</table>';
		return $str;
	}
	
	
}

?>