<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Billing</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .billing-table {
      border-collapse: collapse;
      width: 100%;
    }
    .billing-table th, .billing-table td {
      border: 1px solid #dee2e6;
      padding: 8px;
      text-align: left;
    }
    .billing-table th {
      background-color: #f2f2f2;
    }
    .discount-grandtotal {
      text-align: right;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center mt-5">TrueMedicare Haven</h2>
    <h4 class="text-center my-2">Billing</h4>
    @foreach ($billing as $item)
    <span><a href="{{route('pdf.billing', $item->id)}}" class="btn btn-success pdf float-right my-5"><i class="fa fa-file-pdf-o"></i>&nbsp; Download</a></span>

    <table class="table table-bordered billing-table">
      <thead>
        <tr>
          <th colspan="4">Billing Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="4"><b>Patient Name:</b> {{$item->patient->name}}</td>
        </tr>
        <tr>
          <td colspan="4"><b>Date:</b> {{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</td>
        </tr>
        <tr>
          <th>Item</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
        @foreach ($item->items as $key => $i)
        <tr>
          <td>{{$i}}</td>
          <td>{{$item->prices[$key]}}</td>
          <td>{{$item->quantities[$key]}}</td>
          <td>{{$item->total[$key]}}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3" class="text-right">Sub Total</td>
          <td>{{$item->sub_total}}</td>
        </tr>
        <tr>
          <td colspan="3" class="text-right">Discount (%)</td>
          <td>{{$item->discount}}%</td>
        </tr>
        <tr>
          <td colspan="3" class="text-right">Grand Total</td>
          <td>{{$item->grand_total}}</td>
        </tr>
      </tfoot>
    </table>
    @endforeach
  </div>
</body>
</html>
