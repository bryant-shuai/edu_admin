<?php
namespace controller;

class adm_comm_cate extends adm_controller
{

  function index(){
    $data = $_GET;
    $__type = $data['type'];
    $__name = \model\comm_cate::$CONF_NAME[$__type];
    // 企业大学导航
    if($__type == 1){
      $__nav_news = '';
      $__nav = "/adm_comm_cate/index?type=".\model\comm_cate::$CONF_TYPE['corp'];
    }
    // 企业通知导航
    if($__type == 2) {
      $__nav = '';
      $__nav_news = "/adm_comm_cate/index?type=".\model\comm_cate::$CONF_TYPE['news'];
    }
    include \view('adm_comm_cate__index');
  }


  // 获得论坛板块
  function get_cate_list() {
    $data = $_GET;
    $type = $data['type'];
    $company_id = $_SESSION['user']['company_id'];
    $ls = $this->di['CommCateService']->getCateList($company_id,$type);
    $this->data(['ls'=>$ls]);
    \vd($ls,'555');
  }

  

  // 添加模块
  function update_comm_cate() {
    $data = $_GET;
  	$company_id = $_SESSION['user']['company_id'];
    $title = $data['title'];
    $id = $data['id'];
    $type = $data['type'];
    if(empty($title)){
      \except(-1,'标题不能为空!');
    }
    if(empty($id)){
      $comm_cate = $this->di['CommCateService']->addCommCate($title,$type,$company_id);
    }else{
      $comm_cate = $this->di['CommCateService']->updateCommCate($id,$title,$type,$company_id);
    }
    $this->data(['ok']);
  }



  //删除模块
  function del_comm_cate(){
    $data = $_GET;
    $comm_cate = $this->di['CommCateService']->deleteCate($data['id']);
    $this->data(['ok']);
  }

  function delete_title() {
  	$data = $_GET;
  	$company_id = $_SESSION['user']['company_id'];
  	$type = $data['type'];
  	$delete = $this->di['CommCateService']->deleteCate($company_id,$type);
  	\vd($delete,'--------');
  }
}