<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Starting data import from myfitness.ae...\n";

$html = Http::withOptions(['verify' => false])->withHeaders(['User-Agent' => 'Mozilla/5.0'])->get('https://myfitness.ae/')->body();
if (!$html) {
    die("Failed to fetch myfitness.ae\n");
}

$publicStorage = __DIR__.'/public/storage/categories';
if (!is_dir($publicStorage)) {
    mkdir($publicStorage, 0755, true);
}

function downloadImage($url, $folder) {
    if (!$url) return null;
    if (strpos($url, 'http') === false) {
        $url = 'https://myfitness.ae' . (strpos($url, '/') === 0 ? '' : '/') . $url;
    }
    try {
        $response = Http::withOptions(['verify' => false])->withHeaders(['User-Agent' => 'Mozilla/5.0'])->get($url);
        if ($response->successful()) {
            $filename = basename(parse_url($url, PHP_URL_PATH));
            $path = $folder . '/' . $filename;
            file_put_contents(__DIR__.'/public/storage/' . $path, $response->body());
            return $path;
        }
    } catch (\Exception $e) {
        echo "Failed to download $url: " . $e->getMessage() . "\n";
    }
    return null;
}

// --- FAQs ---
echo "Importing FAQs...\n";
DB::table('faqs')->truncate();
$faqPageHtml = Http::withOptions(['verify' => false])->withHeaders(['User-Agent' => 'Mozilla/5.0'])->get('https://myfitness.ae/faq')->body();
if ($faqPageHtml) {
    preg_match_all('/<div class="faq-title">\s*(.*?)\s*<\/div>/s', $faqPageHtml, $questions);
    preg_match_all('/<div class="faq-panel">(.*?)<\/div>\s*<\/div>/s', $faqPageHtml, $answers);
    
    // In case the above answer regex is too strict, let's just grab the content of faq-panel
    if (empty($answers[1])) {
        preg_match_all('/<div class="faq-panel">\s*<p class="faq-para">\s*(.*?)\s*<\/div>/s', $faqPageHtml, $answers);
    }
    
    if (empty($answers[1])) {
        preg_match_all('/<div class="faq-panel">(.*?)<\/div>/s', $faqPageHtml, $answers);
    }

    if (!empty($questions[1])) {
        foreach ($questions[1] as $idx => $q) {
            $qText = trim(strip_tags($q));
            // strip tags from answer as well to avoid broken html, or keep it depending on need. The front end uses {!! nl2br(e($faq->answer)) !!} so it escapes HTML. Thus we should strip tags.
            $aText = isset($answers[1][$idx]) ? trim(strip_tags($answers[1][$idx])) : '';
            if ($qText && $aText) {
                DB::table('faqs')->insert([
                    'question' => $qText,
                    'answer' => $aText,
                    'is_active' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                echo "Inserted FAQ: $qText\n";
            }
        }
    } else {
        echo "Could not parse FAQs from /faq.\n";
    }
}

// --- CATEGORIES ---
echo "Importing Categories...\n";
DB::table('categories')->truncate();

if (preg_match('/<select name="category_id"[^>]*>(.*?)<\/select>/s', $html, $selectMatches)) {
    $optionsHtml = $selectMatches[1];
    preg_match_all('/<option value="(\d+)">(.*?)<\/option>/s', $optionsHtml, $options);
    
    $cats = [];
    if (!empty($options[1])) {
        foreach ($options[1] as $idx => $id) {
            $name = trim($options[2][$idx]);
            if ($name && $name !== 'Find Service' && $name !== 'Find') {
                $cats[] = $name;
            }
        }
    }

    $ptIndex = array_search('Personal Training', $cats);
    if ($ptIndex !== false) {
        unset($cats[$ptIndex]);
        array_unshift($cats, 'Personal Training');
    }

    preg_match_all('/<h4 class="common-title-two hover-color-two">\s*<a href="[^"]*">\s*(.*?)\s*<\/a>.*?<img src="(.*?)"/s', $html, $serviceMatches);
    $serviceImages = [];
    if (!empty($serviceMatches[1])) {
        foreach ($serviceMatches[1] as $idx => $sName) {
            $serviceImages[trim($sName)] = trim($serviceMatches[2][$idx]);
        }
    }

    foreach ($cats as $idx => $catName) {
        $imagePath = null;
        if (isset($serviceImages[$catName])) {
            $imagePath = downloadImage($serviceImages[$catName], 'categories');
        }

        DB::table('categories')->insert([
            'name' => $catName,
            'slug' => Str::slug($catName),
            'image' => $imagePath,
            'color' => '#1a1a1a',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        echo "Inserted Category: $catName\n";
    }
}

echo "Data import completed.\n";
