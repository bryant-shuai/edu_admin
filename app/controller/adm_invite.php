<?php
namespace controller;

class adm_invite extends adm_controller
{
  function ls(){
    $__nav = "/adm_invite/ls";
    $company_id = $_SESSION['user']['company_id'];
    $ls = $this->di['MemberService']->getList($company_id);
    \vd($ls,'ls__');
    
    include \view('adm_invite__ls');
  }

  function vue(){    
    include \view('__header');
  }

  function aj_ls(){
    \vd($_SESSION['user']);
    $company_id = $_SESSION['user']['company_id'];

    $data = $_GET;

    if(empty($data['page'])) $data['page']=1;
    if(empty($data['length'])) $data['length']=10;

    $count = 0;

    $ls = $this->di['MemberService']->gets($count,
      [
        'company_id' => $company_id,
        'length' => $data['length'],
        'page' => $data['page'],
        'key' => $data['search'],
        // 'type' => 0,
      ]);
    \vd($count,'总计');

    $this->data([
      'count'=>$count,
      'ls'=>$ls,
      ]);
  }

  function aj_settype() {
    $data = $_GET;
    $oMember = \model\member::loadObj($data['id']);
    $oMember->data['type'] = $data['type'];
    $oMember->save();
    $this->data(['member'=>$oMember->data]);
  }


  // 取出所有评论
  
}
