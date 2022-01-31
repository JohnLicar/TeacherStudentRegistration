<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property string $course_code
 * @property string $course_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Course extends Model
{
    use HasFactory;
    protected $table = 'course';
    protected $fillable = [
        'course_description',
        'course_code',
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('course_description', 'like', '%'.$search.'%')
            ->OrWhere('course_code', 'like', '%'.$search.'%');
    }

    protected static function booted()
    {
        static::creating(function ($course) {
            $course->course_code = Str::upper($course->course_code);
            $course->course_description = Str::upper($course->course_description);
        });
    }
}
