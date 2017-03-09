<?php
namespace service;

class MemberService extends \app\service
{

  // 不传参数的时候，给个默认值
	function getList($companyId_,$key = null, $type_=NULL){
    // $type = \model\member::$CONF_TYPE['STAFF'];
    $sql = '';
    $count = 0;
    if(!empty($key)){
      $sql=" and name like '%".$key."%'";
    }
    $sqlAdd = '';

    $members = \model\member::finds("where company_id='".$companyId_."' and deleted=0 ".$sqlAdd."  ".$sql." ");
    return $members;
  }


  // //获取列表
  // function getStaffList() {
  // }


  //获取列表
  function checkLoginStatus() {
    if( empty($_SESSION['edu_user']) || empty($_SESSION['edu_user']['id']) ){
      \except(-1,'need login');
    }
  }


  //获取列表
  function gets(&$count=null,$param=[]) {
    $sqladd = ' deleted = 0 ';

    \vd($param);

    $type = null;
    if( isset($param['type']) ){
      $type = (int)$param['type'];
      $sqladd .= " and type='".$type."' ";
    }

    $company_id = null;
    if( isset($param['company_id']) ){
      $company_id = (int)$param['company_id'];
      $sqladd .= " and company_id='".$company_id."' ";
    }

    $key = null;
    if(!empty($param['key'])){
      $key = $param['key'];
      $sqladd .= " and (real_name like '%".$key."%' or name like '%".$key."%' or phone like '%".$key."%' )";
    }

    $order = 'id desc';
    if($param['order']){
      $order = $param['order'];
    }

    $ls = \model\member::finds("where  ".$sqladd." order by ".$order."",'*',$count,$param);

    return $ls;
  }

  

  
}