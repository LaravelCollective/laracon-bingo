<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class TermsTest extends TestCase
{

    use DatabaseMigrations;

    public function test_it_can_fetch_user_terms_from_the_api()
    {
        factory(\App\Term::class, 50)->create();
        $user = factory(\App\User::class)->make();

        $this->actingAs($user);

        $this->json('GET', '/api/me')
          ->assertResponseOk()
          ->seeJsonStructure([
            'name',
            'email',
            'terms',
          ]);
    }

    public function test_it_generates_the_same_list_of_terms_each_time()
    {
        factory(\App\Term::class, 50)->create();
        $user = factory(\App\User::class)->make();

        $this->assertEquals($user->terms, $user->terms);
    }

    public function test_it_generates_a_unique_list_of_terms_for_different_users()
    {
        factory(\App\Term::class, 100)->create();
        $user1 = factory(\App\User::class)->make();
        $user2 = factory(\App\User::class)->make();

        $this->assertFalse($user1->terms == $user2->terms);

    }

}