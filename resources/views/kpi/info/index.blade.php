@extends('layouts.admin')
@section('content')


   <!-- Main content -->
   <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
       
          <!-- /.card-header -->
      
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Booking Details
            <a href="{{ route('foh.booking.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>   
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                                 
                <th> ID   </th>            
                <th> Name </th>            
                
                <th> Mobile </th> 
                
                <th> Visit Date </th>
                <th> Visit Time </th>
                
                <th> Reference</th>
                <th> User</th>
                <th> Booking Date</th>
                <th> Status</th>
                <th>Approved By</th>
                <th> Action </th>
              </tr>
              </thead>
              <tbody>
              
              @if(count($booking))
          
          @foreach($booking as $c)
          
          <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->tb_cust_name }}</td>  
            
            <td>{{ $c->tb_cust_mobile }}</td>  
            
            
            <td>{{ date('d-m-Y', strtotime($c->tb_date)) }}</td>  
            <td>{{ $c->tb_time}}</td>  
            
            <td>{{ $c->tb_reference}}</td>  
          
            <td> {{ $c->tb_user_name }} </td>
            
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>  

            <td>  
              @if($c->tb_status =='0')  
              <div class="text-primary">   
              Waiting for approval
              </div>
              @elseif($c->tb_status =='1')  
              <div class="text-success">   
              Request approved
              </div>             

              @endif            
            </td>
            <td> {{ $c->tb_appr_user_name }} </td>
             
            
          
          
          <td>             
            
            <a href="{{ route('foh.booking.show',$c->id) }}">
              <i class="fa fa-print text-green"></i>
              
              </a>

              /

          
          <a href="{{ route('foh.booking.edit',$c->id) }}">
          <i class="fa fa-edit"></i>
          
          </a>

         
          /

          
 

<form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('foh.booking.destroy',$c->id) }}" method="POST" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="DELETE" />  
  <button type="submit"><i class="fa fa-trash text-red" /></i></button>

  

  </form>
         



        </td>                
          
          </tr>
          @endforeach
          
          @else
          <tr><td colspan="11">No Record Found</td></tr>
          @endif

              </tbody>
              <tfoot>
              <tr>
                               
                <th> ID   </th>            
                <th> Name </th>            
                
                <th> Mobile </th> 
                
                <th> Visit Date </th>
                <th> Visit Time </th>
                
                <th> Reference</th>
                <th> User</th>
                <th> Booking Date</th>
                <th> Status</th>
                <th>Approved By</th>
                <th> Action </th>
                
              </tr>
              </tfoot>
            </table>
            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
   

@endsection

    