<div class="card shadow rounded-lg" style="width: 20rem;">
    <div class="card-header " style="background: #e8e8e8;padding-top: 0.25rem;border:none; padding-bottom: 0.25rem;" >
        <div class="container row align-items-center">
            <h5 style="color: #525252;">Categories</h5>
        </div>
    </div>
    <div class="card-body" style="padding-top: 0.25rem;padding-left: 0px;">
        <nav class="navbar navbar-expand-md"  style="padding: 0px;">
            <ul class="navbar-nav   text-secondary d-flex flex-column  ">
                @for ($i = 1; $i < 7; $i++)
                    <li class="nav-item " style="border-bottom: 1px solid #bdbdbd ; width: 229px;margin-left:5px;" >
                        <a class="nav-link nav-cat" href="#" style="padding-left: 1.25rem;" ><h5 style="margin-bottom: 0.1rem;">Programming</h5> </a>
                    </li>
                @endfor
            </ul>
        </nav>
    </div>
</div>
