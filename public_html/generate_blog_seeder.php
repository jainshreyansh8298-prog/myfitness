<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Starting blog fetch from myfitness.ae/blogs...\n";

$html = Http::withOptions(['verify' => false])->withHeaders(['User-Agent' => 'Mozilla/5.0'])->get('https://myfitness.ae/blogs')->body();
if (!$html) {
    die("Failed to fetch blogs page.\n");
}

$publicStorage = __DIR__.'/public/storage/blogs';
if (!is_dir($publicStorage)) {
    mkdir($publicStorage, 0755, true);
}

function downloadImage($url, $folder) {
    if (!$url) return null;
    if (strpos($url, 'http') === false) {
        $url = 'https://myfitness.ae' . (strpos($url, '/') === 0 ? '' : '/') . $url;
    }
    try {
        $response = Http::withOptions(['verify' => false])->withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            'Accept' => 'image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8',
            'Referer' => 'https://myfitness.ae/'
        ])->get($url);
        if ($response->successful()) {
            $filename = basename(parse_url($url, PHP_URL_PATH));
            $path = $folder . '/' . $filename;
            file_put_contents(__DIR__.'/public/storage/' . $path, $response->body());
            return $path;
        } else {
            echo "Failed to download (HTTP " . $response->status() . "): $url\n";
        }
    } catch (\Exception $e) {
        echo "Failed to download $url: " . $e->getMessage() . "\n";
    }
    return null;
}

$dom = new DOMDocument();
@$dom->loadHTML($html);
$xpath = new DOMXPath($dom);

$blogNodes = $xpath->query("//div[contains(@class, 'single-blog')]");

$blogsData = [];
foreach ($blogNodes as $node) {
    // Title & Link
    $titleNode = $xpath->query(".//h4[contains(@class, 'common-title-two')]/a", $node)->item(0);
    if (!$titleNode) continue;
    $title = trim($titleNode->textContent);
    $link = $titleNode->getAttribute('href');
    $slug = basename(parse_url($link, PHP_URL_PATH));

    // Image
    $imgNode = $xpath->query(".//a[contains(@class, 'blog-thumb')]/img", $node)->item(0);
    $imageUrl = $imgNode ? $imgNode->getAttribute('src') : '';
    $localImagePath = null;
    if ($imageUrl) {
        $localImagePath = downloadImage($imageUrl, 'blogs');
        if (!$localImagePath) {
            $localImagePath = $imageUrl; // fallback to remote URL
        }
    }

    // Date
    $dateNode = $xpath->query(".//ul[@class='tags']//i[contains(@class, 'la-clock')]/parent::a", $node)->item(0);
    $dateStr = $dateNode ? trim(str_replace('query_builder', '', trim($dateNode->textContent))) : date('Y-m-d');
    
    // Excerpt
    $excerptNode = $xpath->query(".//p[contains(@class, 'common-para')]", $node)->item(0);
    $excerpt = $excerptNode ? trim(strip_tags($excerptNode->textContent)) : '';

    $blogsData[] = [
        'title' => $title,
        'slug' => $slug,
        'category_id' => 1,
        'image' => $localImagePath,
        'content' => $excerpt,
        'created_at' => date('Y-m-d H:i:s', strtotime($dateStr)),
        'updated_at' => date('Y-m-d H:i:s', strtotime($dateStr)),
    ];
    echo "Processed Blog: $title (Image: $localImagePath)\n";
}

if (empty($blogsData)) {
    die("No blogs found!\n");
}

$seederContent = "<?php\n\nnamespace Database\\Seeders;\n\nuse Illuminate\\Database\\Seeder;\nuse Illuminate\\Support\\Facades\\DB;\n\nclass BlogSeeder extends Seeder\n{\n    public function run(): void\n    {\n        DB::table('blogs')->truncate();\n\n        \$blogs = " . var_export($blogsData, true) . ";\n\n        DB::table('blogs')->insert(\$blogs);\n    }\n}\n";

$seederPath = __DIR__.'/database/seeders/BlogSeeder.php';
file_put_contents($seederPath, $seederContent);

echo "BlogSeeder successfully created with " . count($blogsData) . " blogs.\n";
