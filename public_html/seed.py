import subprocess
import re
import json

def get_content(filename):
    res = subprocess.run(['git', 'show', f'HEAD:{filename}'], capture_output=True, text=True)
    content = res.stdout
    match = re.search(r'<div class="faq-area padding-top-70 padding-bottom-100">\s*<div class="container">(.*?)</div>\s*</div>\s*</x-front.main-layout>', content, re.DOTALL)
    if match:
        return match.group(1).strip()
    return '<p>Content missing.</p>'

privacy = get_content('resources/views/front/privacy-policy.blade.php')
terms = get_content('resources/views/front/terms-conditions.blade.php')
cookie = get_content('resources/views/front/cookie-policy.blade.php')
service = get_content('resources/views/front/service-delivery.blade.php')

seeder_content = f"""<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{{
    public function run()
    {{
        Page::updateOrCreate(
            ['slug' => 'privacy-policy'],
            ['title' => 'Privacy Policy', 'content' => {json.dumps(privacy)}]
        );

        Page::updateOrCreate(
            ['slug' => 'terms-conditions'],
            ['title' => 'Terms & Conditions', 'content' => {json.dumps(terms)}]
        );

        Page::updateOrCreate(
            ['slug' => 'cookie-policy'],
            ['title' => 'Cookie Policy', 'content' => {json.dumps(cookie)}]
        );

        Page::updateOrCreate(
            ['slug' => 'service-delivery'],
            ['title' => 'Service Delivery', 'content' => {json.dumps(service)}]
        );
    }}
}}
"""

with open('database/seeders/PageSeeder.php', 'w', encoding='utf-8') as f:
    f.write(seeder_content)
