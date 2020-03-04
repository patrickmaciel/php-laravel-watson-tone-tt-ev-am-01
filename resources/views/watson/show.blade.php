@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            @include('partials.flash')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href={{ route('watson.index') }}>Página Inicial</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalhe</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>Watson Tone: {{ $result->id }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $result->id }}</dd>

                <dt class="col-sm-3">Sentença/Frase</dt>
                <dd class="col-sm-9">
                    {{ $result->sentence }}
                </dd>

                <dt class="col-sm-3">Watson Tone/Emoções</dt>
                <dd class="col-sm-9">
                    @if ($result->document_tone)
                        <ul>
                        @foreach ($result->document_tone->tones as $dt)
                            <li><strong>{{ __($dt->tone_name) }}</strong> - {{ decToPercent($dt->score) }}</li>
                        @endforeach
                        </ul>
                    @else
                        Nenhum resultado retornado pelo Watson
                    @endif
                </dd>
            </dl>

            <hr>

            <form action="{{ route('watson.update', $result->id) }}" method='POST'>
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="observation">Tem alguma observação?</label>
                    <input type="text" name="observation" id="observation" class="form-control" placeholder="Digite aqui" value="{{ old('observation', $result->observation) }}">

                    @include('partials.field_error', ['field' => 'observation'])
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="agreed" id="agreed" {{ $result->agreed ? 'checked' : '' }} value="1"> O resultado do Watson foi assertivo
                    </label>
                    @include('partials.field_error', ['field' => 'agreed'])
                </div>

                <button type="submit" class="btn btn-primary mt-3">Salvar observação</button>
            </form>
        </div>
    </div>
@endsection
