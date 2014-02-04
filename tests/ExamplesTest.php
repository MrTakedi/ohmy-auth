<?php

/*
 * Copyright (c) 2014, Yahoo! Inc. All rights reserved.
 * Copyrights licensed under the New BSD License.
 * See the accompanying LICENSE file for terms.
 */

use ohmy\Auth1,
    ohmy\Auth2;

class ExamplesTest extends PHPUnit_Framework_TestCase {

    public function setUp() {}
    public function tearDown() {}

    public function testYahooRequestToken() {
        Auth1::init(3)
             ->set('key', getenv('YAHOO_KEY'))
             ->set('secret', getenv('YAHOO_SECRET'))
             ->set('callback', getenv('CALLBACK'))
             ->request('https://api.login.yahoo.com/oauth/v2/get_request_token')
             ->finally(function($data) {
                 $this->assertTrue(!empty($data['oauth_token']));
                 $this->assertTrue(!empty($data['oauth_token_secret']));
             });
    }

}
