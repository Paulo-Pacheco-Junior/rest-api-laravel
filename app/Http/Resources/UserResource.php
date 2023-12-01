<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email
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
                return 'Usuário cadastrado com sucesso!';
                break;
            case 'update':
                return 'Usuário atualizado com sucesso!';
                break;
            case 'destroy':
                return 'Usuário removido com sucesso!';
                break;  
            default:
                return '';
        }
    } 
}
