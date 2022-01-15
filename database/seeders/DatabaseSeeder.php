<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Iwan',
            'username' => 'iwan',
            'email' => 'iwan@gmail.com',
            'password' => bcrypt('1234'),
            'is_admin' => 0
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'julio',
            'username' => 'kulio',
            'email' => 'julio@gmail.com',
            'password' => bcrypt('1234'),
            'is_admin' => 2
        ]);

        Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
            'image' => 'teknologi.jpeg'
        ]);

        Post::create([
            'title' => '5 Senjata AR Paling Stabil saat Gunakan Scope 6x, Pahami!',
            'slug' => '5-senjata-ar-paling-stabil-saat-gunakan-scope-6x,-Pahami!',
            'image' => '1.jpg',
            'excerpt'=> 'Assault Rifle (AR) adalah salah satu jenis senjata di PUBG Mobile, senjata jenis ini terkenal dengan efek recoil-nya yang sangat kuat sehingga cukup sulit untuk dikendalikan. Ada cukup banyak senjata AR di PUBG Mobile, total hingga saat ini mencapai 11. Semuanya senjata tersebut memiliki kelebihan dan kekurangan. Namun satu hal yang pasti, senjata AR dapat dipasangi scope 6x.',
            'body' => 'Senjata AR pertama adalah M416, kamu bisa menemukan senjata di semua map. M416 menjadi senjata AR paling stabil ketika dipasangi scope 6x karena memiliki komponennya sendiri yaitu popor untuk mengurangi hentakan vertikal ataupun horizontal ketika menembak. Senjata AR satu ini juga cocok untuk pertarungan jarak jauh, jadi target bisa terbunuh dengan cepat jika tembakan tepat sasaran.Jika settingan ADS dan gyroscope-nya pas, sebenarnya senjata AR satu ini memiliki kestabilan yang lebih baik jika bandingkan dengan dengan M416. Untuk itu, agar lebih mematikan dan lebih stabil, kamu harus memastikan terlebih dahulu bahwa komponen yang dibutuhkan Scar-L seperti moncong sudah terpasang.',
            'user_id' => 1,
            'category_id' => 1,
            'published_at' => 1,
            'status' => 'publish'
        ]);


        Post::create([
            'title' => '5 Alasan PUBG NEW STATE Tak Bisa Mengalahkan Popularitas PUBG MOBILE',
            'slug' => '5-alasan-pubg-new-state-tak-bisa-mengalahkan-popularitas-pubg-mobile',
            'image' => '2.jpg',
            'excerpt'=> 'Sejak dirilis pada awal November 2021, PUBG NEW STATE sudah banyak diunduh dan dimainkan oleh para pemain di seluruh dunia. PUBG NEW STATE menawarkan grafik yang lebih realistis, tetapi tidak membuat kinerja smartphone menjadi berat. Inilah nilai jual PUBG NEW STATE.',
            'body' => 'Masih banyak bug dan gangguan yang dijumpai di PUBG NEW STATE. Pemain juga sering mengeluh tentang server yang sering tidak stabil. Banyak pemain mengatakan mereka keluar sendiri dari game. Sebagai pemain, kenyamanan dalam bermain game adalah suatu keharusan yang harus didapatkan saat bermainkan. Jika suatu game banyak terdapat bug, banyak pula pemain yang beranjak dari game tersebut.

            Berbeda dengan PUBG MOBILE, game battle royale satu ini sudah lama menjadi favorit. Versi old dari PUBG ini sudah mendapatkan berbagai macam perbaikan dari pihak developer yang membuatnya sangat nyaman dimainkan, bahkan pada low budget smartphone sekalipun.Pemain PUBG sudah familier dengan enam map di PUBG MOBILE, seperti Livik, Erangel, Sanhok, Miramar, Vikendi, dan Karakin. Seorang pemain pro biasanya sudah memiliki map favorit untuk meraih chicken dinner. Bahkan, untuk kamu pemain kasual, pasti juga memiliki map favorit yang sudah dikuasai di PUBG MOBILE.

            Sementara itu, bermain PUBG NEW STATE dari awal berarti kamu harus mempelajari kembali tiap-tiap map yang ada. Sesungguhnya, ini menguras waktu dan energi. Ditambah lagi, ada berbagai macam bug yang mungkin membuat kita malas untuk mempelajari map baru di PUBG NEW STATE.',
            'user_id' => 1,
            'category_id' => 1,
            'published_at' => 1,
            'status' => 'publish'
        ]);





    }
}
