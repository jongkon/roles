<?php namespace Bican\Roles\Models;

use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Contracts\RoleContract;
use Bican\Roles\Traits\RoleTrait;
use Bican\Roles\Traits\SlugableTrait;
use Illuminate\Support\Facades\Config;

class Role extends Model implements RoleContract {

    use RoleTrait, SlugableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'level'];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     * @return mixed
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = Config::get('roles.connection'))
        {
            $this->connection = $connection;
        }
    }

}