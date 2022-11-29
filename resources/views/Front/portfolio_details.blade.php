@extends('Front.layout')
@section('container')
    <main id="main">
        <!-- ======= Portfolio Details ======= -->
        <div id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="portfolio-title">This is an example of portfolio detail</h2>
                        <div class="portfolio-details-slider swiper-container">
                            <div class="swiper-wrapper align-items-center">
                                @foreach ($image as $item)
                                    <div class="swiper-slide" style="width:800px;height463px">
                                        <img src="{{ asset('images/project_images/' . $item->image) }}"
                                            style="width:736px;height463px" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Category</strong>: {{ $data[0]->project_category }}</li>
                            <li><strong>Client</strong>: {{ $data[0]->client_name }}</li>
                            <li><strong>Project date</strong>: {{ $data[0]->project_date }}</li>
                            <li><strong>Project URL</strong>: <a
                                    href="{{ $data[0]->project_url }}">{{ $data[0]->project_url }}</a></li>
                        </ul>
                        <p>
                            {{ $data[0]->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div><!-- End Portfolio Details -->
    </main><!-- End #main -->
    @endsection

