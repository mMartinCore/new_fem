<x-guest-layout>


    <!-- component -->
    <div class="h-full bg-gradient-to-tl from-site_color_theme to-gray-600 w-full py-16 px-4">
        {{-- <div class="h-full bg-gradient-to-tl from-green-400 to-indigo-900 w-full py-16 px-4"> --}}
    
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

        <div class="flex flex-col items-center justify-center">
           
         

            <div class="bg-white shadow rounded lg:w-1/3  md:w-1/2 w-full p-10 mt-8">

                <div class="flex flex-col items-center justify-center mb-8">
                 <a href="/" class="justify-center  items-center content-center" >
               
                <img width="188" height="74" src="{{
                   session()->has('client_team') ?
                           session('client_team')->logo !='' ?  session('client_team')->logo->getUrl('thumbnail') : asset('images/header-logo.png') 
                            :  asset('images/header-logo.png') 
                }}" class="block  h-38   w-38    object-fit  rounded-lg     " alt="shipping logo">
               
                </a>
                <div class="text-center text-2xl text-gray-800 mb-4 p-4 uppercase">
                {{
                                session()->has('client_team')?
                 session('client_team')->domain !=''?  session('client_team')->domain :"fempirefreight"
                 
                 :"fempirefreight"
                    }}
                </div>
                </div>


                <p tabindex="0" class="focus:outline-none text-2xl font-extrabold leading-6 mb-4 text-gray-800">Create your
                    account  then shop and save!</p>
                    <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                            required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="phone" value="{{ __('Phone') }}" />
                        <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                            required />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="city" value="{{ __('City') }}" />
                        <x-jet-input id="city" type="text" class="mt-1 block w-full" name="city" />
                        <x-jet-input-error for="city" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="address" value="{{ __('Address') }}" />
                        <x-textarea name="address" id="" class="block mt-1 w-full" :value="old('address')" required
                            autofocus type="text"></x-textarea>
                        <x-jet-input-error for="address" class="mt-2" />
                    </div>


                    <div class="col-span-6 mt-4 sm:col-span-3">
                        <x-jet-label for="name" value="{{ __(' Country') }}" />
                        <select name="country_id"
                            class="block appearance-none rounded-md w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="">Select Country</option>
                            @foreach (\App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="country_id" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button class="ml-4">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </form>

{{-- <!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7_dtp.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://gmail.us14.list-manage.com/subscribe/post?u=20db16546d6f3478791eed35a&amp;id=67c6b2093e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2>Subscribe</h2>
<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear foot">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_20db16546d6f3478791eed35a_67c6b2093e" tabindex="-1" value=""></div>
        <div class="optionalParent">
            <div class="clear foot">
                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                <p class="brandingLogo"><a href="http://eepurl.com/hVSTob" title="Mailchimp - email marketing made easy and fun"><img src="https://eep.io/mc-cdn-images/template_images/branding_logo_text_dark_dtp.svg"></a></p>
            </div>
        </div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup--> --}}


            </div>
        </div>
    </div>

</x-guest-layout>
