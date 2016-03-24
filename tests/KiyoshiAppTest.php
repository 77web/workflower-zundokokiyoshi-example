<?php

namespace Quartet\WorkflowerExample;

class KiyoshiAppTest extends \PHPUnit_Framework_TestCase
{
    public function test_run()
    {
        $app = new KiyoshiApp();
        $records = $app->run();

        $last6 = array_slice($records, -6);
        $this->assertEquals(['zun', 'zun', 'zun', 'zun', 'doko', 'kiyoshi'], $last6);
    }
}
