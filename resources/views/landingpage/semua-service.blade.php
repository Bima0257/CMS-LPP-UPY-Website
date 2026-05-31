<x-landingpage.layout title="{{ $title }}">

    <!-- ====== Banner Start ====== -->
    <section class="ud-page-banner"
        style="background-image: url('{{ !empty($banner) && !empty($banner->banner_background)
            ? asset('storage/' . $banner->banner_background)
            : asset('assets/images/background/background-default.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-banner-content">
                        <h1>Semua Layanan</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->


    <!-- ====== Service Start ====== -->
    <section id="service" class="ud-faq">
        <div class="shape">
            <img src="{{ asset('assets/images/faq/shape.svg') }}" alt="shape" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-section-title text-center mx-auto">
                        <span>Layanan</span>
                        <h2>Daftar Layanan LPP UPY</h2>
                        <p>
                            Temukan informasi dan tautan akses menuju berbagai layanan pengembangan pendidikan yang
                            tersedia di LPP UPY.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse ($services as $key => $service)
                    <div class="col-lg-6 mb-3">
                        <div class="ud-single-faq wow fadeInUp" data-wow-delay=".{{ $key * 1.5 }}s">
                            <div class="accordion">
                                <button class="ud-faq-btn collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $key }}">
                                    <span class="icon flex-shrink-0">
                                        <i class="lni lni-chevron-down"></i>
                                    </span>
                                    <span>{{ $service->name }}</span>
                                </button>
                                <div id="collapse{{ $key }}" class="accordion-collapse collapse">
                                    <div class="ud-faq-body">
                                        {{-- Deskripsi --}}
                                        <p class="mb-2">
                                            {!! $service->description !!}
                                        </p>

                                        {{-- Tombol Akses --}}
                                        @if (filter_var($service?->link, FILTER_VALIDATE_URL))
                                            <a href="{{ $service->link }}" target="_blank"
                                                class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2">
                                                <i class="ri-external-link-line"></i>
                                                Akses Layanan
                                            </a>
                                        @else
                                            <button class="btn btn-secondary btn-sm" disabled>
                                                Link tidak tersedia
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="lni lni-service fs-1 text-muted mb-3"></i>
                            <h5 class="fw-semibold text-muted">Belum ada layanan tersedia</h5>
                            <p class="text-secondary mb-0">Layanan akan muncul di sini setelah ditambahkan.</p>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
    <!-- ====== Service End ====== -->




</x-landingpage.layout>
