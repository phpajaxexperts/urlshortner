<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\ShorturlController;
use Illuminate\Http\Request;

class UrlshortnerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_generate_short_url_check_empty_input()
    {

        $request = Request::create('/generate-short-url', 'POST',[
            'url'     =>  ''
        ]);

        $controller = new ShorturlController();

        $response  =  $controller->generateShortUrl($request);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_generate_short_url_check_input_invalid_url()
    {

        $request = Request::create('/generate-short-url', 'POST',[
            'url'     =>  'testurl'
        ]);

        $controller = new ShorturlController();

        $response  =  $controller->generateShortUrl($request);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_generate_short_url_check_input_valid_url()
    {

        $request = Request::create('/generate-short-url', 'POST',[
            'url'     =>  'http://www.test.com/test'
        ]);

        $controller = new ShorturlController();

        $response  =  $controller->generateShortUrl($request);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_shorten_url_check_empty_input()
    {

        $request = Request::create('/generate-short-url', 'POST',[
            'code'     =>  ''
        ]);

        $controller = new ShorturlController();

        $response  =  $controller->shortenUrl($request);
        $this->assertEmpty($response->shorten_url);
    }

}
