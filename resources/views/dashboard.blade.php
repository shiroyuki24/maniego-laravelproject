<!-- dashboard.blade.php -->

<x-app-layout>
    <div class="pagetitle">
        <h1>{{ __('Dashboard') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <!-- Add other breadcrumbs if necessary -->
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Total Number of Post Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card totalPost-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Posts</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-journal"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $totalPosts }}</h6>
                                <span class="text-success small pt-1 fw-bold">Posts</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Total Post Card -->

            <!-- Total Published Posts Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card publishedPost-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Published Posts</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $publishedPosts }}</h6>
                                <span class="text-success small pt-1 fw-bold">Published</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Published Post Card -->

            <!-- Total Unpublished Posts Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card unpublishedPost-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Unpublished Posts</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-x-circle"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $unpublishedPosts }}</h6>
                                <span class="text-danger small pt-1 fw-bold">Unpublished</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Unpublished Post Card -->

            <!-- Other cards... -->

        </div>
    </section>
</x-app-layout>
