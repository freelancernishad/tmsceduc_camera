<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Category</th>
            <th>Group</th>
            {{-- <th>Buy</th> --}}
            <th>Sell</th>
            <th>Quantity</th>
            <th>Buying Date</th>
            <th>Expired</th>


        </tr>
    </thead>
    <tbody>
        @foreach ($Products as $Product)
            <tr>

                <td>{{ $Product->product_name }}</td>
                <td>{{ $Product->product_code }}</td>
                <td>{{ $Product->category_name }}</td>
                <td>{{ $Product->root }}</td>
                {{-- <td>{{ $Product->buying_price }}</td> --}}
                <td>{{ $Product->selling_price }}</td>
                <td>{{ $Product->product_quantity }}</td>
                <td>{{ $Product->buying_date }}</td>
                <td>{{ $Product->expired_date }}</td>


            </tr>
        @endforeach
    </tbody>
</table>
