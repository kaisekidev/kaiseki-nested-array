<?php

declare(strict_types=1);

namespace Kaiseki\Utility;

use function array_key_exists;
use function is_array;
use function is_int;

class NestedArray
{
    /**
     * @param array<mixed> ...$arrays
     * @return array<mixed>
     */
    public function mergeDeep(array ...$arrays): array
    {
        $result = [];
        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (is_int($key)) {
                    $result[] = $value;
                    continue;
                }
                if (is_array($value) && array_key_exists($key, $result) && is_array($result[$key])) {
                    $result[$key] = $this->mergeDeep($result[$key], $value);
                    continue;
                }
                $result[$key] = $value;
            }
        }
        return $result;
    }
}
