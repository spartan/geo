<?php

namespace Spartan\Geo;

class Country
{
    protected string $iso2;
    protected array $data = [];

    public function __construct($iso2)
    {
        $this->iso2  = $iso2;
    }

    public function data()
    {
        if (!$this->data) {
            $this->data = json_decode(file_get_contents(__DIR__ . "/../data/country/{$this->iso2}.json"), true);
        }

        return $this->data;
    }

    public function name(string $locale = 'en_US'): string
    {
        return $this->data()['translation'][$locale] ?? $this->data()['name'];
    }
}
