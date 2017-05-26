<ul id="top-menu">
    @foreach($pages as $page)

        <li><a href="/page/{{ $page->slug }}">{{ $page->name }}</a></li>

    @endforeach
</ul>