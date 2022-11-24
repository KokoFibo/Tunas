@include('components.messages')
<a href="/title/main"><button class="btn btn-primary btn-sm mb-2">Title</button></a>
{{-- <form action="store" method="post"> --}}
{{-- @csrf --}}
<div class="d-flex ">
    @foreach ($title as $t)
        <div class="form-check" style="margin-left : 20px;">
            <input class="form-check-input " type="radio" name="title_id" id="title_id" value="{{ $t->id }}"
                @if ($t->default == true) checked @endif>
            <label class="form-check-label " for="title_id">
                {{ $t->name_title }}
            </label>
        </div>
    @endforeach

</div>

<div class="mb-3">
    <form>


        <label for="nama" class="form-label">Name</label>
        <input type="text" class="form-control" " id="name" name="name"  placeholder="Name" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
            <textarea class="form-control" name="address" id="address" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city"   placeholder="City" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mobile</label>
            <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <button class="btn btn-primary kirim"  type="submit" id="submit" onClick="store()" name="submit">Saved</button>
    </form>
      {{-- </form> --}}
