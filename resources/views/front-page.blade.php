@extends('layouts.app')

@section('content')
    @while(have_posts()) @php the_post() @endphp
        {{-- @include('partials.page-header') --}}
        @php
            the_post_thumbnail( 'full', array( 'class' => 'w-full' ) );
        @endphp
            <div class="flex flex-col md:flex-row">
            <section class="pr-8 md:w-8/12">
                @include('partials.content-page')
            </section>
            <aside class="p-6 mt-8 bg-gray-200 md:p-8 md:w-4/12">
                @include('partials.sidebar')
            </aside>
        </div>
    @endwhile
@endsection