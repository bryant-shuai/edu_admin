<?php
class TestMember extends AaaTest {
    // function setUp() {
    //   echo '<br>setUp2';
    //   $this->di = \app\di::get();
    // }
    
    // function tearDown() {
    //   echo '<br>tearDown'; 
    // }
    

    function testCreateMember() {
        $WxService = $this->di['WxService'];

        $r = $WxService->createMember('2');
        $this->assertTrue($r>0);


        $r = $WxService->createMember('');
        $this->assertFalse($r);
        
    }

}

