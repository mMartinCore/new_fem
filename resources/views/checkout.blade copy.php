<x-guest-layout>

    <section class="container pt-16 mx-auto mb-32">

        {{-- Header --}}
        <header class="flex flex-col py-8 mt-8 mb-12 space-y-6 text-center">
            {{-- <h2 class="font-serif text-5xl font-bold">Checkout</h2> --}}
            {{-- <hr class="self-center w-40 border-b-4 border-theme-blue-200"> --}}
        </header>

        <div class="flex flex-col items-center max-w-4xl mx-auto">
            <div class="w-full p-10 m-4 leading-loose border border-gray-200 shadow-lg bg-gray-50">
                <form id="pay_form"
                  action="{{ route('stripe.post') }}"
                   method="post"

                 class="space-y-8">
                    <h2 class="relative font-serif text-xl font-bold">
                        <span class="side-title">
                            Customer information
                        </span>
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
                        <x-jet-input id="postal_code" class="block w-full mt-1" type="text" name="zip" :value="old('postal_code')" required autofocus autocomplete="zip" />
                    </div>

                       <input type='hidden' id='paymentMethod' name='paymentMethod'  />


                    <h2 class="relative font-serif text-xl font-bold">
                        <span class="side-title">
                            Payment information
                        </span>
                    </h2>

                  <div class="space-y-0">
                        <x-jet-label for="name" value="{{ __('Name on Card') }}" />
                        <x-jet-input  id="card-holder-name" class="block w-full mt-1" type="text" name="card-name" :value=" old('name-card')" required autofocus autocomplete="name" />
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
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
          
        const elements = stripe.elements();
        const cardElement = elements.create('card');
    
        cardElement.mount('#card-element');





const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');
 
cardButton.addEventListener('click', async (e) => {
    e.preventDefault();
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
    );
 
    if (error) {
        alert(error.message);
        // Display "error.message" to the user...
    } else {
 
        var pay_form = document.getElementById('pay_form'); 
        document.getElementById('paymentMethod').value = paymentMethod.id;
        pay_form.submit();
        // The card has been verified successfully...
    }
});












    </script>

</x-guest-layout>