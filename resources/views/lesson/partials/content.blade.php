<div class="wysiwyg mt-4">

    {{-- todo: add estimated time to read    --}}
    {{-- todo: progress with scroll like https://myskillcamp.com/fr/article/mooc-et-e-learning-quelle-est-la-difference --}}
    {{--    {{dd($item)}}--}}
    {{--    {{dd($item->itemable->sectionsOrderedBySortIndex)}}--}}

{{--    @php ($header = ($item->itemable->header))--}}
{{--    @if ($header && array_key_exists('goals', $header) && !empty($header['goals']))--}}
{{--        <div class="note note-info">--}}
{{--            <div class="mb-2 fw-bold">{{ __('lessons.objectives',[], $course->language) }}:</div>--}}
{{--            --}}{{--            <p class="mb-1">{{ __('lessons.objectivesText',[], $course->language) }}</p>--}}
{{--            <ul>--}}
{{--                @foreach ($header['goals'] as $goal)--}}
{{--                    <li>--}}
{{--                        {{ $goal['value'] }}--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

<!-- Course requirements -->
{{--    @if ($header && array_key_exists('requirements', $header) && !empty($header['requirements']))--}}
{{--        <div class="note note-warning">--}}
{{--            <div class="mb-2 fw-bold">{{ __('lessons.prerequisites',[], $course->language) }}:</div>--}}
{{--            --}}{{--            <p class="mb-1">{{ __('lessons.prerequisitesText',[], $course->language) }}</p>--}}
{{--            <ul>--}}
{{--                @foreach ($header['requirements'] as $req)--}}
{{--                    <li>--}}
{{--                        {{ $req['value'] }}--}}
{{--                    </li>--}}
{{--                    @endforeach--}}
{{--                    </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

    <div class="accordion  mt-2 mb-5" id="accordion-sections">
        @foreach($item->itemable->sections() as $key=>$section)
            <div class="accordion-item">
                <div class="accordion-header" id="section-heading-{{ $key }}">
                    <button class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse-section-{{ $key }}"
                            aria-expanded="true"
                            aria-controls="collapse-section-{{ $key }}"
                    >
                        <h3>
                            {!! $section['title'] !!}
                        </h3>
                    </button>
                </div>
                <div id="collapse-section-{{ $key }}"
                     class="accordion-collapse collapse"
                     aria-labelledby="section-heading-{{ $key }}"
                >
                    <div class="accordion-body">
                        {!! $section['body'] !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>


{{--    @php ($recap = ($item->itemable->recap))--}}
{{--    @if ($recap && array_key_exists('usefulLinks', $recap) && !empty($recap['usefulLinks']))--}}
{{--        <div class="note note-info">--}}
{{--            <div class="mb-2 fw-bold">{{ __('lessons.usefulLinks',[], $course->language) }}:</div>--}}
{{--            <ul class="pl-0" style="list-style-type: none">--}}
{{--                @foreach ($recap['usefulLinks'] as $link)--}}
{{--                    --}}{{--                {{dd($link)}}--}}
{{--                    <li>--}}
{{--                        <i class="bi bi-link"></i>--}}
{{--                        <a href="{{ $link['url'] }}" target="_blank"--}}
{{--                           class="ms-2 px-1 btn btn-light bg-transparent border-0" title="{{ $link['url'] }}">--}}
{{--                            {{ $link['text'] }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    @endforeach--}}
{{--                    </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if ($recap && array_key_exists('summary', $recap) && !empty($recap['summary']))--}}
{{--        <div class="note note-checked">--}}
{{--            <div class="mb-2 fw-bold">{{ __('lessons.summary',[], $course->language) }}:</div>--}}
{{--            <p class=""> {!! $recap['summary'] !!} </p>--}}
{{--        </div>--}}
{{--    @endif--}}

    @include('course.partials.buttons')

</div>
