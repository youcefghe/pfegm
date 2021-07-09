@extends('layouts.moderator')
@section('modera')
    <div class="col-md-8">
        <div class=" container mb-3 shadow-lg pr-0 bg-white" >
            <x:notify-messages />
            @notifyJs
            <div class="container pr-0">
                <div class="row mr-0 pl-0 @if($community) loading--backgraound @endif" style="position: relative; background-image: url('{{asset($community->cover)}}');width: 100%;height: 150px;background-position: center center; background-size: cover;">
                    <a class=" text-white " href="#" style="margin-left: 95%;margin-top: 10%;" data-toggle="modal" data-target="#ModalEditCover"><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>
                </div>
            </div>
            <div class="pb-3" style="position: absolute;">
                <img class="mb-3 ml-5" src="{{$community->picture}}" style="margin-top:-70px; border-radius: 5px;  height: 120px;width: 120px;">
                <a class=" text-default mt-n5 pl-4 ml-5" href="#" style="position: absolute" data-toggle="modal" data-target="#ModalEditImage"><i class="fa fa-pencil ml-5 fa-lg" aria-hidden="true" ></i></a>
            </div>
            <form class="form pt-5 mt-2" method="POST" action="{{route('Community update',['id'=>$community->id])}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Community name :</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Community name" value="{{$community->name}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group" style="width: 50%;">
                                    <label>Type :</label>
                                    <select class="selectpicker form-control custom-select-3 shadow @error('type') is-invalid @enderror" ng-class="{'no-border': border}" name="type">
                                        <option data-icon-base="fa" data-icon="fa fa-users" class=" h-6" value="public" @if($community->type == 'public')selected @endif >    Public</option>
                                        <option data-icon-base="fa" data-icon="fa fa-lock" class=" h-6" value="private" @if($community->type == 'private')selected @endif >      Private</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ">
                                    <label for="information">Description : </label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="" id="information" cols="30" rows="10">{{$community->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                                @enderror
                            </div>
                            <div class="col mr-4">
                                <label for="rules">Rules : </label>
                                <textarea class="form-control @error('rules') is-invalid @enderror" name="rules" value="" id="rules" cols="30" rows="10">{{$community->rules}}</textarea>
                                @error('rules')
                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="continer mt-2 pb-2">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
                <div id="ModalEditImage" class="modal  fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content w-75" style="background: #f2f8f7; color: #808080;">
                            <x-user.edit_image :community="$community"></x-user.edit_image>
                        </div>
                    </div>
                </div>
                <div id="ModalEditCover" class="modal  fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content w-75" style="background: #f2f8f7; color: #808080;">
                           <x-user.edit_cover :community="$community"></x-user.edit_cover>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
    </div>
    @endsection
