@foreach ($tours as $tour)
    <div class="{{ $colClass }}">
        <x-frontend.tour-card :tour="$tour" :style="$cardStyle" />
    </div>
@endforeach
