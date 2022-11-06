# Laravel-course
 Laravel is a free and open-source PHP framework that provides a set of tools and resources to build modern PHP applications.
## UI Auth Overview

<details>
<summary>Click Here </summary>

1. how to work laravel ui auth
2. how to work middleware
</details>

## Eloquent Relationship Overview

<details>
<summary>one To one </summary>

`php `
```php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class User extends Model
{
    /**
     * Get the phone associated with the user.
     */
    public function phone()
    {
        return $this->hasOne(Phone::class);
    }
}

```

</details>