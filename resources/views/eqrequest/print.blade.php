<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Quota Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: grid;
            grid-template-columns: 300px 150px 350px;
            border: 0px solid black;
            margin-bottom: 10px;
        }
        .header-cell {
            padding: 10px;
            border: 0px solid black;
        }
        .logo {
            align-items: center;
            align-content: center;
        }
        .logo img {
            width: 140px;
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
        .pnr {
            font-weight: bold;
            font-size: 1.5em;
        }
        .officername {
            font-weight: bold;
            font-size: 1.2em;
        }
        .signature {
            text-align: right;
            font-style: italic;
            margin-top: 30px;
        }
        .tight-spacing {
        line-height: 0.8;
        }
    </style>
</head>
<body>
    <div style="margin: left 30px;">
        <div class="header">
            <div class="header-cell">
                <p class="tight-spacing">Diary No : {{ $eqrequest->diary_no_full }}</p>
                <p class="tight-spacing"><em>{{ $eqrequest->forwardedTo->name_hindi }}</em></p>
                <p class="officername" class="tight-spacing">{{ $eqrequest->forwardedTo->name }}</p>
                <p class="tight-spacing"><em>{{ $eqrequest->forwardedTo->designation }}, {{ $eqrequest->forwardedTo->station }}</em></p>
                <p class="tight-spacing">{{ $eqrequest->forwardedTo->designation_hindi }}, {{ $eqrequest->forwardedTo->station_hindi }}</p>
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
                <p class="tight-spacing">Rly. Phone No. {{ $eqrequest->forwardedTo->rly_phone_no }}</p>
                <p class="tight-spacing">Mob. No. {{ $eqrequest->forwardedTo->mobile_no }}</p>
                <p class="tight-spacing">Date : {{ $eqrequest->forwardedTo->created_at->format("d-m-Y") }}</p>
            </div>
        </div>

        <div class="content">
            <p>Kindly arrange to release berths from Emergency Quota as per PNR details given below</p>
            
            <table>
                <tr>
                    <th>Request of</th>
                    <td><b>{{ $eqrequest->requestOf->designation }} </b></td>
                </tr>
                <tr>
                    <th>Train No.</th>
                    <td><b>{{ $eqrequest->train_no }} - {{ $eqrequest->train_name }}</b></td>
                </tr>
                <tr>
                    <th>Date of Journey</th>
                    <td><b>{{ \Carbon\Carbon::parse($eqrequest->journey_dt)->format('d-m-Y') }}</b></td>
                </tr>
                <tr>
                    <th>Destination From - To</th>
                    <td><b>{{ $eqrequest->stationFrom->name }}({{ $eqrequest->stationFrom->code }}) -- {{ $eqrequest->stationTo->name }}({{ $eqrequest->stationTo->code }})</b></td>
                </tr>
                <tr>
                    <th>No. of Berth</th>
                    <td><b>{{ $eqrequest->no_of_births }} </td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td><b>{{ $eqrequest->trainClass->sname}} ({{ $eqrequest->trainClass->fname}})</b></td>
                </tr>
                <tr>
                    <th>PNR No.</th>
                    <td class="pnr">{{ $eqrequest->pnr }} @if ($eqrequest->is_on_duty) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ON DUTY)@endif</td>
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
            
            <div class="signature">
                <p><em>({{ $eqrequest->forwardedTo->name_hindi }})</em></p>
                <p><em>{{ $eqrequest->forwardedTo->designation_hindi }}</em></p>
            </div>
        </div>
    </div>
</body>
</html>
