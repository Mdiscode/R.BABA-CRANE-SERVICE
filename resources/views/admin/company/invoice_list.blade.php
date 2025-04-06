@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
   @include('_message')  
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Invoice</a></li>
            <li class="breadcrumb-item active" aria-current="page">Invoice-list</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Invoice-list</h4>
                <div class="table-responsive pt-3 ">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice_no</th>
                                <th>CompanyName</th>
                                <th>ItemName</th>
                                <th>TotalTime</th>
                                <th>TotalAmount</th>
                                <th>TotalAmountGST</th>
                                <th>PaymentMode</th>
                                <th>Created At</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice as $value )
                                
                            
                            <tr class="table-info text-dark">
                                <td>{{$value->id}}</td>
                                <td>{{$value->invoice_no}}</td>
                                <td>{{$value->company_name}}</td>
                                <td>{{$value->itemName}}</td>
                                <td>{{$value->totalTime}}</td>
                                <td>{{$value->TotalAmount}}</td>
                                <td>{{$value->TotalAmountGST}}</td>
                                <td>{{$value->paymentMode}}</td>
                                <td class="whitespace-nowrap">{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                <td>

                                    <a href="{{route('deleteInvoice',$value->id)}}" onclick="return confirm('Are you sure you want to Delete!');" class="btn btn-danger btn-sm">Delete</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>

                </div>
             <div style="padding:20px; float:right;">
                {!!
                    $invoice->links()
               !!}
             </div>
            </div>
        </div>
    </div>
</div>  {{--close row---}}
</div> {{--close page-content--}} 

  

@endsection
