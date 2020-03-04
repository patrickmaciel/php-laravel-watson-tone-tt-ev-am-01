@if ($errors->any() && $errors->has($field))
    <small id="helpIdSentence" class="text-danger">
        @foreach ($errors->get($field) as $e)
            <p>{{ $e }}</p>
        @endforeach
    </small>
@endif
