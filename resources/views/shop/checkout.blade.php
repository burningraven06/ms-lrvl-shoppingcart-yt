@extends('layouts.master')

@section("styles")
  <link rel='stylesheet' href='{{ asset('custom/css/checkout.css')}}' />
@endsection

@section("title")
  Raphael: Checkout
@endsection

@section("content")
  @if(!$cart_products)
    <div class='row'>
      <div class='col s8 offset-2'>
        <h1 class='pink-text'>You haven't added anything in your cart! </h1>
        <h4 class='mt64'>
          Please <a href="{{ route('productIndexRoute')}}"> shop some products first</a>
        </h4>
      </div>
    </div>
  @else
    <div class='row'>
      <div class='col s10 offset-s1'>
        <h3> Checkout</h3>
      </div>
    </div>

    <div class='row'>
      <div class="col s10 offset-s1 {{ !Session::has('error')? 'hide' : ''}}" id='checkoutError'>
        <div class='card-panel red lighten-2'>
          <span class='white-text message_cancel_btn right'>
            <i class='material-icons'>cancel</i>
          </span>
          <p class='white-text'>
             {{ session('error') }}
          </p>
          <p class='white-text' id='frontendError'>
          </p>
        </div>
      </div>
    </div>

    <div class='row'>
      <form method="post" action="{{ route('postCheckoutRoute')}}" id='checkoutForm'>
        <div class='row'>
          <div class='col s10 offset-s1'>
            <div class='col s8'>
              <input type='hidden' name="_token" value="{{ Session::token()}}" />
              <div class='row'>
                <h4> Shipping Info</h4>
              </div>
              <div class='row'>
                <div class='col s6 input-field'>
                  <i class="material-icons prefix">account_circle</i>
                  <input id='first_name' type='text' class='validate cust_fs36' required="" minlength="3" maxlength="30" name='first_name' />
                  <label for='first_name' data-error="wrong" data-success="right"> First Name </label>
                </div>
                <div class='col s6 input-field'>
                  <i class="material-icons prefix">account_circle</i>
                  <input id='last_name' type='text' class='validate cust_fs36' required=""  minlength="3" maxlength="30" name='last_name'/>
                  <label for='last_name' data-error="wrong" data-success="right"> Last Name </label>
                </div>
              </div>
              <div class='row'>
                <div class='col s6 input-field'>
                  <i class="material-icons prefix">email</i>
                  <input id='email' type='email' class='validate cust_fs18' required="" name='email'/>
                  <label for='email' data-error="wrong" data-success="right"> Email </label>
                </div>
                <div class='col s6 input-field'>
                  <i class="material-icons prefix">phone</i>
                  <input id='cellno' type='number' class='validate cust_fs18' required="" minlength="11" name='cellno'/>
                  <label for='cellno' data-error="wrong" data-success="right"> Cell</label>
                </div>
              </div>
              <div class='row'>
                <div class='col s12 input-field'>
                  <i class="material-icons prefix">home</i>
                  <input id='address' type='text' class='validate cust_fs18' required="" minlength="10" name='address'/>
                  <label for='address' data-error="wrong" data-success="right">Address</label>
                </div>
              </div>
              <div class='row'>
                <div class='col s12 input-field'>
                  <i class="material-icons prefix">insert_comment</i>
                  <input id='notes' type='text' class='validate cust_fs18' required="" minlength="10" name='order_note'/>
                  <label for='notes' data-error="wrong" data-success="right">Notes About your Order</label>
                </div>
              </div>
            </div>

            <div class='col s4 '>
            <div class='row '>
              <h4> Card Info</h4>
            </div>
            <div class='row'>
              <div class='col s12 input-field'>
                <i class="material-icons prefix">person</i>
                <input id='card-holdername' type='text' class='validate cust_fs36' required="" minlength="3" />
                <label for='card-holdername' data-error="wrong" data-success="right">Cardholder Name</label>
              </div>
            </div>
            <div class='row'>
              <div class='col s12 input-field'>
                <i class="material-icons prefix">credit_card</i>
                <input id='card-number' type='text' class='validate cust_fs18' required="" minlength="15" maxlength="16"/>
                <label for='card-number' data-error="wrong" data-success="right">Card Number</label>
              </div>
            </div>
            <div class='row'>
              <div class='col s6 input-field'>
                <i class="material-icons prefix">date_range</i>
                <input id='card-expiry-month' type='text' class='validate cust_fs18' required="" minlength="" maxlength="2"/>
                <label for='card-expiry-month' data-error="wrong" data-success="right">Expiry Month</label>
              </div>
              <div class='col s6 input-field'>
                <i class="material-icons prefix">date_range</i>
                <input id='card-expiry-year' type='text' class='validate cust_fs18' required="" minlength="2" maxlenth="4" title="Last 2 digits of year" />
                <label for='card-expiry-year' data-error="wrong" data-success="right">Expiry Year</label>
              </div>
            </div>
            <div class="row">
              <div class='col s12 input-field'>
                <i class="material-icons prefix">card_membership</i>
                <input id='card-cvc' type='text' class='validate cust_fs18' required="" minlength="3" maxlength="3" />
                <label for='card-cvc' data-error="wrong" data-success="right">Card CVC</label>
              </div>
            </div>
          </div>
          </div>
        </div>

        <div class='row'>
          <div class='col s6 offset-s4'>
            <button class='btn waves-effect waves-light btn-large teal' type='submit' id='formSubmitBtn'> Proceed <i class="material-icons right">send</i> </button>
            <button class='btn waves-effect waves-light btn-large red accent-1' type='reset' id='formResetBtn'> Cancel <i class='material-icons right'>block</i> </button>
          </div>
        </div>
      </form>
    </div>
  @endif
@endsection

@section('scripts')
  <script src="https://js.stripe.com/v2/"></script>

  {{-- <script src="https://js.stripe.com/v3/"></script> --}}
  <script src='{{ asset("custom/js/checkout.js")}}'></script>
@endsection
