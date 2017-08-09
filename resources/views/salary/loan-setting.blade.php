@extends('layouts.app')

@section('title','HRM::Dashboard')
@section('styles')
<link rel="stylesheet" href="{{URL::asset('css/funkyradio.css')}}">
@endsection


@section('content')
    @if($loanData->loan <=0)
    <div class="col-md-12">
       	<div class="row">
       		<div class="center">
       			<h3>Provide Loan</h3>
       			<h4>{{date('d F, Y',strtotime(\Carbon\Carbon::now()))}}</h4>
       		</div>
       	</div>
       	<hr>
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        	<form action="{{url('loan')}}/{{$loanData->user_id}}" method="POST">
	        	{{csrf_field()}}
            <div class="form-group">
              <label for="">Employee Name</label>
              <input type="text" name="name" value="{{$loanData->name}}" class="form-control" readonly>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Basic</label>
                  <input type="number" readonly value="{{$loanData->basic}}" class="form-control" id="basic">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Previous Loan</label>
                  <input type="number" readonly value="{{$loanData->loan}}" class="form-control" id="ploan">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Loan Amount</label>
              <input type="number" name="loan_amount" class="form-control" value="0" id="loan">
            </div>
            
            <div class="row">
              <div class="col-md-3">
                <label for="">Payment type</label>
                  <div class="funkyradio">
                    <div class="funkyradio-success">
                        <input type="radio" name="ptype" id="ptype1"  value="1"/>
                        <label for="ptype1">EMI</label>
                    </div>
                    <div class="funkyradio-success">
                        <input type="radio" name="ptype" id="ptype2"  value="2" />
                        <label for="ptype2">Cash</label>
                    </div>
                 </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <label for="">Loan Payable</label>
                  <input type="number" readonly value="0" class="form-control" id="payable" name="loan_payable">
                </div>
                
              </div>
            </div>
            
            <div id="emi" style="display: none;">
              <div class="form-group">
                <label for="">Total months need to pay</label>
                <input type="number" name="month" class="form-control" placeholder="This must be month not year" id="month" value="1">
              </div>
            </div>
           
             
           
	        	
				<div class="alert alert-danger" id="myAlertMonth" style="display: none;">
          <p>Your monthly payable value should be less than your basic salary. Increase month number or decrease loan amount to decrese monthly payable money.</p>
        </div>
        <div class="alert alert-danger" id="myAlertCash" style="display: none;">
          <p>Your payable cash exceed your basic salary. Please decrease it.</p>
        </div>

    		<div class="form-group">
    			<input type="submit" class="btn btn-primary" value="Provide loan" disabled id="submit">

    		</div>
        </form>	
      </div>
      
          
      </div>
  </div>
  @else
  <div class="alert alert-danger center">
    <strong >You don't pay your previous loan. You are not eligible for taking loan befor completing your previous one. </strong>
  </div>

  @endif

@endsection
@section('scripts')

<script>
  $(document).ready(function(){
   
    

    $('input[type=radio][name=ptype]').change(function() {


        $('#myAlertCash').hide();
        $('#myAlertMonth').hide();

        if (this.value == '1') {
            $('#emi').show('slow');
            $('#cash').hide('slow');
            myRadio = 1;


            var ploan = parseFloat($('#ploan').val());
            var loan = parseFloat($('#loan').val());
            var basic = parseInt($('#basic').val());
            var month = parseInt($('#month').val());

            $('#payable').val((ploan+loan)/month);

            if(((ploan+loan)/month) > basic){
              $('#submit').prop('disabled',true);
              $('#myAlertMonth').show('slow');
              $('#myAlertCash').hide();
            }else{
              $('#submit').prop('disabled',false);
              $('#myAlertMonth').hide('slow');
              $('#myAlertCash').hide();
            }


            
        }
        else if (this.value == '2') {
            $('#emi').hide('slow');
            $('#cash').show('slow');
            myRadio = 2;



            var ploan = parseFloat($('#ploan').val());
            var loan = parseFloat($('#loan').val());
            var basic = parseInt($('#basic').val());
            
            

            $('#payable').val(loan);

            if(loan > basic){
              $('#submit').prop('disabled',true);
              $('#myAlertCash').show('slow');
              $('#myAlertMonth').hide();
            }else{
              $('#submit').prop('disabled',false);
              $('#myAlertCash').hide('slow');
              $('#myAlertMonth').hide();
            }
            
        }



        console.log(myRadio);

    if(myRadio == 1){
     //alert(1);

        $('#month').on('keyup',function(){
            var ploan = parseFloat($('#ploan').val());
            var loan = parseFloat($('#loan').val());
            var basic = parseInt($('#basic').val());
            var month = parseInt($('#month').val());

            $('#payable').val((ploan+loan)/month);

            if(((ploan+loan)/month) > basic){
              $('#submit').prop('disabled',true);
              $('#myAlertMonth').show('slow');
              $('#myAlertCash').hide();
            }else{
              $('#submit').prop('disabled',false);
              $('#myAlertMonth').hide('slow');
              $('#myAlertCash').hide();
            }


        });

        $('#loan').on('keyup',function(){
          var ploan = parseFloat($('#ploan').val());
          var loan = parseFloat($('#loan').val());
          var basic = parseInt($('#basic').val());
          var month = parseInt($('#month').val());

          $('#payable').val((ploan+loan)/month);

          if(((ploan+loan)/month) > basic){
            $('#submit').prop('disabled',true);
            $('#myAlertMonth').show('slow');
            $('#myAlertCash').hide();
          }else{
            $('#submit').prop('disabled',false);
            $('#myAlertMonth').hide('slow');
            $('#myAlertCash').hide();
          }


     });
    }else{
      //alert(2);
      $('#loan').on('keyup',function(){
        var ploan = parseFloat($('#ploan').val());
        var loan = parseFloat($('#loan').val());
        var basic = parseInt($('#basic').val());
        
        

        $('#payable').val(loan);

        if(loan > basic){
          $('#submit').prop('disabled',true);
          $('#myAlertCash').show('slow');
          $('#myAlertMonth').hide();
        }else{
          $('#submit').prop('disabled',false);
          $('#myAlertCash').hide('slow');
          $('#myAlertMonth').hide();
        }


    });
    }
    
        
        
    
    });

    
   
  });
</script>

@endsection