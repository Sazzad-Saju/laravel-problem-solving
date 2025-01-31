<?php

namespace Tests\Feature;

use App\Events\SubmissionSaved;
use App\Jobs\ProcessSubmissionJob;
use App\Models\Submission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;  // This will reset the database after each test
    
    /** @test */
    public function it_validates_submission_request()
    {
        $response = $this->postJson('/api/submit', []);
        
        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name', 'email', 'message']);
    }
    
    /** @test */
    public function it_dispatches_a_job_on_valid_submission()
    {
        Queue::fake(); // Prevent actual job execution

        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        $response = $this->postJson('/api/submit', $data);

        $response->assertStatus(202)
                 ->assertJson(['message' => 'Submission is being processed.']);

        Queue::assertPushed(ProcessSubmissionJob::class, function ($job) use ($data) {
            return $job->getData() === $data;
        });
    }
    
    /** @test */
    public function it_saves_submission_and_triggers_event()
    {
        Event::fake(); // Prevent actual event from being fired

        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];
        
        // Dispatch the job instead of manually creating a submission
        ProcessSubmissionJob::dispatch($data);
        
         // Assert the event was dispatched
        Event::assertDispatched(SubmissionSaved::class);
    }
}
