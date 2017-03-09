<?php
namespace controller;

class task extends \app\controller
{

  function aj_all() {
    
    $__tasks = [];
    $userid = $_SESSION['edu_user']['id'];
    // 获取任务
    // $__tasks_res = $this->di['CompanyTaskService']->getTasksResultsByTaskIds($userid);
    
    $__tasks = $this->di['CompanyTaskService']->getAllTasksSorted($userid);

    if (empty($__tasks)) {
      $__tasks = [];
    }
    \vd($__tasks,'所有的任务');
    $this->data([
      'ls' => $__tasks['sorted'],
    ]);

  }



  // 获取用户任务列表
  function index() {

    // 获取已经完成的任务
    // 测试使用
    // $id = 109;
    $__tasks = [];
    $id = $_SESSION['edu_user']['id'];
    \vd($id,'任务');
    // $id = 88;
    $__done_task = $this->di['CompanyTaskService']->getTasksAlreadyDone($id);
    if (!empty($__done_task)) {
      $__done_task = \indexBy($__done_task,'task_id');
    }
    \vd($__done_task,'已经完成的任务');

    // // 获取尚未完成的任务
    // $doing_task = $this->di['CompanyTaskService']->getTasks($id);
    // \vd($doing_task,'所有任务');

    // 获取尚未完成的任务
    $__tasks = $this->di['CompanyTaskService']->getAllTasks($id);
    if (empty($__tasks)) {
      $__tasks = [];
    }
    \vd($__tasks,'所有的任务');

    include \view('task__index');
  }








  // function aj_done() {
  //   $__tasks = [];
  //   $id = $_SESSION['edu_user']['id'];
  //   \vd($id,'任务');
  //   // $id = 88;
  //   $__done_task = $this->di['CompanyTaskService']->getTasksAlreadyDone($id);
  //   if (!empty($__done_task)) {
  //     $__done_task = \indexBy($__done_task,'task_id');
  //   }
  //   \vd($__done_task,'已经完成的任务');
  //   $this->data([
  //     'ls' => $__done_task,
  //   ]);
  // }

  // function aj_ing() {
  //   $__tasks = [];
  //   $id = $_SESSION['edu_user']['id'];

  //   $taskIds = $this->di['CompanyTaskService']->getTaskAllIds($id);
  //   \vd($taskIds,'$taskIds');

  //   // 获取尚未完成的任务
  //   $__tasks = $this->di['CompanyTaskService']->getTasksInProcess($id);
  //   if (empty($__tasks)) {
  //     $__tasks = [];
  //   }
  //   \vd($__tasks,'进行中的任务');
  //   $this->data([
  //     'ls' => $__tasks,
  //   ]);

  // }


}
