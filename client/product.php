<?php
require __DIR__ . '/initialize.php';
require_once 'util/util.php';

// Get product ID from URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$product = getProductById($pdo, $product_id);
require_once 'partials/headers.php';
?>

<body class="bg-custom-gray min-h-screen">
  <div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
      <button id="backBtn" class="p-2 hover:bg-white rounded-lg transition-colors duration-200">
        <svg class="w-6 h-6 text-custom-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
      </button>
      <div class="relative">
        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Cart body -->
            <path d="M3 3H5L5.4 5M7 13H17L21 5H5.4M7 13L5.4 5M7 13L4.7 15.3C4.3 15.7 4.6 16.5 5.1 16.5H17M17 13V16.5"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round" />

            <!-- Cart wheels -->
            <circle cx="9" cy="20" r="1"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round" />

            <circle cx="20" cy="20" r="1"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round" />

            <!-- Premium accent line (optional highlight) -->
            <path d="M8 9H19"
              stroke="currentColor"
              stroke-width="1.5"
              stroke-linecap="round"
              opacity="0.6" />
          </svg>
        </div>
        <div class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full flex items-center justify-center">
          <span class="text-white text-xs font-bold">1</span>
        </div>
      </div>
    </div>

    <!-- Product Content -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
      <div class="grid md:grid-cols-2 gap-8 items-center">
        <!-- Product Info -->
        <div class="space-y-6">
          <div>
            <h1 class="text-4xl font-bold text-custom-dark mb-4"><?php echo htmlspecialchars($product['name']); ?></h1>

            <div class="mb-6">
              <p class="text-gray-500 text-sm mb-2">Price</p>
              <p class="text-3xl font-bold text-custom-dark">₦<?php echo number_format($product['price'], 2); ?></p>
            </div>

            <div>
              <p class="text-gray-500 text-lg mb-4">Choice quantity</p>
              <div class="flex items-center space-x-4">
                <button id="decreaseBtn" class="quantity-btn w-12 h-12 rounded-full border-2 border-gray-200 flex items-center justify-center text-xl font-bold text-custom-dark hover:border-custom-accent hover-accent">
                  -
                </button>
                <span id="quantity" class="text-2xl font-bold text-custom-dark min-w-[3rem] text-center">1</span>
                <button id="increaseBtn" class="quantity-btn w-12 h-12 rounded-full border-2 border-gray-200 flex items-center justify-center text-xl font-bold text-custom-dark hover:border-custom-accent hover-accent">
                  +
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Product Image -->
        <div class="flex justify-center">
          <div class="relative">
            <img
              src="../assets/uploads/<?php echo htmlspecialchars($product['image']); ?>"
              alt="<?php echo htmlspecialchars($product['name']); ?>"
              class="w-80 h-80 object-cover rounded-full shadow-lg">
            <?php if (!empty($product['in_stock'])): ?>
              <span class="absolute top-4 left-4 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                <i class="fas fa-check mr-1"></i> In Stock
              </span>
            <?php else: ?>
              <span class="absolute top-4 left-4 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                <i class="fas fa-times mr-1"></i> Out of Stock
              </span>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Description Section -->
      <div class="mt-12">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-2xl font-bold text-custom-dark">Description</h2>
          <div class="flex items-center space-x-2">
            <div class="flex items-center">
              <svg class="w-5 h-5 star-rating" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
              </svg>
            </div>
            <span class="text-lg font-bold text-custom-accent"><?php echo isset($product['rating']) ? $product['rating'] : '4.9'; ?></span>
          </div>
        </div>

        <p class="text-gray-600 text-lg leading-relaxed mb-8">
          <?php echo htmlspecialchars($product['description']); ?>
        </p>
      </div>

      <!-- Features Section -->
      <?php if (!empty($product['features'])):
        $features = is_array($product['features']) ? $product['features'] : json_decode($product['features'], true);
      ?>
        <div class="mt-8">
          <h3 class="text-lg font-semibold text-custom-dark mb-4">Features</h3>
          <ul class="list-disc pl-6 text-gray-700 space-y-2">
            <?php foreach ($features as $feature): ?>
              <li><?php echo htmlspecialchars($feature); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <!-- Nutritional Info Section -->
      <?php if (!empty($product['nutritional_info'])):
        $nutritional = is_array($product['nutritional_info']) ? $product['nutritional_info'] : json_decode($product['nutritional_info'], true);
      ?>
        <div class="mt-8">
          <h3 class="text-lg font-semibold text-custom-dark mb-4">Nutritional Information</h3>
          <div class="grid grid-cols-2 gap-4">
            <?php foreach ($nutritional as $key => $value): ?>
              <div class="text-center">
                <p class="text-gray-500 text-sm capitalize"><?php echo str_replace('_', ' ', $key); ?></p>
                <p class="font-semibold text-custom-dark"><?php echo htmlspecialchars($value); ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <!-- Action Buttons -->
      <div class="flex flex-col sm:flex-row gap-4 mt-10">
        <button id="orderBtn" class="flex-1 bg-custom-accent text-white py-4 px-8 rounded-2xl font-semibold text-lg hover:opacity-90 transition-opacity duration-200">
          Order Now
        </button>
        <button id="addChartBtn" class="flex-1 border-2 border-gray-200 text-custom-dark py-4 px-8 rounded-2xl font-semibold text-lg hover:border-custom-accent hover-accent transition-all duration-200">
          Add Chart
        </button>
      </div>
    </div>
  </div>

  <script>
    // Product data
    const productData = {
      name: <?php echo json_encode($product['name']); ?>,
      price: <?php echo json_encode($product['price']); ?>,
      rating: <?php echo json_encode(isset($product['rating']) ? $product['rating'] : 4.9); ?>,
      description: <?php echo json_encode($product['description']); ?>
    };

    let currentQuantity = 1;

    // DOM elements
    const quantityDisplay = document.getElementById('quantity');
    const decreaseBtn = document.getElementById('decreaseBtn');
    const increaseBtn = document.getElementById('increaseBtn');
    const orderBtn = document.getElementById('orderBtn');
    const addChartBtn = document.getElementById('addChartBtn');
    const backBtn = document.getElementById('backBtn');

    // Quantity functions
    function updateQuantity(newQuantity) {
      if (newQuantity >= 1) {
        currentQuantity = newQuantity;
        quantityDisplay.textContent = currentQuantity;
        quantityDisplay.style.transform = 'scale(1.2)';
        setTimeout(() => {
          quantityDisplay.style.transform = 'scale(1)';
        }, 150);
      }
    }

    function decreaseQuantity() {
      if (currentQuantity > 1) {
        updateQuantity(currentQuantity - 1);
      }
    }

    function increaseQuantity() {
      updateQuantity(currentQuantity + 1);
    }

    decreaseBtn.addEventListener('click', decreaseQuantity);
    increaseBtn.addEventListener('click', increaseQuantity);

    orderBtn.addEventListener('click', () => {
      const totalPrice = (productData.price * currentQuantity).toFixed(2);
      alert(`Order placed!\nProduct: ${productData.name}\nQuantity: ${currentQuantity}\nTotal: ₦${totalPrice}`);
    });

    addChartBtn.addEventListener('click', () => {
      addChartBtn.textContent = 'Added!';
      addChartBtn.style.backgroundColor = 'var(--accent-color)';
      addChartBtn.style.color = 'white';
      addChartBtn.style.borderColor = 'var(--accent-color)';
      setTimeout(() => {
        addChartBtn.textContent = 'Add Chart';
        addChartBtn.style.backgroundColor = '';
        addChartBtn.style.color = '';
        addChartBtn.style.borderColor = '';
      }, 1500);
      alert(`Added ${currentQuantity} ${productData.name}(s) to chart!`);
    });

    backBtn.addEventListener('click', () => {
      window.history.length > 1 ? window.history.back() : window.location.href = 'dashboard.php';
    });

    quantityDisplay.style.transition = 'transform 0.15s ease';

    document.addEventListener('DOMContentLoaded', () => {
      console.log('Product details page loaded');
      console.log('Product:', productData);
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowUp' || e.key === '+') {
        e.preventDefault();
        increaseQuantity();
      } else if (e.key === 'ArrowDown' || e.key === '-') {
        e.preventDefault();
        decreaseQuantity();
      }
    });

    let touchStartY = 0;
    quantityDisplay.addEventListener('touchstart', (e) => {
      touchStartY = e.touches[0].clientY;
    });
    quantityDisplay.addEventListener('touchend', (e) => {
      const touchEndY = e.changedTouches[0].clientY;
      const difference = touchStartY - touchEndY;
      if (Math.abs(difference) > 30) {
        if (difference > 0) {
          increaseQuantity();
        } else {
          decreaseQuantity();
        }
      }
    });
  </script>
</body>

</html>