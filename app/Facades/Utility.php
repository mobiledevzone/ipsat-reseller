<?php

namespace App\Facades;

use App\Models\Plan;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Utility
{

    public function settings()
    {
        $data = DB::table('settings');
        $data = $data->get();

        $settings = [
            'date_format' => 'M j, Y',
            'time_format' => 'g:i A',
        ];

        foreach ($data as $row) {
            $settings[$row->key] = $row->value;
        }

        return $settings;
    }

    public function date_format($date)
    {
        return Carbon::parse($date)->format($this->getsettings('date_format'));
    }

    public function time_format($date)
    {
        return Carbon::parse($date)->format($this->getsettings('time_format'));
    }

    public function date_time_format($date)
    {
        return Carbon::parse($date)->format($this->getsettings('date_format') . ' ' . $this->getsettings('time_format'));
    }

    public function setEnvironmentValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}='{$envValue}'\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}='{$envValue}'", $str);
                }
            }
        }
        $str = substr($str, 0, -1);
        $str .= "\n";
        if (!file_put_contents($envFile, $str)) {
            return false;
        }

        return true;
    }

    public function getValByName($key)
    {
        $setting = $this->settings();
        if (!isset($setting[$key]) || empty($setting[$key])) {
            $setting[$key] = '';
        }

        return $setting[$key];
    }

    public function languages()
    {
        $dir = base_path() . '/resources/lang/';
        $glob = glob($dir . '*', GLOB_ONLYDIR);
        $arrLang = array_map(
            function ($value) use ($dir) {
                return str_replace($dir, '', $value);
            },
            $glob
        );
        $arrLang = array_map(
            function ($value) use ($dir) {
                return preg_replace('/[0-9]+/', '', $value);
            },
            $arrLang
        );
        $arrLang = array_filter($arrLang);
        return $arrLang;
    }

    public function delete_directory($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!self::delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }

        return rmdir($dir);
    }
    public function getsettings($value = '')
    {
        $setting = Setting::select('value');

        if (!empty(tenant('id'))) {
            $setting->where('tenant_id', tenant('id'));
        } else {
            $setting->whereNull('tenant_id');
        }
        $set =  $setting->where('key', $value)->first();
        $val = '';
        if (!empty($set->value)) {

            $val = $set->value;
        }
        return $val;
    }

    public function storesettings($formatted_array)
    {
        if (tenant('id') == null) {
            $row = Setting::where('key', $formatted_array['key'])->whereNull('tenant_id')->first();
        } else {
            $row = Setting::where('key', $formatted_array['key'])->where('tenant_id', tenant('id'))->first();
        }

        if (empty($row)) {
            Setting::create($formatted_array);
        } else {
            $row->update($formatted_array);
        }
        $affected_row = Setting::find($formatted_array['key']);
        return $affected_row;
    }
    public function getpath($name)
    {
        if (config('filesystems.default') == 'local'  && tenant('id') == null) {

            $src = $name ? Storage::url(tenant('id') . $name) : Storage::url('logo/app-logo.png');
        } elseif (config('filesystems.default') == 'local') {
            $src = $name ? Storage::url(tenant('id') . '/' . $name) : Storage::url('logo/app-logo.png');
        } else {
            $src = $name ? Storage::url($name) : Storage::url('logo/app-logo.png');
        }
        return $src;
    }
}
