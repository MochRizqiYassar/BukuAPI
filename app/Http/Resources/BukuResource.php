<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BukuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
{
    return [
        'id' => $this->id,
        'judul' => $this->judul,
        'penulis' => $this->penulis,
        'deskripsi' => $this->deskripsi,
        'tahun_terbit' => $this->tahun_terbit,
        'gambar_url' => $this->gambar ? asset('storage/' . $this->gambar) : null,
        'created_at' => $this->created_at->format('Y-m-d H:i:s'),
    ];
}

}
