<?php

namespace Tests\Unit;

use Tests\CreatesApplication;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Artisan;

use App\Models\Category;
use App\Models\Post;
use App\Models\News;

class DatabaseConnectionsTest extends TestCase
{
    use CreatesApplication;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDatabaseConnections()
    {
        $this->createApplication();

        // Artisan::call('migrate');

        $this->checkDatabaseConnection();
        $this->checkDatabaseConnection('connection2');
        $this->checkDatabaseConnection('connection3');

        // DB::connection('mysql')->table('productions')->get();
    }

    public function testCreateDataInAllConnections()
    {
        $this->createApplication();

        Category::create(['name' => 'connection1 category']);
        Post::create(['title' => 'connection2 post']);
        News::create(['title' => 'connection3 news']);
    }



    private function checkDatabaseConnection($name = 'mysql')
    {
        $pdo = DB::connection($name)->getPdo();
        $dbName = DB::connection($name)->getDatabaseName();
        Log::channel(['stack', 'syslog', 'errorlog', 'stderr', 'papertrail'])
            ->debug("Checking database { connection: $name, database: $dbName }");
        $this->assertNotNull($dbName);
    }

}
