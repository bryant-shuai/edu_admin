<?php
namespace controller;

class adm_member extends adm_controller
{
	function ls(){
		$company_id = $_SESSION['user']['company_id'];
		$ls = $this->di['MemberService']->getList($company_id);
		\vd($ls,'ls__');
		$this->data(['ls'=>$ls]);
	}
}