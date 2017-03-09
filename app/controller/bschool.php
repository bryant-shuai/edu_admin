<?php
namespace controller;

class bschool extends \app\controller
{

  //企业大学导航
  function aj_nav_ls() {
    $ls = [
      ['txt'=> '职位', 'url'=> '/bschool/career' ],
      ['txt'=> '技能', 'url'=> '/bschool/skill' ],
      ['txt'=> '行业', 'url'=> '/bschool/industry' ],
      // ['txt'=> '专家库', 'url'=> '/bschool/expert' ],
    ];
    $this->data(['ls'=>$ls]);
  }


  function career() {
    // $__pageBgColor = '#FFF';

    $__id = '1';
    $__cates = [
      '基础岗位' => ["创业者","职场新手","基层员工","储备干部","主管","经理","总监","副总经理","董事长"],
      "人力资源" => ["人事专员","人事助理","招聘专员","绩效专员","薪资福利专员","员工关系专员","企业文化专员","培训专员","培训师","培训经理","人力资源经理","人力资源总监"],
      "行政管理" => ["前台","办公文员","行政助理","办公室助理","行政经理","总经理助理","行政总监","董事长秘书"],
      "生产管理" => ["品管员","仓管员","设备员","跟单员","生产助理","班组长","现场督导员","车间主任","设备主管","仓库主管","生产主管","物控经理","质量部经理","生产部经理","生产总监","厂长"],
      "市场营销" => ["销售代表","销售助理","电话营销员","外贸专员","迎宾员","导购员","客服专员","市场调查员","数据分析师","门店店长","电话营销经理","市场经理","销售经理","渠道经理","项目经理","大客户经理","外贸经理","客服经理","大客户总监","品牌经理","连锁运营总监","市场总监","营销总监",],
      "财务管理" => ["税务专员","出纳","会计专员","会计主管","财务主管","财务经理","财务总监",],
      "采购物流" => ["采购专员","物流专员","采购经理","物流经理",],
      "互联网" => ["电子商务员","网络营销员","网络推广","在线客服","SEO专员","微信专员","新媒体运营专员","网络运营专员","网站编辑","网站编辑主管","淘宝店长","电子商务经理","网络运营总监",],
    ];

    include \view("bschool__comm");

    // $__cates = \model\cate::getTree();
    // // echo "<pre>";
    // // print_r($__cates);
    // // echo "</pre>";
    // $__cates = $__cates["1"];
    // $__title = "职位";
    // // \var_dump($__cates);
    // include \view("bschool__career');
  }
  // 官方分类
  function skill_sort() {
    // $__pageBgColor = '#FFF';
    $__title = '技能分类';
    $__cates = [
      "人力资源",
      "财务管理",
      "互联网",
      "总裁课堂",
      "职业素质",
      "市场营销",
      "客户服务",
      "采购物流",
      "综合管理",
      "生产管理",
    ];
    include \view('bschool__skill_sort');
  }

  // function skill() {
  //   $__pageBgColor = '#FFF';

  //   $__id = '2';
  //   $__title = '技能';
  //   $__cates = [
  //     '咨询',
  //     '顾问',
  //     '客服',
  //     '艺术',
  //     '设计',
  //     '培训',
  //   ];

  //   include \view('bschool__comm');
  // }
  
  function industry() {
    $__pageBgColor = '#FFF';

    $__id = '3';

    $__title = '行业';
    $__cates = [
      '计算机',
      '制造',
      '贸易',
      '金融',
      '医疗',
      '媒体',
      '建筑',
      '教育',
      '服务业',
      '物流',
      '政府',
      '其他',
    ];

    include \view('bschool__comm');
  }
  
  function expert() {
    $__pageBgColor = '#FFF';

    $__id = '4';

    include \view('bschool__expert');
  }




}
