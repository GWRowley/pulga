<div class="col-12 col-md-6 col-xl-4 mb-4">
    <div class="comp-card bg-white shadow-sm h-100">     
        <div class="comp-card-inner">
            <h2 class="fs-5 mb-4">{{ $competition->title }}</h2>
            <p class="mb-2"><i class="fa-regular fa-calendar-days me-1"></i> {{ \Carbon\Carbon::parse($competition->date)->format('jS F Y') }}</p>
            <p class="mb-0"><i class="fa-solid fa-location-dot me-1"></i> {{ $competition->town_city }}</p>
            <a href="{{ route('competitions') }}/event/{{ $competition->id}}" class="stretched-link"><span class="visually-hidden">View competition</span></a>
        </div>     
    </div>
</div>