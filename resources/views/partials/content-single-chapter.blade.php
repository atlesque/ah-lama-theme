<article @php post_class() @endphp>
    <div class="prose-sm prose entry-content sm:prose lg:prose-lg xl:prose-xl">
        @php the_content() @endphp
    </div>
    <nav class="flex justify-between mt-4 post-navigation">
        {{ previous_post_link('%link', '« Previous chapter') }}
        {{ next_post_link('%link', 'Next chapter »') }}
    </nav>
</article>
