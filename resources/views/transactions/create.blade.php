<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a Transaction</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>


        @endif
    </div>
    <form method="post" action="{{route('transaction.store')}}">
        @csrf 
        @method('post')
        <div style="margin: 25px">
            <label for="transaction_id">Transaction ID </label>
            <input type="text" name="transaction_id" id="transaction_id" min="1">
        </div>

        <div style="margin: 25px">
            <label for="product_id">Produk </label>
            <select name="product_id" id="product_id">
                @foreach ($products as $product)
                    <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin: 25px">
            <label for="quantity">Kuantitas </label>
            <input type="number" name="quantity" id="quantity" min="1">
        </div>
       
        <div style="margin: 25px">
            <button type="submit" style="background: navy">Process</button>
            <button type="reset" style="background: crimson">Reset</button>
        </div>
    </form>
</body>
</html>