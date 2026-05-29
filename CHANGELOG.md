# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.0.0 - 2026-05-29

First tagged release.

### Added

- `Kaiseki\Utility\NestedArray::mergeDeep()` — recursively merges any number of arrays: nested
  arrays under string keys are merged, scalar values are overridden by later arrays, and
  integer-keyed values are appended.

### Changed

- PHP requirement is `^8.2` (PHP 8.4 is the primary target).
- Modernized the dev toolchain (PHPStan 2, PHPUnit 11, composer-require-checker 4) and depend on
  `kaiseki/php-coding-standard: ^1.0` with the shared PHPStan config; CI runs via the reusable
  workflow in `kaisekidev/.github`.
