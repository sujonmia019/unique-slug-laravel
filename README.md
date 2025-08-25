# Unique Slug Laravel

A lightweight and flexible **Laravel package** to generate **unique, SEO-friendly slugs** for your Eloquent models.  
Perfect for creating clean URLs for blogs, products, users, and more.

---

## 🚀 Features

- Generate **unique slugs** from any model field
- Prevents duplicates by auto-appending numbers
- Configurable separator and max retry count
- Works with any Eloquent model
- Supports Laravel 9, 10, and 11
- Includes Facade (`Slug::`) and Service Provider
- Publishable config file

---

## 📦 Installation

Require the package via Composer:

```bash
composer require myolbd/unique-slug
```

## Configuration

**Service Provider Registration**
In `config/app.php`, add in `providers` array -

```php
'providers' => [
    // ...
    Myol\UniqueSlug\SlugServiceProvider::class,
    // ...
],
```
  
**Facade Class Alias**
Add in aliases array - 
```php
'aliases' => Facade::defaultAliases()->merge([
    // ...
    'Slug' => Myol\UniqueSlug\Facades\Slug::class,
    // ...
])->toArray(),


## Use from Controller

#### Import first the UniqueSlug facade
```php
use Myol\UniqueSlug\Facades\Slug;
```
### Example #01- Post unique slug from title

Let's assume, we have in `Post` class, we've added `slug` column which is unique. Now, if we passed `title` and generate `slug` from that, then -

```php
use App\Models\Post;

// First time create post with title Simple Post
Slug::generate(Post::class, 'Simple Post', 'slug');
// Output: simple-post

// Second time create post with title Simple Post
Slug::generate(Post::class, 'Simple Post', 'slug');
// Output: simple-post-1

// Third time create post with title Simple Post
Slug::generate(Post::class, 'Simple Post', 'slug');
// Output: simple-post-2
```

### Example #02 - Pass custom separator

Let's assume separator is `''` empty.

```php
// First time create user.
Slug::generate(User::class, 'sujon', 'username', ''); // sujon

// Second time create user.
Slug::generate(User::class, 'sujon', 'username', ''); // sujon1

// Third time create user.
Slug::generate(User::class, 'sujon', 'username', ''); // sujon2
```

### Example - Unique slug for category or any model easily
```php
public function create(array $data): Category|null
{
    if (empty($data['slug'])) {
        $data['slug'] = Slug::generate(Category::class, $data['name'], 'slug');
    }

    return Category::create($data);
}
```

### Generate method -
```php
Slug::generate($model, $value, $field, $separator);
```

```php
/**
 * Generate a Unique Slug.
 *
 * @param object $model
 * @param string $value
 * @param string $field
 * @param string $separator
 *
 * @return string
 * @throws \Exception
 */
public function generate(
    $model,
    $value,
    $field,
    $separator = null
): string

```

#### Publish configuration
```sh
php artisan vendor:publish myolbd/unique-slug
```

#### Configurations

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Slug default separator.
    |--------------------------------------------------------------------------
    |
    | If no separator is passed, then this default separator will be used as slug.
    |
    */
    'separator' => '-',

    /*
    |--------------------------------------------------------------------------
    | Slug max count limit
    |--------------------------------------------------------------------------
    |
    | Default 100, slug will generated like
    | test-1, test-2, test-3 .... test-100
    |
    */
    'max_count' => 100,
];

```

## Contribution
You're open to create any Pull request.