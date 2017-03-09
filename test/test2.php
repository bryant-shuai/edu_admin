<?php
class Test2 extends AaaTest {
    // function setUp() {
    //   echo '<br>setUp2';
    //   $this->di = \app\di::get();
    // }
    
    // function tearDown() {
    //   echo '<br>tearDown'; 
    // }
    

    function testA() {
        // $WxService = $this->di['WxService'];
        $r = $WxService->test();
        $this->assertEqual($r,'b');
    }

}

