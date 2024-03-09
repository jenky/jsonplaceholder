
# JsonPlaceholder PHP SDK example

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Github Actions][ico-gh-actions]][link-gh-actions]
[![Codecov][ico-codecov]][link-codecov]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)

This repository serves as a demonstration of how you can build your SDK/integration with [JsonPlaceholder](https://jsonplaceholder.typicode.com/) service using [Fansipan](https://github.com/phanxipang/fansipan) library.

## Installation

You can install the package via composer:

```bash
composer require jenky/jsonplaceholder
```

## Usage

Create new SDK instance

```php
$sdk = new Jenky\JsonPlaceholder();
```

Get list of users

```php
// GET https://jsonplaceholder.typicode.com/users
$sdk->users()->get();

// GET https://jsonplaceholder.typicode.com/users?_limit=5
$sdk->users()->get(limit: 5);

// GET https://jsonplaceholder.typicode.com/users?_page=2
$sdk->users()->get(page: 2);
```

Get an user by ID

```php
// GET https://jsonplaceholder.typicode.com/users/1
$sdk->users()->id(1)->find();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email contact@lynh.me instead of using the issue tracker.

## Credits

- [Lynh](https://github.com/jenky)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/jenky/jsonplaceholder.svg?style=for-the-badge
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=for-the-badge
[ico-gh-actions]: https://img.shields.io/github/actions/workflow/status/jenky/jsonplaceholder/testing.yml?branch=main&label=actions&logo=github&style=for-the-badge
[ico-codecov]: https://img.shields.io/codecov/c/github/jenky/jsonplaceholder?logo=codecov&style=for-the-badge
[ico-downloads]: https://img.shields.io/packagist/dt/jenky/jsonplaceholder.svg?style=for-the-badge

[link-packagist]: https://packagist.org/packages/jenky/jsonplaceholder
[link-gh-actions]: https://github.com/jenky/jenky/jsonplaceholder
[link-codecov]: https://codecov.io/gh/jenky/jsonplaceholder
[link-downloads]: https://packagist.org/packages/jenky/jsonplaceholder

