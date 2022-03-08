<x-admin-layout title="Dashboard">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total clients
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{$team_count}}
                    </p>
                    <div class="flex flex-col">  
                    <a  href="{{route('teams.index')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                </div>
                </div>
            </div>
                <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                   	<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Packages
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $package_count}}
                    </p>
                    <div class="flex flex-col">  
                    <a  href="{{route('packages.list')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                </div>
                </div>
            </div>

                 <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                   	<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5  " fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
						</svg> 
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                       Merge/Consolidate
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{$merge_count}}
                    </p>
                    <div class="flex flex-col">  
                    <a  href="{{route('merges.merge-list')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                </div>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Account balance
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        $ {{ number_format($balance,2) }} 
                    </p>
                    <div class="flex flex-col">  
                    <a  href="{{route('invoices.invoiceList')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                </div>
                </div>
            </div>
        

            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                       Users
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{$user_count}}
                    </p>
                    <div class="flex flex-col">  
                    <a  href="{{route('users.user-list')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                </div>
                </div>
            </div>
        
             <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                   <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                       Invoice
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{$invoice_count}}
                    </p>
                    <div class="flex flex-col">  
                    <a  href="{{route('invoices.invoiceList')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                </div>
                </div>
            </div>
             <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                  	<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg> 
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                       Buy For Me
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{  $buyforme_count}}
                    </p>
                    <div class="flex flex-col">  
                    <a  href="{{route('buyformes.index')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                </div>
                </div>
            </div>
        </div>
 

        <!-- Charts --> 
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                 Total   Package by Category
                </h4>
                   <div class="wrapper">
                        <canvas id="category" ></canvas>
                    </div>
            </div> 

            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Package by Category  
                </h4>

         <table class="w-full table-auto">
     
            <tbody class="bg-gray-200">
             @forelse ($categories as $item) 
                  <tr class="bg-gray-600 px-2 border-4 border-gray-200 text-center">             
                <th class="px-2 py-2">
                  <span class="text-indigo-50 ">{{$item->name}}</span>
                </th>             
              
                <td  class="bg-white border-4 border-gray-200 text-center">
                  <span class="text-center ml-2 font-semibold">{{$item->count}}</span>
                </td>
               
              </tr>
             @empty
                  <th class="px-16 py-2">
                  <span class="text-indigo-50">EMPTY</span>
                </th>
             @endforelse
             
               
          
            </tbody>
          </table>
             
            </div>
        </div>

    </div>





 <script>
var category_count = '<?=$category_count?>';
var category_name = '<?=$category_name?>';

var data_count = JSON.parse('{!!$category_count!!}');
var data_name = JSON.parse('{!!$category_name!!}');

const data_chart = {
    labels: data_name,
    datasets: [{
        label: ' Catergory Chart Data',
        borderColor: 'rgb(25, 98, 132)',
        data: data_count,
        backgroundColor: [
            'green',
            '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
            '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
            '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
            '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
            '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
        ]

    }]
};

const config = {
    type: 'doughnut',
    data: data_chart,
    options: {
        aspectRatio: 1,
        responsive: true,
    }
};

const myChart = new Chart(
    document.getElementById('category'),
    config
);
</script>


</x-admin-layout>