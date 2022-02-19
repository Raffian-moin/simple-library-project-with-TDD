<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birth_date'];

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function birthDate(): Attribute {
        return new Attribute(
            get: fn ($value) => date("Y-m-d", strtotime(str_replace('/', '-', $value))),
            set: fn ($value) => date("Y-m-d", strtotime(str_replace('/', '-', $value)))
        );
    }
}
