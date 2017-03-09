<?php
class TestOfLogging extends AaaTest {
    // function setUp() {
    //   echo '<br>setUp1';
    //   $this->di = \app\di::get();
    // }
    
    // function tearDown() {
    //   echo '<br>tearDown'; 
    // }
    

    function testLogCreatesNewFileOnFirstMessage() {
        $this->assertTrue(true);
    }

    function testA() {
        $WxService = $this->di['WxService'];
        $r = $WxService->test();
        $this->assertEqual($r,'b');
    }

    function testShop() {
        // $WxService = $this->di['WxService'];
        $shop = \model\shop::getInstance(1);
        \vd($shop,'$shop');
        $shop = \model\shop::getInstance(1);
        \vd($shop,'$shop');
        $this->assertEqual($r,'b');
    }

}

