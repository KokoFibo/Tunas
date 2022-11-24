
    <label class="form-check-label " for="flexRadioDefault2">
      Title
    </label>
    <div class="d-flex " >
      @foreach($title as $t)
          <div class="form-check" style="margin-left : 20px;">
            <input class="form-check-input " type="radio" name="title_id" id="title_id" value="{{ $t->id }}" @if ($t->id == $customer->title_id) checked @endif>
            <label class="form-check-label " for="flexRadioDefault2">
              {{ $t->name_title }} 
            </label>
          </div>
      @endforeach
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $customer->name }}"required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Address</label>
        <textarea class="form-control" name="address" id="address" rows="3">{{ $customer->address }}</textarea>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ $customer->city }}" required>
    </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ $customer->phone }}">
    </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Mobile</label>
        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{ $customer->mobile }}">
    </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $customer->email }}">
    </div>
    <button class="btn btn-primary"  onCLick="update({{ $customer->id }})">Update</button>
    
 

    