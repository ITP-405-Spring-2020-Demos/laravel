<ol>
    @foreach ($tracks as $track)
        <li>
            {{$track->Name}} -
            <span style="background-color: yellow;">
                {{$track->genre->Name}}
            </span>
            <span style="background-color: green;">
                {{$track->album->Title}}
            </span>
        </li>
    @endforeach
</ol>
