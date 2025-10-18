<div
    style="
    background-color: #fff;
    color: #222;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 1px 6px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 14px;
">
    <h3
        style="
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 16px;
        color: #222;
        display: flex;
        align-items: center;
        gap: 6px;
    ">
        🛒 Sale #{{ $sale->id }} Details
    </h3>

    <div style="overflow-x: auto;">
        <table
            style="
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #dcdcdc;
            border-radius: 6px;
        ">
            <thead style="background-color: #f9f9f9;">
                <tr>
                    <th style="text-align: left; padding: 10px; border: 1px solid #dcdcdc;">#</th>
                    <th style="text-align: left; padding: 10px; border: 1px solid #dcdcdc;">Product</th>
                    <th style="text-align: left; padding: 10px; border: 1px solid #dcdcdc;">Qty</th>
                    <th style="text-align: left; padding: 10px; border: 1px solid #dcdcdc;">Unit Price</th>
                    <th style="text-align: left; padding: 10px; border: 1px solid #dcdcdc;">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $index => $item)
                    <tr style="transition: background 0.2s ease;" onmouseover="this.style.background='#f4f8ff'"
                        onmouseout="this.style.background='transparent'">
                        <td style="padding: 10px; border: 1px solid #dcdcdc;">{{ $index + 1 }}</td>
                        <td style="padding: 10px; border: 1px solid #dcdcdc;">{{ $item->product->name ?? 'N/A' }}</td>
                        <td style="padding: 10px; border: 1px solid #dcdcdc;">{{ $item->qty }}</td>
                        <td style="padding: 10px; border: 1px solid #dcdcdc;">{{ number_format($item->unit_price, 2) }}
                            ETB</td>
                        <td style="padding: 10px; border: 1px solid #dcdcdc; font-weight: 600; color: #059669;">
                            {{ number_format($item->line_total, 2) }} ETB
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 12px; color: #888; font-style: italic;">
                            No sale items found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($items->isNotEmpty())
        <div
            style="
            text-align: right;
            margin-top: 16px;
            font-weight: 600;
            color: #222;
        ">
            Total:
            <span style="color: #059669;">
                {{ number_format($sale->total_amount, 2) }} ETB
            </span>
        </div>
    @endif
</div>
