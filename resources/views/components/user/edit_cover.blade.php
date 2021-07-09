<div class="modal-body mt-3">
    <div class="row justify-content-center h-100">
        <div class="row justify-content-center">
            <p class="h4"> Change community cover</p>
            <hr class="mt-n1" style="  border: 3px solid #47b3a8;border-radius: 5px; width: 35%;">
        </div>
    </div>
    <form role="form" method="POST"  enctype="multipart/form-data"  action="{{route('Update community cover',['id'=>$community->id])}}" class="p-3"  style="background: #fff;">
        @csrf
        <div class=" row justify-content-center">
            <div class="col-md-10">

                <input id="ProfileCov"  type="file" name="file"  accept="image/*" title="select image or video to upload" style="padding: 0.2rem;" class="mt-3 mb-3 form-control" >
                <img id="galleryCov" class="mb-3" style="height: 200px;width: 250px; ">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="text-white btn btn-primary btn-sm">{{'Edit Cover'}}</button>
                </div>
            </div>
        </div>

    </form>
</div>
