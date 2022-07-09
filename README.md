# Selayang Pandang

Funtastic blog adalah proyek open source publik pertama saya. Funtastic blog adalah sebuah platform personal blogging yang minimalis dan menyenangkan. Saya mendedikasikan platform ini kepada para penulis yang ingin mempunyai blog pribadi yang mudah untuk dioperasikan, bahkan bagi kamu yang tidak paham kode sama sekali. Fokuslah menulis, dan biarkan kami yang mengerjakan blogmu. 

Platform ini masih sangat baru, saya juga belum berpengalaman dalam membuat aplikasi. Untuk itu, kritik dan saran dari para pengguna sangat saya butuhkan. Jika kamu punya ide, kritik, atau saran tentang aplikasi ini silakan email saya di: hello.deriprasetyo@gmail.com atau ketuk DIrect Message saya di Twitter [@sapikembung](https://twitter.com/sapikembung). 

# Fitur Utama

## Responsive Design

Pengguna handphone saat ini sudah sangat banyak, bahkan lebih dari 50% web di seluruh dunia diakses menggunakan handphone. Hal ini yang menjadi perhatian pertama saya saat mendesain aplikasi Funtastic Blog. Saya harus memastikan bahwa aplikasi ini tetap memiliki performa yang bagus dari sisi tampilan, jika diakses menggunakan aplikasi dengan layar kecil seperti handphone. Saya paham bahwa kadang ide tulisan itu sering muncul secara tiba-tiba, kadang saat ngopi, menunggu kereta/bus, dan bahkan saat di kamar mandi, dan satu-satunya gadget yang bisa mengakomodasi itu semua adalah handphone. Dengan demikian, fitur responsive ini akan menjadi fitur utama yang kami prioritaskan.

## Darkmode
Untuk mendapatkan fitur darkmode itu tidaklah mudah, kamu mungkin butuh upaya yang lebih untuk mendapatkan fitur ini. Ya, jika kamu punya uang kamu bisa membeli tema Worpress yang menyediakan fitur darkmode. Atau mungkin, jika kamu mengerti program, kamu akan mendesainnya sendiri. Di sini, kamu bisa mendapatkan fitur ini secara cuma-cuma. Terima kasih saya ucapkan kepada [Tailwind CSS](https://tailwindcss.com) yang telah membantu banyak dalam proses desain tampilan aplikasi Funtastic Blog.

## Lightweight and Minimalist
Funtastic Blog dibangun di atas kerangka kerja (red. framework) [Laravel](https://laravel.com), sebuah framework PHP yang paling populer saat ini, sehingga kamu tidak usah ragu lagi dengan performa blogmu. Framework ini mampu menangani request dengan sangat baik, bahkan dengan waktu loading jauh lebih baik daripada Wordpress. PHP adalah bahasa sejuta umat yang sudah tersedia di seluruh web hosting di Indonesia. Jangan khawatir jika aplikasi ini tidak akan berjalan di web hostingmu. 

Kami berpegang teguh dengan prinsip YAGNI (*You Aren't Gonna Need It*), yang artinya fungsi yang disediakan haruslah fungsi yang memang benar-benar dibutuhkan, sehingga fitur-fitur yang tidak benar-benar dibutuhkan sebaiknya tidak disematkan. Oleh karena itu, tidak salah jika saya mengusungkan fitur lightweight and minimalist pada aplikasi ini.

## SEO Friendly
Kami sadar betul bahwa tujuanmu menulis adalah agar kamu dikenal oleh khalayak bukan? Syukurlah, kamu memilih platform yang tepat. Kami mendesain Funtastic Blog agar blogmu mudah ditemukan oleh mesin pencari. Kamu tidak perlu membayar mahal untuk itu, kamu bisa dapatkan itu dengan cuma-cuma. Kami akan terus memperbarui aplikasi ini agar mengikuti perkembangan teknologi dari waktu ke waktu.
   
# Writing Your First Article
Artikel dalam aplikasi ini ditulis dengan bahasa Markdown, seperti halnya chat atau kiriman di sosial media, sehingga tidak ada toolbar-toolbar aneh yang mengganggu pemandangan, cukup tulis saja idemu seperti kamu menulis pesan untuk pacarmu. Sebenarnya, dokumentasi lengkap dapat kamu baca di website [Markdown](https://www.markdownguide.org/), namun untuk sekedar pengetahuan, kami akan memberikan sedikit gambaran bagaimana untuk menulis artikel dalam sintaks Markdown. Dalam menulis artikel setidaknya ada tiga fitur utama yang harus kamu pahami:

## 1. Heading
Heading atau dalam bahasa Indonesia sering disebut sebagai sub-bab. Terdapat 6 jenis heading dalam HTML mulai dari Heading 1, hingga Heading 6. Heading 1 biasanya dipakai untuk judul artikel yang menandakan bahwa kalimat tersebut adalah cerminan keseluruhan artikel. Heading 2 adalah sub-bahasan dari judul, Heading 3 adalah sub-bahasan dari Heading 2 begitu seterusnya sampai Heading 6. Heading biasanya dicetak tebal dengan ukurang yang berbeda dari tulisan artikel sebagai penanda awal dan akhirnya sebuah pembahasan. Berikut ini adalah penggunaan heading yang baik dan benar:   
Heading 1 Cara Membuat Kue Donat (Judul)   

Heading 2 Alat dan Bahan   
Paragraf tentang alat dan bahan untuk membuat kue donat.   

Heading 2 Cara Membuat   
Paragraf tentang cara/langkah-langkah membuat kue donat.

Dalam bahasa Markdown, heading di awali dengan tanda pagar (\#) sebelum kata pertama, kemudian diikuti dengan spasi. Jumlah tanda pagar menunjukkan tingkatan heading, jadi satu tanda pagar (\# bla bla) untuk heading 1, dua tanda pagar (\#\# bla bla) untuk heading 2, dan seterusnya. Penggunaan heading yang baik akan mengingkatkan pengalaman pembaca, karena mereka akan mudah memahami isi artikel yang kamu tulis. Jadi buatlah heading yang bagus ya. 

## 2. Bold and Italic
Huruf tebal dan miring adalah dua hal yang sangat esensial dalam menulis artikel. Huruf tebal digunakan untuk mempertegas suatu kata/kalimat, sedangkan huruf miring digunakan untuk menulis istilah asing yang tidak ada dalam kamus bahasa. Untuk menulis huruf tebal dan miring dalam bahasa Markdown sangat gampang. Huruf miring diawali dan diakhiri dengan satu tanda bintang (\*) di awal dan di akhir kalimat/kata. Jadi untuk menulis kata physical distancing dengan huruf miring kamu cukup menulis \* physical distancing \* dan tulisan akan *miring* dengan sendirinya.

Huruf tebal ditulis dengan diawali dan diakhiri dengan dua tanda bintang (\*\*) pada awal dan akhir sebuah kata/kalimat. Jadi untuk membuat huruf tebal pada tulisan "Hello Mom!", cukup menulis \*\* Hello Mom \*\*, dan tulisan akan menjadi **tebal**. Jika kamu sering menggunakan Whatsapp untu menulis, tentu sintaks ini tidak aneh.

## List and Numbering
Penomoran adalah fitur yang tidak kalah penting dalam menulis artikel. Untuk membuat list, gunakan tanda dash (- bla bla bla) di awal kalimat, sehingga akan dibuatkan list seperti ini:
- List pertama
- List kedua

Untuk membuat penomoran dengan angka, kamu cukup menulis angka (1. Bla bla bla), sehingga akan dirender menjadi penomoran seperti ini:
1. Nomor satu
2. Nomor dua

Untuk mengakhiri paragraf/penomoran, gunakan enter dua kali. 

## 3. Image
Hal esesial yang harus kamu pahami untuk menulis artikel adalah memasukkan gambar. Tidak bisa dimungkiri bahwa gambar akan memberikan pengalaman yang lebih baik kepada pembaca, daripada hanya sekedar tulisan. Di Markdown, kamu dapat memasukkan gambar dengan sintaks \!\[deskripsi gambar\](url gambar). Url gambar ini dapat kamu isi dengan link tempat kamu menyimpan gambar. Kamu dapat menyimpannya di [Dropbox](https://dropbox.com) lalu pastekan linknya di artikelmu. Dengan demikian, untuk menyematkan gambar kamu dapat menulis seperti ini \!\[Beautiful Image\](https://www.dropbox.com/s/tg0cfa565aue4ak/zoo.jpg?raw=1) dan gambar tersebut akan muncul di artikelmu. Jika kamu menggunakan Dropbox, pastikan query (karakter pada link setelah tanda tanya) di akhir link adalah 'raw=1' bukan 'dl=0' yaa agar gambarmu tampil. 

# Installation
Jika kamu ingin menjadi early adopter, kamu dapat mengikuti langkah berikut:
1. Clone repository ini dan jalankan perintah `composer install`
2. Buat *environment variable* dengan perintah `cp .env.example .env`. 
3. Masukkan konfigurasi database pada file `.env`.
4. Lakukan *generate key*  dengan perintah `php artisan key:generate`, untuk digunakan sebagai enkripsi database.
5. Terakhir jalankan perintah `php atisan serve` dan aplikasimu dapat diakses secara lokal di komputermu.
6. Jika kamu ingin memasang di hostinganmu, kamu dapat menghubungi saya di alamat email/DM di twitter.