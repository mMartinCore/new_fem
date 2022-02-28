            <div class="text-gray-700 body-font mb-8 bg-gray-200 rounded-lg py-12 ">
                @if ($message = Session::get('success'))
                                    <input type="hidden" value="1" name="success" class="success">
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                              <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                              <div>
                                <p class="font-bold">Thank you </p>
                                <p class="text-sm"> {{ $message }}</p>
                              </div>
                            </div>
                          </div>


                        @endif

                        @if ($message = Session::get('error'))
                        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
                            <span class="text-xl inline-block mr-5 align-middle">
                              <i class="fas fa-bell" />
                            </span>
                            <span class="inline-block align-middle mr-8">
                              <b class="capitalize">Oph!</b> {{ $message }}
                            </span>
                            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                              <span>×</span>
                            </button>
                          </div>

                         @endif

     <div class="flex flex-col w-full px-4 sm:px-0 mx-auto mt-10    rounded-lg lg:w-6/7 md:w-1/2 md:ml-auto md:mt-0">
     <form  method="POST" action="{{ route('send.mail') }}">
          @csrf
         <div class="  ">
             <label for="name" class="text-sm leading-7 text-gray-600">Name</label>
             <input type="name" id="name"  value="{{ old('name') }}" required autocomplete=off  name="name" placeholder="Eg. Elon Musk"
                 class="  @error('name') border-red-500 @enderror w-full px-4 py-2 mb-4 text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg mr-4 text-base focus:border-gray-500 focus:bg-gray-100 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                 @error('name')
                        <p class="text-red-700 text-sm italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
         <div class="  ">
             <label for="email" class="text-sm leading-7 text-gray-600">Email</label>
             <input type="email"   name="email" placeholder="Eg. shiptosureja@gmail.com"
             email  value="{{ old('email') }}" required autocomplete=off  class="   @error('email') border-red-500 @enderror  w-full px-4 py-2 mb-4 text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg mr-4 text-base focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                 @error('email')
                <p class="text-red-700 text-sm italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
         <div class="   ">
           <label for="message" class="text-sm leading-7 text-gray-600">Message</label>
             <textarea type="text" id="message_value"    placeholder="Eg. Do you accept Card ?"
             name="message_value"
                value="{{ old('message_value') }}" required autocomplete=off  class="   @error('message_value') border-red-500 @enderror 
                w-full px-4 py-4 mb-4 text-black transition duration-500 ease-in-out 
                transform bg-gray-100 border-transparent rounded-lg mr-4 text-base focus:border-gray-500
                 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </textarea>
                @error('message_value')
                    <p class="text-red-700 text-sm italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
         </div>
         <button  type="submit"
             class="px-8 py-2 font-semibold text-gray-700  transition duration-1000 ease-in-out transform  border border-lg border-black rounded-lg hover:text-gray-200 hover:bg-gray-700 hover:to-black focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">Send Message</button>
    </form>
     </div>

 </div>