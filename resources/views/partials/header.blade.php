@php
  $params = array(
    'limit'   => -1  // Return all rows
  );
  $quote = pods('quote', $params);
  $allQuotes = $quote->fetch();
@endphp
@php
  // TODO: Replace hardcoded quotes with data from Pods
  $availableQuotes[] = [
      'quote' =>  "Ah, to my own essence, the guru<br>
                  Free of dualistic conceptuality and clinging I go for refuge.",
      'image' => 'images/teachers/gyalwai-nyugu-rinpoche.jpg'
  ];
  $availableQuotes[] = [
      'quote' =>  "Ah! To the primordial self-arising Lama,<br>
                  I go for refuge beyond elimination and establishment",
      'image' => 'images/teachers/lama-achuk-rinpoche.jpg'
  ];
  $selectedQuote = $availableQuotes[array_rand($availableQuotes)];
@endphp

<header class="container flex mx-auto mt-10 header">
  <div class="flex flex-col w-8/12 md:w-9/12">
    <div class="flex items-end justify-between px-4 mb-10 lg:pl-10">
      <a href="{{ home_url('/') }}">
        <img src="@asset('images/logos/logotype_ah_lama_final.png')" alt="Ah-Lama" class="w-48 max-w-sm lg:w-full">
      </a>
    <p class="hidden pl-2 mb-0 text-sm text-right quote md:block">{!! $selectedQuote['quote'] !!}</p>
  {{-- @while($quote->fetch())
  <div class="hidden pl-2 mb-0 text-sm text-right quote md:block">{!! $quote->display('quote') !!}</div>
  @endwhile --}}  
  </div>
    <nav class="border-t border-solid">
      @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      {{-- {!! wp_nav_menu(['theme_location' => 'primary_navigation',
      'depth'           => 2,
      'container'       => 'div',
      'container_class' => 'collapse navbar-collapse',
      'container_id'    => 'bs-example-navbar-collapse-1',
      'menu_class'      => 'navbar-nav mr-auto',
      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      'walker'          => new WP_Bootstrap_Navwalker(),]) !!} --}}
      {{-- {!! wp_nav_menu(['theme_location' => 'primary_navigation',
      'depth'           => 2,
      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      'walker'          => new WP_Bootstrap_Navwalker(),]) !!} --}}
      @endif
    </nav>
  </div>
  <div class="flex items-center justify-end w-4/12 px-4 md:px-10 md:w-3/12">
    <img src="@asset($selectedQuote['image'])" alt="Lama Achuk Rinpoche" class="w-40 rounded-full min-w-12 min-h-12">
    {{-- @foreach($allQuotes as $quotes=>$quote)
      <pre>{{ print_r($quote) }}</pre>
    @endforeach --}}
  </div>
</header>

