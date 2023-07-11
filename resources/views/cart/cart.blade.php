@extends('layouts.index')
@section('container')
<div class="mt-3">
    <h3>Keranjang</h3>
    <div>
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:45%">Product</th>
                <th style="width:15%">Price</th>
                <th style="width:5%">Quantity</th>
                <th style="width:20%" class="text-center">Subtotal</th>
                <th style="width:15%"></th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0 ?>
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <?php $total += $details['price'] * $details['quantity'] ?>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/'.$details['photo']) }}" alt="..." class="img-responsive" width="100" height="100"/></div>
                                <div class="col-sm-9">
                                    <p class="nomargin">{{ $details['name'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">Rp. {{ number_format($details['price'], 2, ',', '.') }}</td>
                        <td data-th="Quantity">
                            {{ $details['quantity'] }}
                            {{-- <input type="number" class="form-control text-center" value="1"> --}}
                        </td>
                        <td data-th="Subtotal" class="text-center">Rp. {{ number_format($details['price'] * $details['quantity'], 2, ',', '.')  }}</td>
                        <td class="actions" data-th="">
                            <a href="{{ url('remove-cart-item/'.$id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Hapus</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total Rp.{{ number_format($total, 2, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <td><a href="{{ url('/') }}" class="btn btn-dark"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total Rp. {{ number_format($total, 2, ',', '.') }}</strong></td>
                <td><a href="{{ url('/checkout') }}" class="btn btn-dark">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
