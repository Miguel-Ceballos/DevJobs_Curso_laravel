<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacancy extends Model
{
    use HasFactory;

    protected $casts = [ 'last_day' => 'date' ];

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company',
        'last_day',
        'description',
        'image',
        'user_id'
    ];

    // Agregamos relaciones para los campos de otra tabla y recuperar sus valores a través del ID
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function salary() : BelongsTo
    {
        return $this->belongsTo(Salary::class);
    }

    public function candidates() : HasMany
    {
        return $this->hasMany(Candidate::class)->orderBy('created_at', 'DESC');
    }

    public function recruiter() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
