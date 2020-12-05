<?php

namespace App\BusinessRules\Admin\Models;

use App\Models\User;
use App\BusinessRules\Admin\Models\AdminFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends User
{
    use HasFactory;
    protected $table = 'users';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return AdminFactory::new();
    }
}
