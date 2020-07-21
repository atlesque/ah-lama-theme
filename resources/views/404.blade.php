@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div>
      <p>{{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}</p>
      <a href="javascript:history.back()">{{ __('Click here to go back', 'sage') }}</a>
    </div>
    {{-- {!! get_search_form(false) !!} --}}
  @endif
@endsection
