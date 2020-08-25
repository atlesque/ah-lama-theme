{{--
  Template Name: Teachings Page
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts())
    @php the_post() @endphp
     @php
      the_post_thumbnail( 'full', array( 'class' => 'w-full' ) );
    @endphp
    {{-- @include('partials.page-header') --}}
    @include('partials.content-page')
  @endwhile
  @php
    $params = array(
      'limit'   => -1,
      'orderby' => 'name ASC'  // Return all rows
		);
    $teaching = pods('teaching', $params);
  @endphp
  @while($teaching->fetch())
    <div class="teaching">
      <h2 class="block lg:w-2/4">{{ $teaching->display('name') }}</h2>
      <div class="flex flex-col-reverse lg:flex-row">
        <div class="{{ empty($teaching->display('youtube_embed_code')) === false || empty($teaching->display('spotify_link')) === false ? 'lg:w-2/4' : '' }}">
          <div class="description">{!! $teaching->display('description') !!}</div>
          @if(empty($teaching->field('attachments')) === false)
            <h3>Attachments</h3>
            {{-- <pre>@php echo print_r($teaching->raw('attachments')) @endphp</pre> --}}
            <ul>
            @foreach($teaching->field('attachments') as $attachments=>$attachment)
              <li>
                <a href="{{ $attachment["guid"] }}" download>{{ $attachment["post_title"] }} <small class="text-gray-600 align-text-bottom">({{ pathinfo($attachment["guid"], PATHINFO_EXTENSION) }})</small></a>
              </li>
            @endforeach
            </ul>
          @endif
          @if(empty($teaching->display('link')) === false)
            <h3>Related info</h3>
            <a href="{{ $teaching->display('link') }}" target="_blank">
              {{ $teaching->display('link') }}
            </a>
          @endif
        </div>
        @if(empty($teaching->display('youtube_embed_code')) === false)
          <div class="mb-4 lg:w-2/4 lg:pl-8">
            <div class="youtube-video-wrapper">
              {!! $teaching->display('youtube_embed_code') !!}
            </div>
            @if(strpos($teaching->display('youtube_embed_code'), 'videoseries') !== false)
            <div class="mt-2 text-sm text-theme-gray">
              <span>This teaching contains several videos. To view a list of videos, press the</span>
              <svg class="inline text-theme-gray" height="30px" version="1.1" viewBox="0 0 36 36"><title>Playlist button</title><path d="m 22.53,21.42 0,6.85 5.66,-3.42 -5.66,-3.42 0,0 z m -11.33,0 9.06,0 0,2.28 -9.06,0 0,-2.28 0,0 z m 0,-9.14 13.6,0 0,2.28 -13.6,0 0,-2.28 0,0 z m 0,4.57 13.6,0 0,2.28 -13.6,0 0,-2.28 0,0 z" fill="currentColor"></path></svg>
              <span>button next to the video title.</span>
            </div>
            @endif
          </div>
        @elseif(empty($teaching->display('spotify_link')) === false)
          <div class="mb-4 lg:w-2/4 lg:pl-8">
            <div class="spotify-wrapper">
              {!! $teaching->display('spotify_link') !!}
            </div>
          </div>
        @endif
      </div>
    </div>
  @endwhile
@endsection