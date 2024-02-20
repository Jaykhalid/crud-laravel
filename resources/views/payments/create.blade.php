<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a Payment</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>


        @endif
    </div>
    <form method="post" action="{{route('payment.store')}}">
        @csrf 
        @method('post')
        <div style="margin: 25px">
            <label for="payment_id">Payment ID </label>
            <input type="text" name="payment_id" id="payment_id">
        </div>

        <div style="margin: 25px">
            <label for="type_id">Payment Type </label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->type_id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
   
        <div style="margin: 25px">
            <label for="date">Payment Date </label>
            <input type="date" name="date" id="date">
        </div>

        <div style="margin: 25px">
            <label for="total">Total Payment </label>
            <input type="number" name="total" id="total" min="1">
        </div>
       
        <div style="margin: 25px">
            <button type="submit" style="background: navy">Process</button>
            <button type="reset" style="background: crimson">Reset</button>
        </div>
    </form>
</body>
</html>