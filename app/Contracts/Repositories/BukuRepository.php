<?php

namespace App\Contracts\Repositories;

use App\Models\Buku;
use App\Contracts\Interfaces\BukuRepositoryInterface;

class BukuRepository implements BukuRepositoryInterface
{
    public function all()
    {
        return Buku::all();
    }

    public function find($id)
    {
        return Buku::findOrFail($id);
    }

    public function create(array $data)
    {
        return Buku::create($data);
    }

    public function update($id, array $data)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($data);
        return $buku;
    }

    public function delete($id)
    {
        return Buku::destroy($id);
    }
}
