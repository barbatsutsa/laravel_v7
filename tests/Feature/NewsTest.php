<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Новости');
        $response->assertDontSeeText('Статьи блога');
    }

    public function testNewsShow()
    {
        $response = $this->get('/news/3.html');
        $response->assertStatus(200);
        $response->assertSeeText('Breaking news!');
    }

    public function testReview()
    {
        $response = $this->get('/news/review');
        $response->assertStatus(200);
        $response->assertSeeText('Добавить отзыв');
        $response->assertViewIs('news.review');

    }

//    public function testReviewStore()
//    {
//        $response = $this->post('/news/review/store');
//        $response->assertStatus(200);
//        $response->assertRedirect('/');
//        $response->assertJsonCount('3', 'name');
//    }

    public function testOrder()
    {
        $response = $this->get('/news/order');
        $response->assertStatus(200);
        $response->assertSeeText('Заполните форму заказа');
        $response->assertViewIs('news.order');
    }

//    public function testOrderStore()
//    {
//        $response = $this->post('/news/order/store');
//        $response->assertSuccessful();
//    }

}
