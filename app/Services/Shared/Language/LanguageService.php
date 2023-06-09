<?php

namespace App\Services\Shared\Language;

class LanguageService
{
  
    public function getAll()
    {
        return [
            array("name" => "Afrikaans", "code" => "af"),
            array("name" => "Albanian - shqip", "code" => "sq"),
            array("name" => "Amharic - አማርኛ", "code" => "am"),
            array("name" => "Arabic - العربية", "code" => "ar"),
            array("name" => "Aragonese - aragonés", "code" => "an"),
            array("name" => "Armenian - հայերեն", "code" => "hy"),
            array("name" => "Asturian - asturianu", "code" => "ast"),
            array("name" => "Azerbaijani - azərbaycan dili", "code" => "az"),
            array("name" => "Basque - euskara", "code" => "eu"),
            array("name" => "Belarusian - беларуская", "code" => "be"),
            array("name" => "Bengali - বাংলা", "code" => "bn"),
            array("name" => "Bosnian - bosanski", "code" => "bs"),
            array("name" => "Breton - brezhoneg", "code" => "br"),
            array("name" => "Bulgarian - български", "code" => "bg"),
            array("name" => "Catalan - català", "code" => "ca"),
            array("name" => "Central Kurdish - کوردی (دەستنوسی عەرەبی)", "code" => "ckb"),
            array("name" => "Chinese - 中文", "code" => "zh"),
            array("name" => "Chinese (Hong Kong) - 中文（香港）", "code" => "zh-HK"),
            array("name" => "Chinese (Simplified) - 中文（简体）", "code" => "zh-CN"),
            array("name" => "Chinese (Traditional) - 中文（繁體）", "code" => "zh-TW"),
            array("name" => "Corsican", "code" => "co"),
            array("name" => "Croatian - hrvatski", "code" => "hr"),
            array("name" => "Czech - čeština", "code" => "cs"),
            array("name" => "Danish - dansk", "code" => "da"),
            array("name" => "Dutch - Nederlands", "code" => "nl"),
            array("name" => "English", "code" => "en"),
            array("name" => "English (Australia)", "code" => "en-AU"),
            array("name" => "English (Canada)", "code" => "en-CA"),
            array("name" => "English (India)", "code" => "en-IN"),
            array("name" => "English (New Zealand)", "code" => "en-NZ"),
            array("name" => "English (South Africa)", "code" => "en-ZA"),
            array("name" => "English (United Kingdom)", "code" => "en-GB"),
            array("name" => "English (United States)", "code" => "en-US"),
            array("name" => "Esperanto - esperanto", "code" => "eo"),
            array("name" => "Estonian - eesti", "code" => "et"),
            array("name" => "Faroese - føroyskt", "code" => "fo"),
            array("name" => "Filipino", "code" => "fil"),
            array("name" => "Finnish - suomi", "code" => "fi"),
            array("name" => "French - français", "code" => "fr"),
            array("name" => "French (Canada) - français (Canada)", "code" => "fr-CA"),
            array("name" => "French (France) - français (France)", "code" => "fr-FR"),
            array("name" => "French (Switzerland) - français (Suisse)", "code" => "fr-CH"),
            array("name" => "Galician - galego", "code" => "gl"),
            array("name" => "Georgian - ქართული", "code" => "ka"),
            array("name" => "German - Deutsch", "code" => "de"),
            array("name" => "German (Austria) - Deutsch (Österreich)", "code" => "de-AT"),
            array("name" => "German (Germany) - Deutsch (Deutschland)", "code" => "de-DE"),
            array("name" => "German (Liechtenstein) - Deutsch (Liechtenstein)", "code" => "de-LI"),
            array("name" => "German (Switzerland) - Deutsch (Schweiz)", "code" => "de-CH"),
            array("name" => "Greek - Ελληνικά", "code" => "el"),
            array("name" => "Guarani", "code" => "gn"),
            array("name" => "Gujarati - ગુજરાતી", "code" => "gu"),
            array("name" => "Hausa", "code" => "ha"),
            array("name" => "Hawaiian - ʻŌlelo Hawaiʻi", "code" => "haw"),
            array("name" => "Hebrew - עברית", "code" => "he"),
            array("name" => "Hindi - हिन्दी", "code" => "hi"),
            array("name" => "Hungarian - magyar", "code" => "hu"),
            array("name" => "Icelandic - íslenska", "code" => "is"),
            array("name" => "Indonesian - Indonesia", "code" => "id"),
            array("name" => "Interlingua", "code" => "ia"),
            array("name" => "Irish - Gaeilge", "code" => "ga"),
            array("name" => "Italian - italiano", "code" => "it"),
            array("name" => "Italian (Italy) - italiano (Italia)", "code" => "it-IT"),
            array("name" => "Italian (Switzerland) - italiano (Svizzera)", "code" => "it-CH"),
            array("name" => "Japanese - 日本語", "code" => "ja"),
            array("name" => "Kannada - ಕನ್ನಡ", "code" => "kn"),
            array("name" => "Kazakh - қазақ тілі", "code" => "kk"),
            array("name" => "Khmer - ខ្មែរ", "code" => "km"),
            array("name" => "Korean - 한국어", "code" => "ko"),
            array("name" => "Kurdish - Kurdî", "code" => "ku"),
            array("name" => "Kyrgyz - кыргызча", "code" => "ky"),
            array("name" => "Lao - ລາວ", "code" => "lo"),
            array("name" => "Latin", "code" => "la"),
            array("name" => "Latvian - latviešu", "code" => "lv"),
            array("name" => "Lingala - lingála", "code" => "ln"),
            array("name" => "Lithuanian - lietuvių", "code" => "lt"),
            array("name" => "Macedonian - македонски", "code" => "mk"),
            array("name" => "Malay - Bahasa Melayu", "code" => "ms"),
            array("name" => "Malayalam - മലയാളം", "code" => "ml"),
            array("name" => "Maltese - Malti", "code" => "mt"),
            array("name" => "Marathi - मराठी", "code" => "mr"),
            array("name" => "Mongolian - монгол", "code" => "mn"),
            array("name" => "Nepali - नेपाली", "code" => "ne"),
            array("name" => "Norwegian - norsk", "code" => "no"),
            array("name" => "Norwegian Bokmål - norsk bokmål", "code" => "nb"),
            array("name" => "Norwegian Nynorsk - nynorsk", "code" => "nn"),
            array("name" => "Occitan", "code" => "oc"),
            array("name" => "Oriya - ଓଡ଼ିଆ", "code" => "or"),
            array("name" => "Oromo - Oromoo", "code" => "om"),
            array("name" => "Pashto - پښتو", "code" => "ps"),
            array("name" => "Persian - فارسی", "code" => "fa"),
            array("name" => "Polish - polski", "code" => "pl"),
            array("name" => "Portuguese - português", "code" => "pt"),
            array("name" => "Portuguese (Brazil) - português (Brasil)", "code" => "pt-BR"),
            array("name" => "Portuguese (Portugal) - português (Portugal)", "code" => "pt-PT"),
            array("name" => "Punjabi - ਪੰਜਾਬੀ", "code" => "pa"),
            array("name" => "Quechua", "code" => "qu"),
            array("name" => "Romanian - română", "code" => "ro"),
            array("name" => "Romanian (Moldova) - română (Moldova)", "code" => "mo"),
            array("name" => "Romansh - rumantsch", "code" => "rm"),
            array("name" => "Russian - русский", "code" => "ru"),
            array("name" => "Scottish Gaelic", "code" => "gd"),
            array("name" => "Serbian - српски", "code" => "sr"),
            array("name" => "Serbo - Croatian", "code" => "sh"),
            array("name" => "Shona - chiShona", "code" => "sn"),
            array("name" => "Sindhi", "code" => "sd"),
            array("name" => "Sinhala - සිංහල", "code" => "si"),
            array("name" => "Slovak - slovenčina", "code" => "sk"),
            array("name" => "Slovenian - slovenščina", "code" => "sl"),
            array("name" => "Somali - Soomaali", "code" => "so"),
            array("name" => "Southern Sotho", "code" => "st"),
            array("name" => "Spanish - español", "code" => "es"),
            array("name" => "Spanish (Argentina) - español (Argentina)", "code" => "es-AR"),
            array("name" => "Spanish (Latin America) - español (Latinoamérica)", "code" => "es-419"),
            array("name" => "Spanish (Mexico) - español (México)", "code" => "es-MX"),
            array("name" => "Spanish (Spain) - español (España)", "code" => "es-ES"),
            array("name" => "Spanish (United States) - español (Estados Unidos)", "code" => "es-US"),
            array("name" => "Sundanese", "code" => "su"),
            array("name" => "Swahili - Kiswahili", "code" => "sw"),
            array("name" => "Swedish - svenska", "code" => "sv"),
            array("name" => "Tajik - тоҷикӣ", "code" => "tg"),
            array("name" => "Tamil - தமிழ்", "code" => "ta"),
            array("name" => "Tatar", "code" => "tt"),
            array("name" => "Telugu - తెలుగు", "code" => "te"),
            array("name" => "Thai - ไทย", "code" => "th"),
            array("name" => "Tigrinya - ትግርኛ", "code" => "ti"),
            array("name" => "Tongan - lea fakatonga", "code" => "to"),
            array("name" => "Turkish - Türkçe", "code" => "tr"),
            array("name" => "Turkmen", "code" => "tk"),
            array("name" => "Twi", "code" => "tw"),
            array("name" => "Ukrainian - українська", "code" => "uk"),
            array("name" => "Urdu - اردو", "code" => "ur"),
            array("name" => "Uyghur", "code" => "ug"),
            array("name" => "Uzbek - o‘zbek", "code" => "uz"),
            array("name" => "Vietnamese - Tiếng Việt", "code" => "vi"),
            array("name" => "Walloon - wa", "code" => "wa"),
            array("name" => "Welsh - Cymraeg", "code" => "cy"),
            array("name" => "Western Frisian", "code" => "fy"),
            array("name" => "Xhosa", "code" => "xh"),
            array("name" => "Yiddish", "code" => "yi"),
            array("name" => "Yoruba - Èdè Yorùbá", "code" => "yo"),
            array("name" => "Zulu - isiZulu", "code" => "zu")
        ];
    }
}
