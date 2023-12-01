<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,
            'price' => $this->price,
            'description' => $this->description
        ];
    }

    public function with($request)
    {
        return [
            'message' => $this->getMessage(),
        ];
    }

    protected function getMessage()
    {
        switch (request()->route()->getActionMethod()) {
            case 'store':
                return 'Produto cadastrado com sucesso!';
                break;
            case 'update':
                return 'Produto atualizado com sucesso!';
                break;
            case 'destroy':
                return 'Produto removido com sucesso!';
                break;  
            default:
                return '';
        }
    }
}
