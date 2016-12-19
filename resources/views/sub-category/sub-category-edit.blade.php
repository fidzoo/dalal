@extends('layouts.app')

@section('content')
<style type="text/css">
#myList .div 
{
    display: none;
}
.wrapper
{
	direction: rtl;
}
</style>

<div class="wrapper">
<h3>تحديث قسم فرعي</h3>

{!! Form::open(["url"=> "sub-category/$sub_cat->id", "files"=>true, "method"=>"patch", "class"=>"form-group"]) !!}

{!! Form::label('تفعيل القسم') !!}
{!! Form::select('active',  [0=>"القسم غير مفعّل", 1=>"القسم مفعّل"], $sub_cat->active, ['class'=>'form-control']) !!}<br>

{!! Form::label('عنوان القسم بالعربية') !!}
{!! Form::text('ar_title', $sub_cat->ar_title, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('عنوان القسم بالإنجليزية') !!}
{!! Form::text('en_title', $sub_cat->en_title, ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('القسم الرئيسي التابع له') !!}
{!! Form::select('main_cats[]', $main_cats, $selected, ['multiple' => 'multiple', 'class'=>'form-control', 'required']) !!}<br>


<!-- Saved Sizes in database-->
<h4>الأحجام للمنتجات الخاصة بهذا القسم:</h4><br>
@for($i=0, $z=1; $i < count($ar_sizes); $i++, $z++)
<div class="size{{$sizes_id[$i]}}"> 
{!! Form::label('عنوان الحجم بالعربية') !!}
{!! Form::text('ar_size_edit'.$z, $ar_sizes[$i], ['class'=>'form-control', 'required']) !!}<br>

{!! Form::label('عنوان الحجم بالإنجليزية') !!}
{!! Form::text('en_size_edit'.$z, $en_sizes[$i], ['class'=>'form-control', 'required']) !!}<br>
{!! Form::hidden('size_id'.$z, $sizes_id[$i]) !!}

<a class="delete-modal btn btn-danger"
	data-id="{{$sizes_id[$i]}}" data-name="{{$ar_sizes[$i]}}">
	<span class="glyphicon glyphicon-trash"></span> Delete
</a>
<br><br>
</div>
@endfor
<!-- Sizes Delete Popup Box -->
<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<div class="deleteContent">
						هل متأكد أنك تريد حذف <span class="dname"></span> ؟ <span
							class="hidden did"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button" class='glyphicon'> </span>
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Add More Botton -->
<div id="sizes"></div>
<a class="btn btn-default" id="size">إضافة المزيد</a><br><br>

<br><br>

<!-- Saved Specifications in  the database -->
<h4>تحديث المواصفات الخاصة بهذا القسم (تفاصيل المنتج):</h4><br>
@for($i=0, $z=1; $i < count($ar_specs); $i++, $z++)
<div class="spec{{$specs_id[$i]}}">
{!! Form::label('عنوان الوصف بالعربية') !!}
{!! Form::text('ar_title_edit'.$z, $ar_specs[$i], ['class'=>'form-control', 'required']) !!}<br>
{!! Form::label('عنوان الوصف بالإنجليزية') !!}
{!! Form::text('en_title_edit'.$z, $en_specs[$i], ['class'=>'form-control', 'required']) !!}<br>
{!! Form::hidden('spec_id'.$z, $specs_id[$i]) !!}

<a class="delete-modal2 btn btn-danger" 
	data-id="{{$specs_id[$i]}}" data-name="{{$ar_specs[$i]}}">
	<span class="glyphicon glyphicon-trash"></span> Delete
</a>
<br><br>
</div>
@endfor

<!-- Specs Delete Popup Box -->
<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title2"></h4>
				</div>
				<div class="modal-body">
					<div class="deleteContent">
						هل متأكد أنك تريد حذف <span class="dname"></span> ؟ <span
							class="hidden did2"></span>
					</div>
					<div class="modal-footer2">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button2" class='glyphicon'> </span>
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Add More Botton -->
<div id="specs"></div> 
<a class="btn btn-default" id="spec">إضافة المزيد</a>

<br><br><br>
{!! HTML::image($sub_cat->image, "", ["width"=>100]) !!}<br><br>
{!! Form::label('أيقونة القسم') !!}
{!! Form::file('image') !!}<br>

{!! Form::submit('تحديث') !!}
{!! Form::close() !!}
</div>
<script type="text/javascript">
//Sizes popup the delete confirmation
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    //Size Delete ajax script
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteSize',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.size' + $('.did').text()).remove();
            }
        });
    });

//Specs popup the delete confirmation
    $(document).on('click', '.delete-modal2', function() {
        $('#footer_action_button2').text(" Delete");
        $('#footer_action_button2').removeClass('glyphicon-check');
        $('#footer_action_button2').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title2').text('Delete');
        $('.did2').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal2').modal('show');
    });

    //Spec Delete ajax script
    $('.modal-footer2').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteSpec',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did2').text()
            },
            success: function(data) {
                $('.spec' + $('.did2').text()).remove();
            }
        });
    });

	//Sizes Add more link
	var i= 1;
		$("#size").click(function(){
			if (i < 8) {
		$("#sizes").append('{!! Form::label("عنوان الحجم بالعربية") !!}<input type="text" name="ar_size'+i+'" class="form-control" required> <br> {!! Form::label("عنوان الوصف بالإنجليزية") !!}<input type="text" name="en_size'+i+'" class="form-control" required><br>');
			i++;
			}
			else{
				alert('لقد وصلت للعدد المسموح به');
				}
		});

	//Specs Add more link
	var x= 1;
		$("#spec").click(function(){
			if (x < 6) {
		$("#specs").append('{!! Form::label("عنوان الوصف بالعربية") !!}<input type="text" name="ar_title'+x+'" class="form-control" required> <br> {!! Form::label("عنوان الحجم بالإنجليزية") !!}<input type="text" name="en_title'+x+'" class="form-control" required><br>');
			x++;
			}
			else{
				alert('لقد وصلت للعدد المسموح به');
				}
		});
</script>
@stop