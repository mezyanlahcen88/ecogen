<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Imprission du devis</title>
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet"> --}}
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 200px;
        height: 60px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">Devis</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left logo mt-10">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTW0qFGxyFTY4eI1cmFrFWi5YUT_jkreXwE6Q&usqp=CAU"
                alt="Logo">
        </div>
        <div class="w-50 float-left mt-10">
            {{-- <p class="m-0 pt-5 text-bold w-100">Devis N°- <span class="gray-color">#DV-1/2023</span></p> --}}
            <p class="m-0 pt-5 text-bold w-100">Devis N°- <span class="gray-color">#{{ $devis->devis_code }}</span></p>
                  <p class="m-0 pt-5 text-bold w-100">Date de devis - <span class="gray-color">
                {{ Carbon\Carbon::parse($devis->created_at )->format('d/m/Y') }}
            </span>
            </p>
        </div>

        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Ecogen Societé</th>
                <th class="w-50">Client</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <p>Designation
                            : {{ $devis->client->name_fr }} | {{ $devis->client->name_ar }},</p>
                        <p>ICE
                            : {{ $devis->client->ice }},</p>
                        <p>EMAIL
                            : {{ $devis->client->email }},</p>
                        <p>TELEPHONE
                            : {{ $devis->client->phone }},</p>
                        <p>FAX
                            : {{ $devis->client->fax }},</p>
                        <p>ADRESSE
                            : {{ $devis->client->address }},</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">

                        <p>Designation
                            : {{ $devis->client->name_fr }} | {{ $devis->client->name_ar }},</p>
                        <p>ICE
                            : {{ $devis->client->ice }},</p>
                        <p>EMAIL
                            : {{ $devis->client->email }},</p>
                        <p>TELEPHONE
                            : {{ $devis->client->phone }},</p>
                        <p>FAX
                            : {{ $devis->client->fax }},</p>
                        <p>ADRESSE
                            : {{ $devis->client->address }},</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    {{-- <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Methode de paiment</th>
                <th class="w-50">Methode de livraison</th>
            </tr>
            <tr>
                <td>Espece ,cheque ..</td>
                <td>Transport</td>
            </tr>
        </table>
    </div> --}}
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">REF</th>
                <th class="w-50">Désignation & {{utf8_encode("يييي")}}</th>
                <th class="w-50">Unité</th>
                <th class="w-50">Qte</th>
                <th class="w-50">Prix</th>
                <th class="w-50">HT</th>
                <th class="w-50">TVA</th>
                <th class="w-50">Total TVA</th>
                <th class="w-50">Total TTC</th>

            </tr>
            @foreach ($devis->products as $product)
            <tr align="center">
                <td>{{$product->product_code}}</td>
                <td>{{$product->getDesignation()}}</td>
                <td>{{$product->unite}}</td>
                <td>{{$product->pivot->quantity}}</td>
                <td>{{$product->price_unit}}</td>
                <td>{{$product->pivot->TOTAL_HT}}</td>
                <td>{{$product->pivot->TVA}}</td>
                <td>{{$product->pivot->TOTAL_TVA}}</td>
                <td>{{$product->pivot->TOTAL_TTC}}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="9">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Sous Total</p>
                            <p>Tva</p>
                            <p>Total </p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>{{ $devis->HT }}</p>
                            <p>{{ $devis->TVA }}</p>
                            <p>{{ $devis->TTTC }}</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
