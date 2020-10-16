{{--
  Template Name: Courses List Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @php
      the_post_thumbnail( 'full', array( 'class' => 'w-full' ) );
    @endphp
    @include('partials.content-page')
    
    @php
        $courses = pods('course');
        $searchParams = array(
            'limit'   => 1  // Return all rows
        );
        $course = $courses->find($params);
    @endphp

    @while($course->fetch())
        <h2>{!! $course->display('post_title') !!}</h2>
        <div class="mb-4 course-description">
            {!! $course->display('description') !!}
        </div>
        <a href="/?post_type=course&p={!! $course->field('ID') !!}" class="self-end inline-block px-6 py-4 text-lg text-white rounded-full bg-theme-red">View course</a>
    @endwhile

  @endwhile
@endsection
