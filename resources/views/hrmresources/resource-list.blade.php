@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')

@endsection


@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-responsive table-bordered table-stripped" id="my-table">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Resource Title</th>
                            <th>Resource File</th>
                            <th>Download</th>
                            @if(Auth::user()->role == 1)
                                <th>Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($resources as $key => $resource)
                        <tr>
                            <td>{{($key+1)}}</td>
                            <td>{{$resource->resource_title}}</td>
                            <td>
                                <?php
                                    $filename = explode('/',$resource->resource_link);
                                    echo $filename[1];
                                ?>
                            </td>
                            <td class="center"><a href="{{url('/download')}}/{{$resource->id}}"><span class="fa fa-download fa-2x"></span></a></td>
                            @if(Auth::user()->role == 1)
                                <td class="center"><a href="{{url('/delete')}}/{{$resource->id}}"><span class="fa fa-2x fa-minus-circle" style="color: red;"></span></a></td>
                            @endif
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function(){
           $('#my-table').DataTable();
        });
    </script>

@endsection
