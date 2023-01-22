<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="carousel-item">
        <img src="..." alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>test</h5>
          <p>..grrrr.</p>
        </div>
      </div>
   
    

    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
              

                
                <?php if($parentCategories->count() > 0): ?>
                    <section class="category spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Categories
                            </div>
                            <div class="card-body">
                                <?php $__currentLoopData = $parentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('products.categories', $category->slug)); ?>"
                                        class="btn btn-sm btn-secondary category-btn mb-2">
                                        <?php echo e($category->name); ?>

                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                


                  
                  <?php if($hotDeals->count() > 0): ?>
                  <section class="hotdeal spad">
                      <div class="card customCard">
                          <div class="card-header customCard__header">
                              Hot Deal
                              <a href="<?php echo e(route('products.hotdeal')); ?>" class="btn btn-sm btn-success">View All</a>
                          </div>
                          <div class="card-body">
                              <div class="row sidebar-slider">
                                  <?php $__currentLoopData = $hotDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div class="col-12">
                                          <div class="card ProductCard">
                                              <a href="<?php echo e(route('products.details', $product->slug)); ?>">
                                                  <img src="<?php echo e(asset($product->image_one)); ?>"
                                                       class="card-img-top productCard__img"
                                                       alt="<?php echo e($product->product_title); ?>">
                                              </a>
                                              <div class="ProductCard__label bg-warning">
                                                  <?php if($product->discount_price == NULL): ?>
                                                      <span>Hot</span>
                                                  <?php else: ?>
                                                      <span>
                                                          <?php
                                                              $amount = $product->selling_price - $product->discount_price;
                                                              $discount = $amount/$product->selling_price*100;
                                                          ?>
                                                          <?php echo e(intval($discount)); ?>%
                                                      </span>
                                                  <?php endif; ?>
                                              </div>
                                              <div class="card-body productCard__body">
                                                  <h5 class="card-title productCard__title">
                                                      <a href="<?php echo e(route('products.details', $product->slug)); ?>"><?php echo e($product->product_title); ?></a>
                                                  </h5>
                                                  <div class="productCard__price">
                                                      <?php if($product->discount_price == NULL): ?>
                                                          <span class="price">
                                                              Rs <?php echo e(intval($product->selling_price)); ?>

                                                          </span>
                                                      <?php else: ?>
                                                          <span class="price">
                                                              Rs <?php echo e(intval($product->discount_price)); ?>

                                                          </span>
                                                          <span class="price-before-discount">
                                                              Rs <?php echo e(intval($product->selling_price)); ?>

                                                          </span>
                                                      <?php endif; ?>
                                                  </div>
                                                  <div class="productCard__btn">
                                                      <div class="btn-group" role="group" aria-label="Basic example">
                                                          <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                  id="<?php echo e($product->slug); ?>" data-toggle="modal"
                                                                  data-target="#cartmodal" title="Add Cart"
                                                                  onclick="productview(this.id)"><i
                                                                  class="fa fa-shopping-cart"></i></button>

                                                          <form action="javascript:void(0)" method="POST">
                                                              <button
                                                                  class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                  data-id="<?php echo e($product->id); ?>" title="Add Wishlist"><i
                                                                      class="fa fa-heart-o"></i></button>
                                                          </form>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                          </div>
                      </div>
                  </section>
              <?php endif; ?>
              
                
                <?php if($specialOffer->count() > 0): ?>
                    <section class="hotdeal spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Special Offer
                                <a href="<?php echo e(route('products.specialoffer')); ?>" class="btn btn-sm btn-success">View
                                    All</a>
                            </div>
                            <div class="card-body">
                                <div class="row sidebar-slider">
                                    <?php $__currentLoopData = $specialOffer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12">
                                            <div class="card ProductCard">
                                                <a href="<?php echo e(route('products.details', $product->slug)); ?>">
                                                    <img src="<?php echo e(asset($product->image_one)); ?>"
                                                         class="card-img-top productCard__img"
                                                         alt="<?php echo e($product->product_title); ?>">
                                                </a>
                                                <div class="ProductCard__label bg-success">
                                                    <?php if($product->discount_price == NULL): ?>
                                                        <span></span>
                                                    <?php else: ?>
                                                        <span>
                                                            <?php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = $amount/$product->selling_price*100;
                                                            ?>
                                                            <?php echo e(intval($discount)); ?>%
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="card-body productCard__body">
                                                    <h5 class="card-title productCard__title">
                                                        <a href="<?php echo e(route('products.details', $product->slug)); ?>"><?php echo e($product->product_title); ?></a>
                                                    </h5>
                                                    <div class="productCard__price">
                                                        <?php if($product->discount_price == NULL): ?>
                                                            <span class="price">
                                                                Rs <?php echo e(intval($product->selling_price)); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="price">
                                                                Rs <?php echo e(intval($product->discount_price)); ?>

                                                            </span>
                                                            <span class="price-before-discount">
                                                                Rs <?php echo e(intval($product->selling_price)); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="productCard__btn">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                    id="<?php echo e($product->slug); ?>" data-toggle="modal"
                                                                    data-target="#cartmodal" title="Add Cart"
                                                                    onclick="productview(this.id)"><i
                                                                    class="fa fa-shopping-cart"></i></button>

                                                            <form action="javascript:void(0)" method="POST">
                                                                <button
                                                                    class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                    data-id="<?php echo e($product->id); ?>" title="Add Wishlist"><i
                                                                        class="fa fa-heart-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                
            </div>

            <div class="col-md-8">
                
                <?php if($products->count() > 0): ?>
                    <section class="product spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Products
                                <a href="<?php echo e(route('products')); ?>" class="btn btn-sm btn-success">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="row product-slider">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12">
                                            <div class="card ProductCard">
                                                <a href="<?php echo e(route('products.details', $product->slug)); ?>">
                                                    <img src="<?php echo e(asset($product->image_one)); ?>"
                                                         class="card-img-top productCard__img"
                                                         alt="<?php echo e($product->product_title); ?>">
                                                </a>
                                                <?php if($product->discount_price == NULL): ?>

                                                    <?php if($product->hot_deal == 1): ?>
                                                        <div class="ProductCard__label bg-warning">
                                                            <span>Hot</span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if($product->best_seller == 1): ?>
                                                        <div class="ProductCard__label bg-info">
                                                            <span>Top</span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if($product->special_offer == 1): ?>
                                                        <div class="ProductCard__label bg-success">
                                                            <span>Special</span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if($product->trand == 1): ?>
                                                        <div class="ProductCard__label bg-secondary">
                                                            <span>Trend</span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if($product->new_arrival == 1): ?>
                                                        <div class="ProductCard__label bg-primary">
                                                            <span>New</span>
                                                        </div>
                                                    <?php endif; ?>

                                                <?php else: ?>
                                                    <div class="ProductCard__label bg-success">
                                                        <span>
                                                            <?php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = $amount/$product->selling_price*100;
                                                            ?>
                                                            <?php echo e(intval($discount)); ?>%
                                                        </span>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="card-body productCard__body">
                                                    <h5 class="card-title productCard__title">
                                                        <a href="<?php echo e(route('products.details', $product->slug)); ?>"><?php echo e($product->product_title); ?></a>
                                                    </h5>
                                                    <div class="productCard__price">
                                                        <?php if($product->discount_price == NULL): ?>
                                                            <span class="price">
                                                                Rs <?php echo e(intval($product->selling_price)); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="price">
                                                                Rs <?php echo e(intval($product->discount_price)); ?>

                                                            </span>
                                                            <span class="price-before-discount">
                                                                Rs <?php echo e(intval($product->selling_price)); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="productCard__btn">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                    id="<?php echo e($product->slug); ?>" data-toggle="modal"
                                                                    data-target="#cartmodal" title="Add Cart"
                                                                    onclick="productview(this.id)"><i
                                                                    class="fa fa-shopping-cart"></i></button>

                                                            <form action="javascript:void(0)" method="POST">
                                                                <button
                                                                    class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                    data-id="<?php echo e($product->id); ?>" title="Add Wishlist"><i
                                                                        class="fa fa-heart-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                

                
                <?php if($bestSellers->count() > 0): ?>
                    <section class="product spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Best Seller
                                <a href="<?php echo e(route('products.bestseller')); ?>" class="btn btn-sm btn-success">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="row product-slider">
                                    <?php $__currentLoopData = $bestSellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12">
                                            <div class="card ProductCard">
                                                <a href="<?php echo e(route('products.details', $product->slug)); ?>">
                                                    <img src="<?php echo e(asset($product->image_one)); ?>"
                                                         class="card-img-top productCard__img"
                                                         alt="<?php echo e($product->product_title); ?>">
                                                </a>
                                                <div class="ProductCard__label bg-info">
                                                    <?php if($product->discount_price == NULL): ?>
                                                        <span>Top</span>
                                                    <?php else: ?>
                                                        <span>
                                                            <?php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = $amount/$product->selling_price*100;
                                                            ?>
                                                            <?php echo e(intval($discount)); ?>%
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="card-body productCard__body">
                                                    <h5 class="card-title productCard__title">
                                                        <a href="<?php echo e(route('products.details', $product->slug)); ?>"><?php echo e($product->product_title); ?></a>
                                                    </h5>
                                                    <div class="productCard__price">
                                                        <?php if($product->discount_price == NULL): ?>
                                                            <span class="price">
                                                                Rs <?php echo e(intval($product->selling_price)); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="price">
                                                                Rs <?php echo e(intval($product->discount_price)); ?>

                                                            </span>
                                                            <span class="price-before-discount">
                                                                Rs <?php echo e(intval($product->selling_price)); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="productCard__btn">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                    id="<?php echo e($product->slug); ?>" data-toggle="modal"
                                                                    data-target="#cartmodal" title="Add Cart"
                                                                    onclick="productview(this.id)"><i
                                                                    class="fa fa-shopping-cart"></i></button>

                                                            <form action="javascript:void(0)" method="POST">
                                                                <button
                                                                    class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                    data-id="<?php echo e($product->id); ?>" title="Add Wishlist"><i
                                                                        class="fa fa-heart-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                

                
                <?php if($trand->count() > 0): ?>
                    <section class="product spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Trend
                                <a href="<?php echo e(route('products.trand')); ?>" class="btn btn-sm btn-success">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="row product-slider">
                                    <?php $__currentLoopData = $trand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12">
                                            <div class="card ProductCard">
                                                <a href="<?php echo e(route('products.details', $product->slug)); ?>">
                                                    <img src="<?php echo e(asset($product->image_one)); ?>"
                                                         class="card-img-top productCard__img"
                                                         alt="<?php echo e($product->product_title); ?>">
                                                </a>
                                                <div class="ProductCard__label bg-secondary">
                                                    <?php if($product->discount_price == NULL): ?>
                                                        <span>Trend</span>
                                                    <?php else: ?>
                                                        <span>
                                                            <?php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = $amount/$product->selling_price*100;
                                                            ?>
                                                            <?php echo e(intval($discount)); ?>%
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="card-body productCard__body">
                                                    <h5 class="card-title productCard__title">
                                                        <a href="#"><?php echo e($product->product_title); ?></a>
                                                    </h5>
                                                    <div class="productCard__price">
                                                        <?php if($product->discount_price == NULL): ?>
                                                            <span class="price">
                                                                Rs <?php echo e(intval($product->selling_price)); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="price">
                                                                Rs <?php echo e(intval($product->discount_price)); ?>

                                                            </span>
                                                            <span class="price-before-discount">
                                                                Rs <?php echo e(intval($product->selling_price)); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="productCard__btn">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                    id="<?php echo e($product->slug); ?>" data-toggle="modal"
                                                                    data-target="#cartmodal" title="Add Cart"
                                                                    onclick="productview(this.id)"><i
                                                                    class="fa fa-shopping-cart"></i></button>

                                                            <form action="javascript:void(0)" method="POST">
                                                                <button
                                                                    class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                    data-id="<?php echo e($product->id); ?>" title="Add Wishlist"><i
                                                                        class="fa fa-heart-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                

                
                <?php if($posts->count() > 0): ?>
                    <section class="blog spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Blogs
                                <a href="<?php echo e(route('blog.posts')); ?>" class="btn btn-sm btn-success">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="row blog-slider">
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-12">
                                            <div class="blog__single__latest">
                                                <a href="<?php echo e(route('blog.single', $post->slug)); ?>">
                                                    <img src="<?php echo e(asset($post->image)); ?>"
                                                         alt="<?php echo e($post->title_en); ?>">
                                                </a>
                                                <div class="blog__single__latest__text p-2">
                                                    <div class="blog__single__latest__text__tag">
                                                        <div class="blog__single__latest__text__tag__item">
                                                            <i class="fa fa-calendar-o"></i>
                                                            <?php echo e($post->created_at->format('F d, Y')); ?>

                                                        </div>
                                                    </div>
                                                    <a href="<?php echo e(route('blog.single', $post->slug)); ?>">
                                                        <h4><?php echo e($post->title_en); ?></h4></a>
                                                    <p><?php echo Str::limit($post->description_en, 80); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                

                
                <?php if($newArrival->count() > 0): ?>
                    <section class="product spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                new Arrival
                                <a href="<?php echo e(route('products.newarrival')); ?>" class="btn btn-sm btn-success">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="row product-slider">
                                    <?php $__currentLoopData = $newArrival; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12">
                                            <div class="card ProductCard">
                                                <a href="<?php echo e(route('products.details', $product->slug)); ?>">
                                                    <img src="<?php echo e(asset($product->image_one)); ?>"
                                                         class="card-img-top productCard__img"
                                                         alt="<?php echo e($product->product_title); ?>">
                                                </a>
                                                <div class="ProductCard__label bg-primary">
                                                    <?php if($product->discount_price == NULL): ?>
                                                        <span>New</span>
                                                    <?php else: ?>
                                                        <span>
                                                            <?php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = $amount/$product->selling_price*100;
                                                            ?>
                                                            <?php echo e(intval($discount)); ?>%
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="card-body productCard__body">
                                                    <h5 class="card-title productCard__title">
                                                        <a href="<?php echo e(route('products.details', $product->slug)); ?>"><?php echo e($product->product_title); ?></a>
                                                    </h5>
                                                    <div class="productCard__price">
                                                        <?php if($product->discount_price == NULL): ?>
                                                            <span class="price">
                                                                Rs <?php echo e(intval($product->selling_price)); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="price">
                                                                Rs <?php echo e(intval($product->discount_price)); ?>

                                                            </span>
                                                            <span class="price-before-discount">
                                                                Rs <?php echo e(intval($product->selling_price)); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="productCard__btn">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                    id="<?php echo e($product->slug); ?>" data-toggle="modal"
                                                                    data-target="#cartmodal" title="Add Cart"
                                                                    onclick="productview(this.id)"><i
                                                                    class="fa fa-shopping-cart"></i></button>

                                                            <form action="javascript:void(0)" method="POST">
                                                                <button
                                                                    class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                    data-id="<?php echo e($product->id); ?>" title="Add Wishlist"><i
                                                                        class="fa fa-heart-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
    

    <!-- Modal -->
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.cart','data' => []]); ?>
<?php $component->withName('cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <?php if($brands->count() > 0): ?>
        <div class="partner">
            <div class="container">
                <div class="row partner-slider">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <a href="#" class="partner__logo">
                                <img src="<?php echo e(asset($brand->logo)); ?>" alt="Parner Logo">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    

    <script>
        // Add To Wishlist
        $(document).ready(function () {
            $('.wishlistSubmit').on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                if (id) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('add.wishlist')); ?>",
                        method: 'post',
                        data: {
                            id: id,
                        },
                        success: function (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }
                        },
                    });
                } else {
                    alert('Danger...!');
                }
            });
        });

        function productview(slug) {
            var url = '<?php echo e(route("products.queck", ":slug")); ?>';
            url = url.replace(':slug', slug);
            var postUrl = '<?php echo e(route("products.details", ":slug")); ?>';
            postUrl = postUrl.replace(':slug', slug);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#productImage').attr('src', data.product.image_one);
                    $('#productCategory').text(data.product.category.name);
                    $('#productSubcategory').text(data.product.subcategory.name);
                    $('#productName').text(data.product.product_title);
                    $('#productBrand').text(data.product.brand.name);
                    $('#productUrl').attr('action', postUrl);

                    if (data.product.discount_price == null) {
                        $('#productPrice').text(data.product.selling_price);
                    } else {
                        $('#productPrice').text(data.product.discount_price);
                    }

                    var d = $('select[name="color"]').empty();
                    $.each(data.product_color, function (key, value) {
                        $('select[name="color"]').append('<option value="' + value + '">' + value + '</option>');
                    });

                    var d = $('select[name="size"]').empty();
                    $.each(data.product_size, function (key, value) {
                        $('select[name="size"]').append('<option value="' + value + '">' + value + '</option>');
                    });
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/frontend/home.blade.php ENDPATH**/ ?>