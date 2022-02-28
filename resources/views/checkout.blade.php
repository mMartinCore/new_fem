<x-guest-layout>

    <section class="container pt-16 mx-auto mb-32">

        {{-- Header --}}
        <header class="flex flex-col py-8 mt-8 mb-12 space-y-6 text-center">
            {{-- <h2 class="font-serif text-5xl font-bold">Checkout</h2> --}}
            {{-- <hr class="self-center w-40 border-b-4 border-theme-blue-200"> --}}
        </header>

        <div class="flex flex-col items-center max-w-4xl mx-auto">
            <div class="w-full p-10 m-4 leading-loose border border-gray-200 shadow-lg bg-gray-50">
               

                    @if(session('message'))
                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif


             <form id="pay_form"  action="{{ route('stripe.stripePost') }}" method="POST" class="space-y-2 pay_form">
               
                 <h2 class="relative font-serif text-xl font-bold">
                        <span class="side-title">
                            Customer information
                        </span>  
                    <div id="card-errors" role="alert"></div>  

                    </h2>
                    @csrf

                     <div class="space-y-2">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input class="block w-full mt-1" type="text" name="name" :value="auth()->user()->name?? old('name-card')" required autofocus autocomplete="name" />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input  id="email" class="block w-full mt-1" type="text" name="email" :value="auth()->user()->email" disabled required autofocus autocomplete="email" />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="line1" value="{{ __('Line 1') }}" />
                        <x-jet-input id="line1" class="block w-full mt-1" type="text" name="line1" :value=" auth()->user()->line1 ?? old('line1')" required autofocus autocomplete="address" />
                    </div>
                    <div class="space-y-2">
                        <x-jet-label for="line2" value="{{ __('Line 2') }}" />
                        <x-jet-input id="line2" class="block w-full mt-1" type="text" name="line2" :value=" auth()->user()->line2 ?? old('line2')" required autofocus autocomplete="address" />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="city" value="{{ __('City') }}" />
                        <x-jet-input id="city" class="block w-full mt-1" type="text" name="city" :value="auth()->user()->city ?? old('city')" required autofocus autocomplete="city" />
                    </div>

                    <div class="inline-block w-1/2 pr-2 ">
                        <x-jet-label for="country" value="{{ __('Country') }}" />
                        <x-jet-input id="country" class="block w-full mt-1" type="text" name="country" :value="auth()->user()->country ?? old('country')" required autofocus autocomplete="country" />
                    </div>

                    <div class="inline-block w-1/2 pl-2 -mx-1">
                        <x-jet-label for="postal_code" value="{{ __('Postal_code') }}" />
                        <x-jet-input id="postal_code" class="block w-full mt-1" type="text" name="postal_code" :value="auth()->user()->postal_code ?? old('postal_code')" required autofocus autocomplete="zip" />
                    </div>   


                    <h2 class="relative font-serif text-xl font-bold">
                        <span class="side-title">
                            Payment information
                        </span>
                    </h2>



 
                    <input type="hidden" name="payment_method" class="payment-method"> 

                  <div class="space-y-0">
                        <x-jet-label for="name" value="{{ __('Name on Card') }}" />
                        <x-jet-input  id="card_holder_name" class="block w-full mt-1 card_holder_name" type="text" name="card_holder_name" :value=" old('name-card')" required autofocus autocomplete="name" />
                    </div>
                    <div class="space-y-0">
                        <x-jet-label for="card_no" value="{{ __('Card Number') }}" /> 
                    <div id="card-element"class="block border border-gray-400 bg-white py-3 px-2 w-full mt-4">
                    </div> 
                    </div> 
                    <div class="space-y-2">
                        <button  id="card-button"  class="px-4 py-1 font-light tracking-wider text-white bg-gray-900 rounded" >
                         Pay Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
    
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    
    <script>
      
    let stripe = Stripe("{{ env('STRIPE_KEY') }}")
    let elements = stripe.elements()
    let style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    }
    let card = elements.create('card', {style: style})
    card.mount('#card-element')
    let paymentMethod = null
    $('.pay_form').on('submit', function (e) {
      //  e.preventDefault()
        $('button.pay').attr('disabled', true)
        if (paymentMethod) {
            return true
        }
        stripe.confirmCardSetup(
            "{{ $intent->client_secret }}",
            {
                payment_method: {
                    card: card,
                    billing_details: {name: $('.card_holder_name').val()}
                }
            }
        ).then(function (result) {
            if (result.error) {
                $('#card-errors').text(result.error.message)
                $('button.pay').removeAttr('disabled')
            } else {

                paymentMethod = result.setupIntent.payment_method
                
                $('.payment-method').val(paymentMethod)
                $('.pay_form').submit()
            }
        })
        return false
    })
</script>

</x-guest-layout>