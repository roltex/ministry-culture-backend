<?php

namespace App\Utils;

class GeorgianTransliterator
{
    private static array $georgianToLatin = [
        'ა' => 'a', 'ბ' => 'b', 'გ' => 'g', 'დ' => 'd', 'ე' => 'e', 'ვ' => 'v',
        'ზ' => 'z', 'თ' => 't', 'ი' => 'i', 'კ' => 'k', 'ლ' => 'l', 'მ' => 'm',
        'ნ' => 'n', 'ო' => 'o', 'პ' => 'p', 'ჟ' => 'zh', 'რ' => 'r', 'ს' => 's',
        'ტ' => 't', 'უ' => 'u', 'ფ' => 'p', 'ქ' => 'k', 'ღ' => 'gh', 'ყ' => 'q',
        'შ' => 'sh', 'ჩ' => 'ch', 'ც' => 'ts', 'ძ' => 'dz', 'წ' => 'ts', 'ჭ' => 'ch',
        'ხ' => 'kh', 'ჯ' => 'j', 'ჰ' => 'h',
        // Uppercase
        'Ა' => 'A', 'Ბ' => 'B', 'Გ' => 'G', 'Დ' => 'D', 'Ე' => 'E', 'Ვ' => 'V',
        'Ზ' => 'Z', 'Თ' => 'T', 'Ი' => 'I', 'Კ' => 'K', 'Ლ' => 'L', 'Მ' => 'M',
        'Ნ' => 'N', 'Ო' => 'O', 'Პ' => 'P', 'Ჟ' => 'Zh', 'Რ' => 'R', 'Ს' => 'S',
        'Ტ' => 'T', 'Უ' => 'U', 'Ფ' => 'P', 'Ქ' => 'K', 'Ღ' => 'Gh', 'Ყ' => 'Q',
        'Შ' => 'Sh', 'Ჩ' => 'Ch', 'Ც' => 'Ts', 'Ძ' => 'Dz', 'Წ' => 'Ts', 'Ჭ' => 'Ch',
        'Ხ' => 'Kh', 'Ჯ' => 'J', 'Ჰ' => 'H',
    ];

    public static function transliterate(string $georgianText): string
    {
        // Convert Georgian to Latin
        $latinText = strtr($georgianText, self::$georgianToLatin);
        
        // Convert to lowercase
        $latinText = strtolower($latinText);
        
        // Replace spaces and special characters with hyphens
        $latinText = preg_replace('/[^a-z0-9\s-]/', '', $latinText);
        $latinText = preg_replace('/[\s-]+/', '-', $latinText);
        
        // Remove leading and trailing hyphens
        $latinText = trim($latinText, '-');
        
        return $latinText;
    }

    public static function generateSlug(string $georgianTitle): string
    {
        return self::transliterate($georgianTitle);
    }
} 