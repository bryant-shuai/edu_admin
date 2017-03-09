<?php
namespace controller;
// 继承管理后台的controller
class adm_news extends adm_controller
{


  function index(){
    require \view('adm_news__index');
  }

  // 获得某一标题下的内容
  function get_news_list() {
    $data = $_GET;
    // wb_comm_cate id
    $cateid = $data['id'];
    $news = $this->di['NewsService']->getNewsByCateId($cateid);
    $this->data(['ls' => $news]);
  }

  // 修改某一个news的title和content的页面
  function adm_news_detail() {
    $data = $_GET;
    $__type = $data['type']; 
    // news id
    $__how = '添加';
    // $__cateId = $data['cate_id'];
    if (!empty($data['id'])) {
      $__how = '修改';
      $oNews = \model\news::loadObj($data['id']);
    }else{
      $__news = null;
    }
    // 获取news的数据信息
    $__news = $oNews->data;
    \vd($__news,'newsnewsnewsnewsnews');
    include \view('adm_news_detail');
  }

  // 保存修改
  function aj_news_save() {
    // $_POST = $_GET;
    $data = $_POST;
    $type = $data['type'];
    if (!empty($data['id'])) {
      $oNews = \model\news::loadObj($data['id']);
    }else{
      // 添加新news标题
      $oNews = new \model\news;
    }
    if (empty($data['title'])) {
      \except(\CODE::标题为空);
    }

    $oNews->data['title'] = $data['title'];
    $oNews->data['cate_id'] = $data['cate_id'];
    $oNews->data['content'] = $data['content'];
    $oNews->data['member_id'] = $_SESSION['user']['id'];
    $oNews->data['company_id'] = $_SESSION['user']['company_id'];
    $oNews->data['update_at'] = \datetime();
    if(!empty($type)){
      $oNews->data['type'] = $type;
    }
    $oNews->save();
    $this->data(['ok']);
  }


  // 获取最新问答或者论坛
  function get_topics() {
    $data = $_GET;
    $count = 0;
    $page = 1;
    $length = 50;
    $key = $data['search'];
    $company_id = $_SESSION['user']['company_id'];

    if(!empty($key)){
      $search = " and title like '%".$key."%'";
    }
    if ($data['page']) {
      $page = $data['page'];
    }
    if ($data['length']) {
      $length = $data['length'];
    }
    // 获取cateIds
    $type = $data['type'];
    \vd($type,'类型');
    // 精选
    $how = $data['how'];
    \vd($how,'2222');
    if (empty($how)) {
      $sql = " ORDER BY create_at DESC";
    }

    $how = $data['how'];
    if (empty($how)) {
      $sql = " ORDER BY create_at DESC";
    }
    // 热点
    if ('hotnews' == $how) {
      $sql = "  and sort_order > 0 ORDER BY sort_order DESC";
    }
    // 未回复
    if ('unreply' == $how) {
      $add_sql = " and reply_count = 0 ORDER BY create_at DESC" ;
    }


    $cateIds = $this->di['NewsService']->getCateIds($type);

    $sub_count = $this->di['NewsService']->getReplyCount($type);
    \vd($sub_count,'计数');

    $cateIds[] = 0; 
    \vd($cateIds,'分类');
    // 获取列别下的具体内容
    if ($type == \model\comm_cate::$CONF_TYPE['corp']) {
      $news = \model\news::finds(" where cate_id in (".implode(',', $cateIds).") and company_id='".$company_id."'".$search." and type = ".\model\news::$CONF_TYPE['BBS']. $sql,'*',$count,['length'=>$length,'page'=>$page]);

      \vd($news,'论坛');

    }
    // 问答
    if ($type == \model\comm_cate::$CONF_TYPE['ask']) {
      $cateIds[] = 1; 
       $news = \model\news::finds(" where cate_id in (".implode(',', $cateIds).") and company_id='".$company_id."'".$search." and type = ".\model\news::$CONF_TYPE['ASK']. $sql,'*',$count,['length'=>$length,'page'=>$page]);
      \vd($news,'问答');
    }
    
    $this->di['ToolService']->setMemberInfo($news,['name'=>'nick_name']);
    $this->data([
        'ls'=>$news,
        'sub_count'=>$sub_count,
        'count' =>$count,
        'page'=>$page,
        'length'=>$length,
    ]);

  }

  function set_news_level(){
    $data = $_GET;
    $id = $data['id'];
    $sort_order = $data['sort_order'];
    $oNews = \model\news::loadObj($id);
    $oNews->data['sort_order'] = $sort_order;
    $oNews->save();
    $this->data(['ok']);
  }

  function cancel_news_level(){
    $data = $_GET;
    $id = $data['id'];
    $oNews = \model\news::loadObj($id);
    $oNews->data['sort_order'] = 0;
    $oNews->save();
    $this->data(['ok']);
  }


  function delete_news(){
    $data = $_GET;
    $id = $data['id'];
    \model\news::deleteById($id);
    $this->data(['ok']);
  }


  
  






















}
