<?php

namespace App\Repositories\Production;

use App\Models\Production;

class ProductionRepository implements ProductionRepositoryInterface
{
    public function all()
    {
        return Production::all();
    }

    public function find($id)
    {
        return Production::findOrFail($id);
    }

    public function create(array $data)
    {
        return Production::create($data);
    }

    public function update($id, array $data)
    {
        $url = $this->find($id);
        $url->update($data);
        return $url;
    }

    public function delete($id)
    {
        Production::destroy($id);
    }

    public function paginate(int $perPage = 25)
    {
        return Production::orderBy('created_at', 'desc')->paginate($perPage);
    }

    /**
     * Return a new query builder for the Production model.
     */
    public function query()
    {
        return Production::query();
    }
}
