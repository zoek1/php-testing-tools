<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
class RoboFile extends \Robo\Tasks
{
    /**
     * @description Run all the Codeception acceptance tests in PhantomJS
     */
    public function acceptance()
    {
        $this->stopOnFail();
        $this
            ->taskExec('node_modules/.bin/phantomjs')
            ->option('webdriver', 4444)
            ->option('webdriver-loglevel', 'WARNING')
            ->background()
            ->run()
        ;
        $this
            ->taskServer(8000)
            ->dir('web')
            ->background()
            ->run()
        ;
        $this
            ->taskExec('php bin/codecept')
            ->arg('clean')
            ->run()
        ;
        $this
            ->taskCodecept('bin/codecept')
            ->suite('acceptance')
            ->option('steps')
            ->run()
        ;
    }
}
