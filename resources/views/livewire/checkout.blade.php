<div class="page-wrapper">
    <div class="checkout shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="block billing-details">
                        <h4 class="widget-title">Billing Details</h4>
                        <form class="checkout-form">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" id="full_name" value="{{ auth()->user()->full_name }}" required placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="user_address">Address</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->address }}" id="user_address" placeholder="">
                            </div>
                            <div class="checkout-country-code clearfix">
                                <div class="form-group">
                                    <label for="user_post_code">Zip Code</label>
                                    <input type="text" class="form-control" value=""  id="user_post_code" name="zipcode" value="">
                                </div>
                                <div class="form-group" >
                                    <label for="user_city">City</label>
                                    <input type="text" class="form-control" id="user_city" name="city" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_country">Country</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->country }}" id="user_country" placeholder="">
                            </div>
                        </form>
                    </div>
                    <div class="block">
                        <h4 class="widget-title">Payment Method</h4>
                        <p>Credit Cart Details (Secure payment)</p>
                        <div class="checkout-product-details">
                            <div class="payment">
                                <div class="card-details">
                                    <form  class="checkout-form">
                                        <div class="form-group">
                                            <label for="card-number">Card Number <span class="required">*</span></label>
                                            <input  id="card-number" class="form-control"   type="tel" placeholder="•••• •••• •••• ••••">
                                        </div>
                                        <div class="form-group half-width padding-right">
                                            <label for="card-expiry">Expiry (MM/YY) <span class="required">*</span></label>
                                            <input id="card-expiry" class="form-control" type="tel" placeholder="MM / YY">
                                        </div>
                                        <div class="form-group half-width padding-left">
                                            <label for="card-cvc">Card Code <span class="required">*</span></label>
                                            <input id="card-cvc" class="form-control"  type="tel" maxlength="4" placeholder="CVC" >
                                        </div>
                                        <a href="#" class="btn btn-main mt-20">Place Order</a >
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-checkout-details">
                        <div class="block">
                            <h4 class="widget-title">Order Summary</h4>
                            @forelse ($products as $product)
                            <div class="media product-card" {{ $total_price = $total_price + $product->product->price }}>
                                <a class="pull-left" href="product-single.html">
                                    <img class="media-object" src="{{ config('app.url').$product->product->thumbnail }}" alt="Image" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="product-single.html">{{ $product->product->name }}</a></h4>
                                    <p class="price" >1 x ${{ $product->product->price }}</p>
                                    <span class="remove" wire:click="removePrduct({{ $product->id }})">Remove</span>
                                </div>
                            </div>
                            @empty
                                <p class="text-warnning">You Don't have any product</p>
                            @endforelse
                            <div class="discount-code">
                                <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
                            </div>
                            <ul class="summary-prices">
                                <li>
                                    <span>Subtotal:</span>
                                    <span class="price">$190</span>
                                </li>
                                <li>
                                    <span>Shipping:</span>
                                    <span>Free</span>
                                </li>
                            </ul>
                            <div class="summary-total">
                                <span>Total</span>
                                <span>${{ $total_price }}</span>
                            </div>
                            <div class="verified-icon">
                                <img src="images/shop/verified.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Enter Coupon Code">
                    </div>
                    <button type="submit" class="btn btn-main">Apply Coupon</button>
                </form>
            </div>
        </div>
    </div>
</div>