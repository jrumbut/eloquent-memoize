# EloquentMemoize

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/86871de1-5cb6-4015-ba22-ce4c8827974c/mini.png)](https://insight.sensiolabs.com/projects/86871de1-5cb6-4015-ba22-ce4c8827974c)

Memoization for [Eloquent](https://laravel.com/docs/5.2/eloquent) models.

## Install

Via Composer

``` bash
$ composer require jrumbut/eloquent-memoize
```

## Usage

``` php
class MyModel extends MemoizingModel
{
    protected static $memoized = ['slow_attribute'];

    //Now only slow the first time it's accessed
    public function getSlowAttribute($value)
    {
        sleep(3);
        return ucwords($value);
    }
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email joshua.rumbut@gmail.com instead of using the issue tracker.

## Credits

- [Joshua Rumbut][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/jrumbut/eloquent-memoize.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/jrumbut/eloquent-memoize/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/jrumbut/eloquent-memoize.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jrumbut/eloquent-memoize.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/jrumbut/eloquent-memoize.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jrumbut/eloquent-memoize
[link-travis]: https://travis-ci.org/jrumbut/eloquent-memoize
[link-scrutinizer]: https://scrutinizer-ci.com/g/jrumbut/eloquent-memoize/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/jrumbut/eloquent-memoize
[link-downloads]: https://packagist.org/packages/jrumbut/eloquent-memoize
[link-author]: https://github.com/jrumbut
[link-contributors]: ../../contributors
