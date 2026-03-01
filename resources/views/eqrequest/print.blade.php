<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Quota Request</title>
    <style>
        body {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: grid;
            grid-template-columns: 35% 23% 43%;
            border: 0px solid black;
            margin-bottom: 20px;
        }
        .header-cell {
            padding: 10px;
            border: 0px solid black;
        }
        .logo {
            align-items: center;
        }
        .logo img {
            width: 80%;
            height: 80%;
        }
        .right-header {
            font-weight: normal;
        }
        .content {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
            font-weight: normal;
        }
        th {
            width: 30%;
        }
        .signature {
            text-align: right;
            margin-top: 30px;
            margin-right:100px;
        }
        .tight-spacing {
            line-height: 0.8;
        }
        /* Hide everything for printing */
        @media print {
            body * {
                visibility: hidden;
            }
            #contentToPrint, #contentToPrint * {
                visibility: visible;
            }
            #contentToPrint {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
         /* Style for the buttons */
         button {
            font-size: 12px;
            padding: 10px 10px;
            margin: 10px;
            cursor: pointer;
            border-radius: 5px;
            border: 2px solidrgb(76, 102, 175);
            background-color:rgb(18, 5, 131);
            color: white;
            transition: background-color 0.3s, transform 0.3s;
        }

        /* Hover effect for buttons */
        button:hover {
            background-color:rgb(96, 69, 160);
            transform: scale(1.05);
        }

        /* Active effect for buttons */
        button:active {
            background-color:rgb(76, 106, 172);
        }
    </style>
</head>
<body>
    <div align="center">
        <button onclick="printContent()">Print</button>
        <button onclick="goBack()">Go Back</button>
        <br></br>
    </div>
    <div id="contentToPrint" style="margin: left 30px;">
        <div class="header">
            <div class="header-cell">
<<<<<<< HEAD
                <p class="tight-spacing">Diary No : {{ $eqrequest->diary_no }}</p>
                <p class="tight-spacing officername"><em>{{ $eqrequest->forwardedTo->name_hindi }}</em></p>
                <p class="officername" class="tight-spacing">{{ $eqrequest->forwardedTo->name }}</p>
                <p class="tight-spacing"><em>{{ $eqrequest->forwardedTo->designation }}, {{ $eqrequest->forwardedTo->station }}</em></p>
                <p class="tight-spacing"><em>{{ $eqrequest->forwardedTo->designation_hindi }}, {{ $eqrequest->forwardedTo->station_hindi }}</em></p>
=======
                <!-- <p class="tight-spacing">Diary No : {{ $eqrequest->diary_no_full }}</p> -->
                <p class="tight-spacing">Diary No : </p>
                <p class="tight-spacing">{{ $eqrequest->forwardedTo->name_hindi }}</p>
                <p class="tight-spacing">{{ $eqrequest->forwardedTo->name }}</p>
                <p class="tight-spacing">{{ $eqrequest->forwardedTo->designation }}, {{ $eqrequest->forwardedTo->station }}</p>
                <p class="tight-spacing">{{ $eqrequest->forwardedTo->designation_hindi }}, {{ $eqrequest->forwardedTo->station_hindi }}</p>
>>>>>>> 1814e280074217af94702d622a9fc4aaf43166f3
                <p class="tight-spacing">{{ $eqrequest->forwardedTo->file_name}}</p>
            </div>
            <div class="logo">
            <img
                src="{{ asset('logos/logo_print.png') }}"
                alt="EQ App Logo"
                />
            </div>
            <div class="header-cell right-header">
                <p class="tight-spacing">{{ $eqrequest->forwardedTo->office_name }}</p>
                <p class="tight-spacing">{{ $eqrequest->forwardedTo->address_line1 }}, {{ $eqrequest->forwardedTo->address_line2 }}</p>
                <p class="tight-spacing">{{ $eqrequest->forwardedTo->city }}--{{ $eqrequest->forwardedTo->pincode }}, {{ $eqrequest->forwardedTo->state }}.</p>
                <p class="tight-spacing">Mob. No. {{ $eqrequest->forwardedTo->mobile_no }}</p>
                <p class="tight-spacing">Date : {{ date('d-m-Y', strtotime($eqrequest->created_at)) }}</p>
            </div>
        </div>

        <div class="content">
            <p>Kindly arrange to release berths from Emergency Quota as per PNR details given below</p>
            
            <table>
                <tr>
                    <th>Request of</th>
                    <td><b>@if ($eqrequest->requestOf->role == "approving_officer") {{ $eqrequest->requestOf->designation }} - {{ Str::upper($eqrequest->requestOf->station) }} @else {{ $eqrequest->requestOf->name }}  @endif</b></td>
                </tr>
                <tr>
                    <th>Train No.</th>
                    <td><b>{{ $eqrequest->train_no }} - {{ Str::upper($eqrequest->train_name) }}</b></td>
                </tr>
                <tr>
                    <th>Date of Journey</th>
                    <td><b>{{ \Carbon\Carbon::parse($eqrequest->journey_dt)->format('d-m-Y') }}</b></td>
                </tr>
                <tr>
                    <th>Destination From - To</th>
                    <td><b>{{ $eqrequest->stationFrom->name }} ({{ $eqrequest->stationFrom->code }}) --- {{ $eqrequest->stationTo->name }} ({{ $eqrequest->stationTo->code }})</b></td>
                </tr>
                <tr>
                    <th>No. of Berth</th>
                    <td><b>{{ $eqrequest->no_of_births }} </td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td><b>{{ $eqrequest->trainClass->fname}}</b></td>
                </tr>
                <tr>
                    <th>PNR No.</th>
                    <td><b>{{ $eqrequest->pnr }} @if ($eqrequest->is_on_duty) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ON DUTY)@endif</b></td>
                </tr>
                <tr>
                    <th>Name of Passenger</th>
                    <td><b>{{ $eqrequest->passenger_name }} @if ($eqrequest->no_of_births>1) + {{ $eqrequest->no_of_births - 1 }} @endif</b></b></td>
                </tr>
                <tr>
                    <th>Mobile No.</th>
                    <td><b>{{ $eqrequest->mobile_no }}</b></td>
                </tr>
                <tr>
                    <th>Purpose of Journey</th>
                    <td><b>{{ $eqrequest->journey_purpose }}</b></td>
                </tr>
            </table>

            <p>Thanking You,</p>
            <br></br>
            
            <div class="signature">
                <p>{{ $eqrequest->forwardedTo->designation }} - {{ Str::upper($eqrequest->forwardedTo->station) }}</p>
            </div>
        </div>
    </div>
    <script>
        function printContent() {
            // Hide the button before printing
            document.querySelector("button").style.display = "none";

            // Trigger the print dialog
            window.print();

            // After printing, make the button visible again
            document.querySelector("button").style.display = "inline-block";
        }
        // Function to go back to the previous page
        function goBack() {
            window.history.back();  // Go back to the previous page
        }
    </script>
</body>
</html>
