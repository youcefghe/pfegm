<div id="course-header" class="pt-3 pb-0 px-3">

    <!-- Course skills -->
    <div id="course-skills" class="">
        @for($i=0;$i<=5;$i++)
            {{--            todo: href to="{name : 'courses',query:{search:tag.name}}"--}}
            <a href="#" class="disabled">
                <span class="skill-badge border border-white bg-filter badge alert-primary rounded-pill">Developpement</span>
            </a>
        @endfor
    </div>

    <!-- Course title -->
    <div id="course-title" class="my-2 d-flex align-items-center justify-start">
        <h1 class="my-0 mx-1">{{$course->title_en}}</h1>
        {{--        <h1>{{ getTranslatedCourseTitle(course) }}</h1>--}}
        <img

            src="{{asset('images/flags/france.svg')}}"
            title="{{__('Developpement application web')}} "
            class="mx-2"
            style="width:30px;"
        />
    </div>

    <!-- Course information -->
    <div id="course-info ms-1">

        <div class="row">
            <!-- Level-->
            <div class="col-12 col-sm-4 col-md-3">
                <i class="mdi mdi-signal-cellular-1"></i>
                1
            </div>

            <!-- Number of hours -->


        </div>
    </div>

    <!-- Course rating -->
    <div id="course-rating" class="mt-1 mb-0 d-flex align-center justify-start pa-0">

        <!-- Rating number (between 1 and 5) -->
        <span class="rating mx-1 py-0" style="font-size: 16px;">
            {{ 3  }}
        </span>

        <!-- Total ratings in stars -->
        <div class="rating-stars d-flex align-items-end" style="box-sizing: border-box">

        <span class="rating-stars mx-1">

            @for($i=0;$i<4;$i++)
                {{--        <i class="bi bi-star-fill"></i>--}}
                <i class="mdi mdi-star mdi-18px"></i>


            @endfor
         </span>

        {{-- todo: popup grouped rating--}}
        {{--            <CourseRating class="menu mt-4" :course="course" :meta="meta"/>--}}
        <!-- total ratings in numbers -->

        </div>



        <!-- `Note this course` dialog -->

        {{-- todo: set rating dialog --}}
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        {{--        <v-dialog max-width="320" v-model="ratingDialog" persistent @keydown.esc="ratingDialog = false">--}}

        {{--            <!-- Rating Dialog activator -->--}}
        {{--            <template v-slot:activator="{ on, attrs }">--}}
        {{--                <v-btn icon color="ms-2 white lighten-3" v-if="isLoggedIn" @click="handleSubmitRating">--}}
        {{--                    <v-icon color="white" size="14" v-bind="attrs" v-on="on">--}}
        {{--                        mdi-pencil--}}
        {{--                    </v-icon>--}}
        {{--                </v-btn>--}}
        {{--            </template>--}}

        {{--            <!-- Rating dialog card -->--}}
        {{--            <v-card class="d-flex flex-column align-center justify-center">--}}

        {{--                <div class="d-flex align-center justify-end pa-0" style="width: 100%;">--}}
        {{--                    <v-btn icon color="white lighten-3" class="ms-2 pa-0" @click="ratingDialog = false">--}}
        {{--                        <v-icon color="teal" class="pa-0" size="14" v-bind="attrs" v-on="on">--}}
        {{--                            mdi-close--}}
        {{--                        </v-icon>--}}
        {{--                    </v-btn>--}}
        {{--                </div>--}}

        {{--                <!-- Rating dialog title & text -->--}}
        {{--                <v-card-title class="headline pa-0">Note this course</v-card-title>--}}
        {{--                <v-card-text class="text-center">We are happy to know your opinion about this course--}}
        {{--                </v-card-text>--}}

        {{--                <v-rating--}}
        {{--                    @input="handleRatingChange"--}}
        {{--                    :value="previousRating"--}}
        {{--                    background-color="gray"--}}
        {{--                    class="mb-2"--}}
        {{--                    color="teal"--}}
        {{--                    dense--}}
        {{--                    size="30"--}}
        {{--                />--}}

        {{--                <v-card-actions>--}}
        {{--                    <!-- Check if there is a previous rating -->--}}
        {{--                    <v-btn color="teal" text @click="handleSubmitRating"--}}
        {{--                           v-if="typeof previousRating == 'undefined'">--}}
        {{--                        <span ref="ratingDialogSubmitBtnText"> Note!</span>--}}
        {{--                    </v-btn>--}}

        {{--                    <v-btn color="teal" text @click="handleSubmitRating" v-else>--}}
        {{--                        <span ref="ratingDialogSubmitBtnText">Edit Rating</span>--}}
        {{--                    </v-btn>--}}

        {{--                </v-card-actions>--}}

        {{--            </v-card>--}}
        {{--        </v-dialog>--}}
    </div>

    <!-- Course updated at -->


</div>
