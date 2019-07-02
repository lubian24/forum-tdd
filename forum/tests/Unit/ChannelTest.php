<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChannelTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function aChannelConsistOfThreads()
    {
        $channel = create("App\Channel");
        $thread = create("App\Thread", ['channel_id'=>$channel->id]);

        $this->assertTrue($channel->threads->contains($thread));
    }
}
