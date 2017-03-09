<?php
namespace service;

class ToolService extends \app\service {

  function parseUser($ls){
    $userIds = \pickBy($ls,'user_id');
    // print_r($userIds);
    // foreach ($ls as $k => $v) {
    //   if(!empty($v['course_id'])){
    //     $ids[''.$v['course_id']] = $v['course_id'];
    //   }
    // }
    $users = \model\user::findByIds($userIds,'id,name,avatar','id');
    // print_r($users);
    return $users;
  }

  function parseMember($ls){
    // \_vd($ls);
    $userIds = \pickBy($ls,'member_id');
    // print_r($userIds);
    $users = \model\user::findByIds($userIds,'id,name,avatar','id');
    // print_r($users);
    return $users;
  }

  function setMemberInfo(&$ls,$keys=['name'=>'nick_name','real_name'=>'real_name']){
    // \_vd($ls);
    $userIds = \pickBy($ls,'member_id');
    // print_r($userIds);
    $users = \model\user::findByIds($userIds,'id,name,avatar','id');
    // print_r($users);
    if(!empty($ls)){
      foreach ($ls as $key => &$v) {
        if( !empty($users[$v['member_id']]) && !empty($users[$v['member_id']]['avatar']) ){
          $v['avatar'] = $users[$v['member_id']]['avatar']; 
        }else{
          $v['avatar'] = '/app/noavatar_big.gif'; 
        }
        foreach ($keys as $k => $v2) {
          $v[$v2] = $users[$v['member_id']][$k];
        }
      } 
    }else{
      $ls = [];
    }

  }

}
