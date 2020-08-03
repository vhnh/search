![VHNH](https://avatars3.githubusercontent.com/u/66573047?s=200)

# vhnh/search
The Vhnh Search package provides a simple search for Eloquent.

![tests](https://github.com/vhnh/search/workflows/tests/badge.svg)

## Setup

To make a model searchable it should implement the `Vhnh\Search\Contracts\Searchable` interface and use the `Vhnh\Search\Searchable` trait.

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vhnh\Search\Contracts\Searchable as SearchableContract;
use Vhnh\Search\Searchable;

class Book extends Model implements SearchableContract
{
    use Searchable;

    // ...
}
```

## Usage

The `Vhnh\Search\Contracts\Searchable::search()` method simply follows the needle in haystack principle and accepts the search term as its first paramter and an `array` of attributes as the second parameter. 

```php
Book::search('tolkien', ['author']);
```

## License
The Vhnh Search package is open-sourced software licensed under the [MIT](http://opensource.org/licenses/MIT) license.