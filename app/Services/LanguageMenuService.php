<?php

namespace App\Services;

final class LanguageMenuService
{
    private const LANGUAGE_MENU = [
        'en' => [
            'language' => 'English',
        ],
        'es' => [
            'language' => 'Spanish',
        ],
    ];

    public static function getMenu(): array
    {
        return self::LANGUAGE_MENU;
    }
}
