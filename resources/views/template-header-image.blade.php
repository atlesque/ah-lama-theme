{{--
  Template Name: Header Image Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @php
      the_post_thumbnail( 'full', array( 'class' => 'w-full' ) );
    @endphp
    {{-- @include('partials.page-header') --}}
    @include('partials.content-page')
  @endwhile
@endsection
