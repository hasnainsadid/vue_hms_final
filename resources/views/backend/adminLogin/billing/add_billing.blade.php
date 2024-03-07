@extends('backend.adminLogin.layouts.app')
@section('title', 'Add Billing')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Billing</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.loggedin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Billing</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card p-4">
            <form action="{{ route('billing.store') }}" method="post">
                @csrf
                <div class="card-head">
                    <div class="row">
                        <div class="col-md-4">
                            Name:
                            <select name="p_id" class="form-control">
                                <option>Select Patient</option>
                                @if ($admission)
                                    @foreach ($admission as $item)
                                        <option value="{{$item->p_id}}">{{$item->patient->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            
                        </div>
                    </div>
                </div>
            
                <span class="mt-5"></span>
                <div class="card-body">
                    <table class="table table-bordered" id="item-table">
                        <thead>
                            <tr class="item-row">
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity/Days</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Here should be the item row -->
                            <tr class="item-row">
                                <td>
                                    <select name="items[]" class="form-control">
                                        <option value="">Select Seat</option>
                                        @foreach ($seat as $item)
                                            <option value="Seat-{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input class="form-control price" placeholder="Price" name="prices[]" type="text"></td>
                                <td><input class="form-control qty" placeholder="Days" name="quantities[]" type="text"></td>
                                <td><textarea style="background-color: transparent; width: 100%; color: #fff; height:37px; padding: 1px 3px" class="total" name='total[]'>0.00</textarea></td>
                            </tr>
                            <tr id="hiderow">
                                <td colspan="4">
                                    <a id="addRow" href="javascript:;" title="Add a row" class="btn btn-primary">Add a row</a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right"><strong>Sub Total</strong></td>
                                <td><textarea style="background-color: transparent; width: 100%; color: #fff; height:37px; padding: 1px 3px" name="sub_total" id="subtotal">0.00</textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right"><strong>Discount in %</strong></td>
                                <td><input class="form-control" id="discount" name="discount" value="0" type="text"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right"><strong>Grand Total</strong></td>
                                <td><textarea style="background-color: transparent; width: 100%; color: #fff; height:37px; padding: 1px 3px" id="grandTotal" name="grand_total">0</textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary my-4">Submit</button>
                </div>
            </form>
            
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</div>
@endsection

{{-- script --}}
@section('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#addRow').click(function(){
                var html = '<tr class="item-row">';
                html += '<td><select name="items[]" class="form-control"><option value="">Select Medicine</option>@foreach ($medicine as $item)<option value="{{$item->name}}">{{$item->name}}</option>@endforeach</select></td>';
                html += '<td><input class="form-control price" placeholder="Price" name="prices[]" type="text"></td>';
                html += '<td><input class="form-control qty" placeholder="Quantity" name="quantities[]" type="text"></td>';
                html += '<td><textarea style="background-color: transparent; width: 100%; color: #fff; height:37px; padding: 1px 3px" class="total" name="total[]">0.00</textarea></td>';
                html += '</tr>';
                $('#hiderow').before(html);
            });

            $(document).on('keyup', '.price, .qty', function(){
                var tr = $(this).closest('tr');
                var price = tr.find('.price').val() || 0;
                var qty = tr.find('.qty').val() || 0;
                var total = (parseFloat(price) * parseFloat(qty)).toFixed(2);
                tr.find('.total').text(total);
                calculateTotal();
            });

            function calculateTotal(){
                var subtotal = 0;
                $('.total').each(function(){
                    subtotal += parseFloat($(this).text() || 0);
                });
                $('#subtotal').text(subtotal.toFixed(2));

                var discountPercentage = parseFloat($('#discount').val() || 0);
                var discountAmount = (subtotal * (discountPercentage / 100)).toFixed(2);
                var grandTotal = (subtotal - discountAmount).toFixed(2);

                $('#discount-amount').text(discountAmount);
                $('#grandTotal').text(grandTotal);
            }

            $('#discount').keyup(function(){
                calculateTotal();
            });
        });

    </script>
@endsection
