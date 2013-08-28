<?php

class Form{
	private $formName; //表名
	private $request;
	private $action;
	private $method;
	private $target;
	
	function __construct($formName, $request, $action, $method='get', $target="_self"){
		$this->formName = $formName;
		$this->request = $request;
		$this->action = $action;
		$this->method = $get;
		$this->target = $target;
		
	}
	
	function __toString(){
		$str = '<table border="1" width="600" align="center">';
		$str .= '<caption>'.$this->formName.'</caption>';
		$str .= '<form action='.$this->action.' method='.$this->method.' target='.$this->target.'>';
		
		switch ($_GET['action']){
			case 1:
				$str .= '<tr>';
				$str .='<td>矩形的宽:</td>';
				$str .='<td><input type="text" name="height" value='.$this->request["height"].'></td>';
				$str .= '</tr>';
				$str .= '<tr>';
				$str .='<td>矩形的高:</td>';
				$str .='<td><input type="text" name="width" value='.$this->request["height"].'></td>';
				$str .= '</tr>';
				break;
		}
		$str .= '<tr>';
		
		$str .= '</tr>';
		$str .= '<tr><td colspan="2"><input type="submit" value="计算"></td></tr>';
		$str.='<input type="hidden" name="act" value='.$this->request["action"].'>';    //隐藏表单
		$str.='<input type="hidden" name="action" value='.$this->request["action"].'>';  //隐藏表单

		$str .= '</form>';
		$str .= '<table>';
		return $str;
		
	}
	
}



?>