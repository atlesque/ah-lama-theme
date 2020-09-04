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

<header id="nav-header" class="sticky top-0 z-50 max-h-screen pt-4 overflow-auto transition-shadow duration-300 bg-white lg:relative lg:pt-10 overscroll-contain">
  <div class="container flex mx-auto header">
    <div class="flex flex-col flex-1">
      <div class="flex items-end justify-between px-4 mb-4 lg:mb-10 lg:pl-10">
        <a href="{{ home_url('/') }}">
          <img src="@asset('images/logos/logotype_ah_lama_final.png')" alt="Ah-Lama" class="w-48 max-w-sm lg:w-full">
        </a>
      <p class="hidden pb-4 pl-4 mb-0 text-sm text-right quote md:block lg:pb-0">{!! $selectedQuote['quote'] !!}</p>
    {{-- @while($quote->fetch())
    <div class="hidden pl-2 mb-0 text-sm text-right quote md:block">{!! $quote->display('quote') !!}</div>
    @endwhile --}}  
    </div>
      <nav class="border-t border-solid">
        <button id="btn-toggle-nav-menu" class="flex px-4 py-2 lg:hidden text-theme-yellow">Menu</button>
        @if (has_nav_menu('primary_navigation'))
        {{-- {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!} --}}
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
        {!! wp_nav_menu(['theme_location' => 'primary_navigation',
        'depth'           => 2,
        'container'       => 'div',
        'container_class' => 'nav-menu-wrapper hidden lg:block pl-4 lg:pl-0',
        'container_id'    => 'nav-menu-wrapper',
        'menu_class'      => 'nav-menu flex-col lg:flex-row',
        'fallback_cb'     => 'Tailwind_Navwalker::fallback',
        'walker'          => new Tailwind_Navwalker(),]) !!}
        @endif
      </nav>
    </div>
    <div class="flex items-start justify-end px-4">
      <img src="@asset($selectedQuote['image'])" alt="Lama Achuk Rinpoche" class="w-20 rounded-full md:w-24 lg:w-40">
      {{-- @foreach($allQuotes as $quotes=>$quote)
        <pre>{{ print_r($quote) }}</pre>
      @endforeach --}}
    </div>
  </div>
</header>

