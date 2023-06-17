<style>
    .invoice-content{
  font-size: 13px;
  margin: auto;
  width: 1300px;
}

.button-container {
    margin: auto;
  width: 1300px;
}
.khmer {
    font-size: 20px;
}

@media print {

  body {
      visibility: hidden;
  }
  .print-area * {
      visibility: visible;
  }
  .invoice-content {
    padding: 0;
    margin:0;
    width: 100%;
    background-color: red; 
  }
}
</style>


<div class="flex align-items-center w-100 mt-3">
<div class="invoice-content card p-5 invoice-content">
  <div class="print-area">
    <div class="d-flex justify-content-between align-items-start">
      <div>
        <h3>{{$booking->tour->vendor->name}}</h3>
      </div>
      <div class="align-self-end">
        <strong>
          <div class="d-flex flex-column text-primary justify-content-center align-items-center moul ">
              <div class=" khmer">ព្រះរាជាណាចក្រកម្ពុជា</div>
              <div class='khmer'>ជាតិ​​ សាសនា ព្រះមហាក្សត្រ</div>
          </div>
        </strong>
      </div>
    </div>
    <div class="d-flex justify-content-center my-3">
      <h4 class="pt-0"> {{$booking->tour->name}} </h4>
    </div>
    <div class="d-flex justify-content-between my-5">
      <div>
        <ul class="list-unstyled">
          <li>
            <div> អាសយដ្ធានទទួលបង្កាន់ដៃ​ / Address :</div>
            Address
          </li>
        
        </ul>
      </div>
      <div >
        <ul class="list-unstyled">
          <li>
            <span>លេខបង្កាន់ដៃ​​ / Reciept No :</span>
            <strong>  {{ strtoupper(substr($booking->tour->vendor->name, 0, 3)) }}-{{ $booking->booking_number }} </strong>
          </li>
          <li>
            <span>កាលបរិច្ចេទ / Invoice Date : </span>
             {{ $payment->created_at->format('Y d M')}}
          </li>
          <!-- <li>
            <span> លេខអតិថិជន / Customer No : </span>
            customer_number 
          </li>
          <li>
            <span>លេខកូខទីតាំង / Loc code : </span>
             location_code
          </li> -->
        </ul>
      </div>
    </div>

    <table class="table table-striped mt-2">
        <thead  class=" bg-light">
          <tr>
            <th scope="col">ល.រ​​​ / N</th>
            <th scope="col">បរិយាយ / Description</th>
            <th scope="col">ចំនូន / Quantity</th>
            <th scope="col">ទឹកប្រាក់​ / Amount</th>
            <th scope="col">សរុប / Total</th>

          </tr>
        </thead>
        <tbody class="list-unstyled">
          <tr>
            <th scope="row">1</th>
            <td>
              <ul class="list-unstyled">
                <li>  {{$booking->tour->name}} </li>
              </ul>
            </td>
            <td>
              <ul class="list-unstyled">
                  <li> {{$booking->quantity}}</li>
              </ul>
            </td>
            <td>
              <ul class="list-unstyled">
                <li>
                $ {{$booking->tour->price}}
                </li>
              </ul>
            </td>
            <td>
              <ul class="list-unstyled">
                <li>
                $ {{$payment->amount}}
                </li>
              </ul>
            </td>
          </tr>
          <tr>
        </tbody>
    </table>

    <div class="my-2">
        <br>
        <div class="d-flex justify-content-between align-items-center bg-primary pt-3 px-2 font-weight-bold text-white">
              <p>ទឹកប្រាក់​ត្រូវទូទាត់​​ / Total Amount due</p>
              <p>
                $ {{$payment->amount}}
              </p>
        </div>
          <!-- <div class="d-flex justify-content-between mt-4">
            <div>
              <p>អ្នកទទួលប្រាក់​​ / Received By : ............................. </p>
              <p>កាលបរិច្ចេទ / Date : ............................. </p>
            </div>
            <div>
              <p>ទឹកប្រាក់​បានបង់ / Paid Amount : ............................. </p>
              <p>កាលបរិច្ចេទ / Date : .............................  </p>
            </div>
          </div> -->
        <div class="d-flex justify-content-center mt-4">
          <div>
            <div> អាសយដ្ធាន / Address :  </div>
            <div>
              <span>ទំនាក់ទំនង / Contact : {{$booking->tour->vendor->phone_number}}</span>
              <span>, អុីមែល / Email : {{$booking->tour->vendor->email}}</span>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="button-container d-flex mt-4">
    <a href="#" onclick= "window.print(); return false;" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
    <a href="{{ route('booking.show', [ 'booking' => $booking->id]) }}" class="btn btn-primary text-white">Back</a>

</div>

</div>



