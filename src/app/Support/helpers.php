<?php

/**
 * Created by Byte Net IT Company.
 *
 * Helper app functions. PHP version 7.1
 *
 * @package ByteNet\LaravelBase
 * @author  Byte Net <office@bytenet.rs>
 * @license http://bytenet.rs/licenses/btnt-license-v1-0 BTNT-License v1.0
 * @link    http://bytenet.rs Byte Net IT company
 */

if (! function_exists('mb_ucfirst')) {
    /**
     * Make upper capital first letter of given string
     *
     * @param string $str String for manipulation
     * @return string String with upper capital first letter
     */
    function mb_ucfirst($str) {
        $fc = mb_strtoupper(mb_substr($str, 0, 1));
        return $fc.mb_substr($str, 1);
    }
}

if (! function_exists('flash')) {
    /**
     * Flash the custom values to the session.
     *
     * @param $message
     * @param string $title
     * @param string $level
     * @param string $position
     * @return void
     */
    function flash($message, $title = '', $level = 'info', $position = 'default') {
        static $id = 0;

        $stdClass = new stdClass();
        $stdClass->message = $message;
        $stdClass->title = $title;
        $stdClass->level = $level;
        $stdClass->position = $position;

        session()->flash("user.flash_messages.{$id}", $stdClass);
        $id++;
    }
}



if (! function_exists('locale') && class_exists(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::class)) {
    /**
     * @param bool $defaultLocale
     * @return string
     */
    function locale ($defaultLocale = false) {
        //trim($this->locale, '/'),
        return \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale()
            ?:
            ($defaultLocale==true ? \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() : "");
    }
}

if (! function_exists('getLocales') && class_exists(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::class)) {
    /**
     * Get app localizations
     *
     * @return array
     */
    function getLocales()
    {
        $locales = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalesOrder();

        array_walk($locales, function(&$a, $b) {
            $a['slug'] = str_slug($b, '_');
        });

        return $locales;
    }
}

if (! function_exists('getLocalesSlug')) {
    /**
     * Get app localization slugs
     *
     * @return array
     */
    function getLocalesSlug()
    {
        return array_column(getLocales(), 'slug');
    }
}



if (! function_exists('getPath') && class_exists(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::class)) {
    /**
     * Get custom path
     *
     * @param string $path Specific path ath
     * @param bool $admin Is admin path?
     * @return string Relative path
     */
    function getPath($path, $admin = false)
    {
        $locale = locale();
        $locale = $locale ? "/{$locale}" : "";

        $admin = $admin ? "/" . config("bytenet.base.route_prefix") : "";

        $path = $path ? "/{$path}" : "";

        return $locale . $admin . $path;
    }
}


if (! function_exists('multilangField') && class_exists(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::class)) {
    /**
     * Return multilangual versions of field, based on [input_fields.lang => DB] prepared content
     *
     * @param string $field
     * @param string $valueSeparator
     * @param string $keySeparator
     * @return array
     */
    function multilangField($field = 'alias', $valueSeparator = '_', $keySeparator = '.') {
        $slugs = array();
        foreach (getLocales() as $locale) {
            $slugs[$field . $keySeparator . $locale['slug']] = $locale['slug'];
        }

        return array_map(function($slug) use ($field, $valueSeparator){
            return $field . $valueSeparator . $slug;
        }, $slugs);
    }
}





if (! function_exists('multilangStoreRequest')) {
    /**
     * Make store array for multilangual fields
     *
     * @param string $field
     * @return array
     */
    function multilangStoreRequest($field = 'alias')
    {
        $res = multilangField($field, '.', '_');
        array_walk($res, function (&$a) {
            $a = request($a);
        });

        return $res;
    }
}

if (! function_exists('setAliases')) {
    /**
     * Set aliases for content
     *
     * @param array $aliases
     * @param array $helpers
     * @param null $defaultKey
     * @return array
     */
    function setAliases($aliases = array(), $helpers = array(), $defaultKey = null)
    {
        $system = systemAlias($aliases, $helpers, $defaultKey);

        if (count($aliases) !== count($helpers)) {
            return [$system];
        }

        //$results = array();
        //array_map(function($a, $b) use (& $results) {
        //    $results[] = [$a, $b];
        //}, $aliases, $helpers);
        // dd($results);

        $results = array_values($helpers);
        //dd($results);

        $i = 0;
        foreach ($aliases as $key => & $alias) {

            if ($alias = str_slug($alias)) {
                $i++;
                continue;
            } elseif ($alias = str_slug($results[$i])) {
                $i++;
                continue;
            }

            $alias = $system;
            $i++;
        }
        unset($alias);

        return $aliases;
    }
}

if (! function_exists('systemAlias')) {
    /**
     * Return default system alias
     *
     * @param array $aliases
     * @param array $helpers
     * @param null|string $defaultKey
     * @return string
     */
    function systemAlias($aliases = array(), $helpers = array(), $defaultKey = null)
    {
        // dd($aliases + $helpers);

        if ($defaultKey) {
            if (isset($aliases[$defaultKey])) {
                return str_slug($aliases[$defaultKey]);
            } elseif (isset($helpers[$defaultKey])) {
                return str_slug($helpers[$defaultKey]);
            }
        }

        $system = array_filter(array_merge($aliases, $helpers));
        // dd($system);

        if (empty($system)) {
            return str_random(15);
        }

        return str_slug(array_values($system)[0]);
    }
}
