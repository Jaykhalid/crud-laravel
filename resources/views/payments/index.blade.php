<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Payment</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('payment.create')}}">Create some Payment</a>
        </div>
        <table border="1">
            <tr>
                <th>#</th>
                <th>PAYMENT ID</th>
                <th>TYPE</th>
                <th>DATE</th>
                <th>PAYMENT</th>
                <th>FEE</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($payments as $payment )
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$payment->payment_id}}</td>
                    <td>{{$payment->type->name}}</td>
                    <td>{{$payment->date}}</td>
                    <td>{{$payment->total}}</td>
                    <td>{{$payment->fee ?? ''}}</td>    
                    <td>
                        <a href="{{route('payment.edit', $payment->payment_id)}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('payment.destroy', $payment->payment_id)}}">
                            @csrf 
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
</body>
</html>