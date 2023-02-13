<h1>Customer Information:</h1>
@if ($cust == "ERROR")
<div>
    <h2>Customer ID or Tax-ID is Invalid</h2>
</div>
@endif
@if ($cust != "ERROR")
<div>
    <h1>TAX-ID: {{ $cust->taxid->taxid }}</h1>
</div>
<div>
    <h2>Name: {{ $cust->name }}</h2>
</div>
<div>
    <h2>Email: {{ $cust->email }}</h2>
</div>
<div>
    <h2>Address: {{ $cust->address }}</h2>
</div>
@endif
