<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\ProcessStep;
use App\Models\PricingPlan;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Admin kullanıcısı
        User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@dorttyolkoltuk.com',
            'password' => Hash::make('admin123'),
        ]);

        // Site ayarları
        $settings = [
            ['key' => 'site_title',    'value' => 'Dörtyol Koltuk Yıkama'],
            ['key' => 'site_subtitle', 'value' => 'Profesyonel Temizlik'],
            ['key' => 'phone',         'value' => '0532 000 00 00'],
            ['key' => 'phone2',        'value' => '0555 000 00 00'],
            ['key' => 'whatsapp',      'value' => '905320000000'],
            ['key' => 'email',         'value' => 'info@dorttyolkoltuk.com'],
            ['key' => 'address',       'value' => 'Hatay / Dörtyol'],
            ['key' => 'working_hours', 'value' => 'Pzt – Cmt: 08:00 – 19:00'],
            ['key' => 'hero_title',    'value' => 'Koltuğunuz Yeniden'],
            ['key' => 'hero_subtitle', 'value' => 'Profesyonel ekipman ve organik temizlik ürünleriyle koltuk, kanepe ve halılarınızı derinlemesine temizliyoruz.'],
            ['key' => 'about_text',    'value' => 'Yılların deneyimiyle Hatay Dörtyol\'da koltuk, kanepe ve halı yıkama hizmeti veriyoruz. Çevre dostu ürünler ve uzman ekibimizle evinizin konforunu geri kazandırıyoruz.'],
        ];
        foreach ($settings as $s) {
            Setting::set($s['key'], $s['value']);
        }

        // Hizmetler
        $services = [
            ['title' => 'Koltuk Yıkama', 'short_description' => 'Tek veya çok kişilik koltukların profesyonel yıkanması', 'description' => 'Tekli, ikili, üçlü koltuklar dahil tüm koltuk türlerini profesyonel ekipmanlarla derinlemesine temizliyoruz. Kir, leke ve kötü kokuları yok eder, koltuğunuzu yeni gibi hissettiririz.', 'icon' => 'fa-couch', 'order' => 1],
            ['title' => 'Kanepe Yıkama', 'short_description' => 'L kanepe ve köşe takımları dahil her model', 'description' => 'L-kanepe, köşe koltuk ve diğer kanepe modellerini uzman ekibimizle temizliyoruz. Derin leke çıkarma ve koku giderme işlemleri uygulanır.', 'icon' => 'fa-loveseat', 'order' => 2],
            ['title' => 'Halı Yıkama', 'short_description' => 'Her boyut ve desende halı yıkama hizmeti', 'description' => 'Yün, sentetik, kilim gibi tüm halı türlerini profesyonel makinelerle yıkıyoruz. Alerjen ve bakteri temizleme özelliğiyle ev sağlığını korur.', 'icon' => 'fa-rug', 'order' => 3],
            ['title' => 'Sandalye Yıkama', 'short_description' => 'Yemek odası ve çalışma sandalyelerinin temizliği', 'description' => 'Yemek odası sandalyeleri, çalışma sandalyeleri ve diğer kumaş sandalyeler için profesyonel yıkama hizmeti.', 'icon' => 'fa-chair', 'order' => 4],
            ['title' => 'Yorgan & Yastık', 'short_description' => 'Uyku ürünleri için hijyenik yıkama', 'description' => 'Yorgan, yastık ve battaniyeleri sektörel makinelerle yıkıyor; toz akarı ve bakteri temizliği yapıyoruz.', 'icon' => 'fa-bed', 'order' => 5],
            ['title' => 'Araç İçi Döşeme', 'short_description' => 'Otomobil koltuk ve tavanlarının temizlenmesi', 'description' => 'Araç koltukları, tavan döşemesi ve kapı panellerini uzman ekipmanlarla temizleyerek aracınıza hijyen ve ferahlık kazandırıyoruz.', 'icon' => 'fa-car', 'order' => 6],
        ];
        foreach ($services as $s) {
            Service::create(array_merge($s, ['active' => true]));
        }

        // Süreç adımları
        $steps = [
            ['step_number' => 1, 'title' => 'Randevu & Keşif', 'description' => 'Sizi arayarak veya mesaj atarak randevu oluşturuyoruz. Ekibimiz evinize gelip koltukları inceleyerek size özel fiyat teklifi sunuyor.', 'icon' => 'fa-calendar-check', 'order' => 1],
            ['step_number' => 2, 'title' => 'Teslim Alma', 'description' => 'Koltukları evinizden teslim alıyoruz. Dilerseniz yerinizde yıkama seçeneğimizden de yararlanabilirsiniz.', 'icon' => 'fa-truck', 'order' => 2],
            ['step_number' => 3, 'title' => 'Ön Temizleme & Leke Çıkarma', 'description' => 'Organik ön temizleme ürünleriyle inatçı lekelere özel uygulama yaparak derin yıkamaya hazırlık sağlıyoruz.', 'icon' => 'fa-spray-can', 'order' => 3],
            ['step_number' => 4, 'title' => 'Profesyonel Yıkama', 'description' => 'Sektörel yıkama makinelerimizle koltukları derinlemesine yıkıyor; bakteri, alerjen ve kötü kokuları tamamen yok ediyoruz.', 'icon' => 'fa-droplet', 'order' => 4],
            ['step_number' => 5, 'title' => 'Kurutma', 'description' => 'Endüstriyel kurutma ekipmanlarımızla koltukları hızla ve eksiksiz kurutuyor; nem kalmamasını sağlıyoruz.', 'icon' => 'fa-wind', 'order' => 5],
            ['step_number' => 6, 'title' => 'Teslimat', 'description' => 'Temizlenen ve kurutulan koltukları itinalı şekilde paketleyerek evinize teslim ediyoruz.', 'icon' => 'fa-box-open', 'order' => 6],
        ];
        foreach ($steps as $s) {
            ProcessStep::create(array_merge($s, ['active' => true]));
        }

        // Fiyat planları
        $plans = [
            [
                'name'        => 'Tekli Koltuk',
                'description' => 'Tek kişilik koltuk yıkama',
                'price'       => 300,
                'unit'        => 'Adet',
                'features'    => ['Derin yıkama', 'Leke çıkarma', 'Koku giderme', 'Aynı gün teslimat'],
                'featured'    => false,
                'order'       => 1,
            ],
            [
                'name'        => '3\'lü Koltuk Takımı',
                'description' => 'Üç kişilik koltuk + 2li + tekli',
                'price'       => 750,
                'unit'        => 'Takım',
                'features'    => ['Derin yıkama', 'Leke çıkarma', 'Koku giderme', '%15 indirim', 'Ücretsiz nakliye'],
                'featured'    => true,
                'order'       => 2,
            ],
            [
                'name'        => 'L Kanepe',
                'description' => 'Köşe koltuk takımları',
                'price'       => 900,
                'unit'        => 'Adet',
                'features'    => ['Derin yıkama', 'Leke çıkarma', 'Koku giderme', 'Ücretsiz nakliye'],
                'featured'    => false,
                'order'       => 3,
            ],
        ];
        foreach ($plans as $p) {
            PricingPlan::create(array_merge($p, ['active' => true]));
        }
    }
}
