{{--
  Template Name: Teachings Page
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts())
    @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
  @php
    $params = array(
			'limit'   => -1  // Return all rows
		);
    $teaching = pods('teaching', $params);
  @endphp
  @while($teaching->fetch())
    <div class="teaching">
      <h2 class="block lg:w-2/4">{{ $teaching->display('name') }}</h2>
      <div class="flex flex-col-reverse lg:flex-row">
        <div class="{{ empty($teaching->display('youtube_embed_code')) === false ? 'lg:w-2/4' : '' }}">
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
          </div>
        @endif
      </div>
    </div>
  @endwhile
@endsection