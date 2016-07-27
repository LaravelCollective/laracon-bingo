<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class TermsTest extends TestCase
{

    use DatabaseMigrations;

    public function test_it_can_fetch_terms_from_the_api()
    {
        factory(\App\Term::class, 5)->create();

        $this->json('GET', '/api/terms')
          ->assertResponseOk()
          ->seeJsonStructure([
            '*' => [
              'id',
              'term',
            ],
          ]);
    }

}