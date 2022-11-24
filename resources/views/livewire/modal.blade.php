<!-- Modal -->
<div class="modal fade modal-xl" id="notaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suratjalan as $sj)
                <tr>
                    <td>{{ $sj->id }}</td>
                    <td>{{ $sj->Nota }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


    {{-- End Modal --}}