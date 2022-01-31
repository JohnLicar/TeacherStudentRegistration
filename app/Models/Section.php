<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Section extends Model
{
    use HasFactory;
    protected $table = 'section';

    protected $fillable = ['section_description', 'year_level_id', 'course_id'];

    public function yearLevel()
    {
        return $this->belongsTo(YearLevel::class, 'year_level_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('section_description', 'like', '%' . $search . '%')
            ->orWhereHas('yearLevel', function ($query) use ($search) {
                $query->where('year_description', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('course', function ($query) use ($search) {
                $query->where('course_code', 'LIKE', '%' . $search . '%');
            });
    }

    protected static function booted()
    {
        static::creating(function ($section) {
            $section->section_description = Str::upper($section->section_description);
        });
    }
}
