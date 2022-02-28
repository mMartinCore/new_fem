<div> 
 
<!-- component -->
<body class="antialiased font-sans bg-gray-200">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Items</h2>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0"> 
                    <div class="relative text-sm"> 
                            Per Page: &nbsp;
                            <select wire:model="perPage" class="  border-0 rounded  text-sm"  >
                                <option>10</option>
                                <option>15</option>
                                <option>25</option>
                            </select>
                            <span> &nbsp; &nbsp; Total: {{ $items->total() }} </span>
                        </div>
                    </div> 
         
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th  class="px-5 py-3  border-b-2 border-gray-200 bg-gray-600 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                                <div class="flex flex-row">
                                    <a wire:click.prevent="sortBy('name')" role="button" href="#">
                                        Name
                                    </a>
                                    @include('include._sort-icon', ['field' => 'name'])
                                </div> 
                                </th>
                                <th
                                    class="px-5 py-3  border-b-2 border-gray-200  bg-gray-600 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                                         <div class="flex flex-row">
                                          <a wire:click.prevent="sortBy('description')" role="button" href="#">
                                        Description   
                                    </a>
                                   @include('include._sort-icon', ['field' => 'description'])
                                    </div> 
                                </th>
                                <th
                                    class="px-5 py-3  border-b-2 border-gray-200  bg-gray-600 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                                    Created at
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200  bg-gray-600 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            @if ($items->count())
                                @foreach($items as $key => $item)
                                    <tr  >
                                <td class="px-5 py-5 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-full h-full rounded-full"
                                                src="https://images.unsplash.com/photo-1522609925277-66fea332c575?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&h=160&w=160&q=80"
                                                alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                  {{ $item->name ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap"> 
                                         {{ $item->description ?? '' }}
                                         </p>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                         {{ $item->id ?? '' }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative">
                                        
                                             {{ $item->id ?? '' }}
                                             </span>
                                    </span>
                                </td>
                            </tr>
                              @endforeach
                                
                                @else 
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <i class="fas fa-frown"></i>   No Data Found
                                    </td>
                                    </tr> 
                              @endif
                         </tbody>
                    </table>
                    <div
                        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                        <span class="text-xs xs:text-sm text-gray-900">
                               Showing {{ $items->firstItem() }} to {{ $items->lastItem() }}   of {{ $items->total() }} results
       
                        </span>
                        <div class="inline-flex mt-2 xs:mt-0">
                                
                                  <span
                                class="text-md    text-gray-100 font-semibold py-2 px-4 rounded-l">
                                {{ $items->links() }}
                            </span>

                            {{-- <button
                                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                                Prev
                            </button>
                            <button
                                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                Next
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

 

</div>
