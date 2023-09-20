<section class="section-checkout">
            <h1 class="checkout-title">CHECK OUT</h1>
        <div class="checkout">
            <div class="checkout-left">
                <h3 class="checkout-left-title">Basic Information</h3>
                <input type="text" wire:model.defer="fullname" id="fullname" class="checkout-left-input first" placeholder="Enter Full Name" />
                                    @error('fullname') <small class="text-danger">{{$message}}</small>@enderror
                <input type="email" wire:model.defer="email" id="email" class="checkout-left-input" placeholder="Enter Email Address" />
                                    @error('email') <small class="text-danger">{{$message}}</small>@enderror
                <input type="number" wire:model.defer="phone" id="phone" class="checkout-left-input" placeholder="Enter Phone Number" />
                                    @error('phone') <small class="text-danger">{{$message}}</small>@enderror
                <input type="number" wire:model.defer="pincode" id="pincode" class="checkout-left-input" placeholder="Enter Pin-code" />
                                    @error('pincode') <small class="text-danger">{{$message}}</small>@enderror
                <textarea wire:model.defer="address" id="address" class="checkout-left-input" rows="2"></textarea>
                                    @error('address') <small class="text-danger">{{$message}}</small>@enderror
            </div>
            <div class="checkout-right">
                <h3 class="checkout-right-title">Item Total Amount</h3>

                <div class="checkout-right-content">
                   
                </div>
                <div class="checkout-right-content first">
                    <p>Order Total</p>
                    <p class="checkout-right-content-fw">$45.99</p>
                </div>
                <div class="checkout-right-payment">
                    <h3>Payment Method</h3>
                    <div class="col-md-12 mb-3">
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-5 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button wire:loading.attr="disabled" class="nav-link bg-dark text-light active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
                                            <button wire:loading.attr="disabled" class="nav-link bg-dark text-light fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                        </div>
                                        <div class="tab-content col-md-7" id="v-pills-tabContent">
                                            <div class="tab-pane active text-dark fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h9 class>Cash on Delivery Mode</h9>
                                                <hr/>
                                                <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-dark">
                                                    <span wire:loading.remove wire:target="codOrder">
                                                        Place Order (Cash on Delivery)
                                                    </span>
                                                    <span wire:loading wire:target="codOrder">
                                                        Placeing Order...
                                                    </span>
                                                </button>

                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Online Payment Mode</h6>
                                                <hr/>
                                              <!-- <button wire:loading.attr="disabled"     type="button" class="btn btn-warning">Pay Now (Online Payment)</button> -->
                                              <div>
                                                <div id="paypal-button-container"></div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                </div>

            </div>
        </div>
        
        </section>


@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AQTHFvf5Af0DGhYVLLVsZpGnzaiLHlwQqZZN5gpW0BkkHyyr2WFveRlh--K9h3M-OcnHKtDi0nZoOFb8&currency=USD"></script>
<script>
      paypal.Buttons({

        // onClick is called when the button is clicked
                onClick()  {

            // Show a validation error if the checkbox is not checked
            if (!document.getElementById('fullname').value
            || !document.getElementById('phone').value
            || !document.getElementById('email').value
            || !document.getElementById('pincode').value
            || !document.getElementById('address').value
            ) 
            {
                Livewire.emit('validationForAll');
                return false;
            }else
            {
               @this.set('fullname',document.getElementById('fullname').value);
               @this.set('phone',document.getElementById('phone').value);
               @this.set('email',document.getElementById('email').value);
               @this.set('pincode',document.getElementById('pincode').value);
               @this.set('address',document.getElementById('address').value);
               
            }
            },
        // Order is created on the server and the order id is returned
        createOrder() {
          return fetch("/my-server/create-paypal-order", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            // use the "body" param to optionally pass additional order information
            // like product skus and quantities
            body: JSON.stringify({
              cart: [
                {
                  value: "{{$this -> totalProductAmount}}"
                },
              ],
            }),
          })
          .then((response) => response.json())
          .then((order) => order.id);
        },
        // Finalize the transaction on the server after payer approval
        onApprove(data) {
          return fetch("/my-server/capture-paypal-order", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              orderID: data.orderID
            })
          })
          .then((response) => response.json())
          .then((orderData) => {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  window.location.href = 'thank_you.html';
          });
        }
      }).render('#paypal-button-container');
    </script>
@endpush