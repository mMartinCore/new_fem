 <x-app-layout>
    <section class="container pt-4 mx-auto mb-32"> 
        {{-- Header --}}
        <header class="flex flex-col py-2   mb-4 space-y-6 text-center">
   
        </header>

        <div class="flex flex-col items-center max-w-4xl mx-auto">
            <div class="w-full p-10 m-4 leading-loose border border-gray-200 shadow-lg bg-gray-50">  
           
             <form id="pay_form"  action="{{ route('buyforme.buyformePost') }}" method="POST" class="space-y-2 pay_form">               
                 <h2 class="relative font-serif text-xl font-bold">
           
            
                    </h2>
                    @csrf

                  <div class="space-y-2">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input class="block w-full mt-1" type="text" name="name" :value="auth()->user()->name?? old('name-card')" required autofocus autocomplete="name" />
                          <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input  id="email" class="block w-full mt-1" type="text" name="email" :value="auth()->user()->email" disabled required autofocus autocomplete="email" />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="line1" value="{{ __('Line 1') }}" />
                        <x-jet-input id="line1" class="block w-full mt-1" type="text" name="line1" :value=" auth()->user()->line1 ?? old('line1')" required autofocus autocomplete="address" />
                      <x-jet-input-error for="line1" class="mt-2" />
                    </div>
                    <div class="space-y-2">
                        <x-jet-label for="line2" value="{{ __('Line 2') }}" />
                        <x-jet-input id="line2" class="block w-full mt-1" type="text" name="line2" :value=" auth()->user()->line2 ?? old('line2')" required autofocus autocomplete="address" />
                        <x-jet-input-error for="line2" class="mt-2" />
                    </div>

                    <div class="space-y-2">
                        <x-jet-label for="city" value="{{ __('City') }}" />
                        <x-jet-input id="city" class="block w-full mt-1" type="text" name="city" :value="auth()->user()->city ?? old('city')" required autofocus autocomplete="city" />
                        <x-jet-input-error for="city" class="mt-2" />
                    </div>

                    <div class="inline-block w-1/2 pr-2 ">
                        <x-jet-label for="country_name" value="{{ __('Country') }}" />
                        <x-jet-input id="country_name" class="block w-full mt-1" type="text" name="country_name" :value="auth()->user()->country_name ?? old('country_name')" required autofocus autocomplete="country_name" />
                        <x-jet-input-error for="country_name" class="mt-2" />
                    </div>

                    <div class="inline-block w-1/2 pl-2 -mx-1">
                        <x-jet-label for="postal_code" value="{{ __('Postal_code') }}" />
                        <x-jet-input id="postal_code" class="block w-full mt-1" type="text" name="postal_code" :value="auth()->user()->postal_code ?? old('postal_code')" required autofocus autocomplete="zip" />
                        <x-jet-input-error for="postal_code" class="mt-2" />
                    </div>   
                   <div id="card-errors" class="w-full text-center text-red-600 bg-red-200" role="alert"></div>  

                    <h2 class="relative font-serif text-xl font-bold">
                        <span class="side-title">
                            Payment information
                        </span>
                           <div class="mb-3 flex -mx-2">
                                <div class="py-4">
                                    <label for="type1" class="flex items-center cursor-pointer"> 
                                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8">
                                    </label>
                                </div> 
                            </div>
                    </h2>

                    <input type="hidden" name="buyforme_id" value="{{ session('buyforme_id') }}">
                    <input type="hidden" name="payment_method" class="payment-method"> 

                       <div class="space-y-0">
                        <x-jet-label for="name" value="{{ __('Name on Card') }}" />
                        <x-jet-input  id="card_holder_name" class="block w-full mt-1 card_holder_name" type="text" name="card_holder_name" :value=" old('card_holder_name')" required autofocus />
                        <x-jet-input-error for="card_holder_name" class="mt-2" />
                    </div>
                    <div class="space-y-0">
                        <x-jet-label for="card_no" value="{{ __('Card Number') }}" /> 
                    <div id="card-element"class="block border border-gray-400 bg-white py-3 px-2 w-full mt-4">
                    </div> 
                    </div> 
                    <div class="space-y-2">
                        <button  id="card-button"  class="px-4 py-1 payBtn font-light tracking-wider text-white bg-gray-900 rounded" >
                            ${{number_format( session('buyforme_amount') ,2)}}     Pay Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        $('.payBtn').attr('disabled', true)
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
                console.log(result.error.message)
                $('#card-errors').text(result.error.message)
                $('.payBtn').removeAttr('disabled')
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