@extends(Session::get('group') == 'admin' ? 'ar.layouts.ar-admin-dash' : 'ar.layouts.ar-merchant-dash')

@section('content')

<section class="panel">
    <header class="panel-heading">
        كل الإشعارات
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
             </span>
    </header>
    <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                <th>الإشعار</th>
                <th>اللينك</th>
            </tr>
            </thead>
            <tbody>
	@foreach ($notifications as $notification)
            <tr id='tr{{$notification->id}}'>
                <td><a href='{!! URL::to("$notification->link") !!}'>{!!$notification->ar_title!!}</a></td>
                <td><a href="#" id="notify-delete" data-id="{{$notification->id}}"  style="color: gray;">&#10006;</a></td>
            </tr>
	@endforeach                            
            </tbody>
        </table>
    </div>

</section>

<!--script for ajax delete notifications-->
<script type="text/javascript">
    $(document).on('click', '#notify-delete', function() {
        var notify_id = $(this).data('id');
        //ajax
            $.get('/ajax-notify-delete?notify_id=' + notify_id, function(data){
                //success data
                $('#tr'+notify_id).remove();
            });
    });   
</script>
<!--end of ajax delete script-->

@stop