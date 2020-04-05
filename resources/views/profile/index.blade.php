<h1>profile index page</h1>

@foreach($profiles ?? ''->skills as $skill)
    <li>{{$skill}}</li>
@endforeach