<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Transaction</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('transaction.create')}}">Create some Transaction</a>
        </div>
        <table border="1">
            <tr>
                <th>TRANSACTION ID</th>
                <th>PRODUCT</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>SUB TOTAL</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($transactions as $transaction )
                <tr>
                    <td>{{$transaction->transaction_id}}</td>
                    <td>{{$transaction->product->name}}</td>
                    <td>{{$transaction->product->price}}</td>
                    <td>{{$transaction->quantity}}</td>
                    <td>{{$transaction->subtotal}}</td>
                    <td>
                        <a href="{{route('transaction.edit', $transaction->transaction_id)}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('transaction.destroy', $transaction->transaction_id)}}">
                            @csrf 
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
<div style="margin: 5rem"></div>
        <table border="1">
            <tr>
                <th>TRX ID</th>
                <th>TOTAL</th>
            </tr>
            @foreach($transactionb as $key => $value )
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>