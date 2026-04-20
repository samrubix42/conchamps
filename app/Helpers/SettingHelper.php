<?php

namespace App\Helpers;

use App\Models\Setting;

class SettingHelper
{
    protected static ?array $cache = null;

    public static function all(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }

        self::$cache = Setting::query()->pluck('value', 'key')->toArray();

        return self::$cache;
    }

    public static function get(string $key, ?string $default = null): ?string
    {
        $all = self::all();

        return $all[$key] ?? $default;
    }

    public static function asset(string $key, string $defaultAssetPath): string
    {
        $value = self::get($key);

        if (blank($value)) {
            return asset($defaultAssetPath);
        }

        if (preg_match('/^https?:\/\//i', $value)) {
            return $value;
        }

        return asset($value);
    }

    public static function tel(?string $phone): string
    {
        if (blank($phone)) {
            return '';
        }

        $clean = preg_replace('/[^0-9+]/', '', $phone);

        return is_string($clean) ? $clean : '';
    }

    public static function websiteDefaults(): array
    {
        $phone = self::get('phone_number', '+1 (800) 787-8201');
        $legacyLogo = self::get('logo_path');

        $headerLogo = self::get('header_logo_path', $legacyLogo);
        $footerLogo = self::get('footer_logo_path', $legacyLogo);

        return [
            'project_name' => self::get('project_name', 'Concrete Champs'),
            'email' => self::get('email', 'info@domain.com'),
            'phone_number' => $phone,
            'phone_tel' => self::tel($phone),
            'whatsapp_number' => self::get('whatsapp_number', ''),
            'office_timing' => self::get('office_timing', 'Mon - Sat 8:00 - 17:30'),
            'address' => self::get('address', '1200 Industrial Way, New York, NY'),
            'logo_url' => $headerLogo ? asset($headerLogo) : self::asset('logo_path', 'Concrete-Champs-dark.png'),
            'header_logo_url' => $headerLogo ? asset($headerLogo) : self::asset('logo_path', 'Concrete-Champs-dark.png'),
            'footer_logo_url' => $footerLogo ? asset($footerLogo) : self::asset('logo_path', 'Concrete-Champs-white.png'),
            'favicon_url' => self::asset('favicon_path', 'favicon.ico'),
            'instagram' => self::get('instagram', '#'),
            'x' => self::get('x', '#'),
            'linkedin' => self::get('linkedin', '#'),
            'facebook' => self::get('facebook', '#'),
        ];
    }
}
