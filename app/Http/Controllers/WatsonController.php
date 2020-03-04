<?php

namespace App\Http\Controllers;

use App\Http\Requests\WatsonRequest;
use App\Repositories\WatsonRepository;
use Exception;

class WatsonController extends Controller
{
    private $repository;

    public function __construct(WatsonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $results = $this->repository->all();

        return view('watson.index', compact('results'));
    }

    public function store(WatsonRequest $request)
    {
        try {
            $data = $request->validated();
            $created = $this->repository->store($data);

            return redirect()->route('watson.show', $created->id)
                ->with('flash', 'success')
                ->with('message', 'Sentença analisada com sucesso pelo Watson');
        } catch (Exception $e) {
            return back()
                ->with('flash', 'danger')
                ->with('message', 'Erro fatal!')
                ->with('exception', $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $result = $this->repository->findOrFail($id);

        return view('watson.show', compact('result'));
    }

    public function update(WatsonRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $data['id'] = $id;
            $this->repository->update($data);

            return redirect()->route('watson.show', $id)
                ->with('flash', 'success')
                ->with('message', 'Requisição processada com sucesso');
        } catch (Exception $e) {
            return back()
                ->with('flash', 'danger')
                ->with('message', 'Erro fatal!')
                ->with('exception', $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->repository->destroy($id);

            return redirect()->route('watson.index')
                ->with('flash', 'success')
                ->with('message', 'Frase excluída com sucesso!');
        } catch (Exception $e) {
            return back()
                ->with('flash', 'danger')
                ->with('message', 'Erro fatal!')
                ->with('exception', $e->getMessage())
                ->withInput();
        }
    }
}
