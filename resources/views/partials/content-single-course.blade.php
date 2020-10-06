<article @php post_class() @endphp>

    @php global $post; @endphp
    
    @if(post_password_required( $post ) === true)
        <h1>Protected content</h1>
        {!! get_the_password_form() !!}
    @else
        <div class="entry-content">
            @php the_content() @endphp
        </div>
    @endif
    
    <footer>
        {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </footer>
</article>
