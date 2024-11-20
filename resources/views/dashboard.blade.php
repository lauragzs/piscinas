@extends('layouts.app')
@section('name')
  <a href="{{route('dashboard')}}">>>>Home</a>
@endsection
@section('content')
            <!-- Row starts -->
            <div class="row">
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-pie-chart fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Visitors</h5>
                      <h1 class="m-0">675</h1>
                    </div>
                    <span class="badge bg-info position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-up-fill"></i>18%</span>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-sticky fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Sales</h5>
                      <h1 class="m-0">450</h1>
                    </div>
                    <span class="badge bg-info position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-up-fill"></i>15%</span>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-emoji-smile fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Income</h5>
                      <h1 class="m-0">75k</h1>
                    </div>
                    <span class="badge bg-info position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-up-fill"></i>11%</span>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-star fs-1 lh-1 text-danger"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Reviews</h5>
                      <h1 class="m-0 text-danger">98%</h1>
                    </div>
                    <span class="badge bg-danger position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-down-fill"></i>9%</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

            <!-- Row starts -->
            <div class="row">
              <div class="col-xxl-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Activity Report</h5>
                  </div>
                  <div class="card-body p-4">
                    <div id="activityReport"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
              <div class="col-xxl-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Recent Buyers</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped align-middle">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Link</th>
                            <th>Customer</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Popularity</th>
                            <th>Views</th>
                            <th>Engagement</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset('assets/images/mobiles/mob1.jpg') }}" class="img-5x" alt="Admin" />
                                <div class="d-flex flex-column ms-3">
                                  <p class="m-0">Apple iPhone 12</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="text-danger">#L10010021</a>
                            </td>
                            <td>Rickey Singleton</td>
                            <td>
                              <span class="badge bg-danger">Mobiles</span>
                            </td>
                            <td>
                              <span class="badge bg-info me-2">$250.00</span>
                            </td>
                            <td>
                              <div class="rate2 rating-stars"></div>
                            </td>
                            <td>
                              <div id="sparkline1"></div>
                            </td>
                            <td>
                              <p class="m-0 text-danger">
                                Higher than last week
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset('assets/images/mobiles/mob2.jpg') }}" class="img-5x" alt="User" />
                                <div class="d-flex flex-column ms-3">
                                  <p class="m-0">Apple iPhone 13</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="text-danger">#L10010065</a>
                            </td>
                            <td>Warren Alvarez</td>
                            <td>
                              <span class="badge bg-danger">Mobiles</span>
                            </td>
                            <td>
                              <span class="badge bg-info me-2">$250.00</span>
                            </td>
                            <td>
                              <div class="rate5 rating-stars"></div>
                            </td>
                            <td>
                              <div id="sparkline2"></div>
                            </td>
                            <td>
                              <p class="m-0 text-danger">
                                Higher than last week
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex flex-row align-items-center">
                                <img src="{{ asset('assets/images/mobiles/mob3.jpg') }}" class="img-5x" alt="User" />
                                <div class="d-flex flex-column ms-3">
                                  <p class="m-0">Apple iPhone 12</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="text-danger">#L10010098</a>
                            </td>
                            <td>Christian Franklin</td>
                            <td>
                              <span class="badge bg-danger">Mobiles</span>
                            </td>
                            <td>
                              <span class="badge bg-info me-2">$250.00</span>
                            </td>
                            <td>
                              <div class="rate4 rating-stars"></div>
                            </td>
                            <td>
                              <div id="sparkline3"></div>
                            </td>
                            <td>
                              <p class="m-0 text-danger">
                                Higher than last week
                              </p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->
            @endsection
