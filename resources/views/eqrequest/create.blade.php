<x-layout>
    @slot('headSlot')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

        <style>
            /* Container for the dropdown list */
            #station-results-from, #station-results-to {
                position: absolute; /* Position it relative to the parent */
                width: fit-content; /* Full width of the input field */
                max-height: 300px; /* Limit the height of the dropdown */
                overflow-y: auto; /* Scroll if the results exceed max height */
                border: 1px solid #ccc; /* Add a border */
                border-radius: 5px; /* Rounded corners */
                background-color: white; /* White background */
                z-index: 9999; /* Make sure the dropdown is on top of other elements */
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Add a soft shadow */
                display: none; /* Initially hidden */
            }

            /* Styling for each result item */
            .result-item {
                padding: 8px 12px; /* Add some padding to each result */
                cursor: pointer; /* Change cursor to pointer when hovering */
                transition: background-color 0.3s ease; /* Smooth background color transition */
            }

            /* Highlight result item on hover */
            .result-item:hover {
                background-color: #f1f1f1; /* Light grey background on hover */
            }


            /* To position the dropdown correctly */
            .autocomplete-container {
                position: relative; /* So the dropdown positions relative to the input */
                margin-bottom: 20px; /* Add space between inputs */
            }
        </style>

    @endslot
   
    @slot('headContentSlot')
        Create Emergency Quota Request
    @endslot

    @slot('mainContentSlot')
    
    <form class="max-w-full ml-6 mr-6 mt-2 mb-10 p-5" action="{{ route('eqrequest.store') }}" method="POST">
        @csrf
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 mb-6">
            <div>
                <label for="request_of" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Request Of</label>
                <select name="request_of" id="request_of" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">-- Select Request Of --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" text="{{ $user->name }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>             
            </div>
        </div>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 mb-6">
            <div>
                <label for="pnr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PNR No</label>
                <input name="pnr" type="text" id="pnr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter PNR No" required />
            </div>
             <div>
                <label for="train_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Train No</label>
                <input name="train_no" type="text" id="train_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Train No" required />
            </div>
            <div>
                <label for="train_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Train Name</label>
                <input name="train_name" type="text" id="train_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Train Name" required />
            </div>
        </div>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 mb-6">
            <div>
                <label for="journey_dt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Journey Date</label>
                <input name="journey_dt" type="date" id="journey_dt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd-mm-yyyy" required />
            </div>
            <div>
                <label for="stn_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Station From</label>
                <input name="stn_from" type="text" id="stn_from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Station From" required />
                <input name="stn_from_id" type="hidden" id="stn_from_id" />
                <div id="station-results-from" style="display: none; border: 1px solid #ccc; margin-top: 5px;">
                    <!-- Results for Station From will be shown here -->
                </div>
            </div>
            <div>
                <label for="stn_to" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Station To</label>
                <input name="stn_to" type="text" id="stn_to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Station To" required />
                <input name="stn_to_id" type="hidden" id="stn_to_id" />
                <div id="station-results-to" style="display: none; border: 1px solid #ccc; margin-top: 5px;">
                    <!-- Results for Station To will be shown here -->
                </div>
            </div>
        </div>
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 mb-6">
            <div >
                <label for="train_class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                <select name="train_class" id="train_class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">-- Select a Class --</option>
                    @foreach ($trainClasses as $trainClass)
                        <option value="{{ $trainClass->id }}" text="{{ $trainClass->fname }}">
                            {{ $trainClass->fname }}
                        </option>
                    @endforeach
                </select>
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
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 mb-6">
            <div>
                <label for="request_by" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Staff Requesting for Quota</label>
                <select name="request_by" id="request_by" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="">-- Select Requested By --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" text="{{ $user->name }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>             
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

    @slot('footerSlot')
    <script>
        $(document).ready(function() {
            // Common function for handling AJAX requests for both fields
            function autocomplete(inputId, resultsId) {
                $('#' + inputId).on('keyup', function() {
                    var query = $(this).val();  // Get the value from the input field

                    if (query.length > 2) {  // Trigger search when typing more than 2 characters
                        $.ajax({
                            url: "{{ route('autocomplete') }}",  // The route to send the request
                            method: 'GET',
                            data: { query: query },  // Send the query as a parameter
                            success: function(data) {
                                if (data.length > 0) {
                                    var resultsHtml = '';
                                    data.forEach(function(station) {
                                        resultsHtml += '<div class="result-item" data-id="' + station.id + '">' + station.name + '</div>';
                                    });

                                    // Display the results in the dropdown
                                    $('#' + resultsId).html(resultsHtml).show();
                                } else {
                                    $('#' + resultsId).hide();  // Hide dropdown if no results
                                }
                            },
                            error: function() {
                                console.error('Error fetching data.');
                            }
                        });
                    } else {
                        $('#' + resultsId).hide();  // Hide results if less than 3 characters typed
                    }
                });

                // When a user clicks on a result item
                $(document).on('click', '#' + resultsId + ' .result-item', function() {
                    var stationName = $(this).text();
                    var stationId = $(this).data('id');

                    $('#' + inputId).val(stationName);  // Set the input field to the selected station name
                    $('#' + inputId + "_id").val(stationId);  // Set the input field to the selected station id
                    $('#' + resultsId).hide();  // Hide results after selection
                });

                // Close the dropdown if clicking outside the input or results
                $(document).click(function(event) {
                    if (!$(event.target).closest('#' + inputId + ', #' + resultsId).length) {
                        $('#' + resultsId).hide();  // Hide the dropdown when clicking outside
                    }
                });
            }

            // Call the autocomplete function for both "Station From" and "Station To"
            autocomplete('stn_from', 'station-results-from');
            autocomplete('stn_to', 'station-results-to');
        });

    </script>
    @endslot
</x-layout>
