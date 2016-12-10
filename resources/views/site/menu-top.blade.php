<ul id="top-menu">
    <li><a class="act">Главная</a></li>

    @foreach($pages as $page)

        <li><a href="/{{ $page->slug }}">{{ $page->name }}</a></li>

    @endforeach

</ul>