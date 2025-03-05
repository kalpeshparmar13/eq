<x-layout>
    @slot('headSlot')
    @endslot

    @slot('headContentSlot')
        Emergency Quota Requests
    @endslot

    @slot('mainContentSlot')
    

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
                        From STN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        To STN
                    </th>
                    <!-- <th scope="col" class="px-6 py-3">
                        No. of Births
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Class
                    </th> -->
                    <th scope="col" class="px-6 py-3">
                        Passenger Name
                    </th>
                    <!-- <th scope="col" class="px-6 py-3">
                        Mobile No
                    </th> -->
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="text-base">
                @foreach ($eqrequests as $eqreq)
                <tr class="bg-emerald-50 text-black text-base border-b dark:bg-gray-800 dark:border-gray-700 border-rose-200">
                    <td class="px-4 py-1">
                        {{ $eqreq->id }}
                    </td>
                    <td class="px-4 py-1">
                        {{ $eqreq->diary_no }}
                    </td>
                    <td class="px-4 py-1">
                        {{ $eqreq->pnr }}
                    </td>
                    <td class="px-4 py-1">
                        {{ $eqreq->train_no }}
                    </td>
                    <td class="px-4 py-1">
                        {{ $eqreq->train_name }}
                    </td>
                    <td class="px-4 py-1">
                        {{ \Carbon\Carbon::parse($eqreq->journey_dt)->format('d-m-Y') }}
                    </td>
                    <td class="px-4 py-1">
                        {{ $eqreq->stationFrom->code }}
                    </td>
                    <td class="px-4 py-1">
                        {{ $eqreq->stationTo->code }}
                    </td>
                    <!-- <td class="px-4 py-1">
                        {{ $eqreq->no_of_births }}
                    </td>
                    <td class="px-4 py-1">
                        {{ $eqreq->class }}
                    </td> -->
                    <td class="px-4 py-1">
                        {{ $eqreq->passenger_name }}
                    </td>
                    <!-- <td class="px-4 py-1">
                        {{ $eqreq->mobile_no }}
                    </td> -->
                    @if ($eqreq->status == 'FORWARDED' and $eqreq->status_approval == '')
                    <td class="px-4 py-1 text-right flex">
                        <a href="{{ route('eqapprove.show', $eqreq->id) }}" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-4 py-2 text-center me-2 mb-2">Approve / Reject</a>
                    </td>
                    @endif
                    @if ($eqreq->status == 'FORWARDED' and $eqreq->status_approval == 'APPROVED')
                    <td class="px-4 py-1 text-right flex">
                    <a href="{{ route('eqrequest.print', $eqreq->id) }}" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-4 py-2 text-center me-2 mb-2">Print</a>  
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endslot
    @slot('footerSlot')
    @endslot
</x-layout>