<?php

use Tests\TestCase;
use App\Models\Progress\File;
use App\Models\Progress\Music;
use App\Models\Progress\Progress;

class ProgressTest extends TestCase
{
    /** @test */
    public function it_can_get_the_progress_of_a_file_as_percent() {
        $file = new File();
        $file->setLength(200);
        $file->setSent(100);

        $progress = new Progress($file);

        $this->assertEquals(50, $progress->getAsPercent());
    }

    /** @test */
    public function it_can_get_the_progress_of_a_music_as_percent() {
        $music = new Music();
        $music->setLength(200);
        $music->setSent(100);

        $progress = new Progress($music);

        $this->assertEquals(50, $progress->getAsPercent());
    }
}
?>