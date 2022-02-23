<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- JQueryUI CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <title>Xyz Courier Company Ltd.</title>
  </head>
  <body>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
          <div class="header-body">
              <div class="row align-items-center py-4">
                  <div class="col-lg-12 col-12 text-center">
                      <h6 class="h2 text-white d-inline-block mb-0">Xyz Courier Company Limited</h6>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Header -->
  <!-- Start Main Content -->
  <div class="container-fluid mt--6">
      <!-- Start Page Content -->
      <div class="row">
          <div class="col-10 mx-auto my-4">
              <div class="card">
                  <!-- Card header -->
                  <div class="card-header">
                      <h3 class="float-left">Shipping Cost</h3>
                      <a href="{{ route('api.view') }}" class="btn btn-sm btn-primary text-white float-right ml-2" target="_blank">View API</a>
                      <button class="btn btn-sm btn-success text-white float-right" data-toggle="modal" data-target="#addCost">Add New</button>
                  </div>
                  <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif
                    <div class="table-responsive">
                      <table class="table table-flush">
                          <thead class="">
                              <tr>
                                  <th>SL</th>
                                  <th>Rule Name</th>
                                  <th>Delivery Route</th>
                                  <th>Delivery Type</th>
                                  <th>Weight</th>
                                  <th>Expire Date</th>
                                  <th>Cost(Taka)</th>
                                  <th class="text-center">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              @forelse( $shippingCost as $row)
                              <tr>
                                  <td> {{ $loop->index+1 }}</td>
                                  <td>{{ $row->rule_name }}</td>
                                  <td>{{ $row->delivery_route === 1 ? 'Inside Dhaka' : 'Outside Dhaka' }}</td>
                                  <td>{{ $row->delivery_type === 1 ? 'Regular Service' : 'Express Service' }}</td>
                                  <td>
                                  @if ($row->weight==1)
                                    Below 1Kg
                                  @endif
                                  @if ($row->weight==2)
                                    1KG
                                  @endif
                                  @if ($row->weight==3)
                                    Above 1KG
                                  @endif
                                  </td>
                                  <td>{{ Carbon\Carbon::parse($row->expiry_date)->format('d M Y') }}</td>
                                  <td>{{ $row->cost }}</td>
                                  <td class="text-center">
                                    <a class="btn btn-md btn-info editCost" href="" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editCost">Edit</a>
                                    <form action="{{ route('shipping.destroy', $row->id) }}" method="POST" style="display: inline-block;">
                                      @csrf
                                      @method('DELETE')
                                      <input type="submit" class="btn btn-danger btn-md" value="Delete">
                                    </form>
                                  </td>
                              @empty
                              <tr class="text-center">
                                <td>No Data Found </td>
                              </tr>
                              @endforelse
                          </tbody>
                      </table>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Page Content -->
      <!-- Footer -->
      <footer class="footer pt-0 pl-2">
          <div class="row justify-content-center">
              <div class="col-6">
                  <div class="copyright text-center text-muted">
                      © {{ date('Y') }} <a href="https://www.fahadchowdhury.me/" class="text-center font-weight-bold ml-1" target="_blank">Fahad Ahmed Chowdhury</a>
                  </div>
              </div>
          </div>
      </footer>
      <!-- End Footer -->

      <!-- Add Modal -->
      <div class="modal fade" id="addCost" tabindex="-1" role="dialog" aria-labelledby="addCostLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addCostlLabel">Add New Cost</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('shipping.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="rule-name" class="col-form-label">Rule Name :</label>
                  <input type="text" class="form-control" id="rule-name" name="rule_name">
                </div>
                <div class="form-group">
                  <label for="delivery-route" class="col-form-label">Delivery Route :</label>
                  <select class="form-control" id="delivery-route" name="delivery_route">
                    <option selected disabled>Select Delivery Route</option>
                    <option value="1">Inside Dhaka</option>
                    <option value="2">Outside Dhaka</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="delivery-type" class="col-form-label">Delivery Type :</label>
                  <select class="form-control" id="delivery-type" name="delivery_type">
                    <option selected disabled>Select Delivery Type</option>
                    <option value="1">Regular Service</option>
                    <option value="2">Express Service</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="weight" class="col-form-label">Weight :</label>
                  <select class="form-control" id="weight" name="weight">
                    <option selected disabled>Select Weight</option>
                    <option value="1">Below 1KG</option>
                    <option value="2">1KG</option>
                    <option value="3">Above 1KG</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="expiry_date" class="col-form-label">Expiry Date:</label>
                  <input placeholder="Select date" type="text" id="expiry_date" class="form-control" name="expiry_date">
                </div>
                <div class="form-group">
                  <label for="cost" class="col-form-label">Cost(Taka):</label>
                  <input type="text" class="form-control" id="cost" name="cost">
                </div>
              {{-- </form> --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Edit Modal -->
      <div class="modal fade" id="editCost" tabindex="-1" role="dialog" aria-labelledby="editCostLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editCostlLabel">Edit Cost</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('shipping.update', $row->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label for="rule_name" class="col-form-label">Rule Name :</label>
                  <input type="text" class="form-control" id="rule_name" name="rule_name">
                </div>
                <div class="form-group">
                  <label for="delivery_route" class="col-form-label">Delivery Route :</label>
                  <select class="form-control" id="delivery_route" name="delivery_route">
                    <option selected disabled>Select Delivery Route</option>
                    <option value="1">Inside Dhaka</option>
                    <option value="2">Outside Dhaka</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="delivery_type" class="col-form-label">Delivery Type :</label>
                  <select class="form-control" id="delivery_type" name="delivery_type">
                    <option selected disabled>Select Delivery Type</option>
                    <option value="1">Regular Service</option>
                    <option value="2">Express Service</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="s_weight" class="col-form-label">Weight :</label>
                  <select class="form-control" id="s_weight" name="weight">
                    <option selected disabled>Select Weight</option>
                    <option value="1">Below 1KG</option>
                    <option value="2">1KG</option>
                    <option value="3">Above 1KG</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="c_expiry_date" class="col-form-label">Expiry Date:</label>
                  <input placeholder="Select date" type="text" id="c_expiry_date" class="form-control" name="expiry_date">
                </div>
                <div class="form-group">
                  <label for="s_cost" class="col-form-label">Cost(Taka):</label>
                  <input type="text" class="form-control" id="s_cost" name="cost">
                </div>
              {{-- </form> --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal End -->
  </div>
  <!-- End Main Content -->

  
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    
    <script>

      // JqueryUI Functions
      $( function() {
        $( "#expiry_date" ).datepicker({
          minDate: 0,
          dateFormat: 'yy-mm-dd',
        });
        $( "#c_expiry_date" ).datepicker({
          minDate: 0,
          dateFormat: 'yy-mm-dd',
        });
      });

      // Add Modal functions
      $('#addCost').on('shown.bs.modal');
    </script>

    <script>
      //Edit Ajax functions
      $('body').on('click', '.editCost', function(){
        let cost_id = $(this).data('id');
        $.get("shipping/"+cost_id+"/edit", function(data){
          $('#rule_name').val(data.rule_name);
          $('#delivery_route').val(data.delivery_route);
          $('#delivery_type').val(data.delivery_type);
          $('#s_weight').val(data.weight);
          $('#c_expiry_date').val(data.expiry_date);
          $('#s_cost').val(data.cost);
        });
      });
    </script>
  </body>
</html>