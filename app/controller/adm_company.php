<?php
namespace controller;

class adm_company extends \app\controller
{
	// 修改企业行业信息
	function index(){
    $__nav = "/adm_company/index";
		$company_id = $_SESSION['user']['company_id'];
    \vd($company_id,'33333');
		$oCompany = \model\company::loadObj($company_id);
    $__company = $oCompany->data;
    $__industry = '';
    if (!empty($__company['industry'])) {
      $industry = \de($__company['industry']);
      foreach ($industry as &$v) {
        $__industry[$v] = $v;
      }
      $__industry = \en($__industry);
    }
    \vd($__industry,'行业');

		include \view('adm_company__index');
	}

  // 添加行业标签
  function add_tag_of_industry() {
    $data = $_GET;
    $company_id = $data['company_id'];
    $tag_name = $data['tag'];
    $oCompany = \model\company::loadObj($company_id);
    $industry = array_keys($data['tag']);
    $oCompany->data['industry'] = \en($industry);
    $oCompany->save();
    $this->data(['ok']);
  }

  // 删除指定行业标签
  function delete_tag_of_industry() {
    $data = $_GET;
    $company_id = $data['company_id'];
    $oCompany = \model\company::loadObj($company_id);
    \vd($data['tag'],'标签');
    if (!empty($data['tag'])) {
      $industry = array_keys($data['tag']);
      $oCompany->data['industry'] = \en($industry);
    }else{
      $oCompany->data['industry'] = $data['tag'];
    }
    $oCompany->save();
    $this->data(['ok']);
  }

  // 创建公司
    // 创建公司
  function establish(){
    $__nav = '/adm_company/establish';
    include \view('adm_company__establish');
  }
  // 创建公司
  function aj_add_establish(){
    $data = $_GET;
    $company = \model\company::finds("WHERE name='".$data['name']."'");
    if (!empty($company)) {
      \except(-1,'公司已存在');
    }
    $member = \model\member::finds("WHERE phone='".$data['phone']."'");
    if (!empty($member)) {
      \except(-1,'账号已存在');
    }
    $newcompany = new \model\company;
    $newcompany->data=[
      'name' => $data['name'],
      'manager_name' => $data['manager_name'],
      'create_at'=> \datetime(),
    ];
    $newcompany->save();
    $oCompany = \model\company::loadObj($data['name'],'name');
    $id = $oCompany->data['id'];
    \vd($id,'####');
    $newmember = new \model\member;
    $newmember->data=[
      'company_id' => $id,
      'phone' => $data['phone'],
      'name' => $data['manager_name'],
      'passwd' => $data['passwd'],
      'real_name'=>$data['manager_real_name'],
      'type' => 2,
    ];
    $newmember->save();
    $this->data(['ok']);
  }





}
