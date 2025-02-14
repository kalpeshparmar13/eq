<x-layout>
    <!-- Second Slot Content -->
    @slot('headContentSlot')
        Create Emergency Quota Request
    @endslot

    @slot('mainContentSlot')
    
    <form class="max-w-full ml-6 mr-6 mt-2 mb-10 p-5" action="{{ route('eqrequest.store') }}" method="POST">
        @csrf
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 mb-6">
            <div>
                <label for="pnr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PNR No</label>
                <input name="pnr" type="text" id="pnr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter PNR No" required />
            </div>
        </div>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 mb-6">
            <div>
                <label for="train_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Train No</label>
                <input name="train_no" type="text" id="train_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Train No" required />
            </div>
            <div>
                <label for="train_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Train Name</label>
                <input name="train_name" type="text" id="train_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Train Name" required />
            </div>  
            <div>
                <label for="journey_dt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Journey Date</label>
                <input name="journey_dt" type="date" id="journey_dt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd-mm-yyyy" required />
            </div>
            <div>
                <label for="stn_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Station From</label>
                <input name="stn_from" type="text" id="stn_from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Station From" required />
            </div>
            <div>
                <label for="stn_to" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Station To</label>
                <input name="stn_to" type="text" id="stn_to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Station To" required />
            </div>
            <div >
                <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                <input name="class" type="text" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="--select class--" required />
            </div>
            <div>
                <label for="no_of_births" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Births</label>
                <input name="no_of_births" type="number" id="no_of_births" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
            </div>
            
        </div>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 ">
            <div>
                <label for="passenger_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Passenger Name</label>
                <input name="passenger_name" type="text" id="passenger_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Passenger Name" required />
            </div>
            <div>
                <label for="mobile_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile No</label>
                <input name="mobile_no" type="text" id="mobile_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Mobile No" required />
            </div>
            <div></div>
        </div>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-1 mb-6">
            <div>
                <label for="journey_purpose" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Journey Purpose</label>
                <input name="journey_purpose" type="text" id="journey_purpose" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Journey Purpose" required />
            </div>  
        </div> 
        <div class="flex space-x-4">
            <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2">
                Save
            </button>
            <button type="reset" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2">
                Clear
            </button>
        </div>
        <!-- Display any errors -->
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    @endslot
</x-layout>