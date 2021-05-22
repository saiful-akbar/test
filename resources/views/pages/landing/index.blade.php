@extends('main-layouts.index')

@section('title', 'Welcome')

@section('banner')
    <section id="banner" class="major">
        <div class="inner">
            <header class="major">
                <h1>Hi, my name is {{ $profile->profile_first_name }} {{ $profile->profile_last_name }}</h1>
            </header>

            <div class="content">
                <p>
                    <strong>WEB Developer</strong>
                    <br />
                    Welcome to my personal website
                </p>

                <ul class="actions">
                    <li><a href="#one" class="button next scrolly">Get Started</a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@section('content')

    {{-- One --}}
    <section id="one" class="tiles">

        {{-- Loop articles --}}
        @foreach ($articles as $article)
        <article>
                <span class="image">
                    <img src="{{ asset($article->article_background) }}" alt="article-banner" />
                </span>
                <header class="major">
                    <h3>
                        <a href="{{ url($article->article_url) }}" class="link">
                            {{ $article->article_title }}
                        </a>
                    </h3>
                    <p>{{ $article->article_subtitle }}</p>
                </header>
            </article>
        @endforeach
        {{-- End Loop articles --}}

    </section>

    {{-- Two --}}
    <section id="two">
        <div class="inner">
            <header class="major">
                <h2>Massa libero</h2>
            </header>

            <p>
                Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet pharetra et feugiat tempus.
            </p>

            <ul class="actions">
                <li><a href="landing.html" class="button next">Get Started</a></li>
            </ul>
        </div>
    </section>
@endsection
