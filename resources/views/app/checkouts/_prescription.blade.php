@if (auth()->check())
<div class="card">
    <div class="card-content">

        <h1 class="title is-4 is-spaced">Add Prescription</h1>
        <p class="subtitle is-5">Add prescription</p>

<form action="" method="POST">

    {{ csrf_field() }}




    <div class="file">
        <label class="file-label">
            <input class="file-input" type="file" name="resume">
            <span class="file-cta">
      <span class="file-icon">
        <i class="fa fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
        </label>
    </div>



</form>


    </div>
</div>

@endif