<div class="row mb-3">
    <div class="card shadow rounded-lg" style="width: 20rem;">
        <div class="card-header userDashCom text-center" >
            <p class="h5" style="color: white;">Information and rules</p>
        </div>
        <div class="card-body mb-n2">
            <div class="container">
                <p style="color: #626262;">
                    Welcome to {{$information->name }}!
                </p>
                <p style="color: #626262;border-bottom: 1px solid #bdbdbd;">
                    Please keep the conversation
                    professional, adhere to, and remember to READ
                    OUR RULES.
                </p>

                    <div class=" mb-1"  >
                       {{$information->rules}}
                    </div>

            </div>
        </div>
    </div>
</div>
