<?php

namespace Vhnh\Search\Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Vhnh\Search\Contracts\Searchable as SearchableContract;
use Vhnh\Search\Searchable;

class SearchTest extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    protected function getPackageProviders($app)
    {
        return ['Vhnh\Search\ServiceProvider'];
    }

    /** @test */
    public function it_searches_in_the_given_attribute()
    {
        User::create(['name' => 'John Doe', 'username' => 'johnny']);
        User::create(['name' => 'Jane Smith', 'username' => 'janedoe']);

        $this->assertCount(1, User::search('john', 'name'));
    }

    /** @test */
    public function it_searches_in_multiple_attributes()
    {
        User::create(['name' => 'John Doe', 'username' => 'johnny']);
        User::create(['name' => 'Jane Smith', 'username' => 'janedoe']);
    
        $this->assertCount(1, User::search('doe', 'username'));
        $this->assertCount(2, User::search('doe', ['name', 'username']));
    }
}

class User extends Model implements SearchableContract
{
    use Searchable;

    protected $guarded = [];
}
