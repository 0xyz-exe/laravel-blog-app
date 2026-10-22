<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'excerpt', 'content', 'status', 'published_at'];
    protected $casts = ['published_at' => 'datetime'];
    
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            if (!$post->slug) $post->slug = Str::slug($post->title);
        });
    }
    
    public function user() { return $this->belongsTo(User::class); }
    public function category() { return $this->belongsTo(Category::class); }
    
    public function scopePublished($query) { return $query->where('status', 'published')->whereNotNull('published_at')->where('published_at', '<=', now()); }
    public function scopeDraft($query) { return $query->where('status', 'draft'); }
    
    public function getRouteKeyName() { return 'slug'; }
}
