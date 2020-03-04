<?php

namespace App\Repositories;

use App\Interfaces\IRepository;
use App\Models\WatsonResult;
use App\Services\Watson\WatsonTone;

class WatsonRepository implements IRepository
{
    private $watsonTone;

    public function __construct(WatsonTone $watsonTone)
    {
        $this->watsonTone = $watsonTone;
    }

    public function all($paginate = true)
    {
        if ($paginate) {
            return WatsonResult::paginate(25);
        }

        return WatsonResult::all();
    }

    public function store($data)
    {
        $result = $this->watsonTone->analyze($data['sentence']);
        $data['document_tone'] = $result->document_tone ?? null;
        $data['sentences_tone'] = $result->sentences_tone ?? null;

        return WatsonResult::create($data);
    }

    public function update($data)
    {
        $item = WatsonResult::findOrFail($data['id']);
        $item->agreed = $data['agreed'] ?? false;

        if (empty($item->document_tone)) {
            $result = $this->watsonTone->analyze($item->sentence);
            $item->document_tone = $result->document_tone ?? null;
            $item->sentences_tone = $result->sentences_tone ?? null;
        }

        return $item->save();
    }

    public function destroy($id)
    {
        return WatsonResult::destroy($id);
    }

    public function find($id, $with = [])
    {
        return WatsonResult::with($with)
            ->find($id);
    }

    public function findOrFail($id, $with = [])
    {
        return WatsonResult::with($with)
            ->findOrFail($id);
    }

    public function onlyTrashed($paginate = true)
    {
        if ($paginate) {
            return WatsonResult::onlyTrashed()
                ->paginate(25);
        }

        return WatsonResult::onlyTrashed()
            ->get();
    }

    public function restore($id)
    {
        return WatsonResult::withTrashed()
            ->where('id', $id)
            ->restore();
    }
}
