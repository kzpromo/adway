<?php
namespace common\models;

class Mlang
{
    /**
     * @var array Cache of parent language(s) of a given language
     */
    protected static $langs;

    protected static $replacementdone = false;

    /**
     * @var string The langauge we are currently using to filter multilang blocks.
     *             It can be either the user current language, or the language 'other'
     */

    public static function filter($text, $currlang = 'ru') {

        if (stripos($text, 'mlang') === false) {
            return $text;
        }

        self::$langs = [
            'ru' => ['ru'],
            'en' => ['en'],
            'kk' => ['kk'],
            'kz' => ['kk'],
        ];

        $search = '/{\s*mlang\s+((?:[a-z0-9_-]+)(?:\s*,\s*[a-z0-9_-]+\s*)*)\s*}(.*?){\s*mlang\s*}/isx';

        $replacelang = $currlang;
        $result = preg_replace_callback($search,
            function ($matches) use ($replacelang) {
                return self::replace_callback($replacelang, $matches);
            },
            $text);

        if (is_null($result)) {
            return $text; // Error during regex processing, keep original text.
        }
        if (self::$replacementdone) {
            return $result;
        }

        if (is_null($result)) {
            return $text;
        }
        return $result;
    }

    protected static function replace_callback($replacelang, $langblock) {
        /* Normalize languages. We can use strtolower instead of
         * core_text::strtolower() as language short names are ASCII
         * only, and strtolower is much faster. We have to remove the
         * white space between language names to be able to match them
         * to official language names.
         */
        $blocklangs = explode(',', str_replace(' ', '', str_replace('-', '_', strtolower($langblock[1]))));
        $blocktext = $langblock[2];
        $parentlangs = self::$langs[$replacelang];
        foreach ($blocklangs as $blocklang) {
            /* We don't check for empty values of $blocklang as they simply don't
             * match any language and they don't produce any errors or warnings.
             */
            if (($blocklang === $replacelang) || in_array($blocklang, $parentlangs)) {
                self::$replacementdone = true;
                return $blocktext;
            }
        }

        return '';
    }
}