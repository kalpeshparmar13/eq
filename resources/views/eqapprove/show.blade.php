<x-layout>
    @slot('headSlot')
    @endslot
   
    @slot('headContentSlot')
        Approve Emergency Quota Request
    @endslot

    @slot('mainContentSlot')
    
    <form class="max-w-full ml-6 mr-6 mt-2 mb-10 p-5" action="{{ route('eqapprove.approve') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $eqrequest->id }}">
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 mb-6">
            <div>
                <label for="pnr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PNR No</label>
                <div class="bg-gray-300 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->pnr }}</div>               
            </div>
             <div>
                <label for="train_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Train No</label>
                <div class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->train_no }}</div>
            </div>
            <div>
                <label for="train_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Train Name</label>
                <div class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->train_name }}</div>
            </div>
        </div>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 mb-6">
            <div>
                <label for="journey_dt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Journey Date</label>
                <div class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->journey_dt }}</div>
            </div>
            <div>
                <label for="stn_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Station From</label>
                <div class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->stationFrom->name }}</div>
            </div>
            <div>
                <label for="stn_to" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Station To</label>
                <div class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->stationTo->name }}</div>
            </div>
        </div>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 mb-6">
            <div >
                <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                <div class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->trainClass->fname }}</div>
            </div>
            <div>
                <label for="no_of_births" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Births</label>
                <div class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->no_of_births }}</div>
            </div>
            
        </div>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 ">
            <div>
                <label for="passenger_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Passenger Name</label>
                <div class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->passenger_name }}</div>
            </div>
            <div>
                <label for="mobile_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile No</label>
                <div class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->mobile_no }}</div>
            </div>
            <div></div>
        </div>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-1 mb-6">
            <div>
                <label for="journey_purpose" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Journey Purpose</label>
                <div class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $eqrequest->journey_purpose }}</div>
            </div>  
        </div> 
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-1 mb-6">
            <div>
                <label for="forwarded_to" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Forward To</label>
                <select name="forwarded_to" id="forwarded_to" class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled="true" required>
                    <option value="">-- Select Officer --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" text="{{ $user->name }}" @if($user->id == $eqrequest->forwarded_to) selected @endif>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>             
            </div>  
        </div>
        <div class="flex space-x-4">
                <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2">
                    Approve
                </button>
                <button type="reset" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-1/2">
                    Reject
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

    @slot('footerSlot')
    @endslot
</x-layout>
