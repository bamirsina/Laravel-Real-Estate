<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Home extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'status',
        'user_id',
        'logo_path',
        'property_types',
        'type',
        'price',
        'room',
        'square_feet',
        'floor',
        'location_city',
        'phone',
        'description',

    ];

    public function toSearchableArray()
    {
        return [
            'property_types' => $this->property_types,
            'type'           => $this->type,
            'price'          => $this->price,
            'room'           => $this->room,
            'square_feet'    => $this->square_feet,
            'floor'          => $this->floor,
            'location_city'  => $this->location_city,
            'phone'          => $this->phone,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
