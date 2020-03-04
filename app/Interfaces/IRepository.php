<?php

namespace App\Interfaces;

interface IRepository
{
    public function all($paginate = true);

    public function store($data);

    public function update($data);

    public function destroy($id);

    public function find($id, $with = []);

    public function findOrFail($id, $with = []);

    public function onlyTrashed($paginate = true);

    public function restore($id);
}
