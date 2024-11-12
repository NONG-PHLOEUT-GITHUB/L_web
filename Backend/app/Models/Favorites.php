<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'course_id'
    ];

    public static function store($request, $id = null)
    {
        $favorites = $request->only(
            'id',
            'user_id',
            'course_id'
        );
        if ($id) {
            $favorite = self::find($id);
            if (!$favorite) {
                return response()->json(['error' => 'Record not found'], 404);
            }
            $favorite->update($favorites);
        } else {
            $favorite = self::create($favorites);
            $id = $favorite->$id;
        }
        return response()->json(['success' => true, 'data' => $favorite], 201);
    }

    // In app/Models/Favorite.php
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
