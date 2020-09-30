<article @php post_class() @endphp>
    <div class="entry-content">
        @php the_content() @endphp
    </div>

    @php $currentChapterId = get_the_id(); @endphp
    @php $chapter = pods('chapter', get_the_id() ); @endphp
    {{-- <pre class="bg-gray-300">Chapter id: {!! get_the_id() !!}</pre>
    <pre class="bg-gray-400">Course name: {!! $chapter->display('course') !!}</pre>
    <pre class="bg-gray-500">Course id: {!! $chapter->field('course')['ID'] !!}</pre> --}}
    @php $course = pods('course', $chapter->field('course')['ID'] ); @endphp
    @php $courseChapters = $course->field('chapters'); @endphp
    {{-- <pre class="bg-red-300">Course: {!! print_r($courseChapters) !!}</pre> --}}
    @php $currentChapterIndex = array_search($currentChapterId, array_column($courseChapters, 'ID')) @endphp
    {{-- <pre class="bg-red-400">Current chapter index: {!! $currentChapterIndex !!}</pre> --}}
    @php $nextChapter = $courseChapters[$currentChapterIndex+1]; @endphp
   {{--  <pre class="bg-red-500">Next chapter: {!! print_r($nextChapter) !!}</pre> --}}
    @php $previousChapter = $courseChapters[$currentChapterIndex-1]; @endphp

    <nav class="flex justify-between mt-4 post-navigation">
        
        @if(empty($previousChapter['ID']) === false)
            <a href="/?post_type=chapter&p={!! $previousChapter['ID'] !!}">« Previous chapter</a>
        @else
            <a href="/?post_type=course&p={!! $course->field('ID') !!}">« Back to overview</a>
        @endif

        @if(empty($nextChapter['ID']) === false)
            <a href="/?post_type=chapter&p={!! $nextChapter['ID'] !!}">Next chapter »</a>
        @else
            <a href="/?post_type=course&p={!! $course->field('ID') !!}">Back to overview »</a>
        @endif
    </nav>
</article>
