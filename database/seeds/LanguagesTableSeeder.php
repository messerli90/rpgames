<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            ["code" => "ab","title" => "Abkhaz"],
            ["code" => "aa","title" => "Afar"],
            ["code" => "af","title" => "Afrikaans"],
            ["code" => "ak","title" => "Akan"],
            ["code" => "sq","title" => "Albanian"],
            ["code" => "am","title" => "Amharic"],
            ["code" => "ar","title" => "Arabic"],
            ["code" => "an","title" => "Aragonese"],
            ["code" => "hy","title" => "Armenian"],
            ["code" => "as","title" => "Assamese"],
            ["code" => "av","title" => "Avaric"],
            ["code" => "ae","title" => "Avestan"],
            ["code" => "ay","title" => "Aymara"],
            ["code" => "az","title" => "Azerbaijani"],
            ["code" => "bm","title" => "Bambara"],
            ["code" => "ba","title" => "Bashkir"],
            ["code" => "eu","title" => "Basque"],
            ["code" => "be","title" => "Belarusian"],
            ["code" => "bn","title" => "Bengali"],
            ["code" => "bh","title" => "Bihari"],
            ["code" => "bi","title" => "Bislama"],
            ["code" => "bs","title" => "Bosnian"],
            ["code" => "br","title" => "Breton"],
            ["code" => "bg","title" => "Bulgarian"],
            ["code" => "my","title" => "Burmese"],
            ["code" => "ca","title" => "Catalan; Valencian"],
            ["code" => "ch","title" => "Chamorro"],
            ["code" => "ce","title" => "Chechen"],
            ["code" => "ny","title" => "Chichewa; Chewa; Nyanja"],
            ["code" => "zh","title" => "Chinese"],
            ["code" => "cv","title" => "Chuvash"],
            ["code" => "kw","title" => "Cornish"],
            ["code" => "co","title" => "Corsican"],
            ["code" => "cr","title" => "Cree"],
            ["code" => "hr","title" => "Croatian"],
            ["code" => "cs","title" => "Czech"],
            ["code" => "da","title" => "Danish"],
            ["code" => "dv","title" => "Divehi; Dhivehi; Maldivian;"],
            ["code" => "nl","title" => "Dutch"],
            ["code" => "en","title" => "English"],
            ["code" => "eo","title" => "Esperanto"],
            ["code" => "et","title" => "Estonian"],
            ["code" => "ee","title" => "Ewe"],
            ["code" => "fo","title" => "Faroese"],
            ["code" => "fj","title" => "Fijian"],
            ["code" => "fi","title" => "Finnish"],
            ["code" => "fr","title" => "French"],
            ["code" => "ff","title" => "Fula; Fulah; Pulaar; Pular"],
            ["code" => "gl","title" => "Galician"],
            ["code" => "ka","title" => "Georgian"],
            ["code" => "de","title" => "German"],
            ["code" => "el","title" => "Greek, Modern"],
            ["code" => "gn","title" => "Guaraní"],
            ["code" => "gu","title" => "Gujarati"],
            ["code" => "ht","title" => "Haitian; Haitian Creole"],
            ["code" => "ha","title" => "Hausa"],
            ["code" => "he","title" => "Hebrew (modern)"],
            ["code" => "hz","title" => "Herero"],
            ["code" => "hi","title" => "Hindi"],
            ["code" => "ho","title" => "Hiri Motu"],
            ["code" => "hu","title" => "Hungarian"],
            ["code" => "ia","title" => "Interlingua"],
            ["code" => "id","title" => "Indonesian"],
            ["code" => "ie","title" => "Interlingue"],
            ["code" => "ga","title" => "Irish"],
            ["code" => "ig","title" => "Igbo"],
            ["code" => "ik","title" => "Inupiaq"],
            ["code" => "io","title" => "Ido"],
            ["code" => "is","title" => "Icelandic"],
            ["code" => "it","title" => "Italian"],
            ["code" => "iu","title" => "Inuktitut"],
            ["code" => "ja","title" => "Japanese"],
            ["code" => "jv","title" => "Javanese"],
            ["code" => "kl","title" => "Kalaallisut, Greenlandic"],
            ["code" => "kn","title" => "Kannada"],
            ["code" => "kr","title" => "Kanuri"],
            ["code" => "ks","title" => "Kashmiri"],
            ["code" => "kk","title" => "Kazakh"],
            ["code" => "km","title" => "Khmer"],
            ["code" => "ki","title" => "Kikuyu, Gikuyu"],
            ["code" => "rw","title" => "Kinyarwanda"],
            ["code" => "ky","title" => "Kirghiz, Kyrgyz"],
            ["code" => "kv","title" => "Komi"],
            ["code" => "kg","title" => "Kongo"],
            ["code" => "ko","title" => "Korean"],
            ["code" => "ku","title" => "Kurdish"],
            ["code" => "kj","title" => "Kwanyama, Kuanyama"],
            ["code" => "la","title" => "Latin"],
            ["code" => "lb","title" => "Luxembourgish, Letzeburgesch"],
            ["code" => "lg","title" => "Luganda"],
            ["code" => "li","title" => "Limburgish, Limburgan, Limburger"],
            ["code" => "ln","title" => "Lingala"],
            ["code" => "lo","title" => "Lao"],
            ["code" => "lt","title" => "Lithuanian"],
            ["code" => "lu","title" => "Luba-Katanga"],
            ["code" => "lv","title" => "Latvian"],
            ["code" => "gv","title" => "Manx"],
            ["code" => "mk","title" => "Macedonian"],
            ["code" => "mg","title" => "Malagasy"],
            ["code" => "ms","title" => "Malay"],
            ["code" => "ml","title" => "Malayalam"],
            ["code" => "mt","title" => "Maltese"],
            ["code" => "mi","title" => "Māori"],
            ["code" => "mr","title" => "Marathi (Marāṭhī)"],
            ["code" => "mh","title" => "Marshallese"],
            ["code" => "mn","title" => "Mongolian"],
            ["code" => "na","title" => "Nauru"],
            ["code" => "nv","title" => "Navajo, Navaho"],
            ["code" => "nb","title" => "Norwegian Bokmål"],
            ["code" => "nd","title" => "North Ndebele"],
            ["code" => "ne","title" => "Nepali"],
            ["code" => "ng","title" => "Ndonga"],
            ["code" => "nn","title" => "Norwegian Nynorsk"],
            ["code" => "no","title" => "Norwegian"],
            ["code" => "ii","title" => "Nuosu"],
            ["code" => "nr","title" => "South Ndebele"],
            ["code" => "oc","title" => "Occitan"],
            ["code" => "oj","title" => "Ojibwe, Ojibwa"],
            ["code" => "cu","title" => "Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic"],
            ["code" => "om","title" => "Oromo"],
            ["code" => "or","title" => "Oriya"],
            ["code" => "os","title" => "Ossetian, Ossetic"],
            ["code" => "pa","title" => "Panjabi, Punjabi"],
            ["code" => "pi","title" => "Pāli"],
            ["code" => "fa","title" => "Persian"],
            ["code" => "pl","title" => "Polish"],
            ["code" => "ps","title" => "Pashto, Pushto"],
            ["code" => "pt","title" => "Portuguese"],
            ["code" => "qu","title" => "Quechua"],
            ["code" => "rm","title" => "Romansh"],
            ["code" => "rn","title" => "Kirundi"],
            ["code" => "ro","title" => "Romanian, Moldavian, Moldovan"],
            ["code" => "ru","title" => "Russian"],
            ["code" => "sa","title" => "Sanskrit (Saṁskṛta)"],
            ["code" => "sc","title" => "Sardinian"],
            ["code" => "sd","title" => "Sindhi"],
            ["code" => "se","title" => "Northern Sami"],
            ["code" => "sm","title" => "Samoan"],
            ["code" => "sg","title" => "Sango"],
            ["code" => "sr","title" => "Serbian"],
            ["code" => "gd","title" => "Scottish Gaelic; Gaelic"],
            ["code" => "sn","title" => "Shona"],
            ["code" => "si","title" => "Sinhala, Sinhalese"],
            ["code" => "sk","title" => "Slovak"],
            ["code" => "sl","title" => "Slovene"],
            ["code" => "so","title" => "Somali"],
            ["code" => "st","title" => "Southern Sotho"],
            ["code" => "es","title" => "Spanish; Castilian"],
            ["code" => "su","title" => "Sundanese"],
            ["code" => "sw","title" => "Swahili"],
            ["code" => "ss","title" => "Swati"],
            ["code" => "sv","title" => "Swedish"],
            ["code" => "ta","title" => "Tamil"],
            ["code" => "te","title" => "Telugu"],
            ["code" => "tg","title" => "Tajik"],
            ["code" => "th","title" => "Thai"],
            ["code" => "ti","title" => "Tigrinya"],
            ["code" => "bo","title" => "Tibetan Standard, Tibetan, Central"],
            ["code" => "tk","title" => "Turkmen"],
            ["code" => "tl","title" => "Tagalog"],
            ["code" => "tn","title" => "Tswana"],
            ["code" => "to","title" => "Tonga (Tonga Islands)"],
            ["code" => "tr","title" => "Turkish"],
            ["code" => "ts","title" => "Tsonga"],
            ["code" => "tt","title" => "Tatar"],
            ["code" => "tw","title" => "Twi"],
            ["code" => "ty","title" => "Tahitian"],
            ["code" => "ug","title" => "Uighur, Uyghur"],
            ["code" => "uk","title" => "Ukrainian"],
            ["code" => "ur","title" => "Urdu"],
            ["code" => "uz","title" => "Uzbek"],
            ["code" => "ve","title" => "Venda"],
            ["code" => "vi","title" => "Vietnamese"],
            ["code" => "vo","title" => "Volapük"],
            ["code" => "wa","title" => "Walloon"],
            ["code" => "cy","title" => "Welsh"],
            ["code" => "wo","title" => "Wolof"],
            ["code" => "fy","title" => "Western Frisian"],
            ["code" => "xh","title" => "Xhosa"],
            ["code" => "yi","title" => "Yiddish"],
            ["code" => "yo","title" => "Yoruba"],
            ["code" => "za","title" => "Zhuang, Chuang"]
        ]);
    }
}
