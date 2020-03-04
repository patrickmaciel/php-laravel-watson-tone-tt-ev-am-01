@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col">
            <div class="jumbotron p-3">
                <div class="container">
                    <h1 class="display-4">Watson Tone</h1>
                    <p class="lead">Watson Tone irá analisar a frase que você enviar e então retornará as possíveis emoções relativas a cada sentença. <strong>Digite apenas frases em inglês.</strong></p>
                </div>
            </div>

            @include('partials.flash')

            <form action="{{ route('watson.store') }}" method='POST'>
                <h2>Cadastro</h2>

                @csrf

                <div class="form-group">
                  <label for="sentence">Digite uma frase</label>
                  <input type="text" name="sentence" id="sentence" class="form-control" placeholder="Example: I'm very sad because today I lost my dog" aria-describedby="helpIdSentence" value="{{ old('sentence') }}">

                  @include('partials.field_error', ['field' => 'sentence'])
                </div>

                <button type="submit" class="btn btn-primary">Analisar & Salvar</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col mt">
            <hr>
            <h2>Sentenças analisadas</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sentença</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($results as $watson)
                        <tr>
                            <td>{{ $watson->id }}</td>
                            <td>{{ $watson->sentence }}</td>
                            <td>{{ $watson->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>
                                <a href={{ route('watson.show', $watson->id) }} class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    Ver mais
                                </a>

                                <a href="#" class="btn btn-sm btn-danger delete-link">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Excluir
                                </a>

                                <form action="{{ route('watson.destroy', $watson->id) }}" method='POST'>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nenhuma sentença analisada.</td>
                        </tr>
                    @endforelse
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="4">
                            {{ $results->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('.delete-link').click(function (event) {
                event.preventDefault();

                if (confirm('Tem certeza?')) {
                    $(this).next('form').submit();
                }

                return;
            })
        });
    </script>
@endsection
