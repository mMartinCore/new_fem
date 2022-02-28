 <x-app-layout>

    <section class="container pt-4 mx-auto mb-32"> 
        {{-- Header --}}
        <header class="flex flex-col py-2 text-md  mb-4 space-y-6 text-center">
     Cash Payment information
        </header>

        <div class="flex flex-col items-center max-w-4xl mx-auto">
            <div class="w-full p-10 m-4 leading-loose border border-gray-200 shadow-lg bg-gray-50">  
 
             <form id="pay_form"  action="{{ route('mergecash.mergeCashPost') }}" method="POST" class="space-y-2 pay_form">               
             
                    @csrf

            {{-- <div class="space-y-2">
            <x-jet-label for="name" value="{{ __('Name of Customer') }}" />
            <x-jet-input class="block w-full mt-1" type="text" name="name"   required autofocus autocomplete="name" />
        </div> --}}

         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Currency') }}" />
                 <select name="currency"  class="block appearance-none rounded-md w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Select Status</option>                   
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="CAD">CAD</option>
                    <option value="JMD">JMD</option>
                    <option value="BDS">BDS </option> 
                           
                </select>                
            <x-jet-input-error for="currency" class="mt-2" />
        </div> 


                    <input type="hidden" name="merge_id" value="{{ session('merge_id') }}">
                    <input type="hidden" name="payment_method" class="payment-method" > 
                        <div class="space-y-2">
                        <button  id="card-button" type="submit"  class="px-4 py-1 payBtn font-light tracking-wider text-white bg-gray-900 rounded" >
                            ${{number_format( session('amount') ,2)}}     Pay Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section> 
</x-guest-layout>