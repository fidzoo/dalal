@extends('ar.layouts.ar-merchant-dash')

@section('content')

<div class="panel panel-primary">

<div class="panel-heading">
<h1 class="panel-title">
الطلبات المكتملة:</h1>
</div> 
<div class="panel-body">
<div class="panel-group " id="accordion">
    <?php $no= 1; ?>
    @foreach($orders as $order)

        <div class="panel">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$no}}">
            <div class="panel-heading">
                <h4 class="panel-title">
                        رقم الطلب: <strong>#{{$order->id}}</strong> <br><br>
                        المتجر: <strong>{{$order->store->ar_name}}</strong>
                
                </h4>
            </div>
                </a>
            <div id="collapse{{$no}}" class="panel-collapse collapse">
                <div class="panel-body">
                
                   <table class="table">
                    <thead>
                    <tr>                        
                        <th>صورة المنتج</th>
                        <th>اسم المنتج</th>
                        <th>اللون المطلوب</th>
                        <th>الحجم المطلوب</th>
                        <th>الكمية المطلوبة</th>
                        <th>حالة المنتج</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php $p_no= 1 ?>
                    @foreach ($order->items as $item)
                    <tr>
                        
                        <td>
                            <?php $url=str_replace(" ", "-", $item->product->ar_title); ?>
                            <a href='{!! URL::to("product/$item->product_id/$url") !!}'>
                            
                            @if(!$item->product->productImages->isEmpty())
                                <?php $img= $item->product->productImages[0]->image_path ?>
                                <img class="img-responsive" style="height: 100px" alt="product_image" src='{!! asset("$img") !!}'></a>
                            @else
                                <img class="img-responsive" alt="default-img" src='{!! asset("ar-assets/front-end/images/logo.png") !!}'></a>
                            @endif
                        </td>
                        <td>{{$item->product->ar_title}}</td>
                        <!--check if the input is color or image-->
                        <td>
                            <?php $index= substr($item->color, 0,1)?>
                            @if($index == '#' || $index == '')
                                <div class="col-md-4 prod-color entry" data-color="{{$item->color}};" style="background-color: {{$item->color}};">&nbsp;</div>
                            @else
                                {{Form::image($item->color, '', ['height'=>80])}}
                            @endif
                        </td>
                        <td>
                            {{$item->size}}
                        </td>
                        <td>
                            {{$item->qty}}
                        </td>

                        <td>
                            <select id="status{{$no}}{{$p_no}}" name="status{{$no}}{{$p_no}}">

                                <option value="2" {{$item->delivery_status == 2 ? 'selected' : ''}}>تم التسليم</option>
                                <option value="3" {{$item->delivery_status == 3 ? 'selected' : ''}}>جاري استرجاع المنتج</option>
                                
                                
                            </select>
                            <br>
                            <button class='update-status' data-item-id="{{$item->id}}" data-no="{{$no}}{{$p_no}}" data-qty="{{$item->qty}}">تحديث</button>
                        </td>

                    </tr>
                    <?php $p_no++ ?>
                    @endforeach                            
                    </tbody>
                </table>

                <hr>

                <div class="panel panel-info">
            <div class="panel-heading">
<h1 class="panel-title">
بيانات المشتري:</h1>
</div>      
        <div class="form" style="margin-top: 30px">
            <div class="col-md-6">
            الإسم:
            <input class="form-group col-md-12" type="name" name="name" value="{{$order->user->userDate->full_name}}" disabled>
            </div>
            <div class="col-md-6">
            الإيميل:
            <input class="form-group col-md-12" type="name" name="name" value="{{$order->user->userDate->email}}" disabled>
            </div>
            <div class="col-md-4">
            العنوان:
            <input class="form-group col-md-12" type="name" name="name" value="{{$order->user->userDate->address}}" disabled>
            </div>
            <div class="col-md-4">
            الدولة:
            <input class="form-group col-md-12" type="name" name="name" value="{{$order->user->userDate->country->ar_name}}" disabled>
            </div>
            <div class="col-md-4">
            الإيميل:
            <input class="form-group col-md-12" type="name" name="name" value="{{$order->user->userDate->city->ar_name}}" disabled>
            </div>
            <div class="col-md-4">
            الزيب كود لموغظة:
            <input class="form-group col-md-12" type="name" name="name" value="{{$order->user->userDate->zip}}" disabled>
            </div>
            <div class="col-md-4">
            مفتاح البلد:
            <input class="form-group col-md-12" type="name" name="name" value="{{$order->user->userDate->tel_code}}" disabled>
            </div>
            <div class="col-md-4">
            رقم الهاتف:
            <input class="form-group col-md-12" type="name" name="name" value="{{$order->user->userDate->tel_number}}" disabled> 
            </div>
</div>


                </div>
                </div>
            </div>
        </div>
      <?php $no++ ?>    
    @endforeach
</div>
</div> 
</div> 

<script type="text/javascript">
    //Ajax update the product status and the stock count
    $('.update-status').click(function(){
            //console.log(e);
            var item_id= $(this).data('item-id');
            var status_value = $("#status"+$(this).data('no')).find("option:selected").val();
            var qty= $(this).data('qty');

            //ajax
            $.get('/ajax-product-status?item_id=' + item_id +'&status_value='+ status_value +'&qty='+ qty, function (data) {
                //success data
                alert('تم تحديث حالة المنتج');
            });
        
    });


</script>
@stop