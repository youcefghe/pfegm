<optgroup label="Moderator">
        @foreach($communities as $community)

            <option  data-icon-base="fa" data-icon="fa fa-server" class=" h-6" value="{{route('Instructor',['id'=>$community->id])}}" >  {{$community->name}}</option>
        @endforeach
</optgroup>
