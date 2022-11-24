
  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action=""> 
            <label for="title_id" class="form-label">Title</label>
            <div class="d-flex ">
              @foreach ($title as $t)
                <div class="form-check me-2 ">
                  <input class="form-check-input" wire:model="title_id" value={{ $t->id }} type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                  <label class="form-check-label " for="flexRadioDefault1">
                    {{ $t->name_title }}
                  </label>
                  {{-- @error('title_id') <span class="text-danger">{{ $message }}</span> @enderror --}}
                </div>
              @endforeach
            </div>
    
                   
            <div class="form-group">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <label for="floatingTextarea">Address</label>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Address" id="floatingTextarea" wire:model="address"></textarea>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="City" wire:model="city">
                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" wire:model="phone">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" wire:model="mobile">
                    @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" wire:model="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" wire:click.prevent="store">Add Customer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  {{-- end modal --}}