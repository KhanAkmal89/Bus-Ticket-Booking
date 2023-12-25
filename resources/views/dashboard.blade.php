@extends('layouts.master')
@section('content')
<div class="row">
    <!-- Earning Reports -->
        <div class="col-lg-12 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="border rounded p-3">
                        <div class="row gap-4 gap-sm-0">
                          <div class="col-12 col-sm-3">
                            <div class="d-flex gap-2 align-items-center">
                              <div class="badge rounded bg-label-primary p-1">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                              </div>
                              <h6 class="mb-0">Bookings</h6>
                            </div>
                            {{-- <h4 class="my-2 pt-1">{{$salesToday}} Tk</h4> --}}
                            <div class="progress w-75" style="height: 4px">
                              <div
                                class="progress-bar"
                                role="progressbar"
                                style="width: 65%"
                                aria-valuenow="65"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="d-flex gap-2 align-items-center">
                              <div class="badge rounded bg-label-info p-1"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                              <h6 class="mb-0">Buses</h6>
                            </div>
                            {{-- <h4 class="my-2 pt-1">{{$salesYesterday}} Tk</h4> --}}
                            <div class="progress w-75" style="height: 4px">
                              <div
                                class="progress-bar bg-info"
                                role="progressbar"
                                style="width: 50%"
                                aria-valuenow="50"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="d-flex gap-2 align-items-center">
                              <div class="badge rounded bg-label-danger p-1">
                                <i class="ti ti-brand-paypal ti-sm"></i>
                              </div>
                              <h6 class="mb-0">Routes</h6>
                            </div>
                            {{-- <h4 class="my-2 pt-1">{{$salesThisMonth}} Tk</h4> --}}
                            <div class="progress w-75" style="height: 4px">
                              <div
                                class="progress-bar bg-danger"
                                role="progressbar"
                                style="width: 65%"
                                aria-valuenow="65"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                          </div>
                            <div class="col-12 col-sm-3">
                            <div class="d-flex gap-2 align-items-center">
                              <div class="badge rounded bg-label-danger p-1">
                                <i class="ti ti-brand-paypal ti-sm"></i>
                              </div>
                              <h6 class="mb-0">Sets</h6>
                            </div>
                            {{-- <h4 class="my-2 pt-1">{{$salesLastMonth}} Tk</h4> --}}
                            <div class="progress w-75" style="height: 4px">
                              <div
                                class="progress-bar bg-danger"
                                role="progressbar"
                                style="width: 65%"
                                aria-valuenow="65"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    <!--/ Earning Reports -->

    <!-- Projects table -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Bus List
                </h5>
                <div class="table-responsive text-nowrap mb-4">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Bus Name</th>
                            <th>Bus Route</th>
                            <th>Destination</th>
                            <th>Ticket Price</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        {{-- @foreach($sales as $sale)
                            <tr>
                                <td>
                                    <span class="fw-medium">{{$sale->customer->name}}</span>
                                </td>
                                <td>{{$sale->product->name}}</td>

                                <td>
                                    {{$sale->quantity}}
                                </td>
                                <td>
                                    {{$sale->total_amount}}
                                </td>
                            </tr>
                        @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!--/ Projects table -->
</div>
@endsection()
