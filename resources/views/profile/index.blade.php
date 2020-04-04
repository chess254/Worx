<h1>profile index page</h1>

@foreach($profile->skills as $skill)
    <li>{{$skill}}</li>
@endforeach