<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private $state;

    public function isPublished(): bool
    {
        return $this->state == 'published';
    }
}
