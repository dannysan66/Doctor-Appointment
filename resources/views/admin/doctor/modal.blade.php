<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Doctor Information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            <img src="{{ asset('images') }}/{{ $user->image }}" width="200px" alt="">
            <p class="badge badge-pill badge-dark">Role: {{ $user->role->name }}</p>
            <p>Name: {{ $user->name }}</p>
            <p>Gender: {{  $user->gender }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Address: {{ $user->address }}</p>
            <p>Phone Number: {{ $user->phone_number }}</p>
            <p>Department: {{ $user->department }}</p>
            <p>Education: {{ $user->education }}</p>
            <p>Bio: {{ $user->description }}</p>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
