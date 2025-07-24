<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BukuService;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Http\Resources\BukuResource;
use App\Services\UploadService;
use App\Models\Buku;

class BukuController extends Controller
{
    protected $bukuService;
    protected $uploadService;

        public function __construct(BukuService $bukuService, UploadService $uploadService)
    {
        $this->bukuService = $bukuService;
        $this->uploadService = $uploadService;
    }

    public function index()
    {
        return BukuResource::collection($this->bukuService->list());
    }

    public function store(StoreBukuRequest $request)
{
    $validated = $request->validated();

    $buku = $this->bukuService->store($validated, $request->file('gambar'));

    return response()->json($buku, 201);
}


    public function show($id)
    {
        return new BukuResource($this->bukuService->find($id));
    }

    public function update(UpdateBukuRequest $request, $id)
    {
        $buku = $this->bukuService->update($id, $request->validated());
        return new BukuResource($buku);
    }

    public function destroy($id)
    {
        $this->bukuService->delete($id);
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
