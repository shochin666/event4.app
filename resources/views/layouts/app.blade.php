<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
      integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.0/tailwind.min.css"
      integrity="sha256-CAI/7ThhltsmP2L2zKBYa7FknB3ZwFbD0nqL8FCdxdc="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
  </head>

  <body class="font-body">
    <nav class="flex items-center bg-white p-3 flex-wrap">
      <a class="ml-4 w-auto px-3 py-2 rounded items-center justify-center block" href="/home">
      <img class="w-28" src="/images/logo.png" alt="ロゴ"></a>
        
      @guest
      <button
        class="text-gray-500 inline-flex p-3 rounded lg:hidden xl:hidden ml-auto outline-none nav-toggler "
        data-target="#navigation"
      >
        <i class="hover:hidden material-icons">reorder</i>
      </button>
      <div
        class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto"
        id="navigation"
      >
            <div
            class="lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto lg:hidden xl:hidden "
            >
              <a href="{{ route('login') }}"
                      class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-400 hover:text-white block sm:my-2"
                  >
                      <span class="whitespace-nowrap text-2xl lg:text-sm pl-10 lg:pl-0">ログイン</span>
              </a>
                @if (Route::has('register'))
              <a href="{{ route('register') }}"
                    class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-400 hover:text-white block sm:my-2"
                >
                    <span class="whitespace-nowrap text-2xl lg:text-sm pl-10 lg:pl-0">登録</span>
                </a>
              </div>
            </div>
            @endif
        
          <div class="flex ml-auto mr-10 sm:hidden md:hodden lg:block xl:block">
            <a class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-400 hover:text-white block sm:my-2" href="{{ route('login') }}">{{ __('ログイン') }}</a>
          @if (Route::has('register'))
            <a class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-400 hover:text-white block sm:my-2" href="{{ route('register') }}">{{ __('登録') }}</a>
          </div>
                    
                            @endif
                        @else
      <button
        class="text-gray-500 inline-flex p-3 rounded lg:hidden ml-auto outline-none nav-toggler"
        data-target="#navigation"
      >
      <i class="hover:hidden material-icons">reorder</i>
      </button>
      <div
        class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto"
        id="navigation"
      >
            <div
            class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto"
            >
            <a
                    href="/home"
                    class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-400 hover:text-white block sm:my-2"
                >
                    <span class="whitespace-nowrap text-2xl lg:text-sm pl-10 lg:pl-0">タイムライン</span>
                </a>
                <a
                    href="/mylist"
                    class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-400 hover:text-white block sm:my-2"
                >
                    <span class="whitespace-nowrap text-2xl lg:text-sm pl-10 lg:pl-0">マイリスト</span>
                </a>
                <a
                    href="/profile"
                    class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-400 hover:text-white sm:my-2"
                >
                    <span class="text-2xl lg:text-sm pl-10 lg:pl-0">{{ Auth::user()->name }}</span>
                </a>
                <a class="lg:ml-20 xl:ml-20 lg:mr-4 xl:mr-4 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-400 items-center justify-center hover:bg-gray-400 hover:text-white block sm:my-2" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                <span class="text-2xl lg:text-sm pl-10 lg:pl-0">{{ __('ログアウト') }}</span>
</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </div>
      @endguest
    </nav>

    <main>
            @yield('content')
    </main>


    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script src="./js/script.js"></script>
    <script>
        $(document).ready(function () {
        $(".nav-toggler").each(function (_, navToggler) {
            var target = $(navToggler).data("target");
            $(navToggler).on("click", function () {
            $(target).animate({
                height: "toggle",
            });
            });
        });
        });

    </script>
  </body>
</html>