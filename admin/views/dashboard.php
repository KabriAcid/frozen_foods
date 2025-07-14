<?php
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../../config/auth.php';
require __DIR__ . '/../../components/header.php';
?>

<body>
    <main class="dashboard">
        <section class="search-section">
            <form id="search-form" method="post">
                <div class="search-bar">
                    <input type="search" name="search" class="input-field" placeholder="Search">
                    <button type="submit" class="search-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.397h-.001l3.85 3.85a1 1 0 0 0 1.415-1.415l-3.85-3.85zm-5.442-.344a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z" />
                        </svg>
                    </button>
                </div>
            </form>
        </section>

        <section class="categories">
            <nav class="category-nav">
                <button class="category-btn active">All</button>
                <button class="category-btn">Healthy food</button>
                <button class="category-btn">Junk food</button>
                <button class="category-btn">Dessert</button>
            </nav>
        </section>

        <section class="products">
            <div class="product-card">
                <img src="assets/images/salad1.jpg" alt="Eyibisi Salad Mix" class="product-image">
                <div class="product-info">
                    <h3 class="product-title">Eyibisi Salad Mix</h3>
                    <p class="product-description">Mix vegetables ingredients</p>
                    <p class="product-price">$14.99</p>
                </div>
                <button class="favorite-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                        <path d="M8 2.748-.717-.737C5.6-.737 8 2.748 8 2.748z" />
                    </svg>
                </button>
            </div>
            <!-- Repeat similar product cards -->
        </section>
    </main>
</body>