 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul class="mb-0 ps-4">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>     
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>