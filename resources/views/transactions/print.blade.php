<!DOCTYPE html>
<html>

<head>
    <title> طباعه باركود معاملة رقم {{$transactionstypes['number']}}</title>
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
 
    <style>
        body {
            /*height: 235.77165354px;*/
            /*width: 180.18110236px;*/
            /*padding-left: 37%;*/
            padding-top: 0%;

             font-family: 'Cairo';font-size: 17px;
        }
    </style>
</head>

<body style="text-align:right">


    <div>
        <div class="form-group row">
            <label for="example-search-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-12">
            <b> التاريخ </b> : {{date('d-m-Y', strtotime($transactionstypes['trans_date']))}}
             
            </div>
        </div>
        <div class="form-group row">
            <label for="example-search-input" class="col-sm-2 col-form-label">  </label>
            <div class="col-sm-2">
                @if($transactionstypes['type'] == "export")
                <b> رقم الصادر </b>
            @else
            <b>  رقم الوارد</b>
            @endif
             : {{$transactionstypes['number']}} 
            </div>
        </div>
        <div class="form-group row">
            <label for="example-search-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-12">
                @php
                  $name =  App\ThirdParty::where('id',$transactionstypes['thirdparty_id'])->first();
                  
                @endphp
            <b>  اسم الجهه </b> : {{$name->name}} 
            </div>
        </div>
        
        <div class="form-group row">
             <div class="col-sm-12">
                
            <b> عدد المرفقات </b> :
            @if($transactionstypes['id'] !=null)
            {{App\TransactionsAttachment::where('transaction_id'
            ,$transactionstypes['id'])->count()}}
            @else 
                0
            @endif
               
                </div>
        </div>

        <div class="form-group row">
             <div class="col-sm-12">
                <?php
                echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($transactionstypes['number'], 'C39+') . '" alt="barcode"   />';

                ?> 
                </div>
        </div>



    </div>

    <script>
        window.print();
    </script>
</body>

</html>