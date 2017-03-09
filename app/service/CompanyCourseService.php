<?php
namespace service;

class CompanyCourseService extends \app\service {

  // 获取公司已经购买的课程
  function getCourseList(&$count,$param=[]) {

    if(empty($param['page'])) $param['page'] = 1;
    if(empty($length['length'])) $param['length'] = 10;
    $company_id = $_SESSION['user']['company_id'];
    
    $courseIds = \model\company_course::finds(" where company_id =".$company_id,'course_id');
    $courseIds = \indexBy($courseIds,'course_id');
    $courseIds = array_keys($courseIds);
    // 查询course表
    $sql = '';
    if(!empty($param['key'])){
      $sql = " and name like '%".$param['key']."%'";
    }
    $course = \model\course::finds(" where deleted = 0  and id in (".implode(',',$courseIds).") ".$sql." ",'*',$count,$param);
    \vd($course,'课程');

    return $course;
  }

}
