
    <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">Про сайт</h4>
        <p class="mb-0">Тестовове описания для создания вида заполнености при необходимости можно изменить)))</p>
    </div>

    <div class="p-4">
        <h4 class="font-italic">Статьи за месяц</h4>
        <ol class="list-unstyled mb-0">
            @foreach($list_archive as $year => $month)
                @foreach($month as $item)
                    <li><a href="{{ route('archive',['date' => $year . '-' . $item]) }}">{{ $item }}.{{ $year }}</a></li>
                @endforeach
            @endforeach
        </ol>
    </div>
    <div class="p-4">
        <h4 class="font-italic">Где найти</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">VK</a></li>
        </ol>
    </div>

