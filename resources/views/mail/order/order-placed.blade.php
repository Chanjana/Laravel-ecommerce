<x-mail::message>
# Thank you for your order!

Hi {{ $user->name }},

Your order #<b>{{$order->order_id}}</b> has been placed successfully and we will let you know once your package is on its way. Check the status of your order using the tracking link below.

<x-mail::button :url="''">
Track my order
</x-mail::button>

## Delivery Details
<x-mail::panel>

<table>
        <tbody>
            <tr>
               <th style="text-align: left;">Name:</th>
                <td>{{ $order->shipping_details["name"] }}</td>
            </tr>
            <tr>
                <th style="text-align: left;">Address:</th>
                <td>{{ $order->shipping_details["street_line_1"] }}, {{ $order->shipping_details["street_line_2"] }}, {{ $order->shipping_details["state"] }}, {{ $order->shipping_details["city"] }}</td>
            </tr>
            <tr>
                <th style="text-align: left;">Phone:</th>
                <td>{{ $order->shipping_details["phone"] }}</td>
            </tr>
            <tr>
                <th style="text-align: left;">Email:</th>
                <td>{{ $order->user->email }}</td>
            </tr>
        </tbody>
</table>
</x-mail::panel>

## Order Details

<table style="width: 100%;">
<tbody>

<tr>
    <td><img src="{{ Storage::disk("public")->url($order->item->images[0]) }}" alt="" style="height: 100px; margin-top: 5px; margin-bottom: 5px;"></td>
    <td>{{ Str::title($order->item->title) }}</td>
    <td>LKR {{  number_format($order->item->price,2) }}</td>
</tr>

</tbody>
</table>

**Total**: LKR {{  number_format($order->total,2) }}


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
