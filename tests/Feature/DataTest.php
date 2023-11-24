<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Vote;

class DataTest extends TestCase
{
    use RefreshDatabase;

    public function test_vote_table_empty(): void
    {
        $this->assertDatabaseCount('votes', 0);  // table exists and is empty
    }

    public function test_add_vote(): void
    {
        $data = ['name'=>'John Smith', 'image_id'=>1];

        Vote::castVote($data);

        $this->assertDatabaseCount('votes', 1);
        $this->assertDatabaseHas('votes', ['name'=>'John Smith', 'image_id'=>1]);  // record present
    }

    public function test_add_multiple_votes(): void
    {
        $data = ['name'=>'John Smith', 'image_id'=>1];
        Vote::castVote($data);

        $data = ['name'=>'Jane Doe', 'image_id'=>5];
        Vote::castVote($data);

        $this->assertDatabaseCount('votes', 2);
        $this->assertDatabaseHas('votes', ['name'=>'John Smith', 'image_id'=>1]);  // first record present
        $this->assertDatabaseHas('votes', ['name'=>'Jane Doe', 'image_id'=>5]);  // second record present
    }

    public function test_update_vote(): void
    {
        $data = ['name'=>'John Smith', 'image_id'=>1];
        Vote::castVote($data);

        $data['image_id'] = 5;
        Vote::castVote($data);

        $this->assertDatabaseCount('votes', 1);
        $this->assertDatabaseHas('votes', ['name'=>'John Smith', 'image_id'=>5]);  // update image id

        $data['name'] = 'johnsmith';
        $data['image_id'] = 10;
        Vote::castVote($data);

        $this->assertDatabaseCount('votes', 1);
        $this->assertDatabaseHas('votes', ['name'=>'John Smith', 'image_id'=>10]);  // update image id with different casing/whitespace
    }
}
