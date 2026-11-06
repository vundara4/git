

<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('hero_title','Romdul Products'); ?>
<?php $__env->startSection('hero_subtitle','Search, filter, sort, and add to cart easily'); ?>

<?php $__env->startSection('hero_action'); ?>
  <a class="btn btn-dark pill px-4" href="<?php echo e(route('front.categories.index')); ?>">
    <i class="bi bi-grid me-1"></i> Browse Categories
  </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb mb-0">
    <li class="breadcrumb-item">
      <a href="<?php echo e(url('/')); ?>" class="text-decoration-none">Home</a>
    </li>
    <li class="breadcrumb-item active">Products</li>
  </ol>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container py-3">

  
  <div class="text-muted small mb-3">
    Showing <?php echo e($products->firstItem() ?? 0); ?>

    to <?php echo e($products->lastItem() ?? 0); ?>

    of <?php echo e($products->total()); ?> results
  </div>

  
  <?php if($products->count() == 0): ?>
    <div class="alert alert-light border rounded-4 p-4 text-center">
      <div class="fw-bold">No products found 😢</div>
      <div class="text-muted">Try different filters.</div>
    </div>
  <?php else: ?>

  
  <div class="row g-3">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-6 col-md-4 col-lg-3">
      <div class="card soft-card h-100 position-relative">

        
        <span class="badge bg-danger position-absolute top-0 start-0 m-2 px-3 py-1 pill">
          🔥 Hot
        </span>

        <button type="button"
                class="js-heart-add-to-cart theme-light position-absolute top-0 end-0 m-2 p-2"
                data-url="<?php echo e(route('cart.add',$p->id)); ?>"
                data-name="<?php echo e($p->ProductName); ?>"
                aria-label="Add <?php echo e($p->ProductName); ?> to cart">
          <i class="bi bi-heart fs-5"></i>
        </button>

        
        <?php if($p->ProductImage): ?>
          <img src="<?php echo e(asset('img/product/'.$p->ProductImage)); ?>" class="thumb">
        <?php else: ?>
          <div class="noimg">No Image</div>
        <?php endif; ?>

        <div class="card-body d-flex flex-column">

          
          <div class="fw-semibold line-clamp-2 mb-1">
            <?php echo e($p->ProductName); ?>

          </div>

          
          <div class="text-muted small mb-2">
            🚚 Fast delivery • 💰 Best price
          </div>

          
          <div class="fw-bold mb-3 text-dark">
            $<?php echo e(number_format($p->Price,2)); ?>

          </div>

          
          <div class="mt-auto d-flex gap-2">

            <a href="<?php echo e(route('products.show',$p->id)); ?>"
               class="btn btn-outline-dark pill flex-grow-1 btn-sm">
              👁 Detail
            </a>

            <button type="button"
                    class="btn btn-success pill btn-sm px-3 js-add-to-cart"
                    data-url="<?php echo e(route('cart.add',$p->id)); ?>"
                    data-name="<?php echo e($p->ProductName); ?>">
              🛒
            </button>

          </div>

        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

  
  <div class="mt-4 d-flex justify-content-center">
    <?php echo e($products->links()); ?>

  </div>

  <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
  document.querySelectorAll('.js-add-to-cart').forEach((button) => {
    button.addEventListener('click', async () => {
      const originalContent = button.innerHTML;
      button.disabled = true;
      button.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';

      try {
        const response = await fetch(button.dataset.url, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
            'Content-Type': 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
          },
          body: new URLSearchParams({ qty: 1 })
        });
        const data = await readCartResponse(response);

        if (!response.ok || !data.ok) {
          throw new Error(data.message || 'Unable to add this product to the cart.');
        }

        updateCartBadge(data.cart_count);
        showCartToast(data.message);
      } catch (error) {
        showCartToast(error.message || 'Please sign in as a customer to add items to your cart.');
      } finally {
        button.disabled = false;
        button.innerHTML = originalContent;
      }
    });
  });

  document.querySelectorAll('.js-heart-add-to-cart').forEach((button) => {
    button.addEventListener('click', async () => {
      const icon = button.querySelector('i');
      const originalClass = icon ? icon.className : '';
      button.disabled = true;
      if (icon) {
        icon.className = 'bi bi-heart-fill text-danger';
      }

      try {
        const response = await fetch(button.dataset.url, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
            'Content-Type': 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
          },
          body: new URLSearchParams({ qty: 1 })
        });

        const data = await readCartResponse(response);

        if (!response.ok || !data.ok) {
          throw new Error(data.message || 'Unable to add this product to the cart.');
        }

        button.classList.add('active');
        updateCartBadge(data.cart_count);
        showCartToast(data.message || 'Added to cart');
      } catch (error) {
        if (icon) {
          icon.className = originalClass;
        }
        showCartToast(error.message || 'Please sign in as a customer to add items to your cart.');
      } finally {
        button.disabled = false;
      }
    });
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/front/home.blade.php ENDPATH**/ ?>