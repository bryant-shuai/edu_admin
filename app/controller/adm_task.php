<?php
namespace controller;

class adm_task extends adm_controller
{

  function index(){
    $__nav = "/adm_task/index";
    $data = $_GET;
    $__type = $data['type'];
    include \view('adm_task__index');
  }

  function add(){
    include \view('adm_task__add');
  }

  function search(){
    $data = $_GET;
    $key = $data['key'];
    $type = $data['type'];
    if('课程'==$type){
      
    }else if('帖子'==$type){
      
    }else if('回复'==$type){
      
    }
  }

  function aj_ls(){
    \vd($_SESSION['user']);
    $company_id = $_SESSION['user']['company_id'];

    $data = $_GET;

    $key = $data['search'];

    if(empty($data['page'])) $data['page']=1;
    if(empty($data['length'])) $data['length']=10;

    $count = 'auto';

    $sql = '';

    if( !empty($key) ){
      $sql = " and title like '%".$key."%'";
    }

    $where = " WHERE deleted=0 and company_id='".$company_id."' ".$sql." ORDER BY id desc";

    

    $ls = \model\company_task::finds($where
      , '*'
      , $count
      , [
        'length' => $_GET['length'], 
        'page' => $_GET['page'],
      ]);
    
    $result = [
      'page' => $_GET['page'], 
      'count' => $count,
      'length' => $_GET['length'],
      'ls' => $ls,
    ];
    
    $this->data($result);
  }


  // 创建公司新任务主题
  function set_company_task() {
    $data = $_GET;
    $this->di['CompanyTaskService']->setCompanyTask($data);
    $this->data(true);
  }

  // 删除公司某一个任务
  function delete_company_task() {
    $data = $_GET;
    // 获得任务Id
    $oCompanyTask = \model\company_task::loadObj($data['id']);
    $oCompanyTask->data['deleted'] = 1;
    $oCompanyTask->save();
    $this->data(true);
  }

 




}