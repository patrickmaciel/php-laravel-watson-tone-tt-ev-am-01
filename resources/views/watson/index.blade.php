@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('watson.store') }}" method='POST'>
                @csrf

                <div class="form-group">
                  <label for="sentence">O que você esta pensando?</label>
                  <input type="text" name="sentence" id="sentence" class="form-control" placeholder="Digite aqui uma frase" aria-describedby="helpIdSentence" value={{ old('sentence') }}>
                  <small id="helpIdSentence" class="text-muted">Digite aqui uma frase</small>
                </div>

                <button type="submit" class="btn btn-primary">Analisar & Salvar</button>
            </form>
        </div>
    </div>
@endsection
