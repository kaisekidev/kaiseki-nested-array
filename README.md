# kaiseki/nested-array

Recursively merge nested arrays — a small, dependency-free deep-merge utility.

String keys are merged recursively (nested arrays are combined rather than replaced), while
integer-keyed values are appended. This makes it well suited to merging layered configuration,
where later sources override earlier ones but lists accumulate.

## Installation

```bash
composer require kaiseki/nested-array
```

Requires PHP 8.2 or newer.

## Usage

```php
use Kaiseki\Utility\NestedArray;

$merger = new NestedArray();

$result = $merger->mergeDeep(
    [
        'db'      => ['host' => 'localhost', 'port' => 3306],
        'plugins' => ['seo'],
    ],
    [
        'db'      => ['port' => 5432],
        'plugins' => ['cache'],
    ],
);

// [
//     'db'      => ['host' => 'localhost', 'port' => 5432],
//     'plugins' => ['seo', 'cache'],
// ]
```

`mergeDeep()` accepts any number of arrays and merges them left to right.

### Merge rules

- **String key, array value** — merged recursively.
- **String key, scalar value** — the value from the last array wins.
- **Integer key** — appended, so sequential/list arrays are concatenated rather than merged by index.

## Development

```bash
composer install
composer check   # check-deps, cs-check, phpstan
```

## License

MIT — see [LICENSE](LICENSE).
