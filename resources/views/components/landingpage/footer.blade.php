<!-- ====== Footer Start ====== -->
<footer class="ud-footer wow fadeInUp" data-wow-delay=".15s"
    style="background-color: #1a1a2e; background-image: url('{{ $banner?->footer_background ? asset('storage/' . $banner->footer_background) : asset('assets/images/background/background-default.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="ud-footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="ud-widget">
                        <a href="/#home" class="ud-footer-logo">
                            <img src="{{ $about?->white_logo ? asset('storage/' . $about->white_logo) : asset('assets/images/logo/white_logo.png') }}"
                                alt="logo" />
                        </a>
                        <div class="ud-widget-desc">
                            {!! \Illuminate\Support\Str::words($about->description ?? '-', 15, '...') !!}
                        </div>
                        <ul class="list-unstyled text-white">
                            <li class="mb-2">
                                <a href="{{ filter_var($about?->youtube_link, FILTER_VALIDATE_URL) ? $about->youtube_link : '#' }}"
                                    class="text-white" target="_blank">
                                    <i class="mdi mdi-youtube me-2"></i>
                                    LPP-UPY
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ filter_var($about?->instagram_link, FILTER_VALIDATE_URL) ? $about->instagram_link : '#' }}"
                                    class="text-white" target="_blank">
                                    <i class="mdi mdi-instagram me-2"></i>
                                    LPP-UPY
                                </a>
                            </li>
                            <li class="mb-2">
                                <i class="mdi mdi-email-outline me-2 text-white"></i>
                                {{ $about->email ?? 'info@example.com' }}
                            </li>

                            @php
                                $contact = $about?->phone;

                                // ambil hanya angka
                                $number = preg_replace('/[^0-9]/', '', $contact);

                                // ubah jika diawali 0 → ganti jadi 62
                                if (\Illuminate\Support\Str::startsWith($number, '0')) {
                                    $number = '62' . substr($number, 1);
                                }

                                // pastikan hanya dibuat jika ada isi
                                $waLink = !empty($number) ? "https://wa.me/{$number}" : null;
                            @endphp
                            <li class="mb-2">
                                <i class="mdi mdi-phone-outline me-2 text-white"></i>
                                @if ($waLink)
                                    <a href="{{ $waLink }}" class="text-white" target="_blank">
                                        {{ $about?->phone }}
                                    </a>
                                @else
                                    <p class="text-white">-</p>
                                @endif
                            </li>

                        </ul>
                        <ul class="ud-widget-socials mt-2">

                        </ul>

                    </div>
                </div>

                <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
                    <div class="ud-widget">
                        <h5 class="ud-widget-title">Navigasi</h5>
                        <ul class="ud-widget-links">
                            <li>
                                <a href="/#home">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('organizational-structure.index') }}">Struktur Organisasi</a>
                            </li>
                            <li>
                                <a href="/abouts">About</a>
                            </li>
                            <li>
                                <a href="{{ route('post.all') }}">Informasi & Berita</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="ud-widget">
                        <h5 class="ud-widget-title">Kategori Dokumen</h5>
                        <ul class="ud-widget-links">
                            @if ($documentCategories->isNotEmpty())
                                @foreach ($documentCategories->take(4) as $category)
                                    <li>
                                        <a href="{{ route('document.category', $category->slug) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <a href="#">Belum ada kategori</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="ud-widget">
                        <h5 class="ud-widget-title">Kategori Artikel</h5>
                        <ul class="ud-widget-links">
                            @if ($postCategories->isNotEmpty())
                                @foreach ($postCategories->take(4) as $category)
                                    <li>
                                        <a href="{{ route('posts.byCategory', $category->slug) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <a href="#">Belum ada kategori</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ud-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="ud-footer-bottom-right text-center text-md-end">
                        Designed and Developed by
                        <a href="https://www.instagram.com/bimabtw_?igsh=czhkOW92M21zYmY1" target="_blank"
                            rel="nofollow">bimabtw_</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ====== Footer End ====== -->
