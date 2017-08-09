@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')
    <style>
        .col-container{
            min-height: 300px;
            overflow-y: scroll;
        }
        .left, .right{
            height: 200px;
            overflow-y: scroll;
            border: 1px solid black;
        }
        
        #addlist > li, #added > li{
            cursor: pointer;
        }
        
        .remove{
            display: none;
        }
        #selectedlist > li {
            cursor: pointer;
        }

    </style>
@endsection


@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-xs-10 col-md-offset-1 col-sm-offset-1">
                <div class="col-container">
                    <h3>Employee list</h3>
                    @if(count($provident) <= 0)
                        <div class="text-center text-danger" style="margin-top: 100px;">
                            <i class="fa fa-exclamation-triangle"></i>
                            <br>
                            <h4>No employee allowed for provident fund!</h4>
                        </div>
                    @else
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Company contribution (5%)</th>
                                    <th>Employee contribution (5%)</th>
                                    <th>Starting date</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($provident as $key => $pro)
                                    <tr>
                                        <td>{{ ($key+1) }}</td>
                                        <td>{{ $pro->employeeInfo['name'] }}</td>
                                        <td>{{ $pro->company }}</td>
                                        <td>{{ $pro->woner }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pro->created_at)->format('F d, Y') }}</td>
                                        <td>{{ $pro->sub_total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="successs">
                                    <th></th>
                                    <th colspan="4">Total</th>
                                    <th>{{ $provident->first()->total }}</th>
                                </tr>

                            </tfoot>
                        </table>
                    @endif
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-2">
                <div>
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#providentModal"><i class="fa fa-users"></i> <i class="fa fa-plus"></i></a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="providentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><span style="-webkit-border-radius: 50%;-moz-border-radius: 50%;border-radius: 50%;" class="btn btn-success"><i class="fa fa-users"></i></span> Add employee</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-xs-6">
                                        <h4>Choose employees (click to add)</h4>
                                        <div class="left">
                                            @if(count($addable_list) <= 0)
                                                <div class="text-center text-danger" style="margin-top: 50px;">
                                                    <i class="fa fa-exclamation-triangle"></i>
                                                    <br>
                                                    <h4>No allowable employee found</h4>
                                                </div>
                                            @else

                                                    <ul class="list-group" id="addlist">
                                                        @foreach($addable_list as $add)
                                                            <li class="list-group-item" data-id="{{$add->user_id}}"><i class="fa fa-user text-success fa-2x"></i> {{$add->name}}
                                                                <input type="hidden" name="user_id[]" value="{{$add->user_id}}">
                                                            </li>
                                                        @endforeach
                                                    </ul>



                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-xs-6">
                                        <h4>Fund list (Click to remove)</h4>
                                        <form action="{{url('set-provident-fund')}}" method="post" id="myForm">
                                            {{csrf_field()}}
                                            <div class="right">
                                                <ul id="added" class="list-group">

                                                </ul>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="add">Add </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(function(){

            $("div[data-toggle=tooltip]").tooltip();
            setTimeout(function(){
                $('.my-alert-edit').addClass('animated slideInDown');
                $('.my-alert-edit').show();

            },50);

            setTimeout(function(){
                $('.my-alert-edit').addClass('animated slideOutUp');
            },5000);


            $(document).on('click','#addlist > li',function(e){
               /*$('#added').append($("<li>",{
                   class: 'list-group-item',
                   text: $(this).html(),
                   value: $(this).data('id')
               }));*/
               var clone = $(this).clone();
               $('#added').append(clone);
               $(this).remove();
            });

            $(document).on('click','#added > li',function(){
                var clone = $(this).clone();
                $('#addlist').append(clone);
                $(this).remove();

            });

            $('#add').click(function(e){
               e.preventDefault();
               $('#myForm').submit();
            });

            $('#selectedlist > li').mouseenter(function(){
               $(this).find('a').show();
            });
            $('#selectedlist > li').mouseleave(function(){
                $(this).find('a').hide();
            });

        });
    </script>

@endsection
