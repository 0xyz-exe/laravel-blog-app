<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'nullable|max:500',
            'content' => 'required',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
        ];
    }
}
