<?php
namespace controller;

class qiniu extends \app\controller
{
  function token(){
    $token = $this->di['QiniuService']->getToken();
    echo '{"uptoken":"'.$token.'"}';
  }

}