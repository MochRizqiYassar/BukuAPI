<?php

namespace App\Services;

use App\Contracts\Interfaces\BukuRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use App\Services\UploadService;

class BukuService
{
    protected $bukuRepository;
    protected $uploadService;

    public function __construct(BukuRepositoryInterface $bukuRepository, UploadService $uploadService)
    {
        $this->bukuRepository = $bukuRepository;
        $this->uploadService = $uploadService;
    }

    public function store(array $data, $gambar = null)
    {
        if ($gambar) {
            $data['gambar'] = $this->uploadService->uploadBukuImage($gambar);
        }

        return $this->bukuRepository->create($data);
    }

    public function update($id, array $data)
    {
        $buku = $this->bukuRepository->find($id);

        if (isset($data['gambar'])) {
            if ($buku->gambar && Storage::disk('public')->exists($buku->gambar)) {
                Storage::disk('public')->delete($buku->gambar);
            }

            $data['gambar'] = $this->uploadService->uploadBukuImage($data['gambar']);
        }

        return $this->bukuRepository->update($id, $data);
    }

    public function find($id)
    {
        return $this->bukuRepository->find($id);
    }

    public function list()
    {
        return $this->bukuRepository->all();
    }

    public function delete($id)
    {
        return $this->bukuRepository->delete($id);
    }
}
