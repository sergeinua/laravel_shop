@foreach ($socials as $key => $value)

    <?php if (isset($value->show)) : ?>

        <a href="{{ $value->link }}" target="_blank">
            <img src="/img/social/{{ $key }}.png" alt="social" width="25">
        </a>

    <?php endif ?>

@endforeach