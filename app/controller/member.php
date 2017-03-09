<?php
namespace controller;

class member extends \app\controller {


  // 修改个人签名
  function modify_my_info() {
    $data = $_GET;
    $real_name = $data['real_name'];
    $name = $data['name'];
    // 签名
    $desc = $data['desc'];

    $id = $_SESSION['edu_user']['id'];
    $oMember = \model\member::loadObj($id);
    $oMember->data['real_name'] = $data['real_name'];
    if ($oMember->data['name'] != $name) {
      $member = \model\member::find(" where name = '".$data['name']."' and company_id = ".$_SESSION['edu_user']['company_id']);
      if (count($member)>1) {
        $this->error(-1,'该昵称已被占用');
        return;
      }
    }
    $oMember->data['name'] = $data['name'];
    $oMember->data['desc'] = $data['desc'];
    $oMember->save();
    $this->data($oMember->data);
  }
}
