@extends('layouts.frontend')

@section('title', 'Medicines | Lakhadatar Pharma')

@section('content')

<section class="medicines-page">

    {{-- =========================================
        PAGE HERO
    ========================================== --}}

    <section class="medicine-page-hero">

        <div class="container">

            <div class="medicine-hero-content">

                <!-- <span class="medicine-eyebrow">
                    Lakhadatar Pharma
                </span> -->

                <h1>
                    Medicines & Healthcare
                </h1>

                <p>
                    Find genuine medicines from trusted brands
                    and order conveniently from your local pharmacy.
                </p>

                {{-- Search --}}

                <div class="medicine-main-search">

                    <!-- <svg
                        width="22"
                        height="22"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">

                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.35-4.35"/>

                    </svg> -->

                <form method="GET" action="{{ route('frontend.medicines') }}" class="medicine-main-search">

    <svg
        width="22"
        height="22"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        viewBox="0 0 24 24">

        <circle cx="11" cy="11" r="8"/>
        <path d="m21 21-4.35-4.35"/>

    </svg>

    <input
        type="search"
        name="search"
        id="medicine-search"
        value="{{ request('search') }}"
        placeholder="Search medicine, brand or company..."
        autocomplete="off"
    >

@if(request('search'))
    <a
        href="{{ route('frontend.medicines') }}"
        id="medicine-search-clear"
        aria-label="Clear search">
        ✕
    </a>
@endif

    <button type="submit" style="display:none;">
        Search
    </button>

</form>


                </div>

                <div class="medicine-search-hint">
                    Try: Paracetamol, Vitamin C, Amoxicillin
                </div>

            </div>

        </div>

    </section>


    {{-- =========================================
        MEDICINE CONTENT
    ========================================== --}}

    <section class="section medicine-catalog">

        <div class="container">


            {{-- Category Filters --}}

            <div class="medicine-toolbar">

                <div class="medicine-categories">

                    <button
                        class="medicine-filter active"
                        data-filter="all">
                        All Medicines
                    </button>

                    <button
                        class="medicine-filter"
                        data-filter="antibiotics">
                        Antibiotics
                    </button>

                    <button
                        class="medicine-filter"
                        data-filter="pain">
                        Pain Relief
                    </button>

                    <button
                        class="medicine-filter"
                        data-filter="vitamins">
                        Vitamins
                    </button>

                    <button
                        class="medicine-filter"
                        data-filter="digestive">
                        Digestive
                    </button>

                    <button
                        class="medicine-filter"
                        data-filter="first-aid">
                        First Aid
                    </button>

                </div>

            </div>


            {{-- Result Header --}}

            <div class="medicine-result-header">

                <div>

                    <h2>
                        Medicines
                    </h2>

                    <p id="medicine-result-count">
                      Showing {{ $medicines->total() }} available medicines
                     </p>

                </div>

                <div class="medicine-sort">

                    <label for="medicine-sort">
                        Sort
                    </label>

                    <select id="medicine-sort">

                        <option value="default">
                            Recommended
                        </option>

                        <option value="price-low">
                            Price: Low to High
                        </option>

                        <option value="price-high">
                            Price: High to Low
                        </option>

                        <option value="name">
                            Name: A-Z
                        </option>

                    </select>

                </div>

            </div>


            {{-- =========================================
                MEDICINE GRID
            ========================================== --}}

           <div
    class="medicine-catalog-grid"
    id="medicine-grid">

    @forelse($medicines as $medicine)

        <article
            class="medicine-product-card"
            data-category="{{ $medicine->category->name ?? '' }}"
            data-search="{{ strtolower($medicine->medicine_name . ' ' . $medicine->company_name) }}"
            data-price="{{ $medicine->retail_price }}"
            data-name="{{ $medicine->medicine_name }}">

            <a
                href="{{ route('frontend.medicine.show', $medicine->id) }}"
                class="medicine-product-image">

                <span>💊</span>

                @if($medicine->stock > 0)
                    <span class="medicine-stock in-stock">
                        In Stock
                    </span>
                @else
                    <span class="medicine-stock out-stock">
                        Out of Stock
                    </span>
                @endif

            </a>


            <div class="medicine-product-content">

                <span class="medicine-category-label">
                    {{ $medicine->category->name ?? 'General' }}
                </span>

                <h3>
                    <a href="{{ route('frontend.medicine.show', $medicine->id) }}">
                        {{ $medicine->medicine_name }}
                    </a>
                </h3>

                <p class="medicine-company">
                    {{ $medicine->company_name }}
                </p>


                <div class="medicine-product-footer">

                    <div>

                        <span class="medicine-price">
                            ₹{{ number_format($medicine->retail_price, 2) }}
                        </span>

                        <span class="medicine-unit">
                            / strip
                        </span>

                    </div>


                    @if($medicine->stock > 0)

                        <button
                            class="medicine-add-btn"
                            data-add-to-cart
                            data-id="m{{ $medicine->id }}"
                            data-name="{{ $medicine->medicine_name }}"
                            data-brand="{{ $medicine->company_name }}"
                            data-price="{{ $medicine->retail_price }}">

                            Add

                        </button>

                    @else

                        <button
                            class="medicine-add-btn disabled"
                            disabled>

                            Unavailable

                        </button>

                    @endif

                </div>

            </div>

        </article>

    @empty

        <div class="medicine-no-result"
             style="display:block;grid-column:1/-1;">

            <div class="medicine-no-result-icon">
                🔍
            </div>

            <h3>
                No medicines available
            </h3>

            <p>
                Please check back later.
            </p>

        </div>

    @endforelse

</div>

            {{-- No Result --}}

            <div
                id="medicine-no-result"
                class="medicine-no-result"
                style="display:none;">

                <div class="medicine-no-result-icon">
                    🔍
                </div>

                <h3>
                    Medicine not found
                </h3>

                <p>
                    Try another medicine or company name.
                </p>

                <a
                    href="https://wa.me/918769426133"
                    target="_blank"
                    class="btn btn-whatsapp">

                    Ask on WhatsApp

                </a>

            </div>




            


@if($medicines->hasPages())

    <div class="medicine-pagination">

        {{-- Previous --}}
        @if($medicines->onFirstPage())
            <span class="pagination-arrow disabled">←</span>
        @else
            <a href="{{ $medicines->previousPageUrl() }}"
               class="pagination-arrow">
                ←
            </a>
        @endif


        {{-- First Page --}}
        @if($medicines->currentPage() > 3)

            <a href="{{ $medicines->url(1) }}"
               class="pagination-number">
                1
            </a>

            <span class="pagination-dots">...</span>

        @endif


        {{-- Current Page Range --}}
        @foreach(
            $medicines->getUrlRange(
                max(1, $medicines->currentPage() - 1),
                min($medicines->lastPage(), $medicines->currentPage() + 1)
            )
            as $page => $url
        )

            @if($page == $medicines->currentPage())

                <span class="pagination-number active">
                    {{ $page }}
                </span>

            @else

                <a href="{{ $url }}"
                   class="pagination-number">
                    {{ $page }}
                </a>

            @endif

        @endforeach


        {{-- Last Page --}}
        @if($medicines->currentPage() < $medicines->lastPage() - 2)

            <span class="pagination-dots">...</span>

            <a href="{{ $medicines->url($medicines->lastPage()) }}"
               class="pagination-number">
                {{ $medicines->lastPage() }}
            </a>

        @endif


        {{-- Next --}}
        @if($medicines->hasMorePages())

            <a href="{{ $medicines->nextPageUrl() }}"
               class="pagination-arrow">
                →
            </a>

        @else

            <span class="pagination-arrow disabled">
                →
            </span>

        @endif

    </div>

@endif


            {{-- Can't Find --}}

            <div class="medicine-help">

                <div class="medicine-help-icon">
                    💊
                </div>

                <div class="medicine-help-content">

                    <h3>
                        Can't find your medicine?
                    </h3>

                    <p>
                        Send us the medicine name or prescription
                        and we'll help you find it.
                    </p>

                </div>

                <a
                    href="https://wa.me/918769426133"
                    target="_blank"
                    class="btn btn-whatsapp">

                    Ask on WhatsApp

                </a>

            </div>
            

        </div>

    </section>

</section>

@endsection