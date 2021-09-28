[![commet](https://raw.githubusercontent.com/pasanks/comet/main/.github/banner.png)](https://github.com/pasanks/comet)

# Comet | Laravel Eloquent Model & Relationship Filter

## Introduction

This package allows querying your Eloquent models, based on URL queries. Using some simple rules, you can even filter based on related models and use diferent SQL comparison operators.

## Official Documentation

Documentation for Scorch is still in progress.

```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Filters\UserFilter;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get a listing of all users.
     *
     * @param \Illumintae\Http\Request $request
     * @param \App\Filters\UserFilter $filters
     *
     * @return \Illumintae\Http\Response
     **/
    public function index(Request $request, UserFilter $filters)
    {
        $users = User::filter($filters)->get();

        return $request->expectsJson()
            ? response()->json($users, 200)
            : view('users.index', compact('users'));
    }
}
```

## Contributing

Thank you for considering contributing to Scorch! You can read the contribution guide [here](.github/CONTRIBUTING.md).

## Code of Conduct

In order to ensure that the Emberfuse community is welcoming to all, please review and abide by the [Code of Conduct](.github/CODE_OF_CONDUCT.md).

## Security Vulnerabilities

Please review [our security policy](https://github.com/emberfuse/scorch/security/policy) on how to report security vulnerabilities.

## License

Emberfuse Scorch is open-sourced software licensed under the [MIT license](LICENSE.md).
