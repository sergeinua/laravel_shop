<ul class="level_22 " id="categMenu">

    @foreach($categories as $category)

        <li>
            <a href="/catalog/{{ $category->slug }}"
               title="{{ $category->name }}">
                <span>{{ $category->name }}</span>
            </a>
        </li>

    @endforeach

</ul>