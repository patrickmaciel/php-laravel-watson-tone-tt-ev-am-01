@if (session()->has('flash'))
    <div class="alert alert-{{ session('flash') }}" role="alert">
        {{ session('message') }}
        @if (session()->has('excpetion'))
        <br><p><strong>Exception: </strong>{{ session('exception') }}</p>
        @endif

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
