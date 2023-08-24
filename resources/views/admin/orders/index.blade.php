@extends('layouts.admin')

@section('content')

<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>List Orders
                            <a href="{{ url('admin/orders') }}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Filler by Date</label>
                                <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d')}}" class="form-control"/>
                            </div>
                            <div class="col-md-3">
                                <label>Filler by Status</label>
                               <select name="status" class="form-select">
                                    <option value="">Select Status</option>
                                    <option value="in progress" {{ Request::get('status') == 'in progress'?'selected':''}}>In Progress</option>
                                    <option value="completed"{{ Request::get('status') == 'completed'?'selected':''}}>Completed</option>
                                    <option value="pending"{{ Request::get('status') == 'pending'?'selected':''}}>Pending</option>
                                    <option value="cancelled"{{ Request::get('status') == 'cancelled'?'selected':''}}>Cancelled</option>
                                    <option value="out-for-delivery"{{ Request::get('status') == 'out-for-delivery'?'selected':''}}>Our for delivery</option>
                               </select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <button class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                            <th>Order ID</th>
                                                            <th>Tracking No</th>
                                                            <th>Username</th>
                                                            <th>Payment Mode</th>
                                                            <th>Ordered Date</th>
                                                            <th>Status Message</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($orders as $orderItem)
                                                            <tr>
                                                                <td>{{$orderItem->id}}</td>
                                                                <td>{{$orderItem->tracking_no}}</td>
                                                                <td>{{$orderItem->fullname}}</td>
                                                                <td>{{$orderItem->payment_mode}}</td>
                                                                <td>{{$orderItem->created_at->format('d-m-Y')}}</td>
                                                                <td>{{$orderItem->status_message}}</td>
                                                                <td><a href="{{ url('admin/orders/'.$orderItem->id) }}" class="btn btn-primary btn-sm">View</a></td>
                                                            </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="7">No Order Items available</td>
                                                        </tr>
                                                        
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                                <div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


@endsection