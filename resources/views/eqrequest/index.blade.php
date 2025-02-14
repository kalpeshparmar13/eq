<x-layout>
    <!-- Second Slot Content -->
    @slot('headContentSlot')
        Emergency Quota Requests
    @endslot

    @slot('mainContentSlot')
    
    <form class="max-w-full ml-6 mr-6 mt-2 mb-10 p-5" action="{{ route('eqrequest.store') }}" method="POST">
        @csrf
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-gray-100 uppercase bg-brand-default dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Diary No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PNR
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Train No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Train Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Journey Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        From Station
                    </th>
                    <th scope="col" class="px-6 py-3">
                        To Station
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. of Births
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Class
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Passenger Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mobile No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="text-base">
                @foreach ($eqrequests as $eqreq)
                <tr class="bg-emerald-50 text-black text-base border-b dark:bg-gray-800 dark:border-gray-700 border-rose-200">
                    <td class="px-6 py-4">
                        {{ $eqreq->id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $eqreq->diary_no }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $eqreq->pnr }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $eqreq->train_no }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $eqreq->train_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($eqreq->journey_dt)->format('d-m-Y') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $eqreq->stn_from }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $eqreq->stn_to }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $eqreq->no_of_births }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $eqreq->class }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $eqreq->passenger_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $eqreq->mobile_no }}
                    </td>
                    <td class="px-6 py-4 text-right flex">
                        <!-- {{ route('eqrequest.edit', $eqreq->id) }} -->
                            <a href="{{ route('eqrequest.edit', $eqreq->id) }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" >Edit
</a>
                        <form action="{{ route('eqrequest.destroy', $eqreq->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </form>
    @endslot
</x-layout>