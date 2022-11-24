
  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="deleteCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Customer</h5>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent="destroy"> 
            <h4>Are you sure to delete this data?</h4>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" wire:click.prevent="destroy">Yes! Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  {{-- end modal --}}