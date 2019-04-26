<?php

namespace Tests\Feature;

use App\Person;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\AuthenticateWithRandomUser;
use Tests\SeededDatabase;
use Tests\TestCase;

class VisitTest extends TestCase
{
    use RefreshDatabase;
    use SeededDatabase;
    use AuthenticateWithRandomUser;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->authenticate();

        $response = $this->get(route('visit.new'));

        $response->assertStatus(200);

        //public function store($person, $visitAttendees, $datetimeVisited, $visitSummary, $met,
        //                             $attendedChurchThisWeek = null, $bomReading = null): bool

        $person = Person::inRandomOrder()->first();

        //TODO verify security (normal missionary cannot enter visit for someone else)
        $randomMissionary = User::inRandomOrder()->first();
        $randomMissionary_1 = User::inRandomOrder()->first();

        $response = $this->post(route('visit.create'), [
            'person_id' => $person->id,
            'datetime_visited' => now(),
            'visit_summary' => "TEST VISIT WAS AWESOME",
            'met' => true,
            'visit_attendees' => [
                $this->user->id,
                $randomMissionary->id,
                $randomMissionary_1->id
            ]
        ]);

        $this->assertDatabaseHas('visit_attendees',[
           'user_id' => $this->user->id,
        ]);
        $this->assertDatabaseHas('visit_attendees',[
           'user_id' => $randomMissionary->id,
        ]);
        $this->assertDatabaseHas('visit_attendees',[
           'user_id' => $randomMissionary_1->id,
        ]);

        $response->assertStatus(302);
    }
}
