@foreach ($communities as $community)
    <div class="row mb-1 " style="border-bottom: 1px solid #bdbdbd" >
        <div class="mt-1 d-flex justify-content-center" >


            <img class="mt-n1 ml-2 mb-2 shadow" src="{{$community->picture}}" style="height: 35px;width: 35px;border-radius: 50%">
            <a class="ml-1 mt-1 text-secondary" style="text-decoration: none" href="{{route('community',['id'=>$community->id])}}"> {{$community->name}}</a>
        </div>
    </div>
@endforeach
