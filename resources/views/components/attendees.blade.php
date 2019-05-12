<p>

    @foreach($visit->attendees as $attendee)

        <random-avatar href="{{ route('user.get', ['id' => $attendee->id]) }}"
                       w="32" h="32"
                       alt="{{ $attendee->first_name }} {{ $attendee->last_name }}"
                       tooltip="{{ $attendee->first_name }} {{ $attendee->last_name }}"></random-avatar>

    @endforeach

</p>
