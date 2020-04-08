@extends("layouts.site")
@section("content")

    <div class="background-section d-flex align-items-lg-end align-items-center"
         style="background-image: url('{{ asset("assets/site/images/about/background.jpg") }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pb-4">
                    <div class="breadcrumb-cont">
                        <p class="title"><img style="height: 30px" class="img-fluid"
                                              src="{{ asset("assets/site/images/ball-red.svg") }}" alt="Ball">
                            Home <span class="greater">&gt;</span> {{ strtoupper($title) }}
                            @if(isset($slug))
                                <span class="greater">&gt;</span> {{strtoupper($slug)}}
                            @endif
                        </p>
                        <p class="subtitle">We are competitive professional basketball club - with our players
                            competiting at all levels from local team galas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container p-5">
        <div class="row">

            <div class="col-xl-3">
                <div class="box-part">
                    <div class="head-part p-1">
                        <p class="text-white pl-3 cat m-0 text-uppercase">product categories</p>
                    </div>
                    <div class="category-part pt-3 pb-2 pl-3 mb-3">
                        @if(count($categories) >= 2 )
                            <a href="/shop" class="text-uppercase d-block mb-3 link text-black">
                                <img style="width:30px; margin-right: 5px;"
                                     src="{{ asset("assets/site/images/red-icon.png") }}" alt="All" class="img-responsive">
                                <b>All</b>
                            </a>
                        @endif
                        @foreach($categories as $category)
                            <a href="/shop/{{ $category->title }}" class="text-uppercase d-block mb-3 link text-black">
                                <img style="width:30px; margin-right: 5px;"
                                     src="{{ asset("uploads/category/$category->icon") }}" alt="{{ $category->name }}" class="img-responsive">
                                <b>{{ $category->name }}</b>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-xl-9">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-xl-4 mb-3">
                            <div class="main overflow-hidden">
                                <div class="img-cont text-center prod">
                                    <img class="img-fluid"
                                         src="{{ asset("uploads/product") . "/" . ($product->getImages[0]->name ?? "") }}"
                                         alt="{{ $product->name }}">
                                </div>
                                <div class="desc">
                                    <p class="text-center category mb-2">{{ $product->getCategory->name }}</p>
                                    <h4 class="color-red text-center">{{ $product->name }}</h4>
                                    <p class="text-center price mb-1">${{ $product->price }}</p>
                                    <p data-info="{{ json_encode($product) }}" class="quick-view d-flex justify-content-center align-items-center text-uppercase">Quick View</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>

    <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="background-color: #e2e2e2">
                <div class="modal-body row">

                </div>
            </div>
        </div>
    </div>

    @push('head')
        <style>
            .header {
                padding-top: 0;
            }

            p {
                font-family: Roboto-Condensed-Regular, sans-serif;
            }

            .sticky + .content {
                padding-top: 70px;
            }

            .head-part {
                background-color: #9c1d24;
            }

            .box-part {
                border-radius: 8px 8px 0 0;
                overflow: hidden;
            }

            .text-black {
                color: black;
            }

            .link {
                text-decoration: none !important;
            }

            .link:hover {
                color: black;
            }

            .category-part {
                border: 1px solid grey;
                border-top: none;
                border-radius: 0 0 8px 8px;
            }

            .main {
                border: 1px solid #ccced2;
                border-radius: 8px;
                padding: 10px 20px;
                transition: .3s;
                position: relative;
            }

            .main:hover {
                border: 1px solid #9c1d24;
            }

            .main:hover .quick-view {
                bottom: 0;
            }

            .quick-view {
                background: #9c1d24;
                text-align: center;
                position: absolute;
                bottom: -39px;
                width: 100%;
                left: 0;
                height: 39px;
                margin-bottom: 0;
                color: white;
                transition: .3s;
                cursor: pointer;
            }

            .prod {
                height: 200px;
                line-height: 200px;
            }

            .category {
                color: #6c6c6e;
                font-size: 12px;
            }

            .price {
                color: #6c6c6e;
                font-size: 16px;
            }

            #lightSlider .img-cont {
                text-align: center;
            }

            .description {
                color: #5b5b5b;
            }

            .lSSlideWrapper.usingCss {
                border: 1px solid gray;
            }
        </style>
        <link type="text/css" rel="stylesheet" href="{{ asset("assets/site/lightslider/dist/css/lightslider.css") }}"/>
    @endpush
    @push("footer")
        <script>
            let asset_url = '{{ asset("uploads/product") . "/" }}';
            $(document).on("click", ".quick-view", function () {
                let data = JSON.parse($(this).attr("data-info"));
                let images = data.get_images;
                let html = "<div class='col-xl-8'>"
                html += "<ul id='lightSlider' style='display: flex; align-items: center'>";
                images.forEach(e => {
                    html += `<li class='img-cont' data-thumb="${asset_url + e.name}">
                                <img class="img-fluid" style="max-height: 300px;" src="${asset_url + e.name}" />`
                });
                html += "</ul></div>";
                html += "<div class='col-lg-4'>";
                html += `<p class='name color-red'><b>${data.name}</b></p>`;
                html += `<p class="price"><b>$${data.price}</b></p>`;
                html += `<p class="description">${data.description}</p>`;
                html += `<p><b>Category: </b> <span class="color-red">${data.get_category.name}</span></p>`;
                html += "</div>";
                $(".modal-body").html(html);
                $(".modal").modal();
                $('#lightSlider').lightSlider({
                    gallery: true,
                    item: 1,
                    loop: true,
                    slideMargin: 0,
                    thumbItem: 9
                });
            });
        </script>
        <script src="{{ asset("assets/site/lightslider/dist/js/lightslider.js") }}"></script>

    @endpush
@endsection
