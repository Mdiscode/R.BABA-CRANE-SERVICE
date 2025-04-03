<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        .invoice-box {
    width: 210mm; /* A4 width */
    min-height: 297mm; /* A4 height */
    margin: auto;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    font-size: 14px;
}


        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        .header-table td {
            border: none;
            text-align: center;
            vertical-align: middle;
        }

        .company-info {
            font-size: 16px;
            font-weight: bold;
        }

        .total-section {
            text-align: right;
            font-weight: bold;
            font-size: 16px;
        }

        .logo img {
            width: 120px;
            height: 120px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <!-- Header -->
        <table class="header-table" style="width: 100%; border-collapse: collapse;">
            <tr>
                <!-- Logo Column -->
                <td style="width: 20%; text-align: left; vertical-align: top; padding: 10px; border: none;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('homeimg/farana3.jpg'))) }}" 
                         alt="Logo" style="width: 193px; height: 109px;">
                </td>
        
                <!-- Company Info Column -->
                <td style="width: 80%; text-align: left; vertical-align: top; padding: 10px; border: none; font-size: 14px;">
                    <h2 style="margin: 0; font-size: 27px;">R. Baba Crane Service</h2>
                    <p style="margin: 5px 0;">Azad Nager, N.H.No.48, Near Garib Nawaz Hotel, Bhilad-Gujarat</p>
                    <p style="margin: 5px 0;">
                        <strong>Phone:</strong> 9044508134 | 
                        <strong>Email:</strong> israrshekh.code22@gmail.com
                    </p>
                    <p style="margin: 5px 0;">
                        <strong>GSTIN:</strong> 24AWUPS7297P1Z2 | 
                        <strong>State:</strong> 24-Gujarat
                    </p>
                </td>
            </tr>
        </table>
        

        <!-- Invoice Details -->
        <table style="border-top: none;">
            <tr>
                <td><strong>Return From:</strong> <span>{{$data['company']}}</span> Pvt Ltd</td>
                <td><strong>Return Detail:</strong></td>
            </tr>
            <tr>
                <td>Zaroli 3961105 Gujarat</td>
                <td>No: <strong>1</strong> | Date: <strong>24-03-2025</strong></td>
            </tr>
            <tr>
                <td>Phone: <strong>9044508134</strong> | GSTIN: <strong>24AWUPS7297P1Z2</strong></td>
                <td>Invoice No: <strong>{{$data['invoiceNo']}}</strong> | Invoice Date: <strong>{{$data['date']}}</strong></td>
            </tr>
        </table>

        <!-- Item Details -->
        <table>
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>HSN/ SAC</th>
                <th>Quantity</th>
                <th>Price/ Unit (₹)</th>
                <th>GST (₹)</th>
                <th>Amount (₹)</th>
            </tr>
            <tr>
                <td>1</td>
                <td>{{$data['itemName']}}</td>
                <td>997319</td>
                <td>{{$data['totalTime']}}</td>
                <td>₹ {{$data['Amount']}}</td>
                <td>₹ {{$data['GST']}} (18%)</td>
                <td>₹ {{$data['TotalAmountGST']}}</td>
            </tr>
            <tr class="total-section">
                <td colspan="3">Total</td>
                <td>{{$data['totalTime']}}</td>
                <td></td>
                <td>₹ {{$data['GST']}}</td>
                <td>₹ {{$data['TotalAmountGST']}}</td>
            </tr>
        </table>

        <!-- Tax Summary -->
        <table>
            <tr>
                <th>HSN/ SAC</th>
                <th>Taxable Amount (₹)</th>
                <th>CGST Rate(%)</th>
                <th>CGST Amt (₹)</th>
                <th>SGST Rate(%)</th>
                <th>SGST Amt (₹)</th>
                <th>Total Tax (₹)</th>
            </tr>
            <tr>
                <td>99485</td>
                <td>{{$data['Amount']}}</td>
                <td>9.0%</td>
                <td>₹ {{$data['CGST']}}</td>
                <td>9.0%</td>
                <td>₹ {{$data['SGST']}}</td>
                <td>₹ {{$data['TotalTax']}}</td>
            </tr>
            <tr class="total-section">
                <td>TOTAL</td>
                <td> {{$data['Amount']}}</td>
                <td>9.0%</td>
                <td>₹ {{$data['CGST']}}</td>
                <td>9.0%</td>
                <td>₹ {{$data['SGST']}}</td>
                <td>₹ {{$data['TotalTax']}}</td>
            </tr>
        </table>

        <!-- Payment Mode -->
        <table>
            <tr>
                <td colspan="7"><strong>Payment Mode:</strong> {{$data['paymentMode']}}</td>
            </tr>
        </table>

        <!-- Summary -->
        <table>
            <tr class="total-section">
                <td>Sub Total:</td>
                <td>₹ {{$data['Amount']}}</td>
            </tr>
            <tr class="total-section">
                <td>Total:</td>
                <td>₹ {{$data['TotalAmountGST']}}</td>
            </tr>
            <tr>
                <td><strong>Amount in Words:</strong></td>
                <td>{{$data['amountInWords']}}</td>
            </tr>
            <tr class="total-section">
                <td>Paid:</td>
                <td>₹ {{$data['TotalAmountGST']}}</td>
            </tr>
            <tr class="total-section">
                <td>Balance:</td>
                <td>₹ 0.00</td>
            </tr>
        </table>

        <!-- Authorized Signatory -->
        <div class="footer" style="text-align: right; margin-top: 20px; margin-right:46px;">
            <strong>For Baba Crane Service</strong> <br>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('homeimg/signature.png'))) }}" alt="Authorized Signature" style="width:150px; height:auto; margin-top:20px;">
 
            <p style="margin-top:-9px;">Authorized Signatory</p>
        </div>
    </div>
</body>
</html>
