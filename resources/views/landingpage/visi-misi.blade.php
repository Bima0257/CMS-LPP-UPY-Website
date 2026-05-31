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
                        <h1>Visi - Misi, Tujuan</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <!-- ====== About Start ====== -->
    <section id="custom-about" class="custom-about-section">
        <div class="container">
            @if ($about)
                <div class="custom-about-wrapper wow fadeInUp" data-wow-delay=".2s">
                    <div class="custom-about-image mb-4">
                        <img src="{{ asset('storage/' . $about->image) }}"
                            class="img-fluid" style="max-width:800px; max-height:400px; width:100%; height:auto; object-fit: cover;" alt="about-image" />
                    </div>
                    <div class="custom-about-content-wrapper">
                        <div class="custom-about-content">
                            <span class="tag">{{ $about->name ?? '-' }}</span>

                            <h2>Visi</h2>
                            <div style="text-align: justify;">
                                {!! $about->vision !!}
                            </div>

                            <h2>Misi</h2>
                            <div style="text-align: justify;">
                                {!! $about->mission !!}
                            </div>
                            <h2>Tujuan</h2>
                            <div style="text-align: justify;">
                                {!! $about->purpose !!}
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted mb-0">Belum ada Content About.</p>
                </div>
            @endif
        </div>
    </section>
    <!-- ====== About End ====== -->


</x-landingpage.layout>
